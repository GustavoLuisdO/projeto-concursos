<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link rel="shortcut icon" href="../../img/favicon-16x16.png" type="image/x-icon">

    <title>Alterar Questão</title>
  </head>
  <body>
    
    <div class="container">

        <?php
        
            // caso tente chamar pela url
            if(! isset($_GET["id"]) or ! isset($_GET["numero"])){
                die("ROTINA CHAMADA DE FORMA INCORRETA!". mysqli_error($con));
            }

            // salvar os dados da chamada
            $id     = $_GET["id"];
            $numero = $_GET["numero"];  

            // conexao com o banco
            include "../conexao.php";

            // trazer os dados para alteração
            $sql = "SELECT * FROM questao WHERE id='$id'";

            // trazer a seleção do banco
            $registros = mysqli_query($con, $sql) or die("ERRO NA BUSCA DA QUESTÂO!". mysqli_error($con));
            
            // registro encontrado
            $questao = mysqli_num_rows($registros);

            // colocar o curso em um array
            $dados = mysqli_fetch_array($registros);

            // registros tabela curso para listar o nome do curso
            $sql_nome_cursos = "SELECT q.id_curso, c.nome FROM questao q 
                JOIN curso c ON q.id_curso = c.id WHERE c.id = '".$dados['id_curso']."'";
            
            $registros_nome_cursos = mysqli_query($con, $sql_nome_cursos) or 
                die("ERRO NA BUSCA DO CURSO!". mysqli_error($con));
            
            $nome_cursos = mysqli_num_rows($registros_nome_cursos);

            // monstrar curso que está sendo alterado
            echo "<h2>Alterar Questão [$id]</h2>";

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

      <form name="formAltQuestao" method="post" action="../validacoes/validaAltQuestao.php">
        
        <div class="form-group">
            <input type="hidden" name="id" readonly size="1" 
            value="<?php echo $id; ?>">
        </div>

        <!-- fileira info questão -->
        <div class="row">

          <!-- cursos -->
          <div class="form-group col-5">
              <label for="id_curso">Curso</label>
              <select class="form-control" name="id_curso" id="id_curso">
                <?php
                $contador_cursos = 0;
                  while($contador_cursos < $cursos){
                    // colocar os cursos em um array
                    $dados_cursos = mysqli_fetch_array($registros_cursos);

                    //armazenar os dados
                    $id_curso   = $dados_cursos["id"];
                    $nome_curso = $dados_cursos["nome"];
                  
                    // dados para trazer o nome do curso
                    $dados_nome_curso = mysqli_fetch_array($registros_nome_cursos);
                    $nome_curso = $dados_nome_curso["nome"];

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
            <input class="form-control" type="text" name="descricao" id="descricao" required placeholder="Enade 2021" maxlength="255" value="<?php echo $dados["descricao"] ?>">
          </div><!-- /descrição da prova -->

          <!-- ano da prova -->
          <div class="form-group col-2">
            <label for="ano">Ano</label>
            <input class="form-control" type="text" name="ano" id="ano" required placeholder="2021" maxlength="4" value="<?php echo $dados["ano"] ?>">
          </div><!-- /ano da prova -->
 
        </div><!-- fileira info questão -->
      
      <section>
        <div class="row">
          <!-- numero da questão -->
          <div class="form-group col-2">
            <label for="numero">Número da Questão</label>
            <input class="form-control" type="number" name="numero" id="numero" min="1" placeholder="ex..1" value="<?php echo $dados["numero"] ?>">
          </div><!-- /numero da questão -->
        </div>

        <!-- disciplinas -->
        <div class="row">
           
          <!-- disciplina 1 -->
          <div class="form-group col-3">
              <label for="id_disciplina_1">Disciplina</label>
              <select class="form-control" name="id_disciplina_1" id="id_disciplina_1">
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

          <!-- disciplina 2 -->
          <?php 
            $display = "display:none";
            if($dados["id_disciplina_2"] != '' && $dados["id_disciplina_2"] != '0'){
              $display = "display:block";
            }
          ?>
          <div class="form-group col-3 disciplinas" id="disciplina_2" style="<?php echo"$display"; ?>">
              <label for="id_disciplina_2">Disciplina</label>
              <select class="form-control" name="id_disciplina_2" id="id_disciplina_2">
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

          <!-- disciplina 3 -->
          <?php 
            $display = "display:none";
            if($dados["id_disciplina_3"] != '' && $dados["id_disciplina_3"] != '0'){
              $display = "display:block";
            }
          ?>
          <div class="form-group col-3 disciplinas" id="disciplina_3" style="<?php echo"$display"; ?>">
            <label for="id_disciplina_3">Disciplina</label>
            <select class="form-control" name="id_disciplina_3" id="id_disciplina_3">
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

          <!-- disciplina 4 --> 
          <?php 
            $display = "display:none";
            $display_btn = "display:block";
            if($dados["id_disciplina_4"] != '' && $dados["id_disciplina_4"] != '0'){
              $display = "display:block";
              $display_btn = "display:none";
            }
          ?>   
          <div class="form-group col-3 disciplinas" id="disciplina_4" style="<?php echo"$display"; ?>">
            <label for="id_disciplina_4">Disciplina</label>
            <select class="form-control" name="id_disciplina_4" id="id_disciplina_4">
                  
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

          <button type="button" id="btnAddDisciplina" class="btn btn-outline-dark" style="<?php echo"$display_btn"; ?>"><i class="fas fa-plus-circle fas-3x"></i></button>
          
          <!-- /disciplinas -->
        </div>

        <!-- dificuldade -->
        <div class="form-group col-6">
          <label for="id_dificuldade">Dificuldade</label>
          <select class="form-control" name="id_dificuldade" id="id_dificuldade">
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
          <textarea class="form-control" name="enunciado" id="enunciado" cols="30" rows="5">
            <?php echo $dados["enunciado"] ?>
          </textarea>
        </div><!-- /enunciado -->
      </section>

        <!-- tipo de resposta -->
        <section>
          <div class="row">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="tipo_questao" id="tipo_questao" value="M" <?php if($dados["tipo_questao"] == 'M'){ echo "checked"; } ?>>
              <label class="form-check-label" for="tipo_questao">Múltplas Escolhas</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="tipo_questao" id="tipo_questao" value="D" <?php if($dados["tipo_questao"] == 'D'){ echo "checked"; } ?>>
                <label class="form-check-label" for="tipo_questao">Dissertativa</label>
            </div>
          </div>
          <!-- /tipo de resposta -->
          <hr>

          <!-- multipla escolha -->
          <?php
            $display = "display:none";
            if($dados["tipo_questao"] == 'M'){
              $display = "display:block";
            }
          ?>
          <div id="multipla" style="<?php echo "$display"; ?>">
            <!-- alternativa A -->
            <div class="form-check form-check-inline">
              <label class="form-check-label" for="alternativa_correta">a.</label>
              <input class="form-check-input" type="radio" name="alternativa_correta" id="alternativa_correta" value="A" <?php if($dados["alternativa_correta"] == 'A'){ echo "checked"; } ?>>

              <textarea class="form-control" name="resposta_alt_a" id="resposta_alt_a" cols="90" rows="1" maxlength="2000">
                <?php echo $dados["resposta_alt_a"] ?>
              </textarea>
            </div>
            <br>
            <!-- alternativa B -->
            <div class="form-check form-check-inline">
              <label class="form-check-label" for="alternativa_correta">b.</label>
              <input class="form-check-input" type="radio" name="alternativa_correta" id="alternativa_correta" value="B" <?php if($dados["alternativa_correta"] == 'B'){ echo "checked"; } ?>>

              <textarea class="form-control" name="resposta_alt_b" id="resposta_alt_b" cols="90" rows="1" maxlength="2000">
                <?php echo $dados["resposta_alt_b"] ?>
              </textarea>
            </div>
            <br>
            <!-- alternativa C -->
            <div class="form-check form-check-inline">
              <label class="form-check-label" for="alternativa_correta">c.</label>
              <input class="form-check-input" type="radio" name="alternativa_correta" id="alternativa_correta" value="C" <?php if($dados["alternativa_correta"] == 'C'){ echo "checked"; } ?>>

              <textarea class="form-control" name="resposta_alt_c" id="resposta_alt_c" cols="90" rows="1" maxlength="2000">
                <?php echo $dados["resposta_alt_c"] ?>
               </textarea>
            </div>
            <br>
            <!-- alternativa D -->
            <div class="form-check form-check-inline">  
              <label class="form-check-label" for="alternativa_correta">d.</label>
              <input class="form-check-input" type="radio" name="alternativa_correta" id="alternativa_correta" value="D" <?php if($dados["alternativa_correta"] == 'D'){ echo "checked"; } ?>>

              <textarea class="form-control" name="resposta_alt_d" id="resposta_alt_d" cols="90" rows="1" maxlength="2000">
                <?php echo $dados["resposta_alt_d"] ?>
              </textarea>
            </div>
            <br>
            <!-- alternativa E -->
            <div class="form-check form-check-inline">
              <label class="form-check-label" for="alternativa_correta">e.</label>
              <input class="form-check-input" type="radio" name="alternativa_correta" id="alternativa_correta" value="E" <?php if($dados["alternativa_correta"] == 'E'){ echo "checked"; } ?>>

              <textarea class="form-control" name="resposta_alt_e" id="resposta_alt_e" cols="90" rows="1" maxlength="2000">
                <?php echo $dados["resposta_alt_e"] ?>
              </textarea>
            </div>
          </div><!-- /multipla escolha -->
         
          <!-- dissertativa -->
          <?php 
            $display = "display:none";
            if($dados["tipo_questao"] == 'D'){
              $display = "display:block";
            }
          ?>
          <div id="dissertativa" style="<?php echo "$display"; ?>">
            <div class="form-group col-8">
            <label for="resposta_dissertativa">Resposta</label>
            <textarea class="form-control" name="resposta_dissertativa" id="resposta_dissertativa" cols="30" rows="5" maxlength="2000">
              <?php echo $dados["resposta_dissertativa"] ?>
            </textarea>
            </div>
          </div><hr> <!-- /dissertativa -->

        </section><!-- /tipo de resposta -->

        <br><br>
        <button class="btn btn-outline-dark m-4" type="submit">Alterar Questão</button>

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
              let btn = document.getElementById('btnAddDisciplina');
              btn.style.display = "none"
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