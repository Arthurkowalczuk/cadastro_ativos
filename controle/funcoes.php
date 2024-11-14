<?php

use LDAP\Result;

function busca_info_bd($conexao,$tabela,$coluna_were = false, $valor_where = false){
 $sql = " select * from ".$tabela;

 if($coluna_were != false){
    $sql .= " where $coluna_were ='".$valor_where."'";
 }


$result = mysqli_query($conexao,$sql) or die(false);
$dados =$result->fetch_all(MYSQLI_ASSOC);
return $dados;
}
?>