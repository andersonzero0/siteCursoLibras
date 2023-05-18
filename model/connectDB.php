<?php
    $hostName = "localhost";
    $userName = "root";
    $nameDataBase = "siteCursoLibras";
    $passwordUser = "";
    $connection = new mysqli($hostName, $userName, $passwordUser, $nameDataBase);
    if ($connection->connect_errno) {
        echo "Falha ao conectar: (".$connection->connect_errno.") ".$connection->connect_error;
    }
?>