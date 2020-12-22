<?php
   if(isset($_GET['id'])){
     $id = (int)$_GET['id'];
     $servico = Painel::select('tb_site_servicos','id = ?',array($id));
   }else{
       Painel::alert('erro','Você precosa passar o parametro ID.');
       die();
   }
?>
<div class="box-content">
<h2><i class="fas fa-pencil-alt"></i> Aditar Serviços</h2>

<form action="" method="post" enctype="multipart/form-data">

<?php 
   if(isset($_POST['acao'])){
        if(Painel::update($_POST)){
            Painel::alert('sucesso','O serviço foi editado com sucesso');
            $servico = Painel::select('tb_site_servicos','id = ?',array($id));
        }else{
            Painel::alert('erro','Campos vazios não são permitidos!');
        }
  }
    

   
?>
    <div class="form-group">
        <label for="servico">Serviço:</label>
        <textarea name="servico" id="servico"><?php echo $servico['servico']; ?></textarea>
    </div><!--form-group-->

    
  
  <div class="form-group">
         <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="hidden" name="nome_tabela" value="tb_site_servicos" />
        <input type="submit" name="acao"  value="Atualizar">
    </div><!--form-group-->
</form>
</div><!--box-content-->