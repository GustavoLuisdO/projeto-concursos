<?php
    include "../conexao.php";

    $sql_disciplinas = "SELECT id, nome FROM disciplina";

    $registros_disciplinas = mysqli_query($con, $sql_disciplinas) or die("ERRO NA BUSCA DOS FILTROS!". mysqli_error($con));

    $disciplinas = mysqli_num_rows($registros_disciplinas);   

    /*
    $sql_disciplinas1 = "SELECT DISTINCT q.*, q.`id_disciplina_1`, d.*, d.`nome` FROM `questao` as q 
                        JOIN `disciplina` as d on q.`id_disciplina_1` = d.`id`";
    $sql_disciplinas2 = "SELECT DISTINCT q.*, q.`id_disciplina_2`, d.*, d.`nome` FROM `questao` as q 
                        JOIN `disciplina` as d on q.`id_disciplina_2` = d.`id`";
    $sql_disciplinas3 = "SELECT DISTINCT q.*, q.`id_disciplina_3`, d.*, d.`nome` FROM `questao` as q 
                        JOIN `disciplina` as d on q.`id_disciplina_3` = d.`id`";
    $sql_disciplinas4 = "SELECT DISTINCT q.*, q.`id_disciplina_4`, d.*, d.`nome` FROM `questao` as q 
                        JOIN `disciplina` as d on q.`id_disciplina_4` = d.`id`";
    */

    /*
    $registros_disciplinas1 = mysqli_query($con, $sql_disciplinas1) or die("ERRO NA BUSCA DOS FILTROS!". mysqli_error($con));
    $registros_disciplinas2 = mysqli_query($con, $sql_disciplinas2) or die("ERRO NA BUSCA DOS FILTROS!". mysqli_error($con));
    $registros_disciplinas3 = mysqli_query($con, $sql_disciplinas3) or die("ERRO NA BUSCA DOS FILTROS!". mysqli_error($con));
    $registros_disciplinas4 = mysqli_query($con, $sql_disciplinas4) or die("ERRO NA BUSCA DOS FILTROS!". mysqli_error($con));
    */     

    /*
    $disciplinas1 = mysqli_num_rows($registros_disciplinas1);
    $disciplinas2 = mysqli_num_rows($registros_disciplinas2);
    $disciplinas3 = mysqli_num_rows($registros_disciplinas3);
    $disciplinas4 = mysqli_num_rows($registros_disciplinas4);
    */

    /*
    var_dump($disciplinas);

    var_dump($disciplinas1);
    var_dump($disciplinas2);
    var_dump($disciplinas3);
    var_dump($disciplinas4);

    
    $cont = 0;
    while($cont < $disciplinas){
        $dados2 = mysqli_fetch_array($registros_disciplinas);
        
        $id_disciplina = $dados["id"];
        $disciplina    = $dados["nome"];
        
        echo "$id_disciplina2 = $disciplina2";
        
        $cont ++;
    } */
    