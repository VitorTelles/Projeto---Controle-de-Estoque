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
    <link rel="stylesheet" type="text/css" href="./styles/login.css">
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
    <form class="form" action="#" method="post">
        <div class="card">
            <div class="card-top">
                <img id="icon" src="./imagens/xerife_icon.png" alt="">
                <h2 class="title"> Controle de Estoque</h2>
                <p>Faça seu login</p>
            </div>
            <div class="card-group">
                <label>Usuário:</label>
                <input type="text" name="user" placeholder="Digite seu email" required>
            </div>
            <div class="card-group">
                <label>Senha:</label>
                <input type="password" name="password" placeholder="Digite sua senha" required>
            </div>
            <div class="card-group">
                <label> <input type="checkbox" name="lembrar"> Lembrar-me</label>
            </div>
            <div class="card-group">
                <button class="btn" type="submit" name="acao" >Entrar</button>
            </div>
        </div>
    </form>
    <script src="./scripts/index.js"></script>

</body>
</html>