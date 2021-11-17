<?php

    //receber o id do formulario
    $id = $_POST["id"];

    // conexao com o banco
    include "../conexao.php";

    // comando para alteração dos dados
    $sql = "DELETE FROM curso WHERE id = '$id'"; 
    //var_dump($sql);

    // enviar para o banco
    mysqli_query($con, $sql) or die("ERRO AO EXCLUIR CURSO". mysqli_error($con));

    // redirecionar para listagem de cursos
    header('location: ../listagens/listaCursos.php');