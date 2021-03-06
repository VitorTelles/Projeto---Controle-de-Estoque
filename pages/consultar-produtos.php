<?php 
    if(isset($_GET['pendentes']) == false){
?>
<div class="box-content">
    <h2><i class="bi bi-cart-check-fill"></i> - Produtos cadastrados!</h2>
    <div class="busca">
		<form method="post">
			<h4><i class="fa fa-search"></i> Realizar uma busca: </h4>
			<input placeholder="Procure por: nome, id ou código..." type="text" name="busca">
			<input type="submit" name="acao" value="Buscar!">
		</form>
	</div><!--busca-->
    <?php 
        if(isset($_POST['atualizar'])){
            $quantidade = $_POST['quantidade'];
            $produto_id = $_POST['produto_id'];
            if($quantidade <= 0){
                Painel::alert('erro','Você não atualizar a quantidade para igual ou menor a 0');
            }else{
                MySql::conectar()->exec("UPDATE `tb_produtos` SET quantidade = $quantidade WHERE id = $produto_id");
                Painel::alert('sucesso','Você atualizou a quantidade do produto com ID: <b>'.$_POST['produto_id'].'</b>'); 
            }
        }
        $sql = MySql::conectar()->prepare("SELECT * FROM `tb_produtos` WHERE quantidade = 0");
        $sql->execute();
        if($sql->rowCount() > 0){
            Painel::alert('atencao','Você tem produtos em falta no estoque! Clique <a href="'.INCLUDE_PATH.'consultar-produtos?pendentes">aqui</a> para visualiza-los!');
        }
        

    ?>
    <div class="boxes">
        <?php 
        $query = "";
        if(isset($_POST['acao']) && $_POST['acao'] =='Buscar!'){
            $nome = $_POST['busca'];
            $query = "WHERE nome LIKE '%$nome%' OR descricao LIKE '%$nome%' or id LIKE '%$nome%'";
        }
            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_produtos` $query");
            $sql->execute();
            $produtos = $sql->fetchAll();
            if($query != ''){
                echo '<div style="width:100%;" class="busca-result"><p>Foram encontrados <b>'.count($produtos).'</b> resultado(s)</p></div>';
            }
            foreach($produtos as $key => $value){
            $imagemSingle = MySql::conectar()->prepare("SELECT * FROM `tb_produtos.imagens` WHERE produto_id = $value[id] LIMIT 1");
            $imagemSingle->execute();
            $imagemSingle = $imagemSingle->fetch()['imagem'];
            
        ?>
        <div class="box-single-wraper" style="border:2px solid #ccc; border-radius: 11px;">
                    <div class="box-imgs">
                        <img src="<?php echo INCLUDE_PATH?>imagens/<?php echo $imagemSingle;?>">
                    </div><!--box-imgs-->
                <div style="width: 70%; float:left; border:0;" class="box-single">                
                        <div class="body-box">
                            <p><b><i class="bi bi-info-circle"></i> Nome do Produto:</b> <?php echo $value['nome'];?></p>
                            <p><b><i class="bi bi-info-circle"></i> Descrição: </b> <?php echo $value['descricao'];?></p>
                            <p><b><i class="bi bi-info-circle"></i> Largura:</b> <?php echo $value['largura'];?></p>
                            <p><b><i class="bi bi-info-circle"></i> Altura:</b> <?php echo $value['altura'];?></p>
                            <p><b><i class="bi bi-info-circle"></i> Comprimento: </b> <?php echo $value['comprimento'];?></p>
                            <p><b><i class="bi bi-info-circle"></i> Peso:</b> <?php echo $value['peso'];?></p>
                            <p><b><i class="bi bi-info-circle"></i> Preço:</b> <?php echo $value['preco'];?></p>

                            <div class="group-btn">
                                <form style="margin: 0;" method="post">
                                    <label>Quantidade Atual: </label>
                                    <input type="number" name="quantidade" min="0" max="900" step="1" value="<?php echo $value['quantidade'];?>">
                                    <input type="hidden" name="produto_id" value="<?php echo $value['id'];?>">
                                    <input type="submit" name="atualizar" value="Atualizar!">
                                </form>
                            </div><!--group-btn-->

                            <div class="group-btn">
                                <a actionBtn="delete" item_id = "<?php echo $value['id']; ?>" class="btn delete" href=""><i class="fa fa-times"></i> Excluir</a>
                                <a class="btn-edit" href="<?php echo INCLUDE_PATH?>editar-produto?id=<?php echo $value['id'];?>"><i class="fa fa-pencil"></i> Editar</a>
                            </div><!--group-btn-->
                            
                        </div><!--body-box-->
                </div><!--box-single--> 
        </div><!--box-single-wraper-->
           <?php } ?> 
           <div class="clear"></div>
    </div><!--boxes-->
    
</div><!--box-content--> 

<!--PARTE DOS PRODUTOS PENDENTES-->

<?php }else{ ?>
    <div class="box-content">
        <h2><i class="bi bi-cart-check-fill"></i> - Produtos em falta</h2>

        <?php 
        if(isset($_POST['atualizar'])){
            $quantidade = $_POST['quantidade'];
            $produto_id = $_POST['produto_id'];
            if($quantidade <= 0){
                Painel::alert('erro','Você não atualizar a quantidade para igual ou menor a 0');
            }else{
                MySql::conectar()->exec("UPDATE `tb_produtos` SET quantidade = $quantidade WHERE id = $produto_id");
                Painel::alert('sucesso','Você atualizou a quantidade do produto com ID: <b>'.$_POST['produto_id'].'</b>'); 
            }
        }
        Painel::alert('atencao','Todos os produtos listados abaixo estão em falta no Estoque!');
    ?>
    <div class="boxes">
        <?php 
            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_produtos` WHERE quantidade = 0");
            $sql->execute();
            $produtos = $sql->fetchAll();
            foreach($produtos as $key => $value){
            $imagemSingle = MySql::conectar()->prepare("SELECT * FROM `tb_produtos.imagens` WHERE produto_id = $value[id] LIMIT 1");
            $imagemSingle->execute();
            $imagemSingle = $imagemSingle->fetch()['imagem'];
            
        ?>
        <div class="box-single-wraper" style="border:2px solid #ccc; border-radius: 11px;">
                    <div class="box-imgs">
                        <img src="<?php echo INCLUDE_PATH?>imagens/<?php echo $imagemSingle;?>">
                    </div><!--box-imgs-->
                <div style="width: 70%; float:left; border:0;" class="box-single">                
                        <div class="body-box">
                            <p><b><i class="bi bi-info-circle"></i> Nome do Produto:</b> <?php echo $value['nome'];?></p>
                            <p><b><i class="bi bi-info-circle"></i> Descrição: </b> <?php echo $value['descricao'];?></p>
                            <p><b><i class="bi bi-info-circle"></i> Largura:</b> <?php echo $value['largura'];?></p>
                            <p><b><i class="bi bi-info-circle"></i> Altura:</b> <?php echo $value['altura'];?></p>
                            <p><b><i class="bi bi-info-circle"></i> Comprimento: </b> <?php echo $value['comprimento'];?></p>
                            <p><b><i class="bi bi-info-circle"></i> Peso:</b> <?php echo $value['peso'];?></p>
                            <p><b><i class="bi bi-info-circle"></i> Preço:</b> <?php echo $value['preco'];?></p>

                            <div class="group-btn">
                                <form style="margin: 0;" method="post">
                                    <label>Quantidade Atual: </label>
                                    <input type="number" name="quantidade" min="0" max="900" step="1" value="<?php echo $value['quantidade'];?>">
                                    <input type="hidden" name="produto_id" value="<?php echo $value['id'];?>">
                                    <input type="submit" name="atualizar" value="Atualizar!">
                                </form>
                            </div><!--group-btn-->

                            <div class="group-btn">
                                <a actionBtn="delete" item_id = "<?php echo $value['id'];?>" class="btn delete" href="<?php echo INCLUDE_PATH?>"><i class="fa fa-times"></i> Excluir</a>
                                <a class="btn-edit" href="<?php echo INCLUDE_PATH?>editar-produto?id=<?php echo $value['id'];?>"><i class="fa fa-pencil"></i> Editar</a>
                            </div><!--group-btn-->
                            
                        </div><!--body-box-->
                </div><!--box-single--> 
        </div><!--box-single-wraper-->
           <?php } ?> 
           <div class="clear"></div>
    </div><!--boxes-->
    
</div><!--box-content-->
    </div>
<?php } ?>