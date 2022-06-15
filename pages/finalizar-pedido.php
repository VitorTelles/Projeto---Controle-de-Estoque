<div class="container"> 
    <h2>Fechar Pedido!</h2>


    <table>

    <tr>
        <td>Nome do Produto</td>
        <td>Quantidade</td>
    </tr>
    <?php 
        $itemsCarrinho = $_SESSION['carrinho'];
        foreach($itemsCarrinho as $key => $value){
            $idProduto = $key;
            $produto = MySql::conectar()->prepare("SELECT * FROM `tb_produtos` WHERE id= $idProduto");
            $produto->execute();
            $produto = $produto->fetch();
    ?>
    <tr>
        <td><?php echo $produto['nome'];?></td>
        <td><?php echo $value;?></td>
    </tr>
<?php }?>
    </table>
</div>
