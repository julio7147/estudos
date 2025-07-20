<div class="box-content">
    <div class="check">
        <img src="../img/editar.png"/>
    </div>
    <h1>Cadastrar categoria</h1>

    <form method="post" enctype="multipart/form-data">
        <?php
            

            if(isset($_POST['acao'])){
                $nome = $_POST['nome'];
                if($nome == ''){
                    Painel::alert('erro','O campo nome não pode ficar vázio!');
                }else{
                    //Apenas cadastrar no banco de dados!
                    $verificar = MySql::conectar()->prepare("SELECT * FROM `tb_site.categorias` WHERE nome = ?");
				    $verificar->execute(array($_POST['nome']));
                    if($verificar->rowCount() == 0){
                    $slug = Painel::generateSlug($nome);
                    $arr = ['nome'=>$nome,'slug'=>$slug,'order_id'=>'0','nome_tabela'=>'tb_site.categorias'];
                    Painel::insert($arr);
                    Painel::alert('sucesso','o cadastro da categoria foi realizado com sucesso!');
                    }else{
                        Painel::alert('erro','Já existe uma categoria com esse nome!');
                    }
                    
                }
                
            }
        ?>
       
        <div class="form-group">
            <label>Nome da categoria:</label>
            <input type="text" name="nome">
        </div><!-- form-group -->
        <div class="form-group">
           <input type="submit" name="acao" value="cadastrar">
        </div><!-- form-group -->
    </form>
    
    
</div><!-- box-content -->