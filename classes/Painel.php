<?php 

    class Painel{
        
        Public static function logado(){
            return isset($_SESSION['login']) ? true : false;
        }
        
    }

?>