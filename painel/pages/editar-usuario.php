<div class="box-content">
    <div class="check">
        <img src="../img/editar.png"/>
    </div>
    <h1>Editar usuario</h1>

    <form method="post" enctype="multipart/form-data">
        <?php 
            if(isset($_POST['acao'])){
                //enviei o meu formulario

                $nome = $_POST['nome'];
                $senha = $_POST['password'];
                $imagem = $_FILES['imagem'];  
                $imagem_atual = $_POST['imagen_atual']; 
                $usuario = new Usuario();


                if($imagem['name'] != ''){

                    //existe upload de imagem
                    if(Painel::imagemValida($imagem)){
                        Painel::deleteFile($imagem_atual);
                        $imagem = Painel::uploadFile($imagem);
                        if($usuario->atualizarUsuario($nome,$senha,$imagem)){
                            $_SESSION['img'] = $imagem;
                            Painel::alert('sucesso','Atualizado com sucesso!');
                        }else{
                            Painel::alert('erro','Ocorreu um erro ao atualizar junto com imagem!');
                        }
                    }else{
                        Painel::alert('erro','O formato nãe é valido!');
                    }

                }else{
                    $imagem = $imagem_atual;
                    if($usuario->atualizarUsuario($nome,$senha,$imagem)){
                        Painel::alert('sucesso','Cadastro realizado com sucesso!');
                    }else{
                        Painel::alert('erro','Ocorreu um erro ao atualizar...!');
                    }
                }
            }
        ?>
        <div class="form-group">
            <label>Nome:</label>
            <input type="text" name="nome" required value="<?php echo $_SESSION['nome']; ?>">
        </div><!-- form-group -->
        <div class="form-group">
            <label>Senha:</label>
            <input type="password" name="password" required value="<?php echo $_SESSION['password']; ?>">
        </div><!-- form-group -->
        <div class="form-group">
            <label>Imagem:</label>
            <input type="file" name="imagem" />
            <input type="hidden" name="imagen_atual" value="<?php echo $_SESSION['img'];?>">
        </div><!-- form-group -->
        <div class="form-group">
           <input type="submit" name="acao" value="Atualizar!">
        </div><!-- form-group -->
    </form>
    
    
</div><!-- box-content -->