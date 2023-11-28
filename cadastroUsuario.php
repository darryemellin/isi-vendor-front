<?php
include_once'header.php';
?>
<div class="container">
    <form class="central" method="POST">
        <h1 class="h3 mb-3 fw-normal">Cadastro de usuário</h1>

        <div class="row">
            <div class="col-md-6">
                <div class="form-floating formSpacing">
                <input type="text" class="form-control" id="usuarioNome" name="usuarioNome" placeholder="nome">
                <label for="usuarioNome">Nome:</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating formSpacing">
                <input type="text" class="form-control" id="usuarioSobrenome" name="usuarioSobrenome" placeholder="sobrenome">
                <label for="usuarioSobrenome">Sobrenome:</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-floating formSpacing">
                <input type="email" class="form-control" id="usuarioEmail" name="usuarioEmail" placeholder="identificacao@email">
                <label for="usuarioEmail">Email:</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating formSpacing">
                <input type="tel" class="form-control" id="usuarioTelefone" name="usuarioTelefone" placeholder="(00)00000-0000">
                <label for="usuarioTelefone">Telefone:</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="form-floating formSpacing">
                    <input type="password" class="form-control" id="usuarioSenha" name="usuarioSenha" placeholder="Senha">
                    <label for="usuarioSenha1">Senha:</label>
                </div>
            </div>
        </div>
        
        <div class="Container central formSpacing">
        <button class="btn btn-primary py-2" type="submit" name="btnCadastroUsuario" id="btnCadastroUsuario">Enviar</button>
        <button class="btn btn-primary py-2" type="reset">Limpar</button>
        </div>
        
        <p class="mt-5 mb-3 text-body-secondary">© 2023–2023</p>

    </form>
</div>

<?php
include_once'footer.php';
?>