<div class="box-content">
    <div class="check">
        <img src="../img/editar.png"/>
    </div>
    <h1>Cadastrar Serviços</h1>

    <form method="post" enctype="multipart/form-data">
    <?php 
            if(isset($_POST['acao'])){
                //enviei o meu formulario
                if(PAINEL::insert($_POST)){
                    PAINEL::alert('sucesso','O cadastro do depoimento foi feito!');

                }else{
                    PAINEL::alert('erro','Campos vazios não são permitidos! ');
                }

               
                    
                
                

                
               
            }
        ?>
       
       
        <div class="form-group">
            <label>Depoimento</label>
            <textarea name="depoimento"></textarea>
        </div><!-- form-group -->
        
        
        
        
        <div class="form-group">
            <input type="hidden" name="order_id" value="0" />
            <input type="hidden" name="nome_tabela" value="tb_admin.servicos"/>
           <input type="submit" name="acao" value="Atualizar!">
        </div><!-- form-group -->
    </form>
    
    
</div><!-- box-content -->