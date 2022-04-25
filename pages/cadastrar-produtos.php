<div class="box-content">
    <h2><i class="bi bi-cart-plus-fill"></i> Cadastrar Produtos</h2>
    <form method="post" enctype="multipart/form-data">

        <div class="form-group">
                <label>Nome do Produto:</label>
                <input type="text" name="nome">
        </div><!--form-group-->

        <div class="form-group">
                <label>Descrição do Produto:</label>
                <textarea name="descricao"></textarea>
        </div><!--form-group-->

        <div class="form-group">
                <label>Largura:</label>
                <input type="number" name="largura" min="0" max="900" step="5" value="0">
        </div><!--form-group-->

        <div class="form-group">
                <label>Altura:</label>
                <input type="number" name="altura" min="0" max="900" step="5" value="0">
        </div><!--form-group-->

        <div class="form-group">
                <label>Comprimento:</label>
                <input type="number" name="comprimento" min="0" max="900" step="5" value="0">
        </div><!--form-group-->

        <div class="form-group">
                <label>Peso:</label>
                <input type="number" name="peso" min="0" max="900" step="5" value="0">
        </div><!--form-group-->

        <div class="form-group">
                <label>Preço:</label>
                <input type="text" name="preco" >
        </div><!--form-group-->

        <div class="form-group">
                <label>Quantidade:</label>
                <input type="text" name="quantidade">
        </div><!--form-group-->

        <div class="form-group">
                <label>Selecione as imagens:</label>
                <input type="file" name="imagem">
        </div><!--form-group-->
        <input type="submit" name="acao" value="Cadastrar Produto!">
    </form>
</div>