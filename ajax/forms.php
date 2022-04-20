<?php
    sleep(2);
	include('../includeConstants.php');
    /**/ 
$data['sucesso'] = true;
$data['mensagem'] = "";
if(Painel::logado() == false){
    die("Você não está logado!");
}
/*Nosso código começa aqui!*/ 
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $tipo = $_POST['tipo_cliente'];
    $cpf = '';
    $cnpj = '';
    if($tipo == 'fisico'){
        $cpf = $_POST['cpf'];
    }else if($tipo == 'juridico'){
        $cnpj = $_POST['cnpj'];
    }
    $imagem = "";
    if($nome == "" || $email == "" || $tipo == ""){
        $data['sucesso'] = false;
        $data['mensagem'] = "Campos vazios não são permitidos!";
    }
    if(isset($_FILES['imagem'])){
        if(Painel::imagemValida($_FILES['imagem'])){
            $imagem = $_FILES['imagem'];
        }else{
            $imagem = "";
            $data['sucesso'] = false;
            $data['mensagem'] = "A Imagem selecionada não é válida!";
        }
    }
        
    if($data['sucesso']){
        if(is_array($imagem))
            $imagem = Painel::uploadFile($imagem);
        $sql = MySql::conectar()->prepare("INSERT INTO `tb_clientes` VALUES (null,?,?,?,?,?)");
        $dadoFinal = ($cpf == '') ? $cnpj : $cpf;
        $sql->execute(array($nome,$email,$tipo,$dadoFinal,$imagem));
        //Só cadastrar 
    }

    die(json_encode($data));
?>