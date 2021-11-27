<?php

    // receber os dados do formulário
    $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_STRIPPED);

    // validações
    if($nome == "" || $nome === false){
        die("NOME DO CURSO NÃO PODE SER NULO!");
    }

    // conexao com o banco
    include "../conexao.php";

    // verificação para ver se já existe
    $sql_exists = mysqli_query($con, "SELECT nome FROM disciplina WHERE nome = '$nome'");
    if(mysqli_fetch_array($sql_exists)){
        die("<h2>Esta disciplina já está cadastrada! clique <a href='../forms/incluirDisciplina.html'>aqui</a></h2>");
    }else{
        // inserir no banco
        $sql = "INSERT INTO disciplina (nome) VALUES ('$nome')";

        // enviar inserção para o banco
        mysqli_query($con, $sql) or die("erro ao inserir disciplina ". mysqli_error($con));

        // redirecionar para listagem de disciplinas
        header('location: ../listagens/listaDisciplinas.php?status=success');
    }

    