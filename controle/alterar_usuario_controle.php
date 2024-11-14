<?php
include('../modelo/conexao.php');



    $idUsuario = $_POST['id']; // ID do usuário a ser alterado
    $nome = $_POST['nome']; // Nome do usuário
    $turma = $_POST['turma']; // Turma do usuário

    $query = "
            update
                usuario
            set
                nomeUsuario='".$nome."',
                turmaUsuario = '".$turma."'
            where
                idUsuario = '".$idUsuario."'
 ";

$result = mysqli_query($conexao,$query) or die(false);
if($result){
    echo "<script> alert('Usuario alterado');
        window.location.href = '../visao/Lister_usuario.php';
</script>";
    
}else{ "<script> alert(Falha no cadastro');
window.location.href ='../visao/alterar_usuario.php';
</script>";
}


  