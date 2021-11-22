<?php
    $sql_dificuldades = "SELECT DISTINCT q.`id_dificuldade`, d.`descricao_dif` FROM `questao` as q 
    JOIN `dificuldade` as d ON q.`id_dificuldade` = d.`id`;";

    $registros_dif = mysqli_query($con, $sql_dificuldades) or die("ERRO NA BUSCA DOS FILTROS!". mysqli_error($con));

    $dificuldades = mysqli_num_rows($registros_dif);
    var_dump($dificuldades);