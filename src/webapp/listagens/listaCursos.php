<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link rel="shortcut icon" href="../../img/favicon-16x16.png" type="image/x-icon">


    <title>Listagem de Cursos</title>
  </head>
  <body>

    <div class="container">

        <header>
            <div class="row p-3 text-center">

                <h3 class="m-2">Listagem de Cursos</h3>
                <div class="ml-5">
                    <a href="../../../index.html">
                        <button class="btn btn-outline-dark m-2">Página Inicial</button>
                    </a>
                    <a href="../forms/incluirCurso.html">
                        <button class="btn btn-outline-dark m-2">Cadastrar Curso</button>
                    </a>
                </div>
            </div>
        </header>

        <?php

            // conexao com o banco
            include "../conexao.php";

            // seleção de dados
            $sql = "SELECT * FROM curso";

            // enviar seleção para o banco
            $registros = mysqli_query($con, $sql) or die("ERRO NA LISTAGEM DE CURSOS ". mysqli_error($con));

            // armazenar registros
            $cursos = mysqli_num_rows($registros);

            // validar se existe algum curso cadastrado
            if($cursos == 0){
                die("<h3 class='m-4'>NÃO HÁ NENHUM CURSO CADASTRADO! <br> <a class='btn btn-outline-dark m-4' href='../forms/incluirCurso.html'>CADASTRAR</a></h3>");
            }
        ?>
        <!-- cabeçalho da tabela -->
        <section>

            <table class="table">

                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome do Curso</th>
                        <th scope="col">Duração do Curso (meses)</th>
                        <th scope="col" colspan="2">Ações</th>
                    </tr>
                </thead>

            <?php
                
                // contador para fazer a listagem atraves do loop
                $contador = 0;

                // loop para litar os cursos
                while($contador < $cursos)
                {

                    // criar um array com base em $registros
                    $dados = mysqli_fetch_array($registros);

                    // colocar os dados em variaveis
                    $id             = $dados["id"];
                    $nome           = $dados["nome"];
                    $duracao_meses  = $dados["duracao_meses"];

                    // corpo da tabela
                    echo "<tbody>";
                    echo "  <tr>";
                    echo "      <th scope='row'>$id</th>";
                    echo "      <td>$nome</td>";
                    echo "      <td>$duracao_meses</td>";

                    echo "      <td>
                                    <a href='../forms/altCurso.php?id=$id&nome=$nome' class='btn btn-outline-dark'>
                                        <i class='fas fa-edit fas-3x'></i>
                                    </a>
                                </td>";

                    echo "      <td>
                                    <a href='../forms/excCurso.php?id=$id&nome=$nome' class='btn btn-outline-dark'>
                                        <i class='fas fa-trash-alt fas-3x'></i>
                                    </a>
                                </td>";

                    echo "  </tr>";
                    echo "</tbody>";

                    $contador ++;
                }
            ?>

            </table>
        </section>

    </div>


    <!-- SCRIPT BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
  </body>
</html>