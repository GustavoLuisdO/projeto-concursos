<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link rel="shortcut icon" href="../../img/favicon-16x16.png" type="image/x-icon">


    <title>Listagem de Provas</title>
  </head>
  <body>

    <div class="container">

        <header>
            <div class="row p-3 text-center">

                <h3 class="m-2">Listagem de Provas</h3>
                <div class="ml-5">
                    <a href="../../../index.html">
                        <button class="btn btn-outline-dark m-2">Página Inicial</button>
                    </a>
                    <a href="../forms/incluirProva.php">
                        <button class="btn btn-outline-dark m-2">Cadastrar Prova</button>
                    </a>
                </div>
            </div>
        </header>

        <?php

            // conexao com o banco
            include "../conexao.php";

            // seleção de dados das tabelas prova, questao_dissertativa, questao_escolha, questao_escolha_item
            $sql_prova          = "SELECT * FROM prova";
            $sql_dissertativa     = "SELECT * FROM questao_dissertativa";
            $sql_escolha        = "SELECT * FROM questao_escolha";
            $sql_escolha_item   = "SELECT * FROM questao_escolha_item";

            // enviar seleções para o banco
            // tabela prova
            $registros_prova = mysqli_query($con, $sql_prova) or
                die("ERRO NA LISTAGEM DE PROVAS". mysqli_errno($con));
            // tabela questão dissertativa
            $registros_dissertativa = mysqli_query($con, $sql_dissertativa) or
                die("ERRO NA LISTAGEM DE QUESTÕES DISSERTATIVAS". mysqli_errno($con));
            // tabela questão escolha
            $registros_escolha = mysqli_query($con, $sql_escolha) or
                die("ERRO NA LISTAGEM DE QUESTÕES MÚLTIPLA ESCOLHA". mysqli_errno($con));
            // tabela questão escolha item
            $registros_escolha_item = mysqli_query($con, $sql_escolha_item) or
                die("ERRO NA LISTAGEM DE QUESTÕES MÚLTIPLA ESCOLHA (item)". mysqli_errno($con));
            
            // armazer os registros
            $provas                  = mysqli_num_rows($registros_prova);
            $questoes_dissertativas  = mysqli_num_rows($registros_dissertativa);
            $questoes_escolhas       = mysqli_num_rows($registros_escolha);
            $questoes_escolha_itens  = mysqli_num_rows($registros_escolha_item);

            // validar se existem registros cadastrados
            if($provas == ""){
                die("<h3 class='m-4'>NÃO HÁ NENHUMA PROVA CADASTRADA!</h3>");
            }
            if($questoes_dissertativas == ""){
                die("<h3 class='m-4'>NÃO HÁ NENHUMA QUESTÃO DISSERTATIVA CADASTRADA!</h3>");
            }
            if($questoes_escolhas == ""){
                die("<h3 class='m-4'>NÃO HÁ NENHUMA QUESTÃO DE MÚLTIPLA ESCOLHA CADASTRADA!</h3>");
            }
            if($questoes_escolha_itens == ""){
                die("<h3 class='m-4'>NÃO HÁ NENHUMA QUESTÃO DE MÚLTIPLA ESCOLHA (item) CADASTRADA!</h3>");
            }   
        ?>

        <!-- cabeçalho da tabela -->
        <section>
  
            <table class="table">

                <thead>
                    <tr>
                        <th scope="col"># Prova</th>
                        <th scope="col"># Curso</th>
                        <th scope="col"># Disciplina</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Ano</th>

                        <th scope="col"># Dissertativa</th>
                        <th scope="col"># Prova</th>
                        <th scope="col">Número (D)</th>
                        <th scope="col">Questão (D)</th>
                        <th scope="col">Resposta (D)</th>

                        <th scope="col"># Escolha</th>
                        <th scope="col"># Prova</th>
                        <th scope="col">Número (M-E)</th>
                        <th scope="col">Questão (M-E)</th>

                        <th scope="col"># Escolha Item</th>
                        <th scope="col"># Escolha</th>
                        <th scope="col">Letra</th>
                        <th scope="col">Resposta (M-E)</th>
                    </tr>
                </thead>

                <?php

                    // listagem através de um loop
                    $cont = 0;

                    // loop
                    while($cont < $provas && $cont < $questoes_dissertativas && $cont < $questoes_escolhas && $cont < $questoes_escolha_itens){

                        // array com base em $registros_prova
                        $dados_prova = mysqli_fetch_array($registros_prova);
                        // array com base em $registros_dissertativa
                        $dados_dissertativa = mysqli_fetch_array($registros_dissertativa);
                        // array com base em $registros_escolha
                        $dados_escolha = mysqli_fetch_array($registros_escolha);
                        // array com base em $registros_escolha_item
                        $dados_escolha_item = mysqli_fetch_array($registros_escolha_item);

                        // colocar os dados em variaveis
                        //tabela prova 
                        $id_prova           = $dados_prova["id_prova"];
                        $id_curso           = $dados_prova["id_curso"];
                        $id_disciplina      = $dados_prova["id_disciplina"];
                        $descricao          = $dados_prova["descricao"];
                        $ano                = $dados_prova["ano"];

                        // tabela questao dissertativa
                        $id_dissertativa        = $dados_dissertativa["id_dissertativa"];
                        $id_prova_dissertativa  = $dados_dissertativa["id_prova"];
                        $numero_dissertativa    = $dados_dissertativa["numero_dissertativa"];
                        $questao_dissertativa   = $dados_dissertativa["questao_dissertativa"];   
                        $resposta_dissertativa  = $dados_dissertativa["resposta_dissertativa"];

                        // tabela questao escolha
                        $id_escolha         = $dados_escolha["id_escolha"];
                        $id_prova_escolha   = $dados_escolha["id_prova"];
                        $numero_escolha     = $dados_escolha["numero_escolha"];
                        $questao_escolha    = $dados_escolha["questao_escolha"];

                        // tabela questao escolha item
                        $id_escolha_item        = $dados_escolha_item["id_escolha_item"];
                        $id_questao_escolha     = $dados_escolha_item["id_questao_escolha"];
                        $letra_alternativa      = $dados_escolha_item["letra_numero"];
                        $resposta_escolha_item  = $dados_escolha_item["resposta_escolha_item"];
                    
                        
                        // corpo da tabela
                        echo "<tbody>";
                        echo "  <tr>";

                        echo "      <th scope='row'>$id_prova</th>";
                        echo "      <td>$id_curso</td>";
                        echo "      <td>$id_disciplina</td>";
                        echo "      <td>$descricao</td>";
                        echo "      <td>$ano</td>";

                        echo "      <th>$id_dissertativa</th>";
                        echo "      <td>$id_prova_dissertativa</td>";
                        echo "      <td>$numero_dissertativa</td>";
                        echo "      <td>$questao_dissertativa</td>";
                        echo "      <td>$resposta_dissertativa</td>";

                        echo "      <th>$id_escolha</th>";
                        echo "      <td>$id_prova_escolha</td>";
                        echo "      <td>$numero_escolha</td>";
                        echo "      <td>$questao_escolha</td>";

                        echo "      <th>$id_escolha_item</th>";
                        echo "      <td>$id_questao_escolha</td>";
                        echo "      <td>$letra_alternativa</td>";
                        echo "      <td>$resposta_escolha_item</td>";

                        echo "  </tr>";
                        echo "</tbody>";

                        $cont ++;
                    }
                ?>

            </table>

        </section>
        

    <!-- SCRIPT BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
  </body>
</html>