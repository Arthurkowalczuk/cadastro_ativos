<?php
include('../modelo/conexao.php');

$nome = $_POST['nome1'];
$sobrenome = $_POST['nome2'];
$usuario = $_POST['user'];
$turma = $_POST['sala'];
$senha = $_POST['senha'];
$cript =  base64_encode($senha) ;


$query = "
    insert into usuario ( 
                            nomeUsuario,
                            usuario,
                            senhaUsuario,
                            turmaUsuario,
                            dataCadastro
                            )values(
                                '".$nome." ".$sobrenome."',
                                '".$usuario."',
                                '".$cript."',
                                '".$turma."',
                                NOW()
                            )


";
 
$result = mysqli_query($conexao,$query) or die(false);

echo $nome. "<br>". $sobrenome."<br>" .$cript. "<br>" .$usuario. "<br>". $turma;  
if($result){
    echo "<script> alert('Usuario cadastrado');
        window.location.href = '../visao/login.cadastro.php';
</script>";
    
}else{ "<script> alert(Falha no cadastro');
window.location.href ='../visao/cadastro_user.php';
</script>";
}

?>