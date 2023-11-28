<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //echo "metodo post";

    if(isset($_POST['btnLogin'])){
        $email = $_POST['loginEmail'];
        $senha = $_POST['loginSenha'];
        //echo"login";

        $url = "http://localhost/usuarios";
                    $ch = curl_init($url);
                
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Retorna a resposta como string
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); // Define o cabeçalho como JSON
                
                    $response = curl_exec($ch);
                    // Verificando erros
                    if (curl_errno($ch)) {
                        echo 'Erro ao enviar a requisição cURL: ' . curl_error($ch);
                    }

                    $data = json_decode($response,true);
                    if(session_status()!=PHP_SESSION_ACTIVE){
                        session_start();
                        //echo "dentro";
                        $_SESSION['carrinho']=array(0,0);
                        $_SESSION['userName'] = "";
                        $_SESSION['level'] = "";
                        $_SESSION['idUser']=0;
                        $_SESSION['email']="";
                    }
                    foreach($data as $item){
                        //echo"if";
                        $asenha = $item['senha'];
                        $aemail = $item['email'];
                        $idU = $item['id'];

                        if($email == $aemail && $senha == $asenha){
                            $nome = $item['nome'];
                            $_SESSION['userName'] = $nome;
                            $_SESSION['level'] = "adm";
                            $_SESSION['idUser']=$idU;
                            $_SESSION['email']=$email;
                            echo"<script>window.location.href= 'index.php';</script>";
                            //echo $_SESSION['userName'];
                            //echo $_SESSION['level']; 
                            //echo $_SESSION['idUser'];       
                            break;
                        }
                    }
                    echo"<script>window.location.href= 'login.php';</script>";
                    
    }

    if(isset($_POST['btnCadastroUsuario'])){

        $nome = $_POST["usuarioNome"];
        $sobrenome = $_POST["usuarioSobrenome"];
        $emai = $_POST["usuarioEmail"];
        $telefone = $_POST["usuarioTelefone"];
        $senha = $_POST["usuarioSenha"];

        $data=[
            "nome" => $nome,
            "sobrenome" => $sobrenome,
            "email" => $emai,
            "telefone" => $telefone,
            "senha" => $senha,

        ];

        enviarUsuario(json_encode($data));
    }

    if(isset($_POST['btnEnviarCategoria'])){

        $nome = $_POST["categoriaNome"];

        $data=[
            "nome" => $nome,
        ];

        enviarCategoria(json_encode($data));
    }

    if(isset($_POST['btnEnviarProduto'])){

        $name = $_POST["produtoNome"];
        $descricao = $_POST["produtoDescricao"];
        $price = $_POST["produtoPreco"];
        $id = $_POST["produtoCategoria"];


        $diretorio = "img/";
        $arquivo = $diretorio . basename($_FILES["imagem"]["name"]);
        $uploadOk =1;
        $extensao = strtolower(pathinfo($arquivo,PATHINFO_EXTENSION));

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
          } else {
            if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $arquivo)) {
              header("location: cadastroProdutos.php");
            } else {
                include_once 'header.php';
              echo "Sorry, there was an error uploading your file.";
              include_once 'footer.php';
            }
        }

        $imgUrl = $arquivo;

        $data=[
            "produto" => array(
            "name" => $name,
            "descricao" => $descricao,
            "price" => $price,
            "imgUrl" => $imgUrl,
            "categorias" => array(
                    array(
                        "id" => $id,
                        "nome" => "string"
                    )
                )
            ),
            "categoria" => $id,
        ];
        enviarProduto(json_encode($data));
    }

    if(isset($_POST['btnEditarCategoria'])){
        //echo "if";
        $id = $_POST['categoriaId'];
        $nome = $_POST["categoriaNome"];

        $data=[
            "id" => $id,
            "nome" => $nome,
        ];

        editarCategoria(json_encode($data));
    }

    if(isset($_POST['btnExcluirCategoria'])){
        
        $id = $_POST['categoriaId'];
        $data=[
            "id" => $id,
        ];

        excluirCategoria(json_encode($data));
    }

    if(isset($_POST['btnEditarUsuario'])){
        
        $id = $_POST['usuarioId'];
        $nome = $_POST["usuarioNome"];
        $sobrenome = $_POST["usuarioSobrenome"];
        $emai = $_POST["usuarioEmail"];
        $telefone = $_POST["usuarioTelefone"];
        $senha = $_POST["usuarioSenha"];

        $data=[
            "id" => $id,
            "nome" => $nome,
            "sobrenome" => $sobrenome,
            "email" => $emai,
            "telefone" => $telefone,
            "senha" => $senha,

        ];

        editarUsuario(json_encode($data));
    }

    if(isset($_POST['btnExcluirUsuario'])){
        
        $id = $_POST['usuarioId'];
        $data=[
            "id" => $id,
        ];

        excluirUsuario(json_encode($data));
    }

    if(isset($_POST['btnEditarProduto'])){
        $id = $_POST['produtoId'];
        $name = $_POST["produtoNome"];
        $descricao = $_POST["produtoDescricao"];
        $price = $_POST["produtoPreco"];
        $idCategoria = $_POST["produtoCategoria"];
        $imgUrl = $_POST['produtoImagem'];

        $data=[
            "id" => $id,
            "name" => $name,
            "descricao" => $descricao,
            "price" => $price,
            "imgUrl" => $imgUrl,
            "categorias" => array(
                    array(
                        "id" => $idCategoria,
                        "nome" => "string"
                    )
                    ),
            "categoria" => $idCategoria,
        ];
        editarProduto(json_encode($data));
    }

    if(isset($_POST['btnExcluirProduto'])){
        $id = $_POST['produtoId'];
        $data=[
            "id" => $id,
        ];

        excluirProduto(json_encode($data));
    }

    if(isset($_POST['btnGerarRelatorio'])){
        $email = $_SESSION['email'];

        $data = [
            "email" => $email,
        ];
        gerarRelatorio(json_encode($data));
    }

    if(isset($_POST['btnFazerPedido'])){
        if(session_status() != PHP_SESSION_ACTIVE){
            session_start();
        }

        $idProd = $_POST['produtoId'];
        $qtd = $_POST['produtoQuantidade'];
        $idUsr = $_SESSION['idUser'];
        $sts = 1;
        $data=[
            "pedido" => $sts,
            "usuario" => $idUsr,
            "produto" => $idProd,
            "quantidade" => $qtd,
        ];
        fazerPedido(json_encode($data));
    }

}

