<div class="box-content">
<h2><i class="fas fa-pencil-alt"></i> Editar Usuário</h2>

<form action="" method="post" enctype="multipart/form-data">

<?php 
   if(isset($_POST['acao'])){
    //enviei meu formulario
    
    $nome = $_POST['nome'];
    $senha = $_POST['password'];
    $imagem = $_FILES['imagem'];
    $imagem_atual = $_POST['imagem_atual'];
    $usuario = new Usuario();
    if($imagem['name'] != ''){//se não tiver vazio quer dizer que ele selecionou
        //existe o uplad de imagens
        if(Painel::imagemValida($imagem)){
            Painel::deleteFile($imagem_atual);
            $imagem = Painel::uploadImagem($imagem);
            if($usuario->atualizarUsuario($nome,$senha,$imagem)){
                $_SESSION['img'] = $imagem;
                Painel::alert('sucesso','Atualizado com sucesso junto com a imagem!');
            }else{
                Painel::alert('erro','Ocorreu um erro ao atualizar junto com a imagem');
            }
        }else{
            Painel::alert('erro','O formato não é válido');
        }
    }else{
        $imagem = $imagem_atual;
        if($usuario->atualizarUsuario($nome,$senha,$imagem)){
            Painel::alert('sucesso','Atualizado com sucesso');
        }else{
            Painel::alert('erro','Ocorreu um erro ao atualizar');
        }
    }
   }
?>

    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" required value="<?php echo $_SESSION['nome']; ?>">
    </div><!--form-group-->
    <div class="form-group">
        <label for="senha">Senha</label>
        <input type="password" name="password" id="senha" required value="<?php echo $_SESSION['password']; ?>">
    </div><!--form-group-->
    <div class="form-group">
        <label for="imagem">Imagem</label>
        <input type="file" name="imagem" id="imagem">
        <input type="hidden" name="imagem_atual" value="<?php echo $_SESSION['img']; ?>">
    </div><!--form-group-->
    <div class="form-group">
        <input type="submit" name="acao" id="nome" value="Atualizar">
    </div><!--form-group-->
</form>
</div><!--box-content-->