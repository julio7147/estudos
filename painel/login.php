<?php
    if(isset($_COOKIE['lembrar'])){
        $user = $_COOKIE['user'];
        $password = $_COOKIE['password'];
        $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.local` WHERE user = ? AND password = ?");
        $sql->execute(array($user,$password));
        if($sql->rowCount() == 1){
            $info = $sql->fetch();
            $_SESSION['login'] = true;
            $_SESSION['user'] = $user;
            $_SESSION['password'] = $password;
            //relacionando cargo
            $_SESSION['cargo'] = $info['cargo'];
            $_SESSION['nome'] = $info['nome'];
            //para pegar imagem do usuario
            $_SESSION['img'] = $info['img'];
            header('Location: '.INCLUDE_PATH_PAINEL);
            die();
        }

    }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Painel de Controle</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo INCLUDE_PATH_PAINEL?>css/style.css" rel="stylesheet"/>
    </head>
    <body>
        <div class="box-login">
            <?php
            $pdo = MySql::conectar();
            ?>
            <?php 
                if(isset($_POST['acao'])){
                    $user = $_POST['user'];
                    $password = $_POST['password'];
                    $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.local` WHERE user = ? AND password = ?");
                    $sql->execute(array($user,$password));
                    if($sql->rowCount() == 1){
                        $info = $sql->fetch();
                        //Logamos com sucesso.
                        $_SESSION['login'] = true;
                        $_SESSION['user'] = $user;
                        $_SESSION['password'] = $password;
                        //relacionando cargo
                        $_SESSION['cargo'] = $info['cargo'];
                        $_SESSION['nome'] = $info['nome'];
                        //para pegar imagem do usuario
                        $_SESSION['img'] = $info['img'];
                        if(isset($_POST['lembrar'])){
                            setcookie('lembrar',true,time()+(60*60*24),'/');
                            setcookie('user',$user,time()+(60*60*24),'/');
                            setcookie('password',$password,time()+(60*60*24),'/');
                        }
                        header('Location: '.INCLUDE_PATH_PAINEL);
                        die();
                    }else{
                        //falhou
                        echo'<div class="erro-box">usuario ou senha incorretos!</div>';
                    }
                } 
            ?>
           
            <h1>LOGIN</h1>
            <form method="post">
                <input type="text" name="user" placeholder="usuario..."required>
                <input type="password" name="password" placeholder="senha..."required>
                <div class="form-group-login left">
                    <input type="submit" name="acao" value="logar">
                </div>
               <div class="form-group-login right">
                    <label>Lembrar-me</label>
                    <input type="checkbox" name="lembrar"/>
               </div>
               <div class="clear"></div>
            </form>

        </div><!-- box-login-->


    </body>
</html>