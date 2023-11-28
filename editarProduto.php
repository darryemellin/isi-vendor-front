<?php
include_once'header.php';

if(isset($_GET['id'])){
    $idE = $_GET['id'];
    $url = "http://localhost/produtos/id/$idE";
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
    $id = $data['id'];
    $name = $data['name'];
    $desc = $data['descricao'];
    $price = $data['price'];
    $imgUrl = $data['imgUrl'];
    $idCategoria = $data['categorias'][0]['id'];
    $nomeCategoria = $data['categorias'][0]['nome'];
}
else{

}

?>
<div class="container">
    <form class="central" action="controler.php" method="POST" enctype="multipart/form-data">
        <h1 class="h3 mb-3 fw-normal">Edição de Produto</h1>
        <input type="textbox" class="form-control" id="produtoId" name="produtoId" readonly style="display:none" <?php echo"value='$id' "; ?>>

        <div class="row">
            <div class="col-md-6">
                <div class="form-floating formSpacing">
                <input type="textbox" class="form-control" id="produtoNome" name="produtoNome" placeholder="nome" <?php echo"value='$name' "; ?>>
                <label for="produtoId">Nome:</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating formSpacing">
                <input type="number" class="form-control" id="produtoPreco" name="produtoPreco" placeholder="Preço" <?php echo"value='$price' "; ?>>
                <label for="produtoPreco">Preço:</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-floating formSpacing">
                    <textarea rows="5" cols="20" class="form-control" style="height:fit-content" id="produtoDescricao"  name="produtoDescricao" placeholder="Descrição" ><?php echo"$desc "; ?></textarea>
                    <label for="produtoDescricao">Descrição:</label>
                </div>
            </div>
    
            <div class="col-md-6">
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
                    echo'        <div class="form-floating formSpacing">';
                    echo'        <select class="form-control" id="produtoCategoria" name="produtoCategoria" placeholder="Categoria">';
                    echo"  <option value='$idCategoria'>$nomeCategoria</option>";
                    foreach($data as $item){
                        $id = $item['id'];
                        $nome = $item['nome'];
                        echo"  <option value='$id'>$nome</option>";
                    }
                    
                    echo'            </select>';
                    echo'           <label for="produtoCategoria">Categoria:</label>';
                    echo'        </div>';

                ?>
                
            </div>
        </div>
        <div class="row">
        <label >Imagem do produto:</label>
        <center>
            <img src="<?php echo $imgUrl; ?>" alt="Imagem"  style="width:175px;height:175px;" class="formSpacing">
        </center>
        <input type="textbox" class="form-control" id="produtoImagem" name="produtoImagem" readonly style="display:none" <?php echo"value='$imgUrl' "; ?>>
        
        <div class="Container-fluid formSpacing">
        <button class="btn btn-primary py-2" type="submit" id="btnEditarProduto" name="btnEditarProduto">Editar</button>
        <button class="btn btn-primary py-2" type="submit" id="btnExcluirProduto" name="btnExcluirProduto">Excluir</button>
        <button class="btn btn-primary py-2" type="reset">Limpar</button>
        </div>
        
        <p class="mt-5 mb-3 text-body-secondary">© 2023–2023</p>

    </form>
</div>

<?php
include_once'footer.php';
?>