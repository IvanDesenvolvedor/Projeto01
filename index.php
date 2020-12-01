<?php include('config.php');  ?>
<?php Site::updateUsuarioOnline();  ?>
<?php Site::contador(); ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="estilo/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>estilo/all.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Palavras, chaves, do, site">
    <meta name="description" content="Descrição do meu site">
    <link rel="icon" href="<?php echo INCLUDE_PATH; ?>favicon.ico" type="image/x-icon">
    <title>Portfólio</title>
</head>

<body>

<base base="<?php echo INCLUDE_PATH; ?>" /> 

<?php 
    $url = isset($_GET['url']) ? $_GET['url'] : 'home';//caso não existir chama a home
    switch ($url) {
        case 'depoimentos':
            echo '<target target="depoimentos"/>';
            break;
        case 'servicos':
            echo '<target target="servicos"/>';
            break;
    }
  ?>
   <div class="sucesso">Formulario enviado com sucesso!</div>
   <div class="error-email">Ocorrei um erro ao enviar o email!</div>
      <div class="overlay-loading">
         <img src="<?php echo INCLUDE_PATH; ?>imagens/ajax-loader.gif" alt="">
    </div><!--overlay-loading-->
    
<header>
   
        <div class="center">
            <div class="left logo"><a href="/">Portfólio</a></div>
            <!--logo-->
            <nav class="right desktop">
                <ul>
                    <li><a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>depoimentos">Depoimentos</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>servicos">Serviços</a></li>
                    <li><a realtime="contato" href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>
                </ul>
            </nav>
            <nav class="right mobile">
                <div class="botao-menu-mobile"><i class="fas fa-bars"></i></div>
                <ul>
                <li><a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>depoimentos">Depoimentos</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>servicos">Serviços</a></li>
                    <li><a realtime="contato" href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>
                </ul>
            </nav>
            <div class="clear"></div>
        </div><!--center-->
    </header>

   

    <div class="container-principal">
        <?php 
            if(file_exists('pages/'.$url.'.php')){//caso exista a que vem na url
                include('pages/'.$url.'.php');
            }else{
                //caso a que vem na url não exista
                if($url != 'depoimentos' && $url != 'servicos'){
                $pagina404 = true;
                include('pages/404.php');
                }else {
                    include('pages/home.php');
                }
            }
        ?>
    </div>

    <footer <?php if(isset($pagina404) && $pagina404 == true) echo 'class="fixed"'; ?>>
        <div>
            <p>Todos os direitos reservados</p>
        </div>
        <!--center-->
    </footer>

    <script src="<?php echo INCLUDE_PATH; ?>js/jquary.js"></script>
    <script src="<?php echo INCLUDE_PATH; ?>js/constants.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyDHPNQxozOzQSZ-djvWGOBUsHkBUoT_qH4"></script>
    <script src="<?php echo INCLUDE_PATH; ?>js/map.js"></script>
    <script src="<?php echo INCLUDE_PATH; ?>js/script.js"></script>
    <?php if($url == 'home' || $url == ''){ ?>
    <script src="<?php echo INCLUDE_PATH; ?>js/slider.js"></script>
    <?php  } ?>
   <?php if($url == 'contato'){  ?>
      
    <?php } ?>

    <!--<script src="<?php echo INCLUDE_PATH; ?>js/exemplo.js"></script> -->
    <script src="<?php echo INCLUDE_PATH; ?>js/formularios.js"></script> 
   
</body>

</html>