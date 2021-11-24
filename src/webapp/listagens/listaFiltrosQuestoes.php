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

            <form name="formListaQuestao" method="post">

                <div class="row text-center">   
                    <div class="col-3"></div>
                    <!-- Palavra Chave -->
                    <div class="col-6">
                        <div class="form-goup">
                            <input class="form-control" type="search" name="enunciado" placeholder="Buscar por palavra-chave" maxlength="2000">
                        </div>
                    </div><!-- Palavra Chave -->
                    <div class="col-3"></div>
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

                if(isset($_POST["enunciado"])){
                    $palavras_chave_ = filter_input(INPUT_POST, "enunciado", FILTER_SANITIZE_STRIPPED);
                    strlen($palavras_chave_) ? $sql_filtros .= "AND enunciado LIKE '%$palavras_chave_%' " : null;
                }

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
            // listar nome do curso
            $cont = 0;

            while($cont < $filtros){

                // array com os filtros 
                $dados = mysqli_fetch_array($resultado_filtros);

                // dados da tabela questão
                $id                 = $dados["id"];
                $id_curso           = $dados["id_curso"];
                $descricao          = $dados["descricao"];
                $ano                = $dados["ano"];
                $numero             = $dados["numero"];
                $id_disciplina_1    = $dados["id_disciplina_1"];
                $id_disciplina_2    = $dados["id_disciplina_2"];
                $id_disciplina_3    = $dados["id_disciplina_3"];
                $id_disciplina_4    = $dados["id_disciplina_4"];
                $id_dificuldade     = $dados["id_dificuldade"];
                $enunciado          = $dados["enunciado"];
                $tipo_questao       = $dados["tipo_questao"];
                $dissertativa       = $dados["resposta_dissertativa"];
                $alt_a              = $dados["resposta_alt_a"];
                $alt_b              = $dados["resposta_alt_b"];
                $alt_c              = $dados["resposta_alt_c"];
                $alt_d              = $dados["resposta_alt_d"];
                $alt_e              = $dados["resposta_alt_e"];
                $alt_correta        = $dados["alternativa_correta"];

                // registros tabela curso para listar o nome do curso
                require "../consultas/cursos.php";
                $dados_nome_curso = mysqli_fetch_array($registros_nome_cursos);

                $nome_cursos_ = $dados_nome_curso["nome"];

                // registros da tabela disciplina para listar o nome da disciplina
                require "../consultas/disciplinas.php";

                $dados_disciplina1 = mysqli_fetch_array($registros_disciplinas_1);
                $dados_disciplina2 = mysqli_fetch_array($registros_disciplinas_2);
                $dados_disciplina3 = mysqli_fetch_array($registros_disciplinas_3);
                $dados_disciplina4 = mysqli_fetch_array($registros_disciplinas_4);

                $disciplina_1 = $dados_disciplina1["nome"];
                $disciplina_2 = $dados_disciplina2["nome"];
                $disciplina_3 = $dados_disciplina3["nome"];
                $disciplina_4 = $dados_disciplina4["nome"];

                // listagem
                echo "<b>ID = </b>$id <br>";
                echo "<b>Curso = </b>$nome_cursos_ <br>";
                echo "<b>Descrição  = </b>$descricao <br>";
                echo "<b>Ano  = </b> $ano <br>";
                echo "<b>Número  = </b> $numero <br>";

                echo "<div class='row'>";
                    echo "<b>Disciplina(s) = </b> ";
                    if($id_disciplina_1 != "" && $id_disciplina_1 != 0){
                        echo " $disciplina_1";
                    }
                    if($id_disciplina_2 != "" && $id_disciplina_2 != 0){
                        echo " | $disciplina_2";
                    }
                    if($id_disciplina_3 != "" && $id_disciplina_3 != 0){
                        echo " | $disciplina_3";
                    }
                    if($id_disciplina_4 != "" && $id_disciplina_4 != 0){
                        echo " | $disciplina_4";
                    }

                echo "</div>";

                //echo "<b>Disciplina(s)  = </b> $disciplina_1 | $disciplina_2 | $disciplina_3 | $disciplina_4 <br>";
                

                // definir o grau de dificuldade que será listado
                switch($id_dificuldade){
                    case 1: echo "<b>Dificuldade = </b> Fácil <br>";
                        break;
                    case 2: echo "<b>Dificuldade = </b> Mediana <br>";
                        break;
                    case 3: echo "<b>Dificuldade = </b> Difícil <br>";
                        break;
                    default: echo "<h2>Erro ao listar a dificuldade</h2>";
                }
                
                echo "<b>Enunciado = </b> $enunciado <br>";

                // definir o tipo de questão que será listado
                switch($tipo_questao){
                    case 'M':   echo "<b>Tipo de Questão = </b> Multiplas Escolhas <br>";
                                echo "<b>Alt A = </b> $alt_a <br>";
                                echo "<b>Alt B = </b> $alt_b <br>";
                                echo "<b>Alt C = </b> $alt_c <br>";
                                echo "<b>Alt D = </b> $alt_d <br>";
                                echo "<b>Alt E = </b> $alt_e <br>";
                                echo "<b>Alt Correta = </b> $alt_correta <br><hr>";
                                    break;
                    
                    case 'D':   echo "<b>Tipo de Questão = </b> Dissertativa <br>";
                                echo "<b>Dissertativa = </b> $dissertativa <br><hr>";
                                    break;
                    default: echo "<h2>Erro ao listar o tipo de questão</h2>";
                }
                
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