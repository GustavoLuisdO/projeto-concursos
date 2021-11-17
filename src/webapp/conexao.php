<?php

    //conectar no mysql
    $servidor = "127.0.0.1";
    $usuario = "root";
    $senha = "";

    $con = mysqli_connect($servidor, $usuario, $senha);

    //selecionar o banco
    $banco = "enade";
    mysqli_select_db($con, $banco) or 
        die("Erro na abertura do banco ". mysqli_error($con));
    
?>