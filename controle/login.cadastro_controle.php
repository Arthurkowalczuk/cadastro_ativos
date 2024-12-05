<?php
session_start();
include_once('../modelo/conexao.php');
include_once('../controle/funcoes.php');
$senha = $_POST['senha'];
$usuario = $_POST['user'];

$senhaCrip = base64_encode($senha);

echo $sql = " Select
             count(*) as quantidades,
             idUsuario
              from
               usuario
                where
                 usuario='$usuario'
                  and senhaUsuario = '$senhaCrip' ";

$result = mysqli_query($conexao, $sql) or die(false);
$dados = $result->fetch_assoc();
var_dump($dados);
if($dados['quantidades']>0){
   
   $_SESSION['login_ok'] = true;
   $_SESSION['controle_login'] = true;
   $_SESSION['id_user'] = $dados['idUsuario'];
   header('location:../visao/sobre.php');
   

}else{
    $_SESSION['login_ok'] = false;
  unset( $_SESSION['controle_login'] );
  header('location:../visao/login.cadastro.php?error_autentic=s');
}

?>
