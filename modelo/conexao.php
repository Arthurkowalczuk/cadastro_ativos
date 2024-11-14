<?php
//conexao com o banco de dados 
$conexao = mysqli_connect('localhost', 'root', '', 'patrimonio');

if(!$conexao){
    echo "falha na conexão";
    exit();
}



?>