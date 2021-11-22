<?php

    $sql_anos = "SELECT DISTINCT ano FROM questao";

    $registros_anos = mysqli_query($con, $sql_anos) or die("ERRO NA BUSCA DOS FILTROS!". mysqli_error($con));

    $anos = mysqli_num_rows($registros_anos);
    
    //var_dump($anos);