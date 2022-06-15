<?php 
    if(isset($_GET['addCart'])){    
        $idProduto = (int)$_GET['addCart'];
        if(isset($_SESSION['carrinho'])== false){
            $_SESSION['carrinho'] = array();
        }
        if(isset($_SESSION['carrinho'][$idProduto]) == false){
            $_SESSION['carrinho'][$idProduto] = 1;
        }else{
            $_SESSION['carrinho'][$idProduto]++;
        }   
    }
?>
<h2><a>Carrinho <?php echo Painel::getTotalItemsCarrinho();?></a></h2>
<h2><a href="<?php echo INCLUDE_PATH?>finalizar-pedido">finalizar</a></h2>
<div class="box-content">
    <h2>Efetuar um novo pedido</h2>   
    <?php 
    $items = MySql::conectar()->prepare("SELECT * FROM `tb_produtos`");
    $items->execute();
    $items = $items->fetchAll();

    foreach($items as $key => $value){
    ?>
    <div class="produto">
        <label><?php echo $value['nome'];?></label>
        <a href="<?php echo INCLUDE_PATH?>pedidos?addCart=<?php echo $value['id'];?>">Adicionar ao Carrinho</a>
    </div>
    <?php } ?>
</div>



