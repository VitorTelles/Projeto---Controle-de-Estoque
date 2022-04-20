<?php
    
	include('../includeConstants.php');
    /**/ 
$data['sucesso'] = true;
$data['mensagem'] = "";
if(Painel::logado() == false){
    die("Você não está logado!");
}
/*Nosso código começa aqui!*/ 
if(isset($_POST['tipo_acao']) && $_POST['tipo_acao'] == 'cadastrar_cliente'){
    sleep(2);
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
        $data['mensagem'] = " O Cliente foi cadastrado com sucesso!";
    }
}else if(isset($_POST['tipo_acao']) && $_POST['tipo_acao'] == 'editar_cliente'){
    sleep(2);
    $id = $_POST['id_cliente'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $tipo = $_POST['tipo_cliente'];
    $imagem = $_POST['imagem_original'];
    $cpf = '';
    $cnpj = '';
    if($tipo == 'fisico'){
        $cpf = $_POST['cpf'];
    }else if($tipo == 'juridico'){
        $cnpj = $_POST['cnpj'];
    }

    if($nome == '' || $email == ''){
        $data['sucesso'] = false;
        $data['mensagem'] = "Campos Vazios não são Permitidos! ";
    }
    if(isset($_FILES['imagem'])){
        if(Painel::imagemValida($_FILES['imagem'])){
            @unlink('../imagens/'.$imagem);
            $imagem = $_FILES['imagem'];
        }else{
            $data['sucesso'] = false;
            $data['mensagem'] = "A Imagem selecionada não é válida!";
        }
    }

    if($data['sucesso']){
        if(is_array($imagem)){
            $imagem = Painel::uploadFile($imagem);
        }
        $sql = MySql::conectar()->prepare("UPDATE `tb_clientes` SET nome = ?,email = ?,tipo = ?,cpf_cnpj = ?, imagem = ? WHERE id = $id");
        $dadoFinal = ($cpf == '') ? $cnpj : $cpf;
        $sql->execute(array($nome,$email,$tipo,$dadoFinal,$imagem));
        $data['mensagem'] = "O Cliente foi atualizado com sucesso!";
    }


}else if(isset($_POST['tipo_acao']) && $_POST['tipo_acao'] == 'deletar_cliente'){
    $id = $_POST['id'];

    $sql = MySql::conectar()->prepare("SELECT imagem FROM `tb_clientes` WHERE id = $id");
    $sql->execute();
    $imagem = $sql->fetch()['imagem'];
    @unlink('../imagens/'.$imagem);
    $sql = MySql::conectar()->exec("DELETE FROM `tb_clientes` WHERE id = $id");
}

    die(json_encode($data));
?>