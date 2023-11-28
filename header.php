<?php
session_start();
if(session_status() != PHP_SESSION_ACTIVE){
  $_SESSION['userName']="";
  $_SESSION['level']="usr"; 
  $_SESSION['carrinho']=array(0,0); 
}


  include_once 'controler.php';
?>
<!DOCTYPE html>

<html data-bs-theme="dark"> 
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Easy Vendor</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap-5.3.2-dist\css\bootstrap.min.css">
        <link rel="stylesheet" href="css\config.css"> 
        <script src="bootstrap-5.3.2-dist\js\bootstrap.bundle.min.js"></script>
        
        
    </head>
    <body>
        <div class="container">
            <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom" >
              <a href="index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                <span class="fs-4">
                  Easy Vendor
                <?php 
                if($_SESSION['userName']!=""){
                  echo ": Bem Vindo ". $_SESSION['userName'];
                }
                ?>

                </span>
              </a>

              <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                  <a class="navbar-brand" href="index.php">Home
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                        <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"/>
                      </svg>

                  </a>
                  <?php
                
                    if($_SESSION["level"]=="adm"){
                      echo'<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">';
                      echo'  <span class="navbar-toggler-icon"></span>';
                      echo'</button>';
                      echo'<div class="collapse navbar-collapse" id="navbarNavDarkDropdown">';
                      echo'  <ul class="navbar-nav">';
                      echo'    <li class="nav-item dropdown">';
                      echo'      <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">';
                      echo'        Cadastros';
                      echo'      </button>';
                      echo'      <ul class="dropdown-menu dropdown-menu-dark">';
                      echo'       <li><a class="dropdown-item" href="cadastroCategoria.php">Cadastro de categoria</a></li>';
                      echo'       <li><a class="dropdown-item" href="cadastroProdutos.php">Cadastro de produtos</a></li>';
                      echo'       <li><a class="dropdown-item" href="cadastroUsuario.php">Cadastro de usuário</a></li>';
                      echo'      </ul>';
                      echo'    </li>';
                      echo'  </ul>';
                      echo'</div>';
                }

                
                ?>

                <?php
                
                if($_SESSION["level"]=="adm"){
                  echo'<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">';
                  echo'  <span class="navbar-toggler-icon"></span>';
                  echo'</button>';
                  echo'<div class="collapse navbar-collapse" id="navbarNavDarkDropdown">';
                  echo'  <ul class="navbar-nav">';
                  echo'    <li class="nav-item dropdown">';
                  echo'      <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">';
                  echo'        Editar cadastros';
                  echo'      </button>';
                  echo'      <ul class="dropdown-menu dropdown-menu-dark">';
                  echo'       <li><a class="dropdown-item" href="listarCategoria.php">Lista de categoria</a></li>';
                  echo'       <li><a class="dropdown-item" href="listarProduto.php">Listagem de produtos</a></li>';
                  echo'       <li><a class="dropdown-item" href="editarUsuario.php">Editar usuário</a></li>';
                  echo'      </ul>';
                  echo'    </li>';
                  echo'  </ul>';
                  echo'</div>';
            }

            
            ?>
                <ul class="navbar-nav">
              </li>
                <li class="nav-item"><a href="carrinho.php" class="nav-link">Carrinho
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart2" viewBox="0 0 16 16">
                  <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0"/>
                </svg>

                </a>
                
                </li>
                <?php 
                if($_SESSION['userName']!=""){
                  echo '<li class="nav-item"><a href="meusPedidos.php" class="nav-link">Meus pedidos
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-text" viewBox="0 0 16 16">
                    <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z"/>
                    <path d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8m0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5"/>
                  </svg>
                  </a></li> ';
                }
                
                ?>
                <?php 
                if($_SESSION['level']=="adm"){
                  echo '<li class="nav-item"><a href="gerarRelatorio.php" class="nav-link">Relatório
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-data" viewBox="0 0 16 16">
                    <path d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5z"/>
                    <path d="M3 2.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 0 0-1h-.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1H12a.5.5 0 0 0 0 1h.5a.5.5 0 0 1 .5.5v12a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5z"/>
                    <path d="M10 7a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0zm-6 4a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0zm4-3a1 1 0 0 0-1 1v3a1 1 0 1 0 2 0V9a1 1 0 0 0-1-1"/>
                  </svg>
                  </a></li> ';
                }
                
                ?>
                
                
                
                
                <?php
                
                
                if($_SESSION["userName"]==""){
                  echo '<li class="nav-item"><a href="login.php" class="nav-link active">';
                  echo ' Login
                    
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                      </svg>';
                }
                else{
                  echo '<li class="nav-item"><a href="login.php?out=1" class="nav-link active">';
                  echo 'Logout
                    
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
                  <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                </svg>';
                }
                
                ?>
            
                </a>
              </li>
                
              </ul>
                  
                </div>
              </nav>
        
              
            </header>
          </div>
