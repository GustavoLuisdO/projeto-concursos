<?php

    // receber os dados do formulário
    $nome               = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_STRIPPED);
    $duracao_meses      = filter_input(INPUT_POST, "duracao_meses", FILTER_VALIDATE_INT);

    // validações
    if($nome == "" || $nome === false){
        die("NOME DO CURSO NÃO PODE SER NULO!");
    }

    if($duracao_meses == "" || $duracao_meses === false ){
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