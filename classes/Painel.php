<?php 

    class Painel{
        
        Public static function logado(){
            return isset($_SESSION['login']) ? true : false;
        }
     
        public static function logout(){
            session_destroy();
            header('Location: '.INCLUDE_PATH);
        }
        
        public static function redirect($url){
			echo '<script>location.href="'.$url.'"</script>';
			die();
		}
    }

?>