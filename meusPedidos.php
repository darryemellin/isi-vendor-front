<?php
include_once'header.php';
?>
<div class="container" >
    <center>
    <h1 class="h3 mb-3 fw-normal">Meus Pedidos</h1>
    </center>
    <div class='container' style="display: flex; flex-wrap:wrap;">
    <?php
        $idE = $_SESSION['idUser'];
        $url = "http://localhost/pedidos";
        $ch = curl_init($url);
    
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'accept: */*'
        ));
    
        $response = curl_exec($ch);
        // Verificando erros
        if (curl_errno($ch)) {
            echo 'Erro ao enviar a requisição cURL: ' . curl_error($ch);
        }
    
        curl_close($ch);
    
        $data = json_decode($response,true);
        foreach($data as $item){
            $id = $item['id'];
            $instante = $item['instante'];
            $status = $item['pedidoStatus'];
            $usuarioId = $item['usuario']['id'];


            if($idE==$usuarioId){
                echo"<div class='card' style='width: 18rem; margin:1%;'>";
                  echo"<div class='card-body'>";
                    echo"<h5 class='card-title'>Numero do pedido: $id</h5>";
                    echo"<p class='card-text'>Data: $instante</p>";
                    echo"<p class='card-text'>Status do pagamento: $status</p>";
                  echo"</div>";
                echo"</div>";
            }
        }
        

        
        ?>
    </div>

    
</div>
</div>

<?php
include_once'footer.php';
?>