<?php

    //receber os dados do formulario
    $id                         = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
    $id_curso                   = filter_input(INPUT_POST, "id_curso", FILTER_SANITIZE_STRIPPED);
    $descricao                  = filter_input(INPUT_POST, "descricao", FILTER_SANITIZE_STRIPPED);
    $ano                        = filter_input(INPUT_POST, "ano", FILTER_VALIDATE_INT);
    $numero                     = filter_input(INPUT_POST, "numero", FILTER_VALIDATE_INT);
    $id_disciplina_1            = filter_input(INPUT_POST, "id_disciplina_1", FILTER_VALIDATE_INT);
    $id_disciplina_2            = filter_input(INPUT_POST, "id_disciplina_2", FILTER_VALIDATE_INT);
    $id_disciplina_3            = filter_input(INPUT_POST, "id_disciplina_3", FILTER_VALIDATE_INT);
    $id_disciplina_4            = filter_input(INPUT_POST, "id_disciplina_4", FILTER_VALIDATE_INT);
    $id_dificuldade             = filter_input(INPUT_POST, "id_dificuldade", FILTER_VALIDATE_INT);
    $enunciado                  = $_POST["enunciado"];
    $tipo_questao               = filter_input(INPUT_POST, "tipo_questao", FILTER_SANITIZE_STRIPPED);
    $resposta_dissertativa      = $_POST["resposta_dissertativa"];
    $resposta_alt_a             = $_POST["resposta_alt_a"];
    $resposta_alt_b             = $_POST["resposta_alt_b"];
    $resposta_alt_c             = $_POST["resposta_alt_c"];
    $resposta_alt_d             = $_POST["resposta_alt_d"];
    $resposta_alt_e             = $_POST["resposta_alt_e"];
    $alternativa_correta        = filter_input(INPUT_POST, "alternativa_correta", FILTER_SANITIZE_STRIPPED);
    

    // validações dos campos
    if($id_curso == "" || $id_curso === false){
        die("SELECIONA UM CURSO!");
    }
    if($descricao == "" || $descricao === false){
        die("INFORME A DESCRIÇÃO DA QUESTÃO!");
    }
    if($ano == "" || $ano === false){
        die("INFORME O ANO DA QUESTÃO!");
    }
    if($id_disciplina_1 == "" || $id_disciplina_1 === false){
        die("INFORME UMA DISCIPLINA PARA A QUESTÃO!");
    }
    if($id_disciplina_2 == ""){
        $id_disciplina_2 = 0;
    }
    if($id_disciplina_3 == ""){
        $id_disciplina_3 = 0;
    }
    if($id_disciplina_4 == ""){
        $id_disciplina_4 = 0;
    }
    if($id_dificuldade == ""){
        die("INFORME A DIFICULDADE DA QUESTÃO!");
    }

    if($numero == "" || $numero === false){
        die("INFORME O NÚMERO DA QUESTÃO!");
    }
    if($enunciado == "" || $enunciado === false){
        die("ESCREVA O ENUNCIADO DA QUESTÃO!");
    }

    if(isset($_POST["tipo_questao"])){
        $tipo_questao = $_POST["tipo_questao"];
    }

    if($_POST["tipo_questao"] === "M"){
        if($_POST["resposta_alt_a"] === "" || $_POST["resposta_alt_b"] === "" || $_POST["resposta_alt_c"] === "" || $_POST["resposta_alt_d"] === "" || $_POST["resposta_alt_e"] === "" || $_POST["alternativa_correta"] === ""){
            die("ESCREVA AS RESPOSTAS E ESCOLHA ALTERNATIVA CORRETA DA QUESTÃO!");
        }
    }
    if($_POST["tipo_questao"] === "D"){
        if($_POST["resposta_dissertativa"] === ""){
            die("ESCREVA A RESPOSTA DA QUESTÃO!");
        }
    }

    //var_dump($_POST["tipo_questao"]);

    
    // conexao com o banco
    include "../conexao.php";

    // comando para alteração dos dados
    $sql = "UPDATE questao SET  id_curso = '$id_curso', 
                                descricao = '$descricao',
                                ano = '$ano',
                                numero = '$numero',
                                id_disciplina_1 = '$id_disciplina_1',
                                id_disciplina_2 = '$id_disciplina_2',
                                id_disciplina_3 = '$id_disciplina_3',
                                id_disciplina_4 = '$id_disciplina_4',
                                id_dificuldade = '$id_dificuldade',
                                enunciado = '$enunciado',
                                tipo_questao = '$tipo_questao',
                                resposta_dissertativa = '$resposta_dissertativa',
                                resposta_alt_a = '$resposta_alt_a',
                                resposta_alt_b = '$resposta_alt_b',
                                resposta_alt_c = '$resposta_alt_c',
                                resposta_alt_d = '$resposta_alt_d',
                                resposta_alt_e = '$resposta_alt_e',
                                alternativa_correta = '$alternativa_correta'
    WHERE id = '$id'";
    //var_dump($sql);

    // enviar para o banco
    mysqli_query($con, $sql) or die("ERRO AO ALTERAR QUESTÃO". mysqli_error($con));

    // redirecionar para listagem de questoes
    header('location: ../listagens/listaQuestoes.php?status=success');