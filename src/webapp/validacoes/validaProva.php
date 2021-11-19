<?php
    //receber os dados do formulário
    
    //tabela prova 
    $id_prova           = $_POST["id_prova"];
    $id_curso           = $_POST["id_curso"];
    $id_disciplina      = $_POST["id_disciplina"];
    $descricao          = $_POST["descricao"];
    $ano                = $_POST["ano"];

    // tabela questao dissertativa
    $numero_dissertativa    = $_POST["numero_dissertativa"];
    $questao_dissertativa   = $_POST["questao_dissertativa"];   
    $resposta_dissertativa  = $_POST["resposta_dissertativa"];

    // tabela questao escolha
    $id_escolha         = $_POST["id_escolha"];
    $numero_escolha     = $_POST["numero_escolha"];
    $questao_escolha    = $_POST["questao_escolha"];

    // tabela questao escolha item
    $letra_alternativa      = $_POST["letra_numero"];
    $resposta_escolha_item  = $_POST["resposta_escolha_item"];

    
    // validações dos campos
    if($id_curso == ""){
        die("SELECIONE ALGUM CURSO!");
    }
    if($id_disciplina == ""){
        die("SELECIONE ALGUMA DISCIPLINA!");
    }
    if($descricao == ""){
        die("ESCREVA UMA DESCRIÇÃO!");
    }
    if($ano == ""){
        die("INFORME O ANO DA PROVA!");
    }

    if($numero_dissertativa == ""){
        die("INFORME O NÚMERO DA QUESTÃO DISSERTATIVA!");
    }
    if($questao_dissertativa == ""){
        die("ESCREVA A QUESTÃO DISSERTATIVA!");
    }
    if($resposta_dissertativa == ""){
        die("ESCREVA A RESPOSTA DA QUESTÃO DISSERTATIVA!");
    }

    if($numero_escolha == ""){
        die("INFORME O NÚMERO DA QUESTÃO DE MÚLTIPLA ESCOLHA!");
    }
    if($questao_escolha == ""){
        die("ESCREVA A QUESTÃO DE MÚLTIPLA ESCOLHA!");
    }

    if(isset($_POST["letra_numero"])){
        $letra_alternativa = $_POST["letra_numero"];
    }
    if($resposta_escolha_item == ""){
        die("ESCREVA A RESPOSTA DA QUESTÃO DE MÚLTIPLA ESCOLHA!");
    }

    // conexao com o banco
    include "../conexao.php";

    // inserir nas tabelas prova, questao_dissertativa, questao_escolha, questao_escolha_item

    // inserir na tabela prova
    $sql_prova = "INSERT INTO prova (id_curso, id_disciplina, descricao, ano) 
    VALUES ('$id_curso','$id_disciplina','$descricao','$ano')";

    // enviar para o banco
    mysqli_query($con, $sql_prova) or 
        die("erro na inserção de dados para a tabela prova ". mysqli_error($con));

    // inserir na tabela questao dissertativa
    $sql_dissertativa = "INSERT INTO questao_dissertativa (id_prova, numero_dissertativa, questao_dissertativa, resposta_dissertativa) 
    VALUES ('$id_prova','$numero_dissertativa','$questao_dissertativa','$resposta_dissertativa')";
    var_dump($sql_dissertativa);
    // enviar para o banco
    mysqli_query($con, $sql_dissertativa) or 
        die("erro na inserção de dados para a tabela questão dissertativa ". mysqli_error($con));

    // inserir na tabela questao escolha
    $sql_escolha = "INSERT INTO questao_escolha (id_prova, numero_escolha, questao_escolha) 
    VALUES ('$id_prova','$numero_escolha','$questao_escolha',)";

    // enviar para o banco
    mysqli_query($con, $sql_escolha) or 
        die("erro na inserção de dados para a tabela questão escolha ". mysqli_error($con));

    // inserir na tabela questao escolha item
    $sql_escolha_item = "INSERT INTO questao_escolha_item (id_questao_escolha, letra_numero, resposta_escolha_item)
    VALUES ('$id_escolha','$letra_alternativa','$resposta_escolha_item')";

    // enviar para o banco
    mysqli_query($con, $sql_escolha_item) or 
        die("erro na inserção de dados para a tabela questão escolha item ". mysqli_error($con));
    
    // redirecionar para página de listagem
    header('location: ../listagens/listaProvas.php');


?>