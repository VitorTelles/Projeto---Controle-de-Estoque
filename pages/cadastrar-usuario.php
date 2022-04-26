<?php 
    verificaPermissaoPagina(2);
    
?>

<div class="box-content">
    <h2><i class="bi bi-person-plus-fill"></i> Adicionar novo usuário</h2>
    <form method="post" enctype="multipart/form-data"> 
        <?php
            if(isset($_POST['acao'])){
                $user = $_POST['user'];
                $nome = $_POST['nome'];
                $password = $_POST['password'];
                $imagem = $_FILES['imagem'];
                $cargo = $_POST['cargo'];

                if($user == ''){
                    Painel::alert('erro','O usuário está vazio!');
                }else if($nome == ''){
                    Painel::alert('erro','Nome está vazio!');
                }else if($password == ''){
                    Painel::alert('erro','Você precisa escolher uma senha!');
                }else if($cargo == '' ){
                    Painel::alert('erro','Selecione um cargo!');
                }else if($imagem['name'] == ''){
                    Painel::alert('erro','Você precisa selecionar uma imagem!');
                }else if(Painel::ImagemValida($imagem) == false){
                    Painel::alert('erro','O formato da Imagem é inválido!');
                }else if(Usuario::usuarioExiste($user)){
                    Painel::alert('erro','Esse usuário já existe, por favor tente novamente com outro UserName!');
                } 
                else{
                    //Vamos cadastrar no BD
                    $usuario = new Usuario();
                    $imagem = Painel::uploadFile($imagem);
                    $usuario -> cadastrarUsuario($user,$password,$cargo,$nome,$imagem);
                    Painel::alert('sucesso','O Cadastro do usuário '.$user.' foi efetuado com sucesso!');
                }
            }
        ?>
        <div class="form-group">
            <label>Usuário:</label>
            <input type="text" name="user">
        </div><!--form-group-->
        <div class="form-group">
            <label>Senha:</label>
            <input type="password" name="password">
        </div><!--form-group-->
        <div class="form-group">
            <label>Nome:</label>
            <input type="text" name="nome">
        </div><!--form-group-->
        <div class="form-group">
            <label>Cargo:</label>
            <select name="cargo">
                <?php foreach(Painel::$cargos as $key => $value){
                    echo '<option value="'.$key.'">'.$value.'</option>';
                }
                ?>
            </select>
        </div><!--form-group-->
        <div class="form-group">
            <label>Imagem:</label>
            <input type="file" name="imagem">
        </div><!--form-group-->
        <div class="form-group">
            <input type="submit" name="acao" value="Cadastrar!">
        </div><!--form-group-->
    </form>
</div><!--box-content-->