<?php
include_once'header.php';
?>
<div class="container">
    <form class="central" method="POST">
        <h1 class="h3 mb-3 fw-normal">Edição de Categoria</h1>
        <?php 
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $nome = $_GET['nome'];

        }
        
        ?>
        <div class="row">
        <div class="col-md-1">
                <div class="form-floating ">
                <input type="textbox" class="form-control" id="categoriaId" name="categoriaId" readonly <?php echo"value='$id'"; ?>>
                <label for="categoriaNome">Id:</label>
                </div>
            </div>
            <div class="col-md-11">
                <div class="form-floating ">
                <input type="textbox" class="form-control" id="categoriaNome" name="categoriaNome" placeholder="nome" <?php echo"value='$nome'"; ?>>
                <label for="categoriaNome">Nome:</label>
                </div>
            </div>
        </div>

        
        
        <div class="Container central formSpacing">
        <button class="btn btn-primary py-2" type="submit" id="btnEditarCategoria" name="btnEditarCategoria">Enviar</button>
        <button class="btn btn-primary py-2" type="submit" id="btnExcluirCategoria" name="btnExcluirCategoria">Excluir</button>
        <button class="btn btn-primary py-2" type="reset">Limpar</button>
        </div>
        
        <p class="mt-5 mb-3 text-body-secondary">© 2023–2023</p>

    </form>
</div>

<?php
include_once'footer.php';
?>