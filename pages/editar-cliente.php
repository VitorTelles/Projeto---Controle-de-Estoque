<?php
	if(isset($_GET['id'])){
		$id = (int)$_GET['id'];
		$cliente = Painel::select('tb_clientes','id = ?',array($id));
	}else{
		Painel::alert('erro','Você precisa passar o parametro ID.');
		die();
	}
?>
<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Editar Cliente</h2>

	<form class ="ajax" atualizar method="post" action="<?php INCLUDE_PATH?>ajax/forms.php" enctype="multipart/form-data">

    <div class="form-group">
            <label>Nome:</label>
            <input type="text" name="nome" value="<?php echo $cliente['nome'];?>">
        </div><!--form-group-->
        <div class="form-group">
            <label>Email:</label>
            <input type="text" name="email" value="<?php echo $cliente['email'];?>">
        </div><!--form-group-->
        <div class="form-group">
            <label>Tipo:</label>
            <select name="tipo_cliente">
               <option <?php if ($cliente['tipo'] == 'fisico') echo 'selected'?> value="fisico">Físico</option>
               <option <?php if ($cliente['tipo'] == 'juridico') echo 'selected'?> value="juridico">Jurídico</option>
            </select>
        </div><!--form-group-->

        <?php 
            if($cliente['tipo'] == 'fisico'){
        ?>

        <div ref="cpf" class="form-group">
            <label>CPF:</label>
            <input type="text" name="cpf" value="<?php echo $cliente['cpf_cnpj'];?>">
        </div><!--form-group-->

        <div ref="cnpj" class="form-group" style="display: none;">
            <label>CNPJ:</label>
            <input type="text" name="cnpj">
        </div><!--form-group-->

           <?php }else{ ?>

        <div ref="cpf" class="form-group" style="display: none;">
            <label>CPF:</label>
            <input type="text" name="cpf" >
        </div><!--form-group-->

        <div ref="cnpj" class="form-group">
            <label>CNPJ:</label>
            <input type="text" name="cnpj" value="<?php echo $cliente['cpf_cnpj'];?>">
        </div><!--form-group-->

        <?php } ?>

        <div class="form-group">
            <label>Imagem:</label>
            <input type="file" name="imagem">
        </div><!--form-group-->

        <div class="form-group">
            <input type="hidden" name="imagem_original" value="<?php echo $cliente['imagem'];?>">
        </div><!--gorm-group-->
        <div class="form-group">
            <input type="hidden" name="id_cliente" value="<?php echo $cliente['id'];?>">
        </div><!--gorm-group-->

        <div class="form-group">
            <input type="hidden" name="tipo_acao" value="editar_cliente">
        </div><!--gorm-group-->

        <div class="form-group">
            <input type="submit" name="acao" value="Atualizar!">
        </div><!--form-group-->
	</form>



</div><!--box-content-->