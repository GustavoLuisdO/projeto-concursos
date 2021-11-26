<?php
    //include "../conexao.php";

    $sql_cursos = "SELECT id, nome FROM curso ORDER BY nome ASC";

    $registros_cursos = mysqli_query($con, $sql_cursos) or die("ERRO NA BUSCA DOS FILTROS!". mysqli_error($con));

    $cursos = mysqli_num_rows($registros_cursos);

    $sql_nome_cursos = "SELECT q.id_curso, c.nome FROM questao q 
                JOIN curso c ON q.id_curso = c.id WHERE c.id = '$id_curso'";
    //var_dump($sql_nome_cursos);

    $registros_nome_cursos = mysqli_query($con, $sql_nome_cursos) or die("ERRO NA BUSCA DOS FILTROS!". mysqli_error($con));

    $nome_cursos = mysqli_num_rows($registros_nome_cursos);