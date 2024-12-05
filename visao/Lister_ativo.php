<?php
include_once('cabeçario.php');
include_once('../modelo/conexao.php');
include_once('../controle/funcoes.php');
include_once('../controle/controle_session.php');
include_once('menu_lateral.php');
$info_bd = busca_info_bd($conexao, 'ativo');
include('cabeçario.php');
$marcas = busca_info_bd($conexao,'marca');
$tipos = busca_info_bd($conexao,'tipo');
  
$sql = "SELECT 
	idAtivo ,
    descricaoAtivo,
    quantidadeAtivo,
    statusAtivo,
  ObservacaoAtivo,
    (SELECT descricaoMarca from marca m WHERE m.idMarca = a.idMarca) as marca,
    (SELECT descricaoTipo from tipo t WHERE t.idTipo = a.idTipo) as tipo,
    (SELECT usuario from usuario u WHERE u.idUsuario = a.idUsuario) as usuario,
    idTipo,
    dataCadastro,
    idUsuario 
FROM ativo a ";



$result = mysqli_query($conexao, $sql) or die(false);
$ativo_bd = $result->fetch_all(MYSQLI_ASSOC);


?>


</html>