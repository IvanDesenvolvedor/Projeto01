<?php 
if(isset($_GET['excluir'])){
    $idExcluir = intval($_GET['excluir']);
    Painel::deletar('tb_site_slides',$idExcluir);
    Painel::redirect(INCLUDE_PATH_PAINEL.'listar-slides');
}elseif (isset($_GET['order']) && isset($_GET['id'])) {
    Painel::orderItem('tb_site_slides',$_GET['order'],$_GET['id']);
}
$paginaAtual =isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$porPagina = 4;
//if(isset($_GET['pagina']) == false){
    $slides = Painel::selectAll('tb_site_slides',($paginaAtual - 1) * $porPagina,$porPagina);
//}


//parei na aula listar dados tempo 17:19

?>
<div class="box-content">
<h2><i class="far fa-id-card"></i> Slides Cadastrados</h2>
<div class="wraper-table">
<table>
    <tr>
        <td>Nome</td>
        <td>Imagem</td>
        <td>#</td>
        <td>#</td>
        <td>#</td>
        <td></td>
    </tr>
    <?php 
       foreach ($slides as $key => $value) {
           # code...
    ?>
    <tr>
        <td><?php echo $value['nome']; ?></td>
        <td><img style="width:50px;height:50px" src="<?php echo INCLUDE_PATH_PAINEL ?>imagens/<?php echo $value['slide']; ?>" alt=""></td>
        <td><a class="btn edit" href="<?php INCLUDE_PATH_PAINEL; ?>editar-slides?id=<?php echo $value['id']; ?>"><i class="fas fa-pencil-alt"></i> Editar</a></td>
        <td><a actionBtn="delete" class="btn delete" href="<?php INCLUDE_PATH_PAINEL ?>listar-slides?excluir=<?php echo $value['id']; ?>"><i class="fa fa-times"></i> Excluir</a></td>
        <td><a class="btn order" href="<?php INCLUDE_PATH_PAINEL; ?>listar-slides?order=up&id=<?php echo $value['id']; ?>"><i class="fa fa-angle-up"></i></a></td>
        <td><a class="btn order" href="<?php INCLUDE_PATH_PAINEL; ?>listar-slides?order=down&id=<?php echo $value['id']; ?>"><i class="fa fa-angle-down"></i></a></td>
    </tr>
       <?php } ?>
</table>
</div><!--wraper-table-->
   <div class="paginacao">
      <?php 
        //total de paginas dividido por 2
        $totalPaginas = ceil(count(Painel::selectAll('tb_site_slides')) / $porPagina);
        for($i = 1; $i <= $totalPaginas; $i++){
           if($i == $paginaAtual)
                echo '<a class="page-selected" href="'.INCLUDE_PATH_PAINEL.'listar-slides?pagina='.$i.'">'.$i.'</a>';
            else{
                echo '<a href="'.INCLUDE_PATH_PAINEL.'listar-slides?pagina='.$i.'">'.$i.'</a>'; 
            }
        }
      ?>
   </div>
</div><!--box-content-->

<?php 
 

?>