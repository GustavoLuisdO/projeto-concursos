<?php
    //include "../conexao.php";

    $sql_cursos = "SELECT DISTINCT q.`id_curso` as questao, c.*,c.`nome` as curso FROM `questao` AS q  INNER JOIN `curso` AS c ON q.`id_curso` = c.`id`";

    $registros_cursos = mysqli_query($con, $sql_cursos) or die("ERRO NA BUSCA DOS FILTROS!". mysqli_error($con));

    $cursos = mysqli_num_rows($registros_cursos);
    
    //var_dump($cursos);