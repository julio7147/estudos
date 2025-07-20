
<!-- chamando funções aplicadas -->
<?php include('config.php'); ?>
<?php Site::updateUsuarioOnline()?>
<?php Site::contador();?>
<?php 
    $infoSite = MySql::conectar()->prepare("SELECT * FROM `tb_site.config`");
    $infoSite->execute();
    $infoSite = $infoSite->fetch();
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $infoSite['titulo']; ?></title>
        
        <link href="<?php echo INCLUDE_PATH; ?>css/style.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="palavras-chaves,do,meu,site">
        <meta name="description" content="Descrição do meu website">
        <meta charset="utf-8"/>
    </head>
    
    <body>
        <?php 
                if(isset($_POST['acao']) && $_POST['identificador'] == 'form_home'){
                    //enviar formulario
                    if($_POST['email'] != ''){
                        $email = $_POST['email'];
                        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                            //tudo certo é um email
                            $mail = new Email('smtp.hostinger.com','julio@mark01.online','Ju284215@','julio7147');
                            $mail->addAdress('julio@mark01.online','julio7147');
                            $mail->formatarEmail(array('Assunto'=>'Um novo email cadastrado no site!','corpo'=>$email));
                            $mail->formatarEmail($info);
                            if($mail->enviarEmail()){
                                echo'<script>alert("Enviado com sucesso!")</script>';
                            }else{
                                echo'<script>alert("Falha ao enviar!")</script>';
                            }
                        }else{
                            echo'<script>alert("não é um email")</script>';
                        }
                    }else{
                        echo'<script>alert("campos vazios não são permitidos")</script>';
                    }
                }/*else if(isset($_POST['acao']) && $_POST['identificador'] == 'form_contato'){
                    $nome = $_POST['nome'];
                    $email = $_POST['email'];
                    $mensagem = $_POST['mensagem'];
                    $telefone = $_POST['telefone'];
                    
                    $assunto = 'nova mensagem do site';
                    $corpo = '';
                    foreach ($_POST as $key => $value) {
                        $corpo.=ucfirst($key).": ".$value;
                        $corpo.="<hr>";
                    }
                    $info = array('assunto'=>$assunto,'corpo'=>$corpo);
                    $mail = new Email('smtp.hostinger.com','julio@mark01.online','Ju284215@','julio7147');
                    $mail->addAdress('julio@mark01.online','julio7147');
                    $mail->formatarEmail(array('Assunto'=>'Um novo email cadastrado no site!','corpo'=>$email));
                    $mail->formatarEmail($info);
                    if($mail->enviarEmail()){
                        echo'<script>alert("Enviado com sucesso!")</script>';
                    }else{
                        echo'<script>alert("Falha ao enviar!")</script>';
                    }


                }*/
        ?>
    <base base="<?php echo INCLUDE_PATH; ?>"/>
        <?php
            $url = isset($_GET['url']) ? $_GET['url'] : 'home';
            switch ($url) { 
                case 'sobre':
                    echo'<target target="sobre" />';
                    break;
                case 'servicos':
                    echo'<target target="servicos" />';
                    break;
            }
        

        ?>
        
        <header>
            <div class="center">
            <div class="left logo">
                
                Logomarca
                
            </div><!-- logo -->
            <nav class="desktop right">
                <ul>
                    <li><a realtime href="<?php echo INCLUDE_PATH; ?>">HOME</a></li>
                    <li><a realtime href="<?php echo INCLUDE_PATH; ?>noticia">NOTICIAS</a></li>
                    <li><a realtime href="<?php echo INCLUDE_PATH; ?>sobre">Sobre</a></li>
                    <li><a realtime href="<?php echo INCLUDE_PATH; ?>servicos">Serviços</a></li>
                    <li><a realtime href="<?php echo INCLUDE_PATH; ?>contatos">Contato</a></li>
                </ul>
            </nav>
            <nav class="right mobile">
                <div class="botao-menu-mobile">
                    <img src="./img/menu-mobile.png"/>
                </div>
                <ul>
                    <li><a href="<?php echo INCLUDE_PATH; ?>">HOME</a></li>
                    <li><a realtime href="<?php echo INCLUDE_PATH; ?>noticia">NOTICIAS</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>sobre">Sobre</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>servicos">Serviços</a></li>
                    <li><a realtime href="<?php echo INCLUDE_PATH; ?>contatos">Contato</a></li>
                </ul>
            </nav>
            <div class="clear"></div>
            </div><!-- center -->
        </header>
        <div class="container-principal">
        <?php
        
        if(file_exists('pages/'.$url.'.php')){
			include('pages/'.$url.'.php');
		}else{
			//Podemos fazer o que quiser, pois a página não existe.
			if($url != 'depoimentos' && $url != 'servicos'){
                $urlPar = explode('/',$url)[0];
                if($urlPar !='noticia'){
				$pagina404 = true;
				include('pages/404.php');
                }else{
                    include('pages/noticia.php');
                }
			}else{
                include('pages/home.php');	
			}
		}


        ?>
        </div>
        
        
        <footer <?php if(isset($pagina404) && $pagina404 == true) echo 'class="fixeds"'; ?>>
            <div class="center">
                <p>Todos os direitos reservados</p>
            </div>
        </footer>
        <script src="<?php echo INCLUDE_PATH; ?>./js/jquery.js"></script>
        <script src="<?php echo INCLUDE_PATH; ?>./js/constats.js"></script>
        <script src="<?php echo INCLUDE_PATH; ?>./js/menu.js"></script>
        <script src="<?php echo INCLUDE_PATH; ?>./js/scroll.js"></script>
       
        <script src="<?php echo INCLUDE_PATH;?>./js/slider.js"></script>

        <?php

            if(is_array($url) && strstr($url[0],'noticia') !== false){
        ?>
<script>
    $(function(){
        $('select').change(function(){
            location.href=include_path+"noticia/"+$(this).val();
        })
    })
</script>
<?php
}
?>
       
        <script src="<?php echo INCLUDE_PATH;?>./js/formulario.js"></script>
        
        

    </body>
</html>