<?php

    // receber os dados do formulário
    $nome = $_POST["nome"];

    // validações
    if($nome == ""){
        die("NOME DO CURSO NÃO PODE SER NULO!");
    }

    // conexao com o banco
    include "../conexao.php";

    // inserir no banco
    $sql = "INSERT INTO disciplina (nome) VALUES ('$nome')";

    // enviar inserção para o banco
    mysqli_query($con, $sql) or die("erro ao inserir disciplina ". mysqli_error($con));

    // redirecionar para listagem de disciplinas
    header('location: ../listagens/listaDisciplinas.php');