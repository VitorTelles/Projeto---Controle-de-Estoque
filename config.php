<?php 

session_start();

	date_default_timezone_set('America/Sao_Paulo');
	$autoload = function($class){
		if($class == 'Email'){
			require_once('classes/phpmailer/PHPMailerAutoload.php');
		}
		include('classes/'.$class.'.php');
	};

    spl_autoload_register($autoload);
	

define('INCLUDE_PATH','http://localhost/Controle%20de%20Estoque/Projeto---Controle-de-Estoque/');
define('BASE_DIR',__DIR__);
//Conectar com Banco de Dados
define('HOST','localhost');
define('USER','root');
define('PASSWORD','');
define('DATABASE','controle_estoque');

//Funções úteis do Painel de controle
function pegaCargo($cargo){
	$arr = [
		'0' => 'Normal',
		'1' => 'Sub Administrador',
		'2' => 'Administrador'];
	return $arr[$cargo];
}
function selecionadoMenu($par){
	$url = explode('/',@$_GET['url'])[0];
	if($url == $par){
		echo 'class="menu-active"';
	}
}
function verificaPermissaoMenu($permissao){
	if($_SESSION['cargo'] >= $permissao){
		return;
	}else{
		echo 'style = "display:none;"';
	}
}
function verificaPermissaoPagina($permissao){
	if($_SESSION['cargo'] >= $permissao){
		return;
	}else{
		include('pages/permissao-negada.php');
		die();
	}
}
function verificarPermissaoEditarCargo($permissao){
	if($_SESSION['cargo'] >= $permissao){
		return;
	}else{
		echo 'style = "display:none;"';
	}
}
?>