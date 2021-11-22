<?php 

    $sql_tipo_multiplas     = "SELECT tipo_questao, resposta_alt_a, resposta_alt_b, resposta_alt_c, resposta_alt_d, resposta_alt_e, alternativa_correta FROM questao WHERE tipo_questao = 'M'";

    $sql_tipo_dissertativa  = "SELECT tipo_questao, resposta_dissertativa FROM questao WHERE tipo_questao = 'D'";

    $registros_tipo_M = mysqli_query($con, $sql_tipo_multiplas) or die("ERRO NA BUSCA DOS FILTROS!". mysqli_error($con));

    $registros_tipo_D = mysqli_query($con, $sql_tipo_dissertativa) or die("ERRO NA BUSCA DOS FILTROS!". mysqli_error($con));

    $tipo_M = mysqli_num_rows($registros_tipo_M);
    $tipo_D = mysqli_num_rows($registros_tipo_D);

    //var_dump($tipo_M);
    //var_dump($tipo_D);
    /*
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