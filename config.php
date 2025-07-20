<?php
    session_start();
    //comando para servidor atualizar horas do usuario
    date_default_timezone_set('America/Sao_Paulo');
    $autoload = function($class){
        if($class == 'Email'){
            require_once('classes/phpmailer/PHPMailerAutoload.php');
        }
        include('classes/'.$class.'.php');

    };
    spl_autoload_register($autoload);

    
    

    define('INCLUDE_PATH','http://localhost/backend_php/projeto_pratico/');
    define('INCLUDE_PATH_PAINEL',INCLUDE_PATH.'painel/');

    define('BASE_DIR_PAINEL',__DIR__.'/painel');

    // exemplo para quando for colocar no ar
    // define (INCLUDE_PATH','http://marko1.space/')

    // para conectar com banco de dados
    define('HOST','localhost');
	define('USER','root');
	define('PASSWORD','');
	define('DATABASE','dados');

    //variaveis cargo nivel
        
    //função para apontar cargo no servidor
    function pegaCargo($indice){
       
        return PAINEL::$cargos[$indice];

    }
    function selecionadoMenu($par){
        $url = explode('/',@$_GET['url'])[0];
        if($url == $par){
            echo'class="menu-active"';
        }
    }
    function verificaPermissaoMenu($permissao){
        if($_SESSION['cargo'] >= $permissao){
            return;
        }else{
            echo'style="display:none;"';
        }
    }
    function verificaPermissaopagina($permissao){
        if($_SESSION['cargo'] >= $permissao){
            return;
        }else{
            include('painel/pages/permissao_negada.php');
            die();
        }

    }
    function recoverPost($post){
        if(isset($_POST[$post])){
            echo $_POST[$post];
        }
    }

?>