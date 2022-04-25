<div class="box-content">
    <h2><i class="bi bi-cart-plus-fill"></i> Cadastrar Produtos</h2>
    <form method="post" enctype="multipart/form-data">
    <?php 
        if(isset($_POST['acao'])){
            $nome = $_POST['nome'];
            $descricao = $_POST['descricao'];
            $largura = $_POST['largura'];
            $altura = $_POST['altura'];
            $comprimento = $_POST['comprimento'];
            $peso = $_POST['peso'];
            $preco = $_POST['preco'];
            $quantidade = $_POST['quantidade'];

            $imagens = array();
            $fullFiles = count($_FILES['imagem']['name']);

            $sucesso = true;

            if($_FILES['imagem']['name'][0] != ''){

            for($i = 0; $i < $fullFiles; $i++){
                $imagemAtual = ['type'=>$_FILES['imagem']['type'][$i],
                'size'=>$_FILES['imagem']['size'][$i]];
                if(Painel::imagemValida($imagemAtual) == false){
                    $sucesso = false;
                    Painel::alert('erro','Uma das imagens selecionadas é inválida!');
                    break;
                }
            }
        }else{
            $sucesso = false;
            Painel::alert('erro','Você precisa selecionar pelo menos uma imagem!');
        }
            if($sucesso){
                //Cadastrar Infos e Imagens no BD, Realizar uploads.
                for($i = 0; $i < $fullFiles; $i++){
                    $imagemAtual = ['tmp_name'=>$_FILES['imagem']['tmp_name'][$i],
                    'name'=>$_FILES['imagem']['name'][$i]];
                    $imagens[] = Painel::uploadFile($imagemAtual);
                }
                $sql = MySql::conectar()->prepare("INSERT INTO `tb_produtos` VALUES (null,?,?,?,?,?,?,?,?)");
                $sql->execute(array($nome,$descricao,$largura,$altura,$comprimento,$peso,$preco,$quantidade));
                $lastId = MySql::conectar()->lastInsertId();
                foreach($imagens as $key => $value){
                    MySql::conectar()->exec("INSERT INTO `tb_produtos.imagens` VALUES (null,$lastId,'$value')");
                }
                Painel::alert('sucesso','O Produto foi cadastrado com sucesso!');
            }
        }
    ?>
        <div class="form-group">
                <label>Nome do Produto:</label>
                <input type="text" name="nome">
        </div><!--form-group-->

        <div class="form-group">
                <label>Descrição do Produto:</label>
                <textarea name="descricao"></textarea>
        </div><!--form-group-->

        <div class="form-group">
                <label>Largura:</label>
                <input type="number" name="largura" min="0" max="900" step="5" value="0">
        </div><!--form-group-->

        <div class="form-group">
                <label>Altura:</label>
                <input type="number" name="altura" min="0" max="900" step="5" value="0">
        </div><!--form-group-->

        <div class="form-group">
                <label>Comprimento:</label>
                <input type="number" name="comprimento" min="0" max="900" step="5" value="0">
        </div><!--form-group-->

        <div class="form-group">
                <label>Peso:</label>
                <input type="number" name="peso" min="0" max="900" step="5" value="0">
        </div><!--form-group-->

        <div class="form-group">
                <label>Preço:</label>
                <input type="text" name="preco" >
        </div><!--form-group-->

        <div class="form-group">
                <label>Quantidade:</label>
                <input type="text" name="quantidade">
        </div><!--form-group-->

        <div class="form-group">
                <label>Selecione as imagens:</label>
                <input multiple type="file" name="imagem[]">
        </div><!--form-group-->
        <input type="submit" name="acao" value="Cadastrar Produto!">
    </form>
</div>