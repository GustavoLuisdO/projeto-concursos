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
    $enunciado                  = filter_input(INPUT_POST, "enunciado", FILTER_SANITIZE_STRIPPED);
    $tipo_questao               = filter_input(INPUT_POST, "tipo_questao", FILTER_SANITIZE_STRIPPED);
    $resposta_dissertativa      = filter_input(INPUT_POST, "resposta_dissertativa", FILTER_SANITIZE_STRIPPED);
    $resposta_alt_a             = filter_input(INPUT_POST, "resposta_alt_a", FILTER_SANITIZE_STRIPPED);
    $resposta_alt_b             = filter_input(INPUT_POST, "resposta_alt_b", FILTER_SANITIZE_STRIPPED);
    $resposta_alt_c             = filter_input(INPUT_POST, "resposta_alt_c", FILTER_SANITIZE_STRIPPED);
    $resposta_alt_d             = filter_input(INPUT_POST, "resposta_alt_d", FILTER_SANITIZE_STRIPPED);
    $resposta_alt_e             = filter_input(INPUT_POST, "resposta_alt_e", FILTER_SANITIZE_STRIPPED);
    $alternativa_correta        = filter_input(INPUT_POST, "alternativa_correta", FILTER_SANITIZE_STRIPPED);

    // conexao com o banco
    include "../conexao.php";

    // comando para alteração dos dados
    $sql = "DELETE FROM questao WHERE id = '$id'";
    //var_dump($sql);

    // enviar para o banco
    mysqli_query($con, $sql) or die("ERRO AO EXCLUIR QUESTÃO". mysqli_error($con));

    // redirecionar para listagem de questoes
    header('location: ../listagens/listaQuestoes.php?status=success');