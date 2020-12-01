<?php 
   $usuariosOnline = Painel::listarUsuaroisOnline();
   $pegarVisitasTotais = MySql::conectar()->prepare("SELECT * FROM `tb_admin_visitas`");
   $pegarVisitasTotais->execute();
   $pegarVisitasTotais = $pegarVisitasTotais->rowCount();//pega apenas o numero

   $pegarVisitasHoje = MySql::conectar()->prepare("SELECT * FROM `tb_admin_visitas` WHERE dia = ?");
   $pegarVisitasHoje->execute(array(date('Y-m-d')));
   $pegarVisitasHoje = $pegarVisitasHoje->rowCount();//pega apenas o numero
?>
<div class="box-content left w100">
                <h2><i class="fa fa-home"></i> Painel de Controle -  <?php echo NOMEEMPRESA;  ?></h2>
        <div class="box-metricas">
          <div class="box-metrica-single">
                <div class="box-metrica-wraper">
                    <h2>Usuarios Online</h2>
                    <p><?php echo count($usuariosOnline);   ?></p>
                </div><!--box-metrica-wrapper-->
          </div><!--box-metrica-single-->
          <div class="box-metrica-single">
                <div class="box-metrica-wraper">
                    <h2>Total de visitas</h2>
                    <p><?php echo $pegarVisitasTotais;  ?></p>
                </div><!--box-metrica-wrapper-->
          </div><!--box-metrica-single-->
          <div class="box-metrica-single">
                <div class="box-metrica-wraper">
                    <h2>Visitas Hoje</h2>
                    <p><?php echo $pegarVisitasHoje;  ?></p>
                </div><!--box-metrica-wrapper-->
          </div><!--box-metrica-single-->
        <dix class="clear"></dix>
        </div><!--box-metricas-->



</div>
<div class="box-content w100">
     <h2><i class="fa fa-rocket"></i> Usuários online no site</h2>
    <div class="table-responsive">
            <div class="row">
                <div class="col">
                    <span>Ip</span>
                </div><!--col-->
                <div class="col">
                    <span>Ultima Ação</span>
                </div><!--col-->
                <div class="clear"></div>
            </div><!--row-->
            <?php foreach($usuariosOnline as $key => $value){  ?>
            <div class="row">
                <div class="col">
                    <span><?php echo $value['ip'];?></span>
                </div><!--col-->
                <div class="col">
                    <span><?php echo date('d/m/Y H:i:s',strtotime($value['ultima_acao']));?></span>
                </div><!--col-->
                <div class="clear"></div>
            </div><!--row-->
        <?php } ?>
    </div><!--table-responsive-->
</div><!--box-content-->

<div class="box-content w100t">
     <h2><i class="fa fa-rocket"></i> Usuários do painel</h2>
    <div class="table-responsive">
            <div class="row">
                <div class="col">
                    <span>Nome</span>
                </div><!--col-->
                <div class="col">
                    <span>Cargo</span>
                </div><!--col-->
                <div class="clear"></div>
            </div><!--row-->
            
            <?php
            $usuariosPainel = MySql::conectar()->prepare("SELECT * FROM `tb_admin_usuarios`");
            $usuariosPainel->execute();
            $usuariosPainel = $usuariosPainel->fetchAll();
             foreach($usuariosPainel as $key => $value){  ?>
            <div class="row">
                <div class="col">
                    <span><?php echo $value['user'];?></span>
                </div><!--col-->
                <div class="col">
                    <span><?php echo Painel::pegaCargo($value['cargo']);?></span>
                </div><!--col-->
                <div class="clear"></div>
            </div><!--row-->
        <?php } ?>
    </div><!--table-responsive-->
</div><!--box-content-->


