<?php
   if (isset($_GET['loggout'])) {
        Painel::loggout();
   }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>estilo/all.min.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_PAINEL; ?>css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,300&display=swap" rel="stylesheet">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Controle</title>
</head>
<body>
    <aside class="menu">
        <div class="box-usuario">
            <?php 
             if($_SESSION['img'] == ''){
            ?>
            <div class="avatar-usuario">
                 <i class="fa fa-user"></i>
            </div><!--avatar-usuario-->
            <?php }else{ ?>
            <div class="imagem-usuario">
                <img src="<?php echo INCLUDE_PATH_PAINEL; ?>uploads/<?php echo $_SESSION['img']; ?>" alt="">
            </div><!--imagem-usuario-->
            <?php } ?>
            <div class="nome-usuario">
               <p><?php echo $_SESSION['nome']; ?></p>
               <p><?php echo Painel::pegaCargo($_SESSION['cargo']); ?></p>
            </div><!--nome-usuario-->
        </div><!--box-usuario-->
    </aside><!--menu-->
    
       <header>
            <div class="center">
                <div class="menu-btn">
                    <i class="fa fa-bars"></i>
                </div><!--menu-btn-->
                <div class="loggout">
                    <a href="<?php echo INCLUDE_PATH_PAINEL; ?>?loggout"><i class="fa fa-window-close"> </i> <span>Sair</span></a>
                </div><!--loggout-->
                <div class="clear"></div>
            </div>
        </header>
  
 

    
</body>