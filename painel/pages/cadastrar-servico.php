
<div class="box-content">
<h2><i class="fas fa-pencil-alt"></i> Adicionar Serviços</h2>

<form action="" method="post" enctype="multipart/form-data">

<?php 
   if(isset($_POST['acao'])){
    
    if(Painel::insert($_POST)){
        Painel::alert('sucesso','O cadastro do serviço foi cadastrado com sucesso');
    }else{
       Painel::alert('erro','Campos vazios não são permitidos');
    }
    
    }
    

   
?>
    

    <div class="form-group">
        <label for="depoimentos">Descreva o serviço:</label>
        <textarea name="servico" id="servico" cols="30" rows="10"></textarea>
    </div><!--form-group-->

    
  <div class="form-group">
        <input type="hidden" name="order_id" value="0">
        <input type="hidden" name="nome_tabela" value="tb_site_servicos">
        <input type="submit" name="acao"  value="Cadastrar">
    </div><!--form-group-->
</form>
</div><!--box-content-->