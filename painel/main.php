<?php
    //esta pegando a classe loggout para aplicar função
    if(isset($_GET['loggout'])){
        Painel::loggout();
    }
?>
<!DOCTYPE html>
<html>
    <head>
    <title>ADMIN</title>
        
        <link href="<?php echo INCLUDE_PATH; ?>painel/css/style.css" rel="stylesheet"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta name="keywords" content="palavras-chaves,do,meu,site"/>
        <meta name="description" content="Descrição do meu website"/>
        <script src="https://cdn.tiny.cloud/1/t7912oxkq7jffepck4twk9izqnpkdaoaaultdqwszkpv0lk1/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
      tinymce.init({
        selector: '#mytextarea'
      });
    </script>
        <meta charset="utf-8"/>
    </head>
    <body>
        <div class="menu">
            <div class="menu-wraper">
            <div class="box-usuario">
                <!-- para adicionar a foto ou avatar do usuario -->
                <?php
                    if($_SESSION['img'] == ''){
                ?>
                    <div class="avatar-usuario">
                        <img src="../img/user.png"/>
                    </div><!-- avatar-usuario -->
                <?php }else{ ?>
                    <div class="imagem-usuario">
                        <img src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $_SESSION['img']; ?>" />
                    </div><!--imagem-usuario -->
                <?php }?>
                <div class="nome-usuario">
                    <p><?php echo $_SESSION['nome']; ?></p>
                    <p><?php echo pegaCargo($_SESSION['cargo']); ?></p>
                </div><!-- nome-usuario -->
            </div><!-- box-usuario -->
            <div class="itens-menu">
                <h2>Cadastro</h2>

                <a <?php selecionadoMenu('cadastrar-depoimento'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-depoimento">Cadastrar Depoimento</a>
                <a <?php selecionadoMenu('cadastrar-servico'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-servicos">Cadastrar Serviços</a>
                <a <?php selecionadoMenu('cadastrar-slides'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-slides">Cadastrar Slides</a>

                <h2>Gestão</h2>

                <a <?php selecionadoMenu('listar-depoimento'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>listar-depoimentos">Listar Depoimento</a>
                <a <?php selecionadoMenu('listar-slide'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>listar-slides">Listar Slides</a>
                <a <?php selecionadoMenu('listar-servico'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>listar-servicos">Listar Serviços</a>

                <h2>Gestão de Noticias</h2>

                <a <?php selecionadoMenu('cadastrar-categoria'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-categoria">Cadastrar Categorias</a>
                <a <?php selecionadoMenu('gerenciar-categorias'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>gerenciar-categorias">Gerenciar Categorias</a>
                <a <?php selecionadoMenu('cadastrar-noticias'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-noticias">Cadastrar Noticias</a>
                <a <?php selecionadoMenu('gerenciar-noticias'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>gerenciar-noticias">Gerenciar Noticias</a>

                <h2>Administração do painel</h2>

                <a <?php selecionadoMenu('editar-usuario'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>editar-usuario">Editar usuario</a>
                <a <?php selecionadoMenu('adicionar-usuario'); ?><?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>adicionar-usuario">Adicionar Usuário</a>
                
                <h2>Configuração Geral</h2>
                
                <a <?php selecionadoMenu('editar-site'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>editar-site">Editar Site</a>
                
            </div><!-- Itens-menu -->
            </div><!-- menu-wraper -->
        </div>
        <header>
            <div class="center">
                <div class="menu-btn">
                    <img src="../img/menu-mobile.png"/>
                </div><!-- menu-btn -->
                <div class="loggout">
                    <a href="<?php echo INCLUDE_PATH_PAINEL ?>?loggout"><img src="../img/cruz (1).png"/></a>
                    <a href="<?php echo INCLUDE_PATH_PAINEL ?>"><img src="../img/inicio.png" /></a>
                </div><!-- loggout -->
                
                <div class="clear"></div><!-- clear -->
            </div><!-- center -->
        </header>
        <div class="content">
            <?php Painel::carregarPagina(); ?>
                
         </div>
            

        
    <script src="<?php echo INCLUDE_PATH ?>js/jquery.js"></script>
    <script src="<?php echo INCLUDE_PATH_PAINEL ?>js/jquery.mask.js"></script>
    <script src="<?php echo INCLUDE_PATH_PAINEL ?>../js/main.js"></script>
    
    <script>
  tinymce.init({ 
  	selector:'.tinymce',
  	plugins: "image",
  	height:500
   });
  </script>

    </body>

</html>