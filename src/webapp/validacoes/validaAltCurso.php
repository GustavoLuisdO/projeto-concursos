<?php

    //receber os dados do formulario
    $id                 = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
    $nome               = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_STRIPPED);
    $duracao_meses      = filter_input(INPUT_POST, "duracao_meses", FILTER_VALIDATE_INT);

     // validações
     if($nome == ""){
        die("NOME DO CURSO NÃO PODE SER NULO!");
    }

    if($duracao_meses == ""){
        die("DURAÇÃO DO CURSO NÃO PODE SER NULA!");
    }

    // conexao com o banco
    include "../conexao.php";

    // comando para alteração dos dados
    $sql = "UPDATE curso SET nome = '$nome', duracao_meses = '$duracao_meses' 
            WHERE id = '$id'"; 
    //var_dump($sql);

    // enviar para o banco
    mysqli_query($con, $sql) or die("ERRO AO ALTERAR CURSO". mysqli_error($con));

    // redirecionar para listagem de cursos
    header('location: ../listagens/listaCursos.php');