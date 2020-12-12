<?php 

class Painel {

    public static $cargos = [
        '0' => 'Normal',
        '1' => 'Sub Administrador',
        '2' => 'Administrador'
    ];

    public static function logado(){
        return isset($_SESSION['login']) ? true : false;
    }

    public static function loggout(){
        setcookie('lembrar',true,time()-1,'/');//destroi o cookie
        session_destroy();
        header('Location: '.INCLUDE_PATH_PAINEL);
    }

    public static function pegaCargo(&$cargo){
        $arr =[
            '0' => 'Normal',
            '1' => 'Sub Administrador',
            '2' => 'Administrador'
        ];
        return $arr[$cargo];
    }

    public static function carregarPagina(){
        if(isset($_GET['url'])){
          $url = explode('/',$_GET['url']);//vai dividir pela barra e
          if(file_exists('pages/'.$url[0].'.php')){//cada divisão é um indice
            include('pages/'.$url[0].'.php');//pego o indece 0
          }else{
              //pagina não existe
             header('Location: '.INCLUDE_PATH_PAINEL);//volta para home
          }
        }else{
            include('pages/home.php');
        }
    }
    public static function listarUsuaroisOnline(){
        self::limparUsuariosOnline();
        $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin_online`");
        $sql->execute();
        return $sql->fetchAll();
    }
    public static function limparUsuariosOnline(){
        $date = date("Y-m-d H:i:s");
        //deletar todos os usuarios que a ultima ação for menor do que date menos o intervalo de um minuto
        $sql = MySql::conectar()->exec("DELETE FROM `tb_admin_online` WHERE ultima_acao  < '$date' - INTERVAL 1 MINUTE");
    }
    public static function alert($tipo,$mensagem){
        if($tipo == 'sucesso'){
            echo '<div class="box-alert sucesso"><i class="fa fa-check"></i> '.$mensagem.'</div>';
        }else if($tipo == 'erro'){
            echo '<div class="box-alert erro"><i class="fa fa-times"></i> '.$mensagem.'</div>';
        }
    }
    public static function imagemValida($imagem){
       if($imagem['type'] == 'image/jpeg' ||
       $imagem['type'] == 'imagem/jpg' ||
       $imagem['type'] == 'imagem/png'){
           $tamanho = intval($imagem['size'] / 1024); //para converter para kb
           if($tamanho < 300){
               return true;
           }else{
               return false;
           }
        }else{
            return false;
        }
    }
    public static function uploadImagem($file){
        $formatoArquivo = explode('.',$file['name']);
        $imagemNome = uniqid().'.'.$formatoArquivo[count($formatoArquivo) - 1];
        if(move_uploaded_file($file['tmp_name'],BASE_DIR_PAINEL.'/uploads/'.$imagemNome)){
            return $imagemNome;
        }else{
            return false;
        }
    }
    public static function deleteFile($file){
        @unlink('uploads/'.$file);
    }
    public static function selecionadoMenu($par){
    //<i class="fa fa-angle-double-right" aria-hidden="true"></i>
      $url = explode('/',@$_GET['url'])[0];
       if($url == $par){
           echo 'class="menu-active"';
       }
    }
    public static function verificaPermissaoMenu($permissao){
       if($_SESSION['cargo'] >= $permissao){
          return;
       }
         echo 'style="display:none;"';
    }
    public static function verificaPermissaoPagina($permissao){
        if($_SESSION['cargo'] >= $permissao){
            return;
         }else{
           include('../painel/pages/permissao_negada.php');
           die();
         }
      }
      public static function insert($arr){
        $certo = true;
        $nome_tabela = $arr['nome_tabela'];
        $query = "INSERT INTO `$nome_tabela` VALUES (null";
        foreach ($arr as $key => $value) {
              $nome = $key;
              $valor = $value;
              if($nome == 'acao' || $nome == 'nome_tabela')
                 continue;
              if($value == ''){
                  $certo = false;
                  break;
              }
              $query.=",?";
              $parametros[]=$value;
          }
            $query.=")";
            if($certo == true){
            $sql = MySql::conectar()->prepare($query);
            $sql->execute($parametros);
            }
            return $certo;
          }

          public static function update($arr,$single = false){
			$certo = true;
			$first = false;
			$nome_tabela = $arr['nome_tabela'];

			$query = "UPDATE `$nome_tabela` SET ";
			foreach ($arr as $key => $value) {
				$nome = $key;
				$valor = $value;
				if($nome == 'acao' || $nome == 'nome_tabela' || $nome == 'id')
					continue;
				if($value == ''){
					$certo = false;
					break;
				}
				
				if($first == false){
					$first = true;
					$query.="$nome=?";
				}
				else{
					$query.=",$nome=?";
				}

				$parametros[] = $value;
			}

			if($certo == true){
				if($single == false){
					$parametros[] = $arr['id'];
					$sql = MySql::conectar()->prepare($query.' WHERE id=?');
					$sql->execute($parametros);
				}else{
					$sql = MySql::conectar()->prepare($query);
					$sql->execute($parametros);
				}
			}
			return $certo;
		}

          public static function selectAll($tabela,$start=null,$and=null){
            if($start == null && $and == null){
            $sql = MySql::conectar()->prepare("SELECT * FROM `$tabela`");
            }else{
            $sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` LIMIT $start,$and");
            }
            $sql->execute();

            
            return $sql->fetchAll();
          }
          public static function deletar($tabela,$id=false){
            if($id == false){
                $sql = MySql::conectar()->prepare("DELETE  FROM `$tabela`");
            }else{
                $sql = MySql::conectar()->prepare("DELETE  FROM `$tabela` WHERE id = $id");
            }
            $sql->execute();
          }
          public static function redirect($url){
             echo '<script>location.href="'.$url.'"</script>';
            die();
          }
          //seleciona apenas um registro
          public static function select($table, $query, $arr){
             $sql = Mysql::conectar()->prepare("SELECT * FROM `$table` WHERE $query");
             $sql->execute($arr);
             return $sql->fetch();
          }
         
      }
?>
