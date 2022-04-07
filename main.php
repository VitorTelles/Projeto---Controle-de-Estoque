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
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,300" rel="stylesheet" type="text/css">
    <title>Controle de Estoque</title>
    </head>
    <!-- MENU DE OPÇÕES-->
    <body>
        <div class="menu">
            <div class="menu-wraper">
                <div class="box-usuario">
                    <?php 
                        if($_SESSION['img'] == ''){
                    ?>
                        <div class="avatar-usuario">
                            <i class="fa fa-user"></i>
                        </div><!--avatar-usuario-->
                    <?php }else{ ?>
                        <div class="imagem-usuario">
                            <img src="<?php echo INCLUDE_PATH?>?imagens/<?php echo $_SESSION['img'];?>"/>
                        </div><!--avatar-usuario-->
                    <?php } ?>
                    <div class="nome-usuario">
                        <p><?php echo $_SESSION['nome']?></p>
                        <p><?php echo pegaCargo($_SESSION['cargo']); ?></p>
                    </div>
                </div><!--box-usuario-->
            </div><!--menu-wraper-->
        </div><!--MENU LATERAL-->
            
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

        <!--INICIO DO CONTEUDO DO PAINEL-->

        <div class="content">
             
             <div class="clear"></div>
        </div><!--content-->

        <script src="<?php echo INCLUDE_PATH?>scripts/jquery.js"></script>
        <script src="<?php echo INCLUDE_PATH?>scripts/main.js"></script>
    </body>
</html>