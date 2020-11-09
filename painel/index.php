<?php 
   include('../config.php');

   if(Painel::logado() == false){//1 class painel com metodo estatico logado
       include('login.php');
   }else{
       include('main.php');//está logado
   }

?>