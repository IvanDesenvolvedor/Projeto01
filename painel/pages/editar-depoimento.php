<?php
   if(isset($_GET['id'])){
     $id = (int)$_GET['id'];
     $depoimento = Painel::select('tb_site_depoimentos','id = ?',array($id));
   }else{
       Painel::alert('erro','Você precosa passar o parametro ID.');
       die();
   }
?>
<div class="box-content">
<h2><i class="fas fa-pencil-alt"></i> Aditar Depoimento</h2>

<form action="" method="post" enctype="multipart/form-data">

<?php 
   if(isset($_POST['acao'])){
        if(Painel::update($_POST)){
            Painel::alert('sucesso','O depoimento foi editado com sucesso');
            $depoimento = Painel::select('tb_site_depoimentos','id = ?',array($id));
        }else{
            Painel::alert('erro','Campos vazios não são permitidos!');
        }
  }
    

   
?>
    <div class="form-group">
        <label for="nome">Nome da pessoa:</label>
        <input type="text" name="nome" id="nome" value="<?php echo $depoimento['nome']; ?>">
    </div><!--form-group-->

    <div class="form-group">
        <label for="depoimentos">Depoimentos:</label>
        <textarea name="depoimentos" id="depoimentos" cols="30" rows="10"><?php echo $depoimento['depoimentos']; ?></textarea>
    </div><!--form-group-->

    <div class="form-group">
       <label for="data">Data:</label>
        <input formato="data" type="text" name="data" id="data" value="<?php echo $depoimento['data']; ?>>
    </div><!--form-group-->
  
  <div class="form-group">
         <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="hidden" name="nome_tabela" value="tb_site_depoimentos" />
        <input type="submit" name="acao"  value="Atualizar">
    </div><!--form-group-->
</form>
</div><!--box-content-->