<?php 
   Painel::verificaPermissaoPagina(2);
?>
<div class="box-content">
<h2><i class="fas fa-pencil-alt"></i> Adicionar Usuário</h2>

<form action="" method="post" enctype="multipart/form-data">

<?php 
   if(isset($_POST['acao'])){
    //enviei meu formulario
    $login = $_POST['login'];
    $nome = $_POST['nome'];
    $senha = $_POST['password'];
    $imagem = $_FILES['imagem'];
    $cargo = $_POST['cargo'];


    if($login == ''){
        Painel::alert('erro','O login está vazio');
    }else if($nome == ''){
        Painel::alert('erro','O nome está vazio');
    }else if($senha == ''){
        Painel::alert('erro','A senha está vazia');
    }else if($cargo){
        Painel::alert('erro','O cargo precisa estar seleconado');
    }else if($imagem['name'] == ''){
        Painel::alert('erro','Erro a imagem precisa estar selecionada');
    }else{
        //podemos cadastrar
        if($cargo >= $_SESSION['cargo']){
            Painel::alert('erro','Você precisa celecionar um cargo menor que o seu');
        }else if(Painel::imagemValida($imagem)== false){
            Painel::alert('erro','Você precisa celecionar um cargo menor que o seu');
        }else if(Usuario::userExists($login)){
            Painel::alert('erro','O login já existe, selecione outro por favor');
        }else{
            //apenas cadastrar no banco de dados
            $usuario = new Usuario();
            $imagem = Painel::uploadImagem($imagem);
            $usuario->cadasTrarUsuario($login,$senha,$imagem,$nome,$cargo);
            Painel::alert('sucesso','O cadastro do usuario '.$login.' foi feito com sucesso');
        }
    }

   }
?>
    <div class="form-group">
        <label for="login">Login</label>
        <input type="text" name="login" id="login" >
    </div><!--form-group-->
    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome">
    </div><!--form-group-->
    <div class="form-group">
        <label for="senha">Senha</label>
        <input type="password" name="password" id="senha">
    </div><!--form-group-->

    <div class="form-group">
        <label for="cargo">Cargo</label>
        <select name="cargo" id="cargo">
        <?php 
            foreach (Painel::$cargos as $key => $value) {
            if($key < $_SESSION['cargo']) echo '<option value="'.$key.'">'.$value.'</option>';
            }
        ?>
        </select>
    </div><!--form-group-->

    <div class="form-group">
        <label for="imagem">Imagem</label>
        <input type="file" name="imagem" id="imagem">
    </div><!--form-group-->
    <div class="form-group">
        <input type="submit" name="acao" id="nome" value="Atualizar">
    </div><!--form-group-->
</form>
</div><!--box-content-->