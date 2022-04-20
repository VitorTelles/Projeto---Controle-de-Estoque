<?php 
    verificaPermissaoPagina(2); 
?>

<div class="box-content">
    <h2><i class="bi bi-person-plus-fill"></i> Cadastrar Clientes</h2>
    <form class="ajax" enctype="multipart/form-data" action="<?php INCLUDE_PATH?>ajax/forms.php" method="post"> 
 
        <div class="form-group">
            <label>Nome:</label>
            <input type="text" name="nome">
        </div><!--form-group-->
        <div class="form-group">
            <label>Email:</label>
            <input type="text" name="email">
        </div><!--form-group-->
        <div class="form-group">
            <label>Tipo:</label>
            <select name="tipo_cliente">
               <option value="fisico">Físico</option>
               <option value="juridico">Jurídico</option>
            </select>
        </div><!--form-group-->

        <div ref="cpf" class="form-group">
            <label>CPF</label>
            <input type="text" name="cpf">
        </div><!--form-group-->

        <div ref="cnpj" class="form-group" style="display:none;">
            <label>CNPJ</label>
            <input type="text" name="cnpj">
        </div><!--form-group-->

        <div class="form-group">
            <label>Imagem:</label>
            <input type="file" name="imagem">
        </div><!--form-group-->

        <div class="form-group">
            <input type="hidden" name="tipo_acao" value="cadastrar_cliente">
        </div><!--gorm-group-->

        <div class="form-group">
            <input type="submit" name="acao" value="Cadastrar!">
        </div><!--form-group-->
    </form>
</div><!--box-content-->
