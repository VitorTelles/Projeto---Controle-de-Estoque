<div class="box-content">
    <h2><i class="bi bi-pencil-fill"></i> Editar Usuário</h2>
    <form method="post" enctype="multipart/form-data"> 
        <?php
            if(isset($_POST['acao'])){
                //Enviei o formulário! Vamos executar a ação.
                Painel::alert('sucesso','Alteração feita com sucesso!');
            }
        ?>
        <div class="form-group">
            <label>Nome:</label>
            <input type="text" name="nome" required value="<?php echo $_SESSION['nome'];?>">
        </div><!--form-group-->
        <div class="form-group">
            <label>Senha:</label>
            <input type="password" name="senha" required value="<?php echo $_SESSION['password'];?>">
        </div><!--form-group-->
        <div class="form-group">
            <label>Cargo:</label>
            <input type="text" name="cargo" required value="<?php echo $_SESSION['cargo'];?>">
        </div><!--form-group-->
        <div class="form-group">
            <label>Imagem:</label>
            <input type="file" name="imagem">
            <input type="hidden" name="imagem_atual" value="<?php echo $_SESSION['img']?>">
        </div><!--form-group-->
        <div class="form-group">
            <input type="submit" name="acao" value="Atualizar!">
        </div><!--form-group-->
    </form>
</div><!--box-content-->