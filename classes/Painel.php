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
        public static function imagemValida($imagem){
            if($imagem['type'] == 'image/jpeg' || $imagem['type'] == 'image/jpg' || $imagem['type'] == 'image/png'){
                $tamanho = intVal($imagem['size'] / 1024);
                if($tamanho < 300){
                    return true;
                }else{
                    return false;
                }
                return true;
            }else{
                return false;
            }
        }
        public static function uploadFile($file){
            $formatoArquivo = explode('.',$file['name']);
            $imagemNome = uniqid().'.'.$formatoArquivo[count($formatoArquivo) - 1];
            if(move_uploaded_file($file['tmp_name'],BASE_DIR.'/imagens/'.$imagemNome)){
                return $imagemNome;
            }else{
                return false;
            }
               
        }
        public static function deleteFile($file){
            @unlink(BASE_DIR.'/imagens/'.$file);
        }
        
        public static $cargos = [
            '0' => 'Normal',
            '1' => 'Sub Administrador',
            '2' => 'Administrador'];
        
    }

?>