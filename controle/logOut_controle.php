<?php
session_start();
session_unset();
session_destroy();
header('location:../visao/login.cadastro.php');
exit;

?>