<?php

    //receber o id do formulario
    $id = $_POST["id"];

    // conexao com o banco
    include "../conexao.php";

    // comando para alteração dos dados
    $sql = "DELETE FROM disciplina WHERE id = '$id'"; 
    //var_dump($sql);

    // enviar para o banco
    mysqli_query($con, $sql) or die("ERRO AO EXCLUIR DISCIPLINA ". mysqli_error($con));

    // redirecionar para listagem de disciplinas
    header('location: ../listagens/listaDisciplinas.php?status=success');