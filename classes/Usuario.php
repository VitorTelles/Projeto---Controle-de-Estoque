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

    }

?>