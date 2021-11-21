<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link rel="shortcut icon" href="../../img/favicon-16x16.png" type="image/x-icon">


    <title>Listagem de Questões</title>
  </head>
  <body>

    <div class="container">

        <header>
            <div class="row p-3 text-center">

                <h3 class="m-2">Listagem de Questões</h3>
                <div class="ml-5">
                    <a href="../../../index.html">
                        <button class="btn btn-outline-dark m-2">Página Inicial</button>
                    </a>
                    <a href="../forms/incluirQuestao.php">
                        <button class="btn btn-outline-dark m-2">Cadastrar Questão</button>
                    </a>
                </div>
            </div>
        </header>

        <?php

            // conexao com o banco
            include "../conexao.php";

            // seleção de dados da tabela questao
            $sql = "SELECT * FROM questao";

            // enviar seleções para o banco
            $registros = mysqli_query($con, $sql) or
                die("ERRO NA LISTAGEM DE QUESTÕES". mysqli_errno($con));
            
            // armazer os registros
            $questoes = mysqli_num_rows($registros);

            // validar se existem registros cadastrados
            if($questoes == ""){
                die("<h3 class='m-4'>NÃO HÁ NENHUMA QUESTÃO CADASTRADA!</h3>");
            }
            
        ?>

        <!-- cabeçalho da tabela -->
        <section>
  
            <table class="table">

                <thead>
                    <tr>
                        <th scope="col"># Questão</th>
                        <th scope="col"># Curso</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Ano</th>
                        <th scope="col">Número</th>
                        <th scope="col"># Disciplina 1</th>
                        <th scope="col"># Disciplina 2</th>
                        <th scope="col"># Disciplina 3</th>
                        <th scope="col"># Disciplina 4</th>
                        <th scope="col"># Dificuldade</th>
                        <th scope="col">Enunciado</th>
                        <th scope="col">Tipo Questão</th>
                        <th scope="col">Resposta Dissertativa</th>
                        <th scope="col">Resposta Alt A</th>
                        <th scope="col">Resposta Alt B</th>
                        <th scope="col">Resposta Alt C</th>
                        <th scope="col">Resposta Alt D</th>
                        <th scope="col">Resposta Alt E</th>
                        <th scope="col">Alternativa</th>
                    </tr>
                </thead>

                <?php

                    // listagem através de um loop
                    $cont = 0;

                    // loop
                    while($cont < $questoes){

                        // array com base em $registros
                        $dados = mysqli_fetch_array($registros);
                        

                        // colocar os dados em variaveis 
                        $id_questao             = $dados["id"];
                        $id_curso               = $dados["id_curso"];
                        $descricao              = $dados["descricao"];
                        $ano                    = $dados["ano"];
                        $numero                 = $dados["numero"];
                        $id_disciplina_1        = $dados["id_disciplina_1"];
                        $id_disciplina_2        = $dados["id_disciplina_2"];
                        $id_disciplina_3        = $dados["id_disciplina_3"];
                        $id_disciplina_4        = $dados["id_disciplina_4"];
                        $id_dificuldade         = $dados["id_dificuldade"];
                        $enunciado              = $dados["enunciado"];
                        $tipo_questao           = $dados["tipo_questao"];
                        $resposta_dissertativa  = $dados["resposta_dissertativa"];
                        $resposta_alt_a         = $dados["resposta_alt_a"];
                        $resposta_alt_b         = $dados["resposta_alt_b"];
                        $resposta_alt_c         = $dados["resposta_alt_c"];
                        $resposta_alt_d         = $dados["resposta_alt_d"];
                        $resposta_alt_e         = $dados["resposta_alt_e"];
                        $alternativa            = $dados["alternativa_correta"];
                    
                        
                        // corpo da tabela
                        echo "<tbody>";
                        echo "  <tr>";

                        echo "      <th scope='row'>$id_questao</th>";
                        echo "      <td>$id_curso</td>";
                        echo "      <td>$descricao</td>";
                        echo "      <td>$ano</td>";
                        echo "      <td>$numero</td>";
                        echo "      <th>$id_disciplina_1</th>";
                        echo "      <th>$id_disciplina_2</th>";
                        echo "      <th>$id_disciplina_3</th>";
                        echo "      <th>$id_disciplina_4</th>";
                        echo "      <td>$id_dificuldade</td>";
                        echo "      <th>$enunciado</th>";
                        echo "      <td>$tipo_questao</td>";
                        echo "      <td>$resposta_dissertativa</td>";
                        echo "      <td>$resposta_alt_a</td>";
                        echo "      <td>$resposta_alt_b</td>";
                        echo "      <td>$resposta_alt_c</td>";
                        echo "      <td>$resposta_alt_d</td>";
                        echo "      <td>$resposta_alt_e</td>";
                        echo "      <td>$alternativa</td>";

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