<?php 
    if(isset($_GET['id'])){
        $id = (int)$_GET['id'];
        $depoimento = Painel::select('tb_admin.depoimentos','id = ?',array($id));

    }else{
        Painel::alert('erro','Voce precisa passar o parametro ID.');
        die();
    }

?>

<div class="box-content">
    <div class="check">
        <img src="../img/editar.png"/>
    </div>
    <h1>Editar depoimentos</h1>

    <form method="post" enctype="multipart/form-data">
    <?php 
            if(isset($_POST['acao'])){
				if(Painel::update($_POST)){
					Painel::alert('sucesso','O depoimento foi editado com sucesso!');
					$depoimento = Painel::select('tb_admin.depoimentos','id = ?',array($id));
				}else{
					Painel::alert('erro','Campos vázios não são permitidos.');
				}
			}
   
        ?>
       
        <div class="form-group">
            <label>Nome da pessoa:</label>
            <input type="text" name="nome" value="<?php echo $depoimento['nome']; ?>"/>
        </div><!-- form-group -->
        <div class="form-group">
            <label>Depoimento</label>
            <textarea name="depoimento"><?php echo $depoimento['depoimento']; ?></textarea>
        </div><!-- form-group -->
        <div class="form-group">
        <label>Data</label>
            <input formato='data' type="text" name="Data" value="<?php echo $depoimento['Data']; ?>"/>
        </div><!-- form-group -->
        
        
        
        <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <input type="hidden" name="nome_tabela" value="tb_admin.depoimentos"/>
           <input type="submit" name="acao" value="Atualizar!">
        </div><!-- form-group -->
    </form>
    
    
</div><!-- box-content -->