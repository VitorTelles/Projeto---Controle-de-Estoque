<?php include('config.php');?>
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
            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_usuários` WHERE user = ? AND password = ?");
            $sql->execute(array($user, $password));
            if($sql->rowCount() == 1){
                //login é verdadeiro. Vamos logar...
                $_SESSION['login'] = true;
                $_SESSION['user'] = $user;
                $_SESSION['password'] = $password;
                header('Location: '.INCLUDE_PATH); 
            }else{
                //Falhou
                echo 'Usuário e senha incorretos';
            }
        }
    ?>
        <!--  Formulário de login -->
    <form class="form" action="#" method="post">
        <div class="card">
            <div class="card-top">
                <img id="icon" src="./imagens/xerife_icon.png" alt="">
                <h2 class="title"> Painel de Controle</h2>
                <p>Faça seu login</p>
            </div>
            <div class="card-group">
                <label>Email:</label>
                <input type="text" name="email" placeholder="Digite seu email" required>
            </div>
            <div class="card-group">
                <label>Senha:</label>
                <input type="password" name="senha" placeholder="Digite sua senha" required>
            </div>
            <div class="card-group">
                <label> <input type="checkbox"> Lembrar-me</label>
            </div>
            <div class="card-group">
                <button class="btn" type="submit" name="acao" >Entrar</button>
            </div>
        </div>
    </form>
    <script src="./scripts/index.js"></script>

</body>
</html>