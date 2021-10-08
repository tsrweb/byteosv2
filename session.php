<?php

session_start();

if((!isset($_SESSION['nome']))){
    header('location: index.php');
}

$logado = $_SESSION['nome'];	

if($logado != "Byte OS"){
    echo "<style>#adm{display: none;}</style>";
}

?>