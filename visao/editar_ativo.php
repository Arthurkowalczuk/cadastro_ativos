<?php
include_once('../modelo/conexao.php');

// Verificar se os dados foram enviados
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idAtivo = $_POST['idAtivo'];
    $descricaoAtivo = $_POST['descricaoAtivo'];
    $quantidadeAtivo = $_POST['quantidadeAtivo'];
    $observacaoAtivo = $_POST['observacaoAtivo'];

    // Atualizar os dados no banco de dados
    $sql = "UPDATE ativo SET descricaoAtivo = ?, quantidadeAtivo = ?, ObservacaoAtivo = ? WHERE idAtivo = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, 'sisi', $descricaoAtivo, $quantidadeAtivo, $observacaoAtivo, $idAtivo);

    if (mysqli_stmt_execute($stmt)) {
        // Redirecionar após o sucesso
        header('Location: ativos.php?edit=success');
    } else {
        // Redirecionar com erro
        header('Location: index.php?edit=error');
    }
    

    mysqli_stmt_close($stmt);
}
?>
