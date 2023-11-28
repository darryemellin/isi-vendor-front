<?php
include_once 'header.php';
?>

<main>
  <?php 
  echo"<div class='container'>";
  echo"<a href='carrinho.php?limp=1' class='btn btn-primary ' style='margin:1%;'>Limpar carrinho</a>";
  echo"</div>";
  
  ?>

  <div class="container " style="display: flex; flex-wrap:wrap;">
  
  
  <?php 
    if(isset($_GET['limp'])){
      $_SESSION['carrinho']=array(0,0);
      
      echo"<script>window.location.href= 'index.php';</script>";
    }

    

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
     if(isset($_SESSION['carrinho'])){
      

      $aux = $_SESSION['carrinho'];

     foreach($aux as $item){
        $cod = $item;

        foreach($data as $item){
          $nome = $item['name'];
          $desc = $item['descricao'];
          $price = $item['price'];
          $imagem = $item['imgUrl'];
          $id = $item['id'];
          
          if($cod==$id){
            echo"<div class='card' style='width: 18rem; margin:1%;'>";
            echo"<img src='$imagem' class='card-img-top'>";
              echo"<div class='card-body'>";
                echo"<h5 class='card-title'>$nome</h5>";
                echo"<p class='card-text'>R$ $price</p>";
                echo"<p class='card-text'>$desc</p>";
                echo"<a href='fazerPedido.php?id='$id' class='btn btn-primary ' style='margin:1%;'>Comprar</a>";
              echo"</div>";
            echo"</div>";
            
          }
  
        }

        
     }
      
     }
     

      

      if(isset($_GET['id'])){
        $carrinho = $_GET['id'];
        $aux=array(
          $carrinho
        );
      }


     
  ?>

    
  </div><!-- /.container -->

</main>

<?php
include_once 'footer.php';
?>