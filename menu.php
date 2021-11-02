<?php 
    if(isset($_GET['logout'])){
        Painel::logout();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/f3997679a4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./styles/menu.css">
    <title>Controle de Estoque</title>
    </head>
    <!-- Opções do Menu-->
    <body>
        <nav>
            <div class="logo">
                <img src="./imagens/xerife_icon.png">
            </div>
            <label><i class="far fa-user"></i> <?php  echo $_SESSION['nome']; ?></label>
            <button>&#9776;</button>
            
            <ul>
                <li>
                    <p>Cadastro de Produtos</p>
                </li>
                <li>
                    <p>Entrada de Produtos</p>
                </li>
                <li>
                    <p>Saída de Produtos</p>
                </li>
            </ul>
            <div class="but_sair">
            <a href="<?php echo INCLUDE_PATH ?>?logout"><i class="fas fa-sign-out-alt"></i> Sair</a>
            </div>
        </nav>
    </body>
</html>