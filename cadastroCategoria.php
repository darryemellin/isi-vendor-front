<?php
include_once'header.php';
?>
<div class="container"> 
    <form class="central" method="POST">
        <h1 class="h3 mb-3 fw-normal">Cadastro de Categoria</h1>

        <div class="row">
            <div class="col-md-12">
                <div class="form-floating formSpacing">
                <input type="textbox" class="form-control" id="categoriaNome" name="categoriaNome" placeholder="nome">
                <label for="categoriaNome">Nome:</label>
                </div>
            </div>
        </div>

        
        
        <div class="Container central formSpacing">
        <button class="btn btn-primary py-2" type="submit" id="btnEnviarCategoria" name="btnEnviarCategoria">Enviar</button>
        <button class="btn btn-primary py-2" type="reset">Limpar</button>
        </div>
        
        <p class="mt-5 mb-3 text-body-secondary">© 2023–2023</p>

    </form>
</div>

<?php
include_once'footer.php';
?>