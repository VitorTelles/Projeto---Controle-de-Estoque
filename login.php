<?php
	if(isset($_COOKIE['lembrar'])){
		$user = $_COOKIE['user'];
		$password = $_COOKIE['password'];
		$sql = MySql::conectar()->prepare("SELECT * FROM `tb_usuarios` WHERE user = ? AND password = ?");
		$sql->execute(array($user,$password));
		if($sql->rowCount() == 1){
				$info = $sql->fetch();
				$_SESSION['login'] = true;
				$_SESSION['user'] = $user;
				$_SESSION['password'] = $password;
				$_SESSION['cargo'] = $info['cargo'];
				$_SESSION['nome'] = $info['nome']; 
				$_SESSION['img'] = $info['img'];
				Painel::redirect(INCLUDE_PATH);
		}
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" type="text/css" href="./styles/login.css">
    <link rel="stylesheet" href="./mediascreen/screen.css">
    <title>Controle de Estoque</title>
</head>
<body>
    <?php 
    
        if(isset($_POST['acao'])){
            $user = $_POST['user'];
            $password = $_POST['password'];
            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_usuarios` WHERE user = ? AND password = ?");
            $sql->execute(array($user,$password));
            if($sql->rowCount() == 1){
                $info = $sql->fetch();
                //login é verdadeiro. Vamos logar...
                $_SESSION['login'] = true;
                $_SESSION['user'] = $user;
                $_SESSION['password'] = $password;
                $_SESSION['nome'] = $info['nome'];
                $_SESSION['img'] = $info['img'];
                $_SESSION['cargo'] = $info['cargo'];
                if(isset($_POST['lembrar'])){
                    setcookie('lembrar',true,time()+(60*60*24),'/');
                    setcookie('user',$user,time()+(60*60*24),'/');
					setcookie('password',$password,time()+(60*60*24),'/');
                }
                Painel::redirect(INCLUDE_PATH);
            }else{
                //Falhou
                echo '<script> alert("Usuário e senha incorretos!"); </script>';
            }
        }
    ?>
        <!--  Formulário de login -->
        <section class="container">
        <aside class="form-login">
            <span class="title user-no-selection">Sheriff Commerce</span>
            <span class="subtitle user-no-selection"><p>Faça seu login:</p></span>

            <form  method="post" action="#">
                <div class="input-field">
                    <input type="text" name="user" placeholder="Usuário" required>
                    <i class="uil uil-user"></i>
                </div>
                <div class="input-field">
                    <input type="password" name="password" class="password" placeholder="Senha" required>
                    <i class="uil uil-lock icon"></i>
                    <i class="uil uil-eye-slash showHidePw"></i>
                </div>

                <div class="checkbox-text">
                    <div class="checkbox-content">
                        <input type="checkbox" id="logCheck">
                        <label for="logCheck" class="text user-no-selection" name="lembrar">Lembre-se de mim</label>
                    </div>

                </div>

                <div class="input-field button">
                    <input type="submit" name="acao" value="Login">
                </div>
            </form>
        </aside>
    <script src="scripts/login.js"></script>

</body>
</html>