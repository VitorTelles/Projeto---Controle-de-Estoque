	
<div class="box-content">
    <h2><i class="bi bi-people-fill"></i> - Listar Clientes</h2>
    <?php 
    $clientes = MySql::conectar()->prepare("SELECT * FROM `tb_clientes`");
    $clientes->execute();
    $clientes = $clientes->fetchAll();
        foreach($clientes as $value){
    ?>
    <div class="boxes">
        <div class="box-single-wraper">
            <div class="box-single">
                <div class="topo-box">
                    <?php 
                        if($value['imagem'] == ''){
                    ?>
                    <h2><i class="bi bi-file-person"></i></h2>
                    <?php 
                        }else{ ?>
                            <img src="<?php echo INCLUDE_PATH?>imagens/<?php echo $value['imagem'];?>">
                        <?php } ?>
                    
                </div><!--topo-box-->
                <div class="body-box">
                    <p><b><i class="bi bi-info-circle"></i> Nome do Cliente:</b> <?php echo $value['nome'];?></p>
                    <p><b><i class="bi bi-envelope"></i> Email:</b> <?php echo $value['email'];?></p>
                    <p><b><i class="bi bi-person-rolodex"></i> Tipo:</b> <?php echo ucfirst($value['tipo']);?></p>
                    <p><b><i class="bi bi-credit-card"></i> <?php
                        if($value['tipo'] == 'fisico'){
                            echo 'CPF: ';
                        }else{
                            echo 'CNPJ: ';
                        }
                    ?>:</b> <?php echo $value['cpf_cnpj'];?></p>
                    <div class="group-btn">
                        <a class="btn-delete" item_id="<?php echo $value['id'];?>" href="<?php echo INCLUDE_PATH?>"><i class="fa fa-times"></i> Excluir</a>
                        <a class="btn-edit" href="<?php echo INCLUDE_PATH?>editar-cliente?id=<?php echo $value['id'];?>"><i class="fa fa-pencil"></i> Editar</a>
                    </div><!--group-btn-->
                    
                </div><!--body-box-->
            </div><!--box-single-->
        </div><!--box-single-wraper-->
        <?php 
        }
        ?>
        <div class="clear"></div>
    </div><!--boxes-->
    
</div><!--box-content-->