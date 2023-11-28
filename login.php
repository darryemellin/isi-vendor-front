<?php
include_once 'header.php';

if(isset($_GET['out'])==1){
    $_SESSION['userName']="";
    $_SESSION['level']="usr"; 
    $_SESSION['carrinho']=array(0,0); 
    echo"<script>window.location.href= 'login.php';</script>";
}
?>

        <div  class="container login align-items-center py-4 ">
            <main class="form-signin w-100 m-auto">
                <center>
                <form action="controler.php" method="POST">
                    <h1 class="h3 mb-3 fw-normal">Login</h1>

                    <div class="form-floating" style="margin-bottom: 2%;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="160px" height="160px" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                        <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>
                        </svg>
                    </div>

                    <div class="form-floating " style="margin-bottom: 2%;">
                    <input type="email" class="form-control" id="loginEmail" name='loginEmail' placeholder="identificacao@email">
                    <label for="floatingInput">Email:</label>
                    </div>
                    <div class="form-floating " style="margin-bottom: 2%;">
                    <input type="password" class="form-control" id="loginSenha" name='loginSenha' placeholder="Senha">
                    <label for="floatingPassword">Senha:</label>
                    </div>
                    <div class="formSpacing">
                        <button class="btn btn-primary w-100 py-2" id='btnLogin' name="btnLogin" type="submit">Entrar</button>
                    </div>
                    
                    
                    <div class="formSpacing">
                        <a href="cadastroUsuario.php" class="btn btn-primary w-100 py-2">Fazer cadastro</a>
                    </div>
         
                    <p class="mt-5 mb-3 text-body-secondary">© 2023–2023</p>
                </form>
                </center>
                
            </main>
            <script src="bootstrap-5.3.2-dist\js\bootstrap.bundle.min.js" crossorigin="anonymous"></script>

        </div>      

<?php
include_once 'footer.php';
?>