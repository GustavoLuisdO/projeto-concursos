<?php

    //receber os dados do formulario
    $id     = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
    $nome   = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_STRIPPED);

     // validações
     if($nome == ""){
        die("NOME DA DISCIPLINA NÃO PODE SER NULO!");
    }

    // conexao com o banco
    include "../conexao.php";

    // verificação para ver se já existe
    $sql_exists = mysqli_query($con, "SELECT nome FROM disciplina WHERE nome = '$nome'");
    if(mysqli_fetch_array($sql_exists)){
        die("<h2>Esta disciplina já está cadastrada! clique <a href='../listagens/listaDisciplinas.php'>aqui</a></h2>");
    }else{
        // comando para alteração dos dados
        $sql = "UPDATE disciplina SET nome = '$nome' WHERE id = '$id'"; 
        //var_dump($sql);

        // enviar para o banco
        mysqli_query($con, $sql) or die("ERRO AO ALTERAR CURSO". mysqli_error($con));

        // redirecionar para listagem de disciplinas
        header('location: ../listagens/listaDisciplinas.php?status=success');
    }