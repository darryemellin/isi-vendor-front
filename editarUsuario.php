<?php
include_once'header.php';

$id = $_SESSION['idUser'];
$url = "http://localhost/usuarios/$id";
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

$idN = $data['id'];
$nome = $data['nome'];
$sobrenome = $data['sobrenome'];
$email = $data['email'];
$tel = $data['telefone'];
$sen = $data['senha'];
?>
<div class="container">
    <form class="central" method="POST">
        <h1 class="h3 mb-3 fw-normal">Editar usuário</h1>

        <div class="row">
            <div class="col-md-1 formSpacing">
                <div class="form-floating">
                <input type="text" class="form-control" id="usuarioId" name="usuarioId" readonly <?php echo"value='$idN'"; ?> style='display:none'>
                <label for="usuarioNome" style='display:none'>Id:</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-floating formSpacing">
                <input type="text" class="form-control" id="usuarioNome" name="usuarioNome" placeholder="nome" <?php echo"value='$nome'"; ?>>
                <label for="usuarioNome">Nome:</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating formSpacing">
                <input type="text" class="form-control" id="usuarioSobrenome" name="usuarioSobrenome" placeholder="sobrenome" <?php echo"value='$sobrenome'"; ?>>
                <label for="usuarioSobrenome">Sobrenome:</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-floating formSpacing">
                <input type="email" class="form-control" id="usuarioEmail" name="usuarioEmail" placeholder="identificacao@email" <?php echo"value='$email'"; ?>>
                <label for="usuarioEmail">Email:</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating formSpacing">
                <input type="tel" class="form-control" id="usuarioTelefone" name="usuarioTelefone" placeholder="(00)00000-0000" <?php echo"value='$tel'"; ?>>
                <label for="usuarioTelefone">Telefone:</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="form-floating formSpacing">
                    <input type="password" class="form-control" id="usuarioSenha" name="usuarioSenha" placeholder="Senha" <?php echo"value='$sen'"; ?>>
                    <label for="usuarioSenha">Senha:</label>
                </div>
            </div>
        </div>
        
        <div class="Container central formSpacing">
        <button class="btn btn-primary py-2" type="submit" name="btnEditarUsuario" id="btnEditarUsuario">Editar</button>
        <button class="btn btn-primary py-2" type="submit" name="btnExcluirUsuario" id="btnExcluirUsuario">Excluir</button>
        <button class="btn btn-primary py-2" type="reset">Limpar</button>
        </div>
        
        <p class="mt-5 mb-3 text-body-secondary">© 2023–2023</p>

    </form>
</div>

<?php
include_once'footer.php';
?>