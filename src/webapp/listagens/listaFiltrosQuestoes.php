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

            <form name="formListaQuestao" method="post" action="listaFiltrosQuestoes.php">

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
                                    
                                    $cont = 0;
                                    while($cont < $cursos){

                                        $dados = mysqli_fetch_array($registros_cursos);

                                        $id_curso   = $dados["id"];
                                        $curso      = $dados["nome"];

                                        echo "<option value='$id_curso'>$curso</option>";

                                        $cont ++;
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

                    <!-- ano -->
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
                    </div><!-- /ano -->
                </div>

                <div class="row text-center mt-4">
                    <!-- tipo questao -->
                    <div class="col-5">
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

                    <div class="col-2">
                        <button type="submit" class="btn btn-outline-dark">Filtrar</button>
                    </div>

                    <!-- grau de dificuldade -->
                    <div class="col-5">
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

        <!-- condições e concatenções para os filtros -->
        <?php 

           $sql_filtros = "SELECT * FROM questao";

           if(!empty($_POST)){
                $sql_filtros .= " WHERE (1=1) ";

                if(isset($_POST["ano"])){
                    $ano_ = filter_input(INPUT_POST, "ano", FILTER_VALIDATE_INT);
                    strlen($ano_) ? $sql_filtros .= "AND ano = '$ano_' " : null;
                }

                if(isset($_POST["id_disciplina_1"])){
                    $disciplina1_ = filter_input(INPUT_POST, "id_disciplina_1", FILTER_VALIDATE_INT);
                    strlen($disciplina1_) ? $sql_filtros .= "AND id_disciplina_1 = '$disciplina1_' " : null;
                }

                if(isset($_POST["id_curso"])){
                    $curso_ = filter_input(INPUT_POST, "id_curso", FILTER_VALIDATE_INT);
                    strlen($curso_) ? $sql_filtros .= "AND id_curso = '$curso_' " : null;
                }

                if(isset($_POST["tipo_questao"])){
                    $tipo_ = filter_input(INPUT_POST, "tipo_questao", FILTER_SANITIZE_STRIPPED);
                    $tipo_ = in_array($tipo_,['M', 'D']) ? $tipo_ : "";
                    strlen($tipo_) ? $sql_filtros .= "AND tipo_questao = '$tipo_' " : null;
                }

                if(isset($_POST["id_dificuldade"])){
                    $dificuldade_ = filter_input(INPUT_POST, "id_dificuldade", FILTER_VALIDATE_INT);
                    $dificuldade_ = in_array($dificuldade_,['1', '2', '3']) ? $dificuldade_ : "";
                    strlen($dificuldade_) ? $sql_filtros .= "AND id_dificuldade = '$dificuldade_' " : null;
                }
           }
           $sql_filtros .= " ORDER BY id_curso";
           var_dump($sql_filtros);


            // resultado   
            $resultado_filtros = mysqli_query($con, $sql_filtros) or 
                    die("erro nos filtros ". mysqli_error($con));

            $filtros = mysqli_num_rows($resultado_filtros);

            // validação caso não tenho nenhum filtro
            if($filtros == ""){
                echo "<h3>Nenhum filtro encontrado!</h3>";
            }

            //var_dump($filtros);
            ?><!-- /condições e concatenações para os filtros -->

            <!-- relatório -->
            
             <div class="row">
                <?php 

                    if(strlen($filtros)){
                        echo "<h5>Quantidade de Registros Encontrados = $filtros </h5>";
                    }

                ?>    
             </div>
             
             <hr>
            <!-- /relatório -->

            <!-- listagem -->
           <?php
            $cont = 0;

            while($cont < $filtros){

                // array com os filtros
                $dados = mysqli_fetch_array($resultado_filtros);

                $id             = $dados["id"];
                $id_curso       = $dados["id_curso"];
                $descricao      = $dados["descricao"];
                $ano            = $dados["ano"];
                $numero         = $dados["numero"];
                $enunciado      = $dados["enunciado"];
                $dissertativa   = $dados["resposta_dissertativa"];
                $correta        = $dados["alternativa_correta"];


                echo "<b>ID = </b>$id <br>";
                echo "<b>ID Curso = </b>$id_curso <br>";
                echo "<b>Descrição  = </b>$descricao <br>";
                echo "<b>Ano  = </b> $ano <br>";
                echo "<b>Número  = </b> $numero <br>";
                echo "<b>Enunciado  = </b> $enunciado <br>";
                echo "<b>Dissertativa  = </b> $dissertativa <br>";
                echo "<b>Alt Correta  = </b> $correta <br><hr>";
                
                $cont ++;
            }
        ?><!-- /listagem -->
    </div>

    <!-- SCRIPT BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
  </body>
</html>