<div class="box-content">
    <h2><i class="bi bi-pencil-fill"></i> Editar Usuário</h2>
    <form method="post" enctype="multipart/form-data"> 
        <?php
            if(isset($_POST['acao'])){
                //Enviei o formulário! Vamos executar a ação.
                $nome = $_POST['nome'];
                $password = $_POST['password'];
                $imagem = $_FILES['imagem'];
                $imagem_atual = $_POST['imagem_atual'];
                $cargo = $_SESSION['cargo'];
                $usuario = new Usuario();
                if($imagem['name'] != ''){
                    //Existe o upload de uma nova imagem temos que tratar...
                    if(Painel::imagemValida($imagem)){
                        Painel::deleteFile($imagem_atual);
                        $imagem = Painel::uploadFile($imagem);
                        if($usuario->atualizarUsuario($password,$nome,$cargo,$imagem)){
                            $_SESSION['img'] = $imagem;
                            $_SESSION['password'] = $password;
                            $_SESSION['cargo'] = $cargo;
                            $_SESSION['nome'] = $nome;
                            Painel::alert('sucesso','Informações + imagem atualizados com sucesso!');
                        }else{
                            Painel::alert('erro','Ocorreu um erro ao tentar atualizar as informações + imagem');
                        }
                    }else{
                        Painel::alert('erro','O formato da Imagem não é valido!');
                    }
                }else{
                    $imagem = $imagem_atual;
                    if($usuario->atualizarUsuario($password,$nome,$cargo,$imagem)){
                        $_SESSION['img'] = $imagem;
                        $_SESSION['password'] = $password;
                        $_SESSION['cargo'] = $cargo;
                        $_SESSION['nome'] = $nome;
                        Painel::alert('sucesso','Alteração feita com sucesso!');
                    }else{
                        Painel::alert('erro','Ocorreu um erro ao tentar efetuar a alteração!');
                    }
                }
            }
        ?>
        <div class="form-group">
            <label>Usuário:</label>
            <input type="text" name="user" disabled value="<?php echo $_SESSION['user'];?>">
        </div><!--form-group-->
        <div class="form-group">
            <label>Senha:</label>
            <input type="password" name="password" required value="<?php echo $_SESSION['password'];?>">
        </div><!--form-group-->
        <div class="form-group">
            <label>Nome:</label>
            <input type="text" name="nome" required value="<?php echo $_SESSION['nome'];?>">
        </div><!--form-group-->
        <div class="form-group" <?php verificarPermissaoEditarCargo(2); ?>>
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