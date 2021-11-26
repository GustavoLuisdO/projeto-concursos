<?php
    //include "../conexao.php";

    $sql_disciplinas = "SELECT id, nome FROM disciplina ORDER BY nome ASC";

    $registros_disciplinas = mysqli_query($con, $sql_disciplinas) or die("ERRO NA BUSCA DOS FILTROS!". mysqli_error($con));

    $disciplinas = mysqli_num_rows($registros_disciplinas);
    
    
    // nome das disciplinas para listagem
    $sql_disciplina_1 = "SELECT q.id_disciplina_1, d.nome FROM questao q 
        JOIN disciplina d ON q.id_disciplina_1 = d.id WHERE d.id = '$id_disciplina_1'";
    $sql_disciplina_2 = "SELECT q.id_disciplina_2, d.nome FROM questao q 
        JOIN disciplina d ON q.id_disciplina_2 = d.id WHERE d.id = '$id_disciplina_2'";
    $sql_disciplina_3 = "SELECT q.id_disciplina_3, d.nome FROM questao q 
        JOIN disciplina d ON q.id_disciplina_3 = d.id WHERE d.id = '$id_disciplina_3'";
    $sql_disciplina_4 = "SELECT q.id_disciplina_4, d.nome FROM questao q 
        JOIN disciplina d ON q.id_disciplina_4 = d.id WHERE d.id = '$id_disciplina_4'";

    $registros_disciplinas_1 = mysqli_query($con, $sql_disciplina_1) or die("ERRO NA BUSCA DOS FILTROS!". mysqli_error($con));
    $registros_disciplinas_2 = mysqli_query($con, $sql_disciplina_2) or die("ERRO NA BUSCA DOS FILTROS!". mysqli_error($con));
    $registros_disciplinas_3 = mysqli_query($con, $sql_disciplina_3) or die("ERRO NA BUSCA DOS FILTROS!". mysqli_error($con));
    $registros_disciplinas_4 = mysqli_query($con, $sql_disciplina_4) or die("ERRO NA BUSCA DOS FILTROS!". mysqli_error($con));

    $disciplinas1 = mysqli_num_rows($registros_disciplinas_1);
    $disciplinas2 = mysqli_num_rows($registros_disciplinas_2);
    $disciplinas3 = mysqli_num_rows($registros_disciplinas_3);
    $disciplinas4 = mysqli_num_rows($registros_disciplinas_4);

    /*
    $cont = 0;
    while($cont < $disciplinas){
        $dados2 = mysqli_fetch_array($registros_disciplinas);
        
        $id_disciplina = $dados["id"];
        $disciplina    = $dados["nome"];
        
        echo "$id_disciplina2 = $disciplina2";
        
        $cont ++;
    } */
    