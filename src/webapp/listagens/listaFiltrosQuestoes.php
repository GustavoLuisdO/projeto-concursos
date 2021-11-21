<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link rel="shortcut icon" href="../../img/favicon-16x16.png" type="image/x-icon">


    <title>Listagem de Questões com Filtros</title>
  </head>
  <body>

    <div class="container">

        <?php

            // conexao com o banco
            include "../conexao.php";

            // sql para trazer os cursos da tabela de questao
            $sql_cursos = "SELECT DISTINCT q.*, q.`id_curso` as questao, c.*, c.`nome` as curso FROM `questao` AS q  INNER JOIN `curso` AS c ON q.`id_curso` = c.`id`";

            // trazer as seleções do banco
            $registros_cursos = mysqli_query($con, $sql_cursos) or die("ERRO NA BUSCA DOS FILTROS!". mysqli_error($con));
            
            // registros encontrados
            $cursos = mysqli_num_rows($registros_cursos);
        ?>

        <header>

            <form name="formListaQuestao" method="post" action="">

                <div class="row text-center">
                    <div class="col-5">

                        <select name="id_curso" id="id_curso">
                            <option value="">Selecione o Curso</option>

                            <?php

                                $cont_cursos = 0;
                                while($cont_cursos < $cursos){
                                    
                                    // armazernar cursos em array
                                    $dados_cursos = mysqli_fetch_array($registros_cursos);

                                    // dados
                                    $id_curso   = $dados_cursos["id_curso"];
                                    $nome_curso = $dados_cursos["nome"];

                                    // mostrar as opções
                                    echo "<option value='$id_curso'>$nome_curso</option>";

                                    $cont_cursos ++;
                                }
                                

                            ?>

                        </select>

                    </div>
                </div>

            </form>
            
            
        </header>


    </div>

    <!-- SCRIPT BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
  </body>
</html>