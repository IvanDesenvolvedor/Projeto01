<?php 
if(isset($_GET['excluir'])){
    $idExcluir = intval($_GET['excluir']);
    Painel::deletar('tb_site_depoimentos',$idExcluir);
    Painel::redirect(INCLUDE_PATH_PAINEL.'listar-depoimentos');
}elseif (isset($_GET['order']) && isset($_GET['id'])) {
    Painel::orderItem('tb_site_depoimentos',$_GET['order'],$_GET['id']);
}
$paginaAtual =isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$porPagina = 4;
//if(isset($_GET['pagina']) == false){
    $depoimentos = Painel::selectAll('tb_site_depoimentos',($paginaAtual - 1) * $porPagina,$porPagina);
//}


//parei na aula listar dados tempo 17:19

?>
<div class="box-content">
<h2><i class="far fa-id-card"></i> Depoimentos Cadastrados</h2>
<div class="wraper-table">
<table>
    <tr>
        <td>Nome</td>
        <td>data</td>
        <td>#</td>
        <td>#</td>
        <td>#</td>
        <td></td>
    </tr>
    <?php 
       foreach ($depoimentos as $key => $value) {
           # code...
    ?>
    <tr>
        <td><?php echo $value['nome']; ?></td>
        <td><?php echo $value['data']; ?></td>
        <td><a class="btn edit" href="<?php INCLUDE_PATH_PAINEL; ?>editar-depoimento?id=<?php echo $value['id']; ?>"><i class="fas fa-pencil-alt"></i> Editar</a></td>
        <td><a actionBtn="delete" class="btn delete" href="<?php INCLUDE_PATH_PAINEL ?>listar-depoimentos?excluir=<?php echo $value['id']; ?>"><i class="fa fa-times"></i> Excluir</a></td>
        <td><a class="btn order" href="<?php INCLUDE_PATH_PAINEL; ?>listar-depoimentos?order=up&id=<?php echo $value['id']; ?>"><i class="fa fa-angle-up"></i></a></td>
        <td><a class="btn order" href="<?php INCLUDE_PATH_PAINEL; ?>listar-depoimentos?order=down&id=<?php echo $value['id']; ?>"><i class="fa fa-angle-down"></i></a></td>
    </tr>
       <?php } ?>
</table>
</div><!--wraper-table-->
   <div class="paginacao">
      <?php 
        //total de paginas dividido por 2
        $totalPaginas = ceil(count(Painel::selectAll('tb_site_depoimentos')) / $porPagina);
        for($i = 1; $i <= $totalPaginas; $i++){
           if($i == $paginaAtual)
                echo '<a class="page-selected" href="'.INCLUDE_PATH_PAINEL.'listar-depoimentos?pagina='.$i.'">'.$i.'</a>';
            else{
                echo '<a href="'.INCLUDE_PATH_PAINEL.'listar-depoimentos?pagina='.$i.'">'.$i.'</a>'; 
            }
        }
      ?>
   </div>
</div><!--box-content-->

<?php 
 

?>