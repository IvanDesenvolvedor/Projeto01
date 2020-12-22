
<div class="box-content">
<h2><i class="fas fa-pencil-alt"></i> Adicionar Depoimentos</h2>

<form action="" method="post" enctype="multipart/form-data">

<?php 
   if(isset($_POST['acao'])){
    
    if(Painel::insert($_POST)){
        Painel::alert('sucesso','O cadastro do depoimento foi cadastrado com sucesso');
    }else{
       Painel::alert('erro','Campos vazios não são permitidos');
    }
    
    }
    

   
?>
    <div class="form-group">
        <label for="nome">Nome da pessoa:</label>
        <input type="text" name="nome" id="nome" >
    </div><!--form-group-->

    <div class="form-group">
        <label for="depoimentos">Depoimentos:</label>
        <textarea name="depoimentos" id="depoimentos" cols="30" rows="10"></textarea>
    </div><!--form-group-->

    <div class="form-group">
       <label for="data">Data:</label>
        <input formato="data" type="text" name="data" id="data" >
    </div><!--form-group-->
  
  <div class="form-group">
        <input type="hidden" name="order_id" value="0">
        <input type="hidden" name="nome_tabela" value="tb_site_depoimentos">
        <input type="submit" name="acao"  value="Atualizar">
    </div><!--form-group-->
</form>
</div><!--box-content-->