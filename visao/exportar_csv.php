<?php
include_once('../modelo/conexao.php'); // Conexão com o banco de dados

// Cabeçalhos para o navegador (força o download como CSV)
header('Content-Type: text/csv; charset=UTF-8');
header('Content-Disposition: attachment; filename="ativos.csv"');

// Adiciona o BOM para UTF-8 (garante que caracteres especiais como "ç" sejam interpretados corretamente)
echo "\xEF\xBB\xBF"; // Para garantir que caracteres especiais apareçam corretamente no CSV

// Consulta para buscar os dados necessários diretamente
$sql = "SELECT descricaoAtivo, quantidadeAtivo, 
               (SELECT descricaoMarca FROM marca WHERE idMarca = ativo.idMarca) AS Marca,
               (SELECT descricaoTipo FROM tipo WHERE idTipo = ativo.idTipo) AS Tipo,
               dataCadastro, 
               (SELECT usuario FROM usuario WHERE idUsuario = ativo.idUsuario) AS Usuario 
        FROM ativo";

// Executa a consulta
$result = mysqli_query($conexao, $sql);

// Cria o arquivo CSV na saída
$output = fopen('php://output', 'w');

// Cabeçalho do CSV - Define os nomes das colunas
fputcsv($output, ['Descrição', 'Quantidade', 'Marca', 'Tipo', 'Data', 'Usuário']); 

// Preenche o arquivo CSV com os dados obtidos da consulta
while ($row = mysqli_fetch_assoc($result)) {
    // Formatar a data para o formato d/m/Y H:i:s
    $formattedDate = date("d/m/Y H:i:s", strtotime($row['dataCadastro']));

    // Escrever os dados no CSV, linha por linha
    fputcsv($output, [
        $row['descricaoAtivo'],      // Descrição do ativo
        $row['quantidadeAtivo'],    // Quantidade do ativo
        $row['Marca'],              // Marca do ativo
        $row['Tipo'],               // Tipo do ativo
        $formattedDate,             // Data formatada
        $row['Usuario']             // Usuário responsável
    ]);
}

// Fechar o arquivo CSV
fclose($output);
exit;
?>
