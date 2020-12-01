<?php 

class Site{

    public static function updateUsuarioOnline(){
        if(isset($_SESSION['online'])){//se existir
            $token = $_SESSION['online'];//querdiser que tenho o token
            $horarioAtual = date('Y-m-d H:i:s');
            $check = MySql::conectar()->prepare("SELECT `id` FROM `tb_admin_online` WHERE token = ?");//se o id existir
            $check->execute(array($_SESSION['online']));
            if($check->rowCount() == 1){//se for == a 1 pode atualizar
                $sql =MySql::conectar()->prepare("UPDATE `tb_admin_online` SET ultima_acao = ? WHERE token = ?");
                $sql->execute(array($horarioAtual,$token));
            }else{//caso contrario inserir novamente que ficou um tempo inativo
                $ip = $_SERVER['REMOTE_ADDR'];//pega o ip
                $token = $_SESSION['online'];
                $horarioAtual = date('Y-m-d H:i:s');
                $sql =MySql::conectar()->prepare("INSERT INTO `tb_admin_online` VALUES (null,?,?,?)");
                $sql->execute(array($ip,$horarioAtual,$token));
            }
            }else{
            //usuario entra no site pela prieira vez
            $_SESSION['online'] = uniqid();//era id  unico
            $ip = $_SERVER['REMOTE_ADDR'];//pega o ip
            $token = $_SESSION['online'];
            $horarioAtual = date('Y-m-d H:i:s');
            $sql =MySql::conectar()->prepare("INSERT INTO `tb_admin_online` VALUES (null,?,?,?)");
            $sql->execute(array($ip,$horarioAtual,$token));
        }
    }
    public static function contador(){
        //setcookie('visita',true,time() - 1);
        if(!isset($_COOKIE['visite'])){
            //quer dizer que o usuario não foi registrado como visitante no site
            setcookie('visite',true,time() +(60*60*24*7));
            //cookie espira em 7 dias
            $sql = MySql::conectar()->prepare("INSERT INTO `tb_admin_visitas` VALUES (null,?,?)");
            $sql->execute(array($_SERVER['REMOTE_ADDR'],date('Y-m-d')));
        }
    }
   
}