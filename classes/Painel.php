<?php 

class Painel {

    public static function logado(){
        return isset($_SESSION['login']) ? true : false;
    }

    public static function loggout(){
        session_destroy();
        header('Location: '.INCLUDE_PATH_PAINEL);
    }

    public static function pegaCargo($cargo){
        $arr =[
            '0' => 'Normal',
            '1' => 'Sub Administrador',
            '2' => 'Administrador'
        ];
        return $arr[$cargo];
    }
}