function fazerPedido($jsondata){
    $url = "http://localhost/pedidos";
    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_POSTFIELDS,$jsondata);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'accept: */*'
    ));

    curl_exec($ch);
    // Verificando erros
    if (curl_errno($ch)) {
        echo 'Erro ao enviar a requisição cURL: ' . curl_error($ch);
    }

    curl_close($ch);
    echo"<script>window.location.href= 'index.php';</script>";

}

function gerarRelatorio($jsondata){
    $url = "http://localhost/relatorios";
    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_POSTFIELDS,$jsondata);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'accept: */*'
    ));

    curl_exec($ch);
    // Verificando erros
    if (curl_errno($ch)) {
        echo 'Erro ao enviar a requisição cURL: ' . curl_error($ch);
    }

    curl_close($ch);
}

function excluirProduto($jsondata){
    $data = json_decode($jsondata,true);
    $id = $data['id'];
    $url = "http://localhost/produtos/$id";
    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'accept: */*'
    ));

    curl_exec($ch);
    // Verificando erros
    if (curl_errno($ch)) {
        echo 'Erro ao enviar a requisição cURL: ' . curl_error($ch);
    }

    curl_close($ch);
    echo"<script>window.location.href= 'listarProduto.php';</script>";
}

function editarProduto($jsondata){
    $data = json_decode($jsondata,true);
    $id = $data['id'];
    $url = "http://localhost/produtos/$id";
    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
    curl_setopt($ch, CURLOPT_POSTFIELDS,$jsondata);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'accept: */*'
    ));

    curl_exec($ch);
    // Verificando erros
    if (curl_errno($ch)) {
        echo 'Erro ao enviar a requisição cURL: ' . curl_error($ch);
    }

    curl_close($ch);
    echo"<script>window.location.href= 'listarProduto.php';</script>";
}

