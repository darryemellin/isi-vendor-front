<?php
include_once 'header.php';
?>

<main>
  <div class="container " style="display: flex; flex-wrap:wrap;">
  <?php 
     $url = "http://localhost/produtos";
     $ch = curl_init($url);
 
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Retorna a resposta como string
     curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); // Define o cabeçalho como JSON
 
     $response = curl_exec($ch);
     // Verificando erros
     if (curl_errno($ch)) {
         echo 'Erro ao enviar a requisição cURL: ' . curl_error($ch);
     }

     $data = json_decode($response,true);
     
      foreach($data as $item){
        $nome = $item['name'];
        $desc = $item['descricao'];
        $price = $item['price'];
        $imagem = $item['imgUrl'];
        $id = $item['id'];
       

          echo"<div class='card' style='width: 18rem; margin:1%;'>";
          echo"<img src='$imagem' class='card-img-top'>";
            echo"<div class='card-body'>";
              echo"<h5 class='card-title'>$nome</h5>";
              echo"<p class='card-text'>R$ $price</p>";
              echo"<p class='card-text'>$desc</p>";
              echo"<a href='editarProduto.php?id=$id' class='btn btn-primary ' style='margin:1%;'>Editar</a>";
            echo"</div>";
          echo"</div>";
        
          


      }

      if(isset($_GET['id'])){
        $carrinho = $_GET['id'];
        if($_SESSION['carrinho']==null){
          echo $_SESSION['carrinho'];
        }
        else{
          array_push($_SESSION['carrinho'], $carrinho);
          $aux = $_SESSION['carrinho'];
        }
      }

      

     
  ?>

    
  </div><!-- /.container -->

</main>

<?php
include_once 'footer.php';
?>