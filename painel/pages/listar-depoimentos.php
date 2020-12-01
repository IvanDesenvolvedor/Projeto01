<?php 
$depoimentos = Painel::selectAll('tb_site_depoimentos');

//parei na aula listar dados tempo 17:19

?>
<div class="box-content">
<h2><i class="far fa-id-card"></i> Depoimentos Cadastrados</h2>

<table>
    <tr>
        <td>Nome</td>
        <td>data</td>
        <td>#</td>
        <td>#</td>
    </tr>
    <tr>
        <td>Guilherme</td>
        <td>19/09/2017</td>
        <td><a class="btn edit" href=""><i class="fas fa-pencil-alt"></i> Editar</a></td>
        <td><a class="btn delete" href=""><i class="fa fa-times"></i> Excluir</a></td>
    </tr>
</table>

</div><!--box-content-->

<?php 
 

?>