<div class="box-content">
    <div class="check">
        <img src="../img/editar.png"/>
    </div>
    <h1>Cadastrar Slides</h1>

    <form method="post" enctype="multipart/form-data">
        <?php 
            if(isset($_POST['acao'])){
                //enviei o meu formulario
                $nome = $_POST['nome'];
                $imagem = $_FILES['imagem'];
                if($nome == ''){
                    PAINEL::alert('erro','O campo nome não pode ficar vazio vazio!');    
                }else{
                    //podemos cadastrar?
                    if(PAINEL::imagemValida($imagem) == false){
                        PAINEL::alert('erro','O formato especificado não esta correto!');
                    }else{
                        //apenas cadastrar!
                        
                        $imagem = PAINEL::uploadFile($imagem);
                        $arr = ['nome' =>$nome,'slide'=>$imagem,'order_id'=>'0','nome_tabela'=>'tb_admin.slide'];
                        Painel::insert($arr);
                        PAINEL::alert('sucesso','O cadastro do slide foi realizaado com sucesso!');
                    }
                }
                

                
               
            }
        ?>
       
        <div class="form-group">
            <label>Nome do Slide:</label>
            <input type="text" name="nome">
        </div><!-- form-group -->
        <div class="form-group">
            <label>Imagem:</label>
            <input type="file" name="imagem" />
        </div><!-- form-group -->
        <div class="form-group">
           <input type="submit" name="acao" value="Atualizar!">
        </div><!-- form-group -->
    </form>
    
    
</div><!-- box-content -->