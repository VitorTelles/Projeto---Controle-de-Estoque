<?php 

    class Usuario{

        public function atualizarUsuario($password,$nome,$cargo,$img){
            $sql = MySql::conectar()->prepare("UPDATE `tb_usuarios` SET password = ?, nome = ?, cargo = ?, img = ? WHERE user = ?");
            if($sql->execute(array($password,$nome,$cargo,$img,$_SESSION['user']))){
                return true;
            }else{
                return false;
            }
        }
        public static function usuarioExiste($user){
            $sql = MySql::conectar()->prepare("SELECT `id` FROM `tb_usuarios` where user = ?");
            $sql->execute(array($user));
            if($sql->rowCount() == 1){
                return true;
            }else{
                return false;
            }
        } 
        public static function cadastrarUsuario($user,$password,$cargo,$nome,$imagem){
            $sql = MySql::conectar()->prepare("INSERT INTO `tb_usuarios` VALUES (null,?,?,?,?,?)");
            $sql->execute(array($user,$password,$cargo,$nome,$imagem));
        }
    }

?>