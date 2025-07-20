<?php 
    verificaPermissaopagina(2);
       
?>
<div class="box-content">
    <div class="check">
        <img src="../img/editar.png"/>
    </div>
    <h1>Adicionar usuario</h1>

    <form method="post" enctype="multipart/form-data">
    <?php 
            if(isset($_POST['acao'])){
                //enviei o meu formulario

                $login = $_POST['login'];
                $nome = $_POST['nome'];
                $senha = $_POST['password'];
                $imagem = $_FILES['imagem'];
                $cargo = $_POST['cargo'];
                
                if($login == ''){
                    PAINEL::alert('erro','O login esta vazio!');
                }else if($nome == ''){
                    PAINEL::alert('erro','O nome esta vazio!');    
                }else if($senha == ''){
                    PAINEL::alert('erro','A senha esta vazio!');    
                }else if($cargo == ''){
                    PAINEL::alert('erro','O cargo precisa estar seleionado!');    
                }else if($imagem['name'] == ''){
                    PAINEL::alert('erro','A imagem precisa estar seleionada!');    
                }else{
                    //podemos cadastrar?
                    if($cargo >= $_SESSION['cargo']){
                        PAINEL::alert('erro','você precisa selecionar um cargo menor que o seu!');
                    }else if(PAINEL::imagemValida($imagem) == false){
                        PAINEL::alert('erro','O formato especificado não esta correto!');
                    }else if(Usuario::userExists($login)){
                        PAINEL::alert('erro','O login já existe, selecione outro por favor!');
                    }else{
                        //apenas cadastrar!
                        $usuario = new Usuario();
                        $imagem = PAINEL::uploadFile($imagem);
                        $usuario->cadastrarUsuario($login,$senha,$imagem,$nome,$cargo);
                        PAINEL::alert('sucesso','O cadastro do usuario'.$login.'foi feito!');
                    }
                }
                

                
               
            }
        ?>
       
        <div class="form-group">
            <label>Login:</label>
            <input type="text" name="login"  >
        </div><!-- form-group -->
        <div class="form-group">
            <label>Nome:</label>
            <input type="text" name="nome"  >
        </div><!-- form-group -->
        <div class="form-group">
            <label>Senha:</label>
            <input type="password" name="password"  >
        </div><!-- form-group -->
        <div class="form-group">
            <label>Cargo:</label>
            <select name="cargo">
                <?php 
                    foreach (PAINEL::$cargos as $key => $value){
                        if($key < $_SESSION['cargo']) echo '<option value="'.$key.'">'.$value.'</option>';
                    }
                ?>
            </select>
        </div><!-- form-group -->
        <div class="form-group">
            <label>Imagem:</label>
            <input type="file" name="imagem" />
            <input type="hidden" name="imagen_atual" >
        </div><!-- form-group -->
        <div class="form-group">
           <input type="submit" name="acao" value="Atualizar!">
        </div><!-- form-group -->
    </form>
    
    
</div><!-- box-content -->