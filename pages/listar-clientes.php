	
<div class="box-content">
    <h2><i class="bi bi-people-fill"></i> - Listar Clientes</h2>
    <?php 
        for($i = 0; $i < 6;$i++){
    ?>
    <div class="boxes">
        <div class="box-single-wraper">
            <div class="box-single">
                <div class="topo-box">
                    <h2><i class="bi bi-file-person"></i></h2>
                </div><!--topo-box-->
                <div class="body-box">
                    <p><b><i class="bi bi-info-circle"></i> Nome do Cliente:</b> Vitor Telles</p>
                    <p><b><i class="bi bi-envelope"></i> Email:</b> vitor.telles@hotmail.com</p>
                    <p><b><i class="bi bi-person-rolodex"></i> Tipo:</b> Físico</p>
                    <p><b><i class="bi bi-credit-card"></i> CPF:</b> 122.029.147-14</p>
                    <div class="group-btn">
                        <a class="btn-delete" href="<?php echo INCLUDE_PATH?>listar-clientes?excluir=<?php echo $value['id'];?>"><i class="fa fa-times"></i> Excluir</a>
                        <a class="btn-edit" href="<?php echo INCLUDE_PATH?>listar-clientes?excluir=<?php echo $value['id'];?>"><i class="fa fa-pencil"></i> Editar</a>
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