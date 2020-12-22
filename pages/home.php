
<section class="banner-container">
    <div style="background-image: url('<?php echo INCLUDE_PATH; ?>imagens/imgcod1.jpg');" class="banner-single"></div><!--banner-single-->
    <div style="background-image: url('<?php echo INCLUDE_PATH; ?>imagens/imgcod2.jpg');" class="banner-single"></div><!--banner-single-->
    <div style="background-image: url('<?php echo INCLUDE_PATH; ?>imagens/imgcod3.jpg');" class="banner-single"></div><!--banner-single-->
        <div class="overlay"></div><!--overlay-->
        <div class="center">
          
            <form action="" method="POST">
                <h2>Qual o seu melhor e-mail?</h2>
                <input type="email" name="email" required>
                <input type="hidden" name="identificador" value="form_home">
                <input type="submit" name="acao" value="Cadastrar">
            </form>
        </div>
        <!--center-->
        <div class="bullets">
       
        </div>
    </section>
    <!--banner-principal-->

    <section class="descricao-autor">
        <div class="center">
            <div class="w50 left">
                <h2><?php echo $infoSite['nome_autor']; ?></h2>
                <p><?php echo $infoSite['descricao']; ?></p>
               <!-- <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Magni architecto tempora
                    quis officiis dolorum consequuntur expedita praesentium aperiam in quia provident ab
                    eligendi debitis eum aut, vel, amet aspernatur doloribus.
                    quis officiis dolorum consequuntur expedita praesentium aperiam in quia provident ab
                    eligendi debitis eum aut, vel, amet aspernatur doloribus
                    quis officiis dolorum consequuntur expedita praesentium aperiam in quia provident ab
                    eligendi debitis eum aut, vel, amet aspernatur doloribus</p> -->
            </div>
            <!--w50-->
            <di class="clear"></di>
            <div class="w50 left">
                <img class="right" src="<?php echo INCLUDE_PATH; ?>imagens/foto.png" alt="">
            </div>
            <!--w50-->
            <div class="clear"></div>
        </div>
        <!--center-->
    </section>
    <!--descricao-autor-->

    <section class="especialidades">
        <div class="center">
            <h2 class="title">Especalidades</h2>
            <div class="w33 left box-especialidade">
                <h3><i class="<?php echo $infoSite['incone1']; ?>"></i></h3>
                <h4>CSS3</h4>
                <p><?php echo $infoSite['descricao1']; ?></p>
            </div>
            <!--box-especialidade-->
            <div class="w33 left box-especialidade">
                <h3><i class="<?php echo $infoSite['incone2']; ?>"></i></h3>
                <h4>HTML5</h4>
                <p><?php echo $infoSite['descricao2']; ?> </p>
            </div>
            <!--box-especialidade-->
            <div class="w33 left box-especialidade">
                <h3><i class="<?php echo $infoSite['incone3']; ?>"></i></h3>
                <h4>JavasCript</h4>
                <p><?php echo $infoSite['descricao3']; ?></p>
            </div>
            <!--box-especialidade-->
              <!--box-especialidade-->
           <!--   <div class="w33 left box-especialidade">
                <h3><i class="fab fa-php"></i></i></h3>
                <h4>PHP</h4>
                <p>PHP é uma linguagem de programação voltada para a web e que tem conquistado cada 
                    vez mais adeptos. Fácil de utilizar, robusta e com melhorias constantes, 
                    ela é uma escolha certeira para quem quer trabalhar em projetos qualificados 
                    e sem complicação.
             </p>
            </div>
           
              
              <div class="w33 left box-especialidade">
                <h3><i class="fas fa-database"></i></h3>
                <h4>MySQL</h4>
                <p>O MySQL é um sistema gerenciador de banco de dados relacional de código aberto
                 usado na maioria das aplicações gratuitas para gerir suas bases de dados.
                  O serviço utiliza a linguagem SQL (Structure Query Language – Linguagem de Consulta Estruturada), 
                  que é a linguagem mais popular para inserir, acessar e gerenciar o conteúdo armazenado num
                   banco de dados.
                </p>
            </div>
           -box-especialidade
              <div class="w33 left box-especialidade">
                <h3><i class="fab fa-java"></i></h3>
                <h4>JavasCript</h4>
                <p>Java é uma linguagem de Programação Orientada a Objetos, isto é, implementada
                 a partir de  classes que definem características de objetos que são utilizados
                  no momento de programar. Surgiu na década de 90 e é uma das linguagens mais 
                  utilizadas por programadores de todo o mundo.
            </p>
            </div>
            box-especialidade-->
            <div class="clear"></div><!--clear-->
        </div>
        <!--center-->
    </section>

    <section class="extras">
        <div class="center">
            <div id="depoimentos" class="w50 left depoimentos-container">
                <h2 class="title">Depoimentos dos nossos clientes</h2>
                <?php 
                    $depoimentos = Site::depoimentoDinamico('tb_site_depoimentos');
                    foreach ($depoimentos as $key => $value) {
                ?>
                <div class="depoimento-singe">
                    <p class="depoimento-descricao"><?php echo $value['depoimentos']; ?></p>
                    <p class="nome-autor"><?php echo $value['nome']; ?> - <?php echo $value['data']; ?></p>
                </div><!--depoimento-single-->
              <?php } ?>
            </div><!--depoimentos-container-->
            <!--w50-->
            <div id="servicos" class="w50 left servicos-container">
                <h2 class="title">Serviços</h2>
                <div class="servicos">
                    <ul>
                        <?php
                              $servicos = Site::depoimentoDinamico('tb_site_servicos');
                              foreach ($servicos as $key => $value){
                        ?>
                        <li><?php echo $value['servico']; ?></li>
                            <?php } ?>
                       
                    </ul>
                </div>
                <!--servicos-->
            </div>
            
            <!--w50-->
            <div class="clear"></div>
        </div>
        <!--center-->
    </section>
    <!--extras-->
