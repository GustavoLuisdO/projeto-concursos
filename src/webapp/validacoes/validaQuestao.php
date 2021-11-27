<?php
    //receber os dados do formulário
    
    //tabela questao
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

     $tipo_questao = "M";
     if(isset($_POST["tipo_questao"]) || $tipo_questao === false){
         $tipo_questao = $_POST["tipo_questao"];
     }

     if($numero == "" || $numero === false){
         die("INFORME O NÚMERO DA QUESTÃO!");
     }
     if($enunciado == "" || $enunciado === false){
         die("ESCREVA O ENUNCIADO DA QUESTÃO!");
     }
     $enunciado = ltrim($enunciado);

     $resposta_dissertativa = ltrim($resposta_dissertativa);

     $resposta_alt_a = ltrim($resposta_alt_a);
     $resposta_alt_b = ltrim($resposta_alt_b);
     $resposta_alt_c = ltrim($resposta_alt_c);
     $resposta_alt_d = ltrim($resposta_alt_d);
     $resposta_alt_e = ltrim($resposta_alt_e);


     // conexao com o banco
     include "../conexao.php";

     // inserir na tabela questao
     $sql = "INSERT INTO questao (id_curso, descricao, ano, numero, id_disciplina_1, id_disciplina_2, id_disciplina_3, id_disciplina_4, id_dificuldade, enunciado, tipo_questao, resposta_dissertativa, resposta_alt_a, resposta_alt_b, resposta_alt_c, resposta_alt_d, resposta_alt_e, alternativa_correta) 
             VALUES ('$id_curso', '$descricao', '$ano', '$numero', '$id_disciplina_1', '$id_disciplina_2', '$id_disciplina_3', '$id_disciplina_4', '$id_dificuldade', '$enunciado', '$tipo_questao', '$resposta_dissertativa', '$resposta_alt_a', '$resposta_alt_b', '$resposta_alt_c', '$resposta_alt_d', '$resposta_alt_e', '$alternativa_correta')";

     // enviar para o banco
     mysqli_query($con, $sql) or 
         die("erro ao inserir questão ". mysqli_error($con));

     // redirecionar para página de listagem
     header('location: ../forms/incluirQuestao.php?status=success');
?>