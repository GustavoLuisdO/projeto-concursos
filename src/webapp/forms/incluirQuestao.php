<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link rel="shortcut icon" href="../../img/favicon-16x16.png" type="image/x-icon">

    <title>Incluir Questão</title>
  </head>
  <body>

    <?php 
      // conexao com o banco
      include "../conexao.php";

      /* ********* TRAZER OS CURSOS CADASTRADOS ********* */
      // trazer os dados da tabela curso
      $sql_curso = "SELECT id, nome FROM curso ORDER BY id";

      // trazer a seleção do banco
      $registros_cursos = mysqli_query($con, $sql_curso) or die("ERRO NA BUSCA DOS CURSOS!". mysqli_error($con));

      // registros encontrados
      $cursos = mysqli_num_rows($registros_cursos);


      /* ********* TRAZER AS DISCIPLINAS CADASTRADAS ********* */
      // trazer os dados da tabela disciplina
      $sql_disciplina = "SELECT id, nome FROM disciplina ORDER BY id";

      // trazer as seleções do banco
      $registros_disciplinas = mysqli_query($con, $sql_disciplina) or die("ERRO NA BUSCA DAS DISCIPLINAS!". mysqli_error($con));
      $registros_disciplinas2 = mysqli_query($con, $sql_disciplina) or die("ERRO NA BUSCA DAS DISCIPLINAS!". mysqli_error($con));
      $registros_disciplinas3 = mysqli_query($con, $sql_disciplina) or die("ERRO NA BUSCA DAS DISCIPLINAS!". mysqli_error($con));
      $registros_disciplinas4 = mysqli_query($con, $sql_disciplina) or die("ERRO NA BUSCA DAS DISCIPLINAS!". mysqli_error($con));
      // registros encontrados
      $disciplinas = mysqli_num_rows($registros_disciplinas);

      /* ********* TRAZER AS DIFICULDADES CADASTRADAS ********* */
      // trazer os dados da tabela dificuldade
      $sql_dificuldade = "SELECT id, descricao_dif FROM dificuldade ORDER BY id";

      // trazer a seleção do banco
      $registros_dificuldades = mysqli_query($con, $sql_dificuldade) or die("ERRO NA BUSCA DAS DIFICULDADES!". mysqli_error($con));

      // registros encontrados
      $dificuldades = mysqli_num_rows($registros_dificuldades);
    ?>
    
    <!-- container -->
    <div class="container">

    <header>
        <div class="row">
          <a href="../../../index.html" class="m-4">
            <button class="btn btn-outline-dark" type="button"><i class="fas fa-arrow-left fas-3x mr-2"></i>Voltar</button>
          </a>
          <h1 class="m-3">Incluir Questão</h1>
        </div>
      </header>

      <form name="formQuestao" method="post" action="../validacoes/validaQuestao.php">

        <!-- fileira info questão -->
        <div class="row">

          <!-- cursos -->
          <div class="form-group col-5">
              <label for="id_curso">Curso</label>
              <select class="form-control" name="id_curso" id="id_curso">
                <option value="">Selecione o Curso</option>
                <?php
                $contador_cursos = 0;
                  while($contador_cursos < $cursos){
                    // colocar os cursos em um array
                    $dados_cursos = mysqli_fetch_array($registros_cursos);
          
                    //armazenar os dados
                    $id_curso   = $dados_cursos["id"];
                    $nome_curso = $dados_cursos["nome"];
                    // mostrar as opções
                    echo "<option value='$id_curso'>$nome_curso</option>";
          
                    $contador_cursos ++;
                  }
                ?>
              </select>
          </div><!-- /cursos -->
          
          <!-- descrição da prova -->
          <div class="form-group col-5">
            <label for="descricao">Descrição</label>
            <input class="form-control" type="text" name="descricao" id="descricao" required placeholder="Enade 2021" maxlength="255">
          </div><!-- /descrição da prova -->

          <!-- ano da prova -->
          <div class="form-group col-2">
            <label for="ano">Ano</label>
            <input class="form-control" type="text" name="ano" id="ano" required placeholder="2021" maxlength="4">
          </div><!-- /ano da prova -->
 
        </div><!-- fileira info questão -->
      
      <section>
        <div class="row">
          <!-- numero da questão -->
          <div class="form-group col-2">
            <label for="numero">Número da Questão</label>
            <input class="form-control" type="number" name="numero" id="numero" min="1" placeholder="ex..1">
          </div><!-- /numero da questão -->
        </div>

        <div class="row">
           <!-- disciplinas -->
          <div class="form-group col-3"><!-- disciplina 1 -->
              <label for="id_disciplina_1">Disciplina</label>
              <select class="form-control" name="id_disciplina_1" id="id_disciplina_1">
                <option value="">Selecione a Disciplina</option>
                <?php
                  $contador_disciplinas = 0;
                  while($contador_disciplinas < $disciplinas){
                    // colocar as disciplinas em um array
                    $dados_disciplinas = mysqli_fetch_array($registros_disciplinas);
          
                    //armazenar os dados
                    $id_disciplina   = $dados_disciplinas["id"];
                    $nome_disciplina = $dados_disciplinas["nome"];

                    // mostrar as opções
                    echo "<option value='$id_disciplina'>$nome_disciplina</option>";
          
                    $contador_disciplinas ++;
                  }
                ?>
              </select>
          </div><!-- /disciplina 1 -->

          <div class="form-group col-3 disciplinas" id="disciplina_2" style="display: none;"><!-- disciplina 2 -->
              <label for="id_disciplina_2">Disciplina</label>
              <select class="form-control" name="id_disciplina_2" id="id_disciplina_2">
                <option value="">Selecione outra Disciplina</option>
                <?php
                  $contador_disciplinas = 0;
                  while($contador_disciplinas < $disciplinas){
                    // colocar as disciplinas em um array
                    $dados_disciplinas = mysqli_fetch_array($registros_disciplinas2);
          
                    //armazenar os dados
                    $id_disciplina   = $dados_disciplinas["id"];
                    $nome_disciplina = $dados_disciplinas["nome"];

                    // mostrar as opções
                    echo "<option value='$id_disciplina'>$nome_disciplina</option>";
          
                    $contador_disciplinas ++;
                  }
                ?>
              </select>
          </div><!-- /disciplina 2 -->

          <div class="form-group col-3 disciplinas" id="disciplina_3" style="display: none;"><!-- disciplina 3 -->
              <label for="id_disciplina_3">Disciplina</label>
              <select class="form-control" name="id_disciplina_3" id="id_disciplina_3">
                <option value="">Selecione outra Disciplina</option>
                <?php
                  $contador_disciplinas = 0;
                  while($contador_disciplinas < $disciplinas){
                    // colocar as disciplinas em um array
                    $dados_disciplinas = mysqli_fetch_array($registros_disciplinas3);
          
                    //armazenar os dados
                    $id_disciplina   = $dados_disciplinas["id"];
                    $nome_disciplina = $dados_disciplinas["nome"];

                    // mostrar as opções
                    echo "<option value='$id_disciplina'>$nome_disciplina</option>";
          
                    $contador_disciplinas ++;
                  }
                ?>
              </select>
          </div><!-- /disciplina 3 -->

          <div class="form-group col-3 disciplinas" id="disciplina_4" style="display: none;"><!-- disciplina 4 -->
              <label for="id_disciplina_4">Disciplina</label>
              <select class="form-control" name="id_disciplina_4" id="id_disciplina_4">
                <option value="">Selecione outra Disciplina</option>
                <?php
                  $contador_disciplinas = 0;
                  while($contador_disciplinas < $disciplinas){
                    // colocar as disciplinas em um array
                    $dados_disciplinas = mysqli_fetch_array($registros_disciplinas4);
          
                    //armazenar os dados
                    $id_disciplina   = $dados_disciplinas["id"];
                    $nome_disciplina = $dados_disciplinas["nome"];

                    // mostrar as opções
                    echo "<option value='$id_disciplina'>$nome_disciplina</option>";
          
                    $contador_disciplinas ++;
                  }
                ?>
              </select>
          </div><!-- /disciplina 4 -->

          <button type="button" id="btnAddDisciplina" class="btn btn-outline-dark"><i class="fas fa-plus-circle fas-3x"></i></button>
          
          <!-- /disciplinas -->
        </div>

        <!-- dificuldade -->
        <div class="form-group col-6">

          <label for="id_dificuldade">Dificuldade</label>
          <select class="form-control" name="id_dificuldade" id="id_dificuldade">
              <option value="">Selecione a Dificuldade</option>
              <?php
                $contador_dificuldades = 0;
                while($contador_dificuldades < $dificuldades){
                  // colocar as dificuldade em um array
                  $dados_dificuldade = mysqli_fetch_array($registros_dificuldades);
          
                  //armazenar os dados
                  $id_dificuldade         = $dados_dificuldade["id"];
                  $descricao_dificuldade  = $dados_dificuldade["descricao_dif"];

                  // mostrar as opções
                  echo "<option value='$id_dificuldade'>$descricao_dificuldade</option>";
          
                  $contador_dificuldades ++;
                }
              ?>
          </select>
                  
        </div><!-- /dificuldade -->
        
        <!-- enunciado -->
        <div class="form-group col-8">
          <label for="enunciado">Enunciado</label>
          <textarea class="form-control" name="enunciado" id="enunciado" cols="30" rows="5"></textarea>
        </div><!-- /enunciado -->
      </section>

      <!-- tipo de resposta -->
      <section>

         <div class="row">
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="tipo_questao" checked="checked" id="tipo_questao" value="M">
            <label class="form-check-label" for="tipo_questao">Múltplas Escolhas</label>
          </div>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="tipo_questao" id="tipo_questao" value="D">
            <label class="form-check-label" for="tipo_questao">Dissertativa</label>
          </div>
         </div>
         <hr>

         <!-- multipla escolha -->
         <div id="multipla" style="display: block;">
            <!-- alternativa A -->
            <div class="form-check form-check-inline">
              <label class="form-check-label" for="alternativa_correta">a.</label>
              <input class="form-check-input" type="radio" name="alternativa_correta" id="alternativa_correta" value="A">

              <textarea class="form-control" name="resposta" id="resposta" cols="90" rows="1" maxlength="2000"></textarea>
            </div>
              <br>
            <!-- alternativa B -->
            <div class="form-check form-check-inline">
              <label class="form-check-label" for="alternativa_correta">b.</label>
              <input class="form-check-input" type="radio" name="alternativa_correta" id="alternativa_correta" value="B">

              <textarea class="form-control" name="resposta" id="resposta" cols="90" rows="1" maxlength="2000"></textarea>
            </div>
              <br>
            <!-- alternativa C -->
            <div class="form-check form-check-inline">
              <label class="form-check-label" for="alternativa_correta">c.</label>
              <input class="form-check-input" type="radio" name="alternativa_correta" id="alternativa_correta" value="C">

              <textarea class="form-control" name="resposta" id="resposta" cols="90" rows="1" maxlength="2000"></textarea>
            </div>
              <br>
            <!-- alternativa D -->
            <div class="form-check form-check-inline">
              <label class="form-check-label" for="alternativa_correta">d.</label>
              <input class="form-check-input" type="radio" name="alternativa_correta" id="alternativa_correta" value="D">

              <textarea class="form-control" name="resposta" id="resposta" cols="90" rows="1" maxlength="2000"></textarea>
            </div>
              <br>
            <!-- alternativa E -->
            <div class="form-check form-check-inline">
              <label class="form-check-label" for="alternativa_correta">e.</label>
              <input class="form-check-input" type="radio" name="alternativa_correta" id="alternativa_correta" value="E">

              <textarea class="form-control" name="resposta" id="resposta" cols="90" rows="1" maxlength="2000"></textarea>
            </div>
          </div><!-- /multipla escolha -->
         
          <!-- dissertativa -->
          <div id="dissertativa" style="display: none;">
            <div class="form-group col-8">
              <label for="resposta">Resposta</label>
              <textarea class="form-control" name="resposta" id="resposta" cols="30" rows="5"></textarea>
            </div>
          </div><hr> <!-- /dissertativa -->

      </section><!-- /tipo de resposta -->
      
        
        <br><br>
        <button class="btn btn-outline-dark" type="submit">Enviar</button>
      </form>

    </div><!-- /container -->

    <!-- SCRIPT BOOTSTRAP -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>



    <!-- script para adicionar disciplina -->
    <script>

      let addDisciplina = document.querySelectorAll('button[id="btnAddDisciplina"]');
                                  
      let disciplina2 = document.getElementById("disciplina_2");
      let disciplina3 = document.getElementById("disciplina_3");
      let disciplina4 = document.getElementById("disciplina_4");
      
        for (let i = 0; i < addDisciplina.length; i++) {
          addDisciplina[i].addEventListener("click", function() {
            
            if(disciplina2.style.display == "none"){
              disciplina2.style.display = "block";
              return;
            }
            if(disciplina3.style.display == "none"){
              disciplina3.style.display = "block";
              return;
            }
            if(disciplina4.style.display == "none"){
              disciplina4.style.display = "block";
              return;
            }
          });
        }

    </script>
    
    <!-- script para seleção do tipo de questão -->
    <script>
      let tipo = document.querySelectorAll('input[name="tipo_questao"]');
                                  
      let dissertativa = document.getElementById("dissertativa");
      let multipla = document.getElementById("multipla");

        for (let i = 0; i < tipo.length; i++) {
          tipo[i].addEventListener("change", function() {
            
            if(dissertativa.style.display == "none"){
              multipla.style.display = "none";
              dissertativa.style.display = "block";
              return;
            }
            else if(multipla.style.display == "none"){
              dissertativa.style.display = "none";
              multipla.style.display = "block";
              return;
            }
            //console.log(tipo[i]);
          });
        }
    </script>
   
  </body>
</html>