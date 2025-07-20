<?php 
    if(isset($_GET['id'])){
        $id = (int)$_GET['id'];
        $servicos = Painel::select('tb_admin.servicos','id = ?',array($id));

    }else{
        Painel::alert('erro','Voce precisa passar o parametro ID.');
        die();
    }

?>

<div class="box-content">
    <div class="check">
        <img src="../img/editar.png"/>
    </div>
    <h1>Editar servicos</h1>

    <form method="post" enctype="multipart/form-data">
    <?php 
            if(isset($_POST['acao'])){
				if(Painel::update($_POST)){
					Painel::alert('sucesso','O serviço foi editado com sucesso!');
					$servicos = Painel::select('tb_admin.servicos','id = ?',array($id));
				}else{
					Painel::alert('erro','Campos vázios não são permitidos.');
				}
			}
   
        ?>
       
        <div class="form-group">
            <label>Servicos:</label>
            <textarea  name="servicos"<?php echo $servicos['servicos']; ?> ></textarea>
       
        
        </div>
        <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="nome_tabela" value="tb_admin.servicos"/>
           <input type="submit" name="acao" value="Atualizar!">
        </div><!-- form-group -->
    </form>
    
    
</div><!-- box-content -->