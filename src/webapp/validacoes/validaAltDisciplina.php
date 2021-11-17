<?php

    //receber os dados do formulario
    $id     = $_POST["id"];
    $nome   = $_POST["nome"];

     // validações
     if($nome == ""){
        die("NOME DA DISCIPLINA NÃO PODE SER NULO!");
    }

    // conexao com o banco
    include "../conexao.php";

    // comando para alteração dos dados
    $sql = "UPDATE disciplina SET nome = '$nome' WHERE id = '$id'"; 
    //var_dump($sql);

    // enviar para o banco
    mysqli_query($con, $sql) or die("ERRO AO ALTERAR CURSO". mysqli_error($con));

    // redirecionar para listagem de disciplinas
    header('location: ../listagens/listaDisciplinas.php');