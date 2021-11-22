<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link rel="stylesheet" href="../../css/filtros.css">

    <link rel="shortcut icon" href="../../img/favicon-16x16.png" type="image/x-icon">


    <title>Listagem de Questões com Filtros</title>
  </head>
  <body>

    <div class="container">

        <?php
            // conexao com o banco
            include "../conexao.php";
        ?>

        <header>

            <form name="formListaQuestao" method="post" action="validaFiltros.php">

                <div class="row text-center">   
                    <!-- Página Inicial -->
                    <div class="col-4">
                        <a href="../../../index.html">
                            <button class="btn btn-outline-dark" type="button">Página Inicial</button>
                        </a>
                    </div><!-- Página Inicial -->
                    
                    <!-- Titulo -->
                    <div class="col-4">
                        <h2 class="display-4">Filtros</h2>
                    </div><!-- Titulo -->

                    <!-- Cadastrar Questão -->
                    <div class="col-4">
                        <a href="../forms/incluirQuestao.php">
                            <button class="btn btn-outline-dark" type="button">Cadastrar Questão</button>
                        </a>
                    </div><!-- Cadastrar Questão -->
                </div>

                <div class="row text-center mt-4">
                    <!-- id curso -->
                    <div class="col-4">
                        <div class="form-group">
                            <select class="form-control" name="id_curso" id="id_curso">
                                <option value="">Selecione o Curso</option>
                                <?php
                                    include "../consultas/cursos.php";
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
                    </div><!-- /id curso -->

                    <!-- disciplinas -->
                    <div class="col-4">
                        <div class="form-group">
                            <select class="form-control" name="id_disciplina_1" id="id_disciplina_1">
                                <option value="">Selecione a Disciplina</option>
                                <?php
                                    include "../consultas/disciplinas.php";
                                    
                                    $cont = 0;
                                    while($cont < $disciplinas){

                                        $dados = mysqli_fetch_array($registros_disciplinas);

                                        $id_disciplina = $dados["id"];
                                        $disciplina    = $dados["nome"];

                                        echo "<option value='$id_disciplina'>$disciplina</option>";

                                        $cont ++;
                                    }
                                ?>
                            </select>
                        </div>
                    </div><!-- disciplinas -->

                    <!-- id curso -->
                    <div class="col-4">
                        <div class="form-group">
                            <select class="form-control" name="ano" id="ano">
                                <option value="">Selecione o Ano</option>
                                <?php
                                    include "../consultas/anos.php";
                                    $cont = 0;
                                    while($cont < $anos){
                                
                                        // armazernar cursos em array
                                        $dados = mysqli_fetch_array($registros_anos);
                                        // dados
                                        $ano = $dados["ano"];
                                        
                                        // mostrar as opções
                                        echo "<option value='$ano'>$ano</option>";
                                        
                                        $cont ++;
                                    }
                                ?>
                            </select>
                        </div>
                    </div><!-- /id curso -->
                </div>

                <div class="row text-center mt-4">
                    <!-- tipo questao -->
                    <div class="col-6">
                        <div class="row form-group form-check">
                            <h3>Tipo de Questão</h3>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="tipo_questao" value="M">
                                <label class="form-check-label mr-2" for="tipo_questao">Múltiplas Escolhas</label>

                                <input class="form-check-input ml-2" type="checkbox" name="tipo_questao" value="D">
                                <label class="form-check-label" for="tipo_questao">Dissertativa</label>
                            </div>
                        </div>
                    </div><!-- /tipo questao -->

                    <!-- grau de dificuldade -->
                    <div class="col-6">
                        <div class="row form-group form-check">
                            <h3>Grau de Dificuldade</h3>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="id_dificuldade" value="1">
                                <label class="form-check-label mr-2" for="id_dificuldade">Fácil</label>

                                <input class="form-check-input ml-2" type="checkbox" name="id_dificuldade" value="2">
                                <label class="form-check-label mr-2" for="id_dificuldade">Mediana</label>

                                <input class="form-check-input ml-2" type="checkbox" name="id_dificuldade" value="3">
                                <label class="form-check-label" for="id_dificuldade">Dificil</label>
                            </div>
                        </div>
                    </div><!-- /grau de dificuldade -->           
                </div>

            </form>      
        </header>

        <main>

            <div>

            </div>

        </main>
    </div>

    <!-- SCRIPT BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
  </body>
</html>