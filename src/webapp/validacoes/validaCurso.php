<?php

    // receber os dados do formulário
    $nome               = $_POST["nome"];
    $duracao_meses      = $_POST["duracao_meses"];

    // validações
    if($nome == ""){
        die("NOME DO CURSO NÃO PODE SER NULO!");
    }

    if($duracao_meses == ""){
        die("DURAÇÃO DO CURSO NÃO PODE SER NULA!");
    }

    // conexao com o banco
    include "../conexao.php";

    // inserir no banco
    $sql = "INSERT INTO curso (nome, duracao_meses) VALUES ('$nome', '$duracao_meses')";

    // enviar inserção para o banco
    mysqli_query($con, $sql) or die("ERRO AO INSERIR CURSO ". mysqli_error($con));

    // redirecionar para listagem de cursos
    header('location: ../listagens/listaCursos.php');