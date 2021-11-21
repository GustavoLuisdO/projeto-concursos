<?php

    include "conexao.php";

    /*
    $sql_cursos = "SELECT q.*, q.`id_curso` as questao, c.*, c.`nome` as curso FROM `questao` AS q  INNER JOIN `curso` AS c ON q.`id_curso` = c.`id`";

    $registros_cursos = mysqli_query($con, $sql_cursos) or die("ERRO NA BUSCA DOS FILTROS!". mysqli_error($con));

    $cursos = mysqli_num_rows($registros_cursos);
    
    var_dump($cursos);

    $cont = 0;
    while($cont < $cursos){

        $dados_cursos = mysqli_fetch_array($registros_cursos);
          
        $id_curso   = $dados_cursos["id_curso"];
        $nome_curso = $dados_cursos["nome"];

        echo "Id Curso = $id_curso <br>";
        echo "Nome do Curso = $nome_curso <br> <hr>";

        $cont ++;
    } */


    /*
    $sql_anos = "SELECT DISTINCT ano FROM questao";

    $registros_anos = mysqli_query($con, $sql_anos) or die("ERRO NA BUSCA DOS FILTROS!". mysqli_error($con));

    $anos = mysqli_num_rows($registros_anos);
    var_dump($anos);

    $cont = 0;
    while($cont < $anos){

        $dados = mysqli_fetch_array($registros_anos);
          
        $ano = $dados["ano"];

        echo "Ano = $ano <br><hr>";

        $cont ++;
    } */

    /*
    $sql_dificuldades = "SELECT DISTINCT q.`id_dificuldade`, d.`descricao_dif` FROM `questao` as q 
	                    JOIN `dificuldade` as d ON q.`id_dificuldade` = d.`id`;";

    $registros_dif = mysqli_query($con, $sql_dificuldades) or die("ERRO NA BUSCA DOS FILTROS!". mysqli_error($con));

    $dificuldades = mysqli_num_rows($registros_dif);
    var_dump($dificuldades);

    $cont = 0;
    while($cont < $dificuldades){

        $dados = mysqli_fetch_array($registros_dif);
          
        $id_dificuladade = $dados["id_dificuldade"];
        $descricao_dif        = $dados["descricao_dif"];

        echo "ID Dificuldade = $id_dificuladade <br>";
        echo "Descricao = $descricao_dif <br><hr>";

        $cont ++;
    } */

    /*
    $sql_tipo_multiplas     = "SELECT tipo_questao, resposta_alt_a, resposta_alt_b, resposta_alt_c, resposta_alt_d, resposta_alt_e, alternativa_correta FROM questao WHERE tipo_questao = 'M'";

    $sql_tipo_dissertativa  = "SELECT tipo_questao, resposta_dissertativa FROM questao WHERE tipo_questao = 'D'";

    $registros_tipo_M = mysqli_query($con, $sql_tipo_multiplas) or die("ERRO NA BUSCA DOS FILTROS!". mysqli_error($con));

    $registros_tipo_D = mysqli_query($con, $sql_tipo_dissertativa) or die("ERRO NA BUSCA DOS FILTROS!". mysqli_error($con));

    $tipo_M = mysqli_num_rows($registros_tipo_M);
    $tipo_D = mysqli_num_rows($registros_tipo_D);

    var_dump($tipo_M);
    var_dump($tipo_D);

    $cont_M = 0;
    while($cont_M < $tipo_M){

        $dados = mysqli_fetch_array($registros_tipo_M);
          
        $tipo       = $dados["tipo_questao"];
        $alt_a      = $dados["resposta_alt_a"];
        $alt_b      = $dados["resposta_alt_b"];
        $alt_c      = $dados["resposta_alt_c"];
        $alt_d      = $dados["resposta_alt_d"];
        $alt_e      = $dados["resposta_alt_e"];
        $correta    = $dados["alternativa_correta"];

        echo "Tipo  = $tipo <br>";
        echo "Alt A = $alt_a <br>";
        echo "Alt B = $alt_b <br>";
        echo "Alt C = $alt_c <br>";
        echo "Alt D = $alt_d <br>";
        echo "Alt E = $alt_e <br>";
        echo "Correta = $correta <br> <hr>";

        $cont_M ++;
    }

    $cont_D = 0;
    while($cont_D < $tipo_D){

        $dados = mysqli_fetch_array($registros_tipo_D);
          
        $tipo       = $dados["tipo_questao"];
        $resposta   = $dados["resposta_dissertativa"];

        echo "Tipo = $tipo <br>";
        echo "Resposta = $resposta <br> <hr>";

        $cont_D ++;
    } */
?>