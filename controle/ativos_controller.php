<?php
// Ativar exibição de erros durante o desenvolvimento
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Inclusão de arquivos
include('../modelo/conexao.php');
include('../controle/controle_session.php');

// Validação e sanitização de entradas
$ativo = isset($_POST['ativo']) ? mysqli_real_escape_string($conexao, $_POST['ativo']) : '';
$marca = isset($_POST['marca']) ? mysqli_real_escape_string($conexao, $_POST['marca']) : '';
$tipo = isset($_POST['tipo']) ? mysqli_real_escape_string($conexao, $_POST['tipo']) : '';
$quantidade = isset($_POST['quantidade']) ? (int)$_POST['quantidade'] : 0;
$observacao = isset($_POST['observacao']) ? mysqli_real_escape_string($conexao, $_POST['observacao']) : '';
$user = isset($_SESSION['id_user']) ? (int)$_SESSION['id_user'] : 0;
$acao = isset($_POST['acao']) ? $_POST['acao'] : '';
$idAtivo = isset($_POST['idAtivo']) ? (int)$_POST['idAtivo'] : 0;
$statusAtivo = isset($_POST['status']) ? mysqli_real_escape_string($conexao, $_POST['status']) : '';

// Ação: Inserir ativo
if ($acao === 'inserir') {
    $query = "
        INSERT INTO ativo (
            descricaoAtivo,
            quantidadeAtivo,
            statusAtivo,
            ObservacaoAtivo,
            idMarca,
            idTipo,
            dataCadastro,
            idUsuario
        ) VALUES (
            '$ativo',
            $quantidade,
            'S',
            '$observacao',
            '$marca',
            '$tipo',
            NOW(),
            $user
        )
    ";

    $result = mysqli_query($conexao, $query);
    if ($result) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro ao realizar cadastro: " . mysqli_error($conexao);
    }
}

// Ação: Alterar status
if ($acao === 'alterar_status') {
    $sql = "
        UPDATE ativo 
        SET statusAtivo = '$statusAtivo' 
        WHERE idAtivo = $idAtivo
    ";

    $result = mysqli_query($conexao, $sql);
    if ($result) {
        echo "Status alterado com sucesso!";
    } else {
        echo "Erro ao alterar status: " . mysqli_error($conexao);
    }
}
?>
