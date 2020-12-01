<?php
  if(isset($_COOKIE['lembrar'])){
      $user = $_COOKIE['user'];
      $password = $_COOKIE['password'];
      $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin_usuarios` WHERE user = ? AND password = ?");
      $sql->execute(array($user,$password));
      if($sql->rowCount() == 1){
        $info = $sql->fetch();
        $_SESSION['login'] =true;
        $_SESSION['user'] = $user;
        $_SESSION['password'] = $password;
        $_SESSION['cargo'] = $info['cargo'];
        $_SESSION['nome'] = $info['nome'];
        $_SESSION['img'] = $info['img'];
        header('Location: '.INCLUDE_PATH_PAINEL);
        die();
  }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>estilo/all.min.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_PAINEL; ?>css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,300&display=swap" rel="stylesheet">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Controle</title>
</head>
<body>
    <div class="box-login">
      <?php 
        if(isset($_POST['acao'])){
            $user = $_POST['user'];
            $password = $_POST['password'];
            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin_usuarios` WHERE user = ? AND password = ?");
            $sql->execute(array($user,$password));
            if($sql->rowCount() == 1){
                $info = $sql->fetch();
                //logamos com sucesso
                $_SESSION['login'] =true;
                $_SESSION['user'] = $user;
                $_SESSION['password'] = $password;
                $_SESSION['cargo'] = $info['cargo'];
                $_SESSION['nome'] = $info['nome'];
                $_SESSION['img'] = $info['img'];
                if(isset($_POST['lembrar'])){
                    setcookie('lembrar',true,time()+(60*60*24),'/');//dura um dia
                    setcookie('user',$user,time()+(60*60*24),'/');
                    setcookie('password',$password,time()+(60*60*24),'/');
                }
                header('Location: '.INCLUDE_PATH_PAINEL);
                die();
            }else{
                //falhou
                echo '<div class="error-box"><i class="fa fa-times"></i>  Usuários ou senha incorreto</div>';
            }
        }
      ?>
        <h2>Efetue o Login</h2>
        <form action="" method="post">
            <input type="text" name="user" id="" placeholder="Login" required>
            <input type="password" name="password" id="" placeholder="Senha" required>
            <div class="form-group-login left">
              <input type="submit" value="Logar" name="acao">
            </div>
            <div class="form-group-login right">
                <label for="lembrar">Lembrar-me</label>
                <input type="checkbox" name="lembrar" id="lembrar">
            </div>
            <div class="clear"></div>
        </form>
    </div><!--box-login-->
</body>
</html>