function excluirUsuario($jsondata){
    $data = json_decode($jsondata,true);
    $id = $data['id'];
    $url = "http://localhost/usuarios/$id";
    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'accept: */*'
    ));

    curl_exec($ch);
    // Verificando erros
    if (curl_errno($ch)) {
        echo 'Erro ao enviar a requisição cURL: ' . curl_error($ch);
    }

    curl_close($ch);
    echo"<script>window.location.href= 'login.php?out=0';</script>";
}

function editarUsuario($jsondata){
    $data = json_decode($jsondata,true);
    $id = $data['id'];
    $url = "http://localhost/usuarios/$id";
    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
    curl_setopt($ch, CURLOPT_POSTFIELDS,$jsondata);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'accept: */*'
    ));

    curl_exec($ch);
    // Verificando erros
    if (curl_errno($ch)) {
        echo 'Erro ao enviar a requisição cURL: ' . curl_error($ch);
    }

    curl_close($ch);
    //echo"<script>window.location.href= 'listarCategoria.php';</script>";
}


function excluirCategoria($jsondata){
    $data = json_decode($jsondata,true);
    $id = $data['id'];
    $url = "http://localhost/categorias/$id";
    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
    curl_setopt($ch, CURLOPT_POSTFIELDS,$jsondata);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'accept: */*'
    ));

    curl_exec($ch);
    // Verificando erros
    if (curl_errno($ch)) {
        echo 'Erro ao enviar a requisição cURL: ' . curl_error($ch);
    }

    curl_close($ch);
    echo"<script>window.location.href= 'listarCategoria.php';</script>";
}

function editarCategoria($jsondata){

    $data = json_decode($jsondata,true);
    $id = $data['id'];
    $url = "http://localhost/categorias/$id";
    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
    curl_setopt($ch, CURLOPT_POSTFIELDS,$jsondata);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'accept: */*'
    ));

    curl_exec($ch);
    // Verificando erros
    if (curl_errno($ch)) {
        echo 'Erro ao enviar a requisição cURL: ' . curl_error($ch);
    }

    curl_close($ch);
    echo"<script>window.location.href= 'listarCategoria.php';</script>";
}

function enviarProduto($jsondata){
    $url = "http://localhost/produtos";
    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_POSTFIELDS,$jsondata);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'accept: */*'
    ));

    curl_exec($ch);
    // Verificando erros
    if (curl_errno($ch)) {
        echo 'Erro ao enviar a requisição cURL: ' . curl_error($ch);
    }

    curl_close($ch);
    header("location: cadastroProdutos.php");
}


function enviarUsuario($jsondata){
    $url = "http://localhost/usuarios";
    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_POSTFIELDS,$jsondata);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'accept: */*'
    ));

    curl_exec($ch);
    // Verificando erros
    if (curl_errno($ch)) {
        echo 'Erro ao enviar a requisição cURL: ' . curl_error($ch);
    }

    curl_close($ch);
}


function enviarCategoria($jsondata){
    $url = "http://localhost/categorias";
    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_POSTFIELDS,$jsondata);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'accept: */*'
    ));

    curl_exec($ch);
    // Verificando erros
    if (curl_errno($ch)) {
        echo 'Erro ao enviar a requisição cURL: ' . curl_error($ch);
    }

    curl_close($ch);
}



?>