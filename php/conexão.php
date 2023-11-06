<?php

    $usuario = 'root';
    $senha = 'root';
    $database = 'login';
    $host = 'localhost:3307';

    $mysqli = new mysqli($host, $usuario, $senha, $database);

    if($mysqli->error){
        die("Falha a conectar ao banco de dados: " .$mysqli->error );
    }
?>