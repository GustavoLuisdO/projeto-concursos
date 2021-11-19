<?php
    //receber os dados do formulário
    
    //tabela questao
    $id_curso                   = $_POST["id_curso"];
    $descricao                  = $_POST["descricao"];
    $ano                        = $_POST["ano"];
    $numero                     = $_POST["numero"];
    $id_disciplina_1            = $_POST["id_disciplina_1"];
    $id_disciplina_2            = $_POST["id_disciplina_2"];
    $id_disciplina_3            = $_POST["id_disciplina_3"];
    $id_disciplina_4            = $_POST["id_disciplina_4"];
    $id_dificuldade             = $_POST["id_dificuldade"];
    $enunciado                  = $_POST["enunciado"];
    $tipo_questao               = $_POST["tipo_questao"];
    $resposta                   = $_POST["resposta"];
    $alternativa_correta        = $_POST["alternativa_correta"];
    

    // validações dos campos
    if($id_curso == ""){
        die("SELECIONA UM CURSO!");
    }
    if($descricao == ""){
        die("INFORME A DESCRIÇÃO DA QUESTÃO!");
    }
    if($ano == ""){
        die("INFORME O ANO DA QUESTÃO!");
    }
    if($id_disciplina_1 == ""){
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
    if(isset($_POST["tipo_questao"])){
        $tipo_questao = $_POST["tipo_questao"];
    }

    if($numero == ""){
        die("INFORME O NÚMERO DA QUESTÃO!");
    }
    if($enunciado == ""){
        die("ESCREVA O ENUNCIADO DA QUESTÃO!");
    }


    // conexao com o banco
    include "../conexao.php";

    // inserir na tabela questao
    $sql = "INSERT INTO questao (id_curso, descricao, ano, numero, id_disciplina_1, id_disciplina_2, id_disciplina_3, id_disciplina_4, id_dificuldade, enunciado, tipo_questao, resposta, alternativa_correta) 
            VALUES ('$id_curso', '$descricao', '$ano', '$numero', '$id_disciplina_1', '$id_disciplina_2', '$id_disciplina_3', '$id_disciplina_4', '$id_dificuldade', '$enunciado', '$tipo_questao', '$resposta', '$alternativa_correta')";

    // enviar para o banco
    mysqli_query($con, $sql) or 
        die("erro ao inserir questão ". mysqli_error($con));

    // redirecionar para página de listagem
    header('location: ../listagens/listaQuestoes.php');

?>