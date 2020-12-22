<?php 
   Painel::verificaPermissaoPagina(2);
?>
<div class="box-content">
<h2><i class="fas fa-pencil-alt"></i> CadasTrar Slide</h2>

<form action="" method="post" enctype="multipart/form-data">

<?php 
   if(isset($_POST['acao'])){
    //enviei meu formulario
    $nome = $_POST['nome'];
    $imagem = $_FILES['imagem'];
   


    if($nome == ''){
        Painel::alert('erro','O campo nome não pode ficar vazio está vazio');
    }else{
        //podemos cadastrar
       if(Painel::imagemValida($imagem)== false){
            Painel::alert('erro','O formato da imagemnão é valido');
        }else{
            //apenas cadastrar no banco de dados
            include('../classes/lib/WideImage.php');
            $imagem = Painel::uploadImagem($imagem);
            WideImage::load('uploads/'.$imagem)->resize(100)->saveToFile('uploads/'.$imagem);
            $arr =["nome"=>$nome,"slide"=>$imagem,"order_id"=>'0',"nome_tabela"=>"tb_site_slides"];
            Painel::insert($arr);
            Painel::alert('sucesso',"O cadastro do slide foi realizadocom sucesso");
        }
    }

   }
?>
    <div class="form-group">
        <label for="nome">Nome do Slide</label>
        <input type="text" name="nome" id="nome" >
    </div><!--form-group-->
   
   <div class="form-group">
        <label for="imagem">Imagem</label>
        <input type="file" name="imagem" id="imagem">
    </div><!--form-group-->
  
    <div class="form-group">
        <input type="submit" name="acao" id="nome" value="Cadastrar">
    </div><!--form-group-->
</form>
</div><!--box-content-->