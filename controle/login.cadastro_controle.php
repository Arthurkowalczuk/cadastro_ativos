<?php
include_once('../modelo/conexao.php');
include_once('../controle/funcoes.php');
$senha = $_POST['senha'];
$usuario = $_POST['user'];

$senhaCrip = base64_encode($senha);

echo $sql = " Select
             count(*) as quantidades
              from
               usuario
                where
                 usuario='$usuario'
                  and senhaUsuario = '$senhaCrip' ";

$result = mysqli_query($conexao, $sql) or die(false);
$dados = $result->fetch_all(MYSQLI_ASSOC);
var_dump($dados);
if($dados[0]>0){
   
    echo "<script> alert('login permitido');
        //window.location.href = '../visao/ativos.php';
</script>";

}else{
    echo 'senha ou usuario invalido';
}

?>
