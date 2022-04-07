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
    <link rel="stylesheet" href="./styles/main.css">
    <title>Controle de Estoque</title>
    </head>
    <!-- MENU DE OPÇÕES-->
    <body>
        <div class="menu"></div><!--MENU LATERAL-->
            <header>
                 <div class="center">
                     <div class="menu-btn">
                        <i class="fa fa-bars"></i>
                     </div><!--menu-btn-->
                       <div class="logout">
                            <a href="<?php echo INCLUDE_PATH?>?logout"><i class="fa fa-sign-out-alt"></i></a>
                        </div><!--logout-->
                    <div class="clear"></div><!--estou usando flutuação, o que obriga a limpar-->
                </div><!--center-->   
            </header>
    </body>
</html>