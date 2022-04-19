<?php
    sleep(2);
    session_start();
	date_default_timezone_set('America/Sao_Paulo');
	$autoload = function($class){
		if($class == 'Email'){
			require_once('classes/phpmailer/PHPMailerAutoload.php');
		}
		include('../classes/'.$class.'.php');
	};

    spl_autoload_register($autoload);
	

define('INCLUDE_PATH','http://localhost/Controle%20de%20Estoque/Projeto---Controle-de-Estoque/');
define('BASE_DIR',__DIR__);
//Conectar com Banco de Dados
define('HOST','localhost');
define('USER','root');
define('PASSWORD','');
define('DATABASE','controle_estoque');
$data['sucesso'] = true;
$data['erros'] = "";
if(Painel::logado() == false){
    die("Você não está logado!");
}
/*Nosso código começa aqui!*/ 
    $name = $_POST['nome'];
    $email = $_POST['email'];
    $tipo = $_POST['tipo_cliente'];
    $cpf = '';
    $cnpj = '';
    if($tipo == 'fisico'){
        $cpf = $_POST['cpf'];
    }else if($tipo == 'juridico'){
        $cnpj = $_POST['cnpj'];
    }
    if(isset($_FILES['imagem'])){
        $imagem = $_FILES['imagem'];
    }else{
        $data['sucesso'] = false;
        $data['erros'] = "Imagem inválida/vaiza";
    }

    die(json_encode($data));
?>