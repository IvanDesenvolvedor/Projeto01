<?php 

session_start();

$autoload = function($class){
    if($class == 'Email'){
        require_once('classes/phpmailer/PHPMailerAutoLoad.php');
    }
    include('classes/'.$class.'.php');
};

spl_autoload_register($autoload);

define('INCLUDE_PATH','http://localhost/portfolio/'); 
define('INCLUDE_PATH_PAINEL',INCLUDE_PATH.'painel/');
//conectar com o banco de dados
define('HOST','localhost');
define('USER','root');
define('PASSWORD','');
define('DATABASE','projeto01');
?>