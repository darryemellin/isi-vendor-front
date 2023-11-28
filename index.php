<?php
include_once 'header.php';
?>

<main>
  <div class="container " style="display: flex; flex-wrap:wrap;">
  <form class="central" method="GET" action="index.php">
  <?php 
                    $url = "http://localhost/categorias";
                    $ch = curl_init($url);
                
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Retorna a resposta como string
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); // Define o cabeçalho como JSON
                
                    $response = curl_exec($ch);
                    // Verificando erros
                    if (curl_errno($ch)) {
                        echo 'Erro ao enviar a requisição cURL: ' . curl_error($ch);
                    }

                    $data = json_decode($response,true);
                    echo"<div class='row'>";
                      echo"<div class=col-md-6>";
                        echo'        <div class="form-floating ">';
                        echo'        <select class="form-control" id="produtoCategoria" name="produtoCategoria" placeholder="Categoria">';
                                  foreach($data as $item){
                                    $id = $item['id'];
                                    $nome = $item['nome'];
                                    echo"  <option value='$nome'>$nome</option>";
                                  }
                      
                        echo'        </select>';
                        echo'           <label for="produtoCategoria">Categoria:</label>';
                                echo"</div>";
                      echo"</div>";
                      echo"<div class='col-md-3'>";
                      echo"<button class='btn btn-primary py-2' type='submit' id='filtrarCategoria' name='filtrarCategoria'>Filtrar</button>";
                      echo'        </div>';
                      echo"<div class='col-md-3'>";
                      echo"<a class='btn btn-primary py-2' href='index.php'>limpar</a>";
                      echo'        </div>';
                    echo"</div>";
                   

                ?>

        
        
        
        
      

    </form>

  </div>
  <div class="container " style="display: flex; flex-wrap:wrap;">
  <?php 

        if($_SERVER["REQUEST_METHOD"]=="GET" && isset($_GET['filtrarCategoria'])){
          $aux = $_GET['produtoCategoria'];
          $url = "http://localhost/produtos/categoria/$aux";
          $ch = curl_init($url);
      
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Retorna a resposta como string
          curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); // Define o cabeçalho como JSON
      
          $response = curl_exec($ch);
          // Verificando erros
          if (curl_errno($ch)) {
              echo 'Erro ao enviar a requisição cURL: ' . curl_error($ch);
              echo"<script>window.location.href= 'index.php';</script>";
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
                    echo"<a href='fazerPedido.php?id=$id' class='btn btn-primary ' style='margin:1%;'>Comprar</a>";
                    echo"<a href='index.php?id=$id' class='btn btn-primary' style='margin:1%;'>Adicionar ao carrinho</a>";
                  echo"</div>";
                echo"</div>";
              
                


            }

        }
        else{
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
              echo"<a href='fazerPedido.php?id=$id' class='btn btn-primary ' style='margin:1%;'>Comprar</a>";
              echo"<a href='index.php?id=$id' class='btn btn-primary' style='margin:1%;'>Adicionar ao carrinho</a>";
            echo"</div>";
          echo"</div>";
        
          


      }
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