<?php 

session_start();
date_default_timezone_set('America/Sao_Paulo');
$autoload = function($class){
    if($class == 'Email'){
        require_once('classes/phpmailer/PHPMailerAutoLoad.php');
    }
    include('classes/'.$class.'.php');
};

spl_autoload_register($autoload);

define('INCLUDE_PATH','http://localhost/Projeto01/'); 
define('INCLUDE_PATH_PAINEL',INCLUDE_PATH.'painel/');
define('BASE_DIR_PAINEL',__DIR__.'/painel');
//conectar com o banco de dados
define('HOST','localhost');
define('USER','root');
define('PASSWORD','');
define('DATABASE','projeto01');

//variaveis para o painel de controle
define('NOMEEMPRESA','Ivan Sistemas')
?>