<?php
include_once'header.php';
?>
<div class="container">
    <form class="central" action="controler.php" method="POST" enctype="multipart/form-data">
        <h1 class="h3 mb-3 fw-normal">Cadastro de Produto</h1>

        <div class="row">
            <div class="col-md-6">
                <div class="form-floating formSpacing">
                <input type="textbox" class="form-control" id="produtoNome" name="produtoNome" placeholder="nome">
                <label for="produtoNome">Nome:</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating formSpacing">
                <input type="number" class="form-control" id="produtoPreco" name="produtoPreco" placeholder="Preço">
                <label for="produtoPreco">Preço:</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-floating formSpacing">
                    <textarea rows="5" cols="20" class="form-control" style="height:fit-content" id="produtoDescricao"  name="produtoDescricao" placeholder="Descrição"></textarea>
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
                    echo"  <option value='0'>Nenhum</option>";
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
        <label for="imagem">Imagem do produto:</label>
            <div class="form-floating">
                
                <input type="file" name="imagem" id="imagem">
           

        </div>
        
        <div class="Container-fluid formSpacing">
        <button class="btn btn-primary py-2" type="submit" id="btnEnviarProduto" name="btnEnviarProduto">Enviar</button>
        <button class="btn btn-primary py-2" type="reset">Limpar</button>
        </div>
        
        <p class="mt-5 mb-3 text-body-secondary">© 2023–2023</p>

    </form>
</div>

<?php
include_once'footer.php';
?>