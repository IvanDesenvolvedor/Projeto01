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
    <div class="menu">
        <div class="menu-wrapper">
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
        <div class="items-menu">
                <h2>Cadastro</h2>
                <a <?php Painel::selecionadoMenu('cadastrar-depoimentos'); ?> href="<?php echo INCLUDE_PATH_PAINEL; ?>cadastrar-depoimentos">Cadastrar Depoimentos</a>
                <a <?php Painel::selecionadoMenu('cadastrar-servico'); ?> href="">Cadastrar Serviços</a>
                <a <?php Painel::selecionadoMenu('cadastrar-slides'); ?> href="">Cadastrar Slides</a>
                <h2>Gestão</h2>
                <a <?php Painel::selecionadoMenu('listar-depoimentos'); ?> href="<?php echo INCLUDE_PATH_PAINEL; ?>listar-depoimentos">Listar Depoimentos</a>
                <a <?php Painel::selecionadoMenu('Listar-Servicos'); ?> href="">Listar Serviços</a>
                <a <?php Painel::selecionadoMenu('Listar-Slides'); ?> href="">Listar Slides</a>
                <h2>Administração do Painel</h2>
                <a <?php Painel::selecionadoMenu('editar-usuario'); ?> href="<?php echo INCLUDE_PATH_PAINEL; 
                ?>editar-usuario">Editar Usuario</a>
                <a <?php Painel::selecionadoMenu('adicionar-usuario'); ?> <?php Painel::verificaPermissaoMenu(2); 
                 ?> href="<?php echo INCLUDE_PATH_PAINEL; ?>adicionar-usuario">Adicionar Usuário</a>
                <h2>Configuração Geral</h2>
                <a <?php Painel::selecionadoMenu('editar-site'); ?> href="">Editar Site</a>
        </div><!--items-menu-->
        </div><!--menu-wrapper-->
            </div><!--menu-->
    
       <header>
            <div class="center">
                <div class="menu-btn">
                    <i class="fa fa-bars"></i>
                </div><!--menu-btn-->
               
                <div class="loggout">
                <a  <?php if(@$_GET['url'] == ''){ ?> style="background: #60727a;padding: 15px;" <?php } ?> href="<?php echo INCLUDE_PATH_PAINEL; ?>?"> <i class="fa fa-home"></i>  <span>Página inicial</span></a>
                    <a href="<?php echo INCLUDE_PATH_PAINEL; ?>?loggout"><i class="fa fa-window-close"> </i> <span>Sair</span></a>
                </div><!--loggout-->
                <div class="clear"></div>
            </div>
        </header>
  
        <div class="content">
        
        <?php Painel::carregarPagina();  ?>
                
        </div><!--content-->

    <script src="<?php echo INCLUDE_PATH; ?>js/jquary.js"></script>
    <script src="<?php echo INCLUDE_PATH_PAINEL; ?>js/jquary.mask.js"></script>
    <script src="<?php echo INCLUDE_PATH_PAINEL; ?>js/main.js"></script>
</body>