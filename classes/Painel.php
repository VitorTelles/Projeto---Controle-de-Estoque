<?php 

    class Painel{
        
        Public static function logado(){
            return isset($_SESSION['login']) ? true : false;
        }

        public static function logout(){
            setcookie('lembrar','true',time()-1,'/');
            session_destroy();
            header('Location: '.INCLUDE_PATH);
        }

        public static function redirect($url){
            echo '<script>location.href="'.$url.'"</script>';
            die();
        }
        public static function carregarPagina(){
            if(isset($_GET['url'])){
                $url = explode('/',$_GET['url']);
                if(file_exists('pages/'.$url[0].'.php')){
                    include('pages/'.$url[0].'.php');
                }else{
                    //Quando a página nao existe!
                    header('Location: '.INCLUDE_PATH);
                }
            }else{
                include('pages/home.php');
            }
        }
        public static function alert($tipo,$mensagem){
            if($tipo == 'sucesso'){
                echo '<div class="box-alert sucesso"><i class="bi bi-check2-circle"></i> '.$mensagem.'</div>';
            }else if($tipo == 'erro'){
                echo '<div class="box-alert erro"><i class="bi bi-exclamation-circle"></i> '.$mensagem.'</div>';
            }
        }
    }

?>