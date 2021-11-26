<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link rel="stylesheet" href="../../css/incluirQuestao.css">

    <link rel="shortcut icon" href="../../img/favicon-16x16.png" type="image/x-icon">

    <title>Excluir Questão</title>
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

            // monstrar questão que está sendo alterada
            //echo "<h2>Excluir Questão [código = $id]</h2>";
        ?>

      <header>
        <div class="row">
          
          <h1 class="m-3">Excluir Questão</h1>

          <a href="../../../index.html" class="m-4">
            <button class="btn btn-outline-dark" type="button">
              <i class="fas fa-house-damage fas-3x mr-2"></i></i>Página Inicial
            </button>
          </a>

          <a href="../listagens/listaQuestoes.php" class="m-4">
            <button class="btn btn-outline-dark" type="button">
              <i class="fas fa-th-list fas-3x mr-2"></i>Listagem de Questões
            </button>
          </a>

        </div>
      </header>

      <form name="formExcQuestao" method="post" action="../validacoes/validaExcQuestao.php">
        
        <div class="form-group">
            <input type="hidden" name="id" readonly size="1" 
            value="<?php echo $id; ?>">
        </div>

        <!-- cursos -->
        <div class="row">
          <div class="col-2"></div>
          <div class="col-8">
            <div class="form-group">
                  <label for="id_curso">Curso</label>
                  <select class="form-control" name="id_curso" id="id_curso" readonly>
                    <?php
                      //mostrar o curso atual
                      // registros tabela curso para listar o nome do curso
                      $sql_nome_curso = "SELECT q.id_curso, c.nome FROM questao q
                          JOIN curso c ON q.id_curso = c.id WHERE c.id = '".$dados['id_curso']."'";
            
                      $registros_nome_curso = mysqli_query($con, $sql_nome_curso) or
                          die("ERRO NA BUSCA DO CURSO!". mysqli_error($con));
            
                      $nome_curso = mysqli_num_rows($registros_nome_curso);
                      $dados_nome_curso = mysqli_fetch_array($registros_nome_curso);
                      $id_curso_atual = $dados_nome_curso["id_curso"];
                      $nome_curso_atual = $dados_nome_curso["nome"];
            
                    ?>
                    <option value="<?php echo $id_curso_atual; ?>">
                      <?php echo "$nome_curso_atual"; ?>
                    </option>
                  </select>
              </div>
          </div>
          <div class="col-2"></div>
        </div><!-- /cursos -->    

        <div class="row">
          <div class="col-2"></div>
          <!-- descrição da prova -->
          <div class="form-group col-6">
            <label for="descricao">Descrição</label>
            <input class="form-control" type="text" name="descricao" id="descricao" required placeholder="Enade 2021" maxlength="255" value="<?php echo $dados["descricao"] ?>" readonly>
          </div><!-- /descrição da prova -->

          <!-- ano da prova -->
          <div class="form-group col-2">
            <label for="ano">Ano</label>
            <input class="form-control" type="text" name="ano" id="ano" required placeholder="2021" maxlength="4" value="<?php echo $dados["ano"] ?>" readonly>
          </div><!-- /ano da prova -->
          <div class="col-2"></div>
        </div>
      
      <section>
        <div class="row">
          <div class="col-2"></div>
          <!-- numero da questão -->
          <div class="form-group col-2">
            <label for="numero">Número da Questão</label>
            <input class="form-control" type="number" name="numero" id="numero" min="1" placeholder="ex..1" value="<?php echo $dados["numero"] ?>" readonly>
          </div><!-- /numero da questão -->
          <div class="col-8"></div>
        </div>

        <!-- disciplinas -->
        <div class="row">
           
          <!-- disciplina 1 -->
          <div class="form-group col-3">
              <label for="id_disciplina_1">Disciplina</label>
              <select class="form-control" name="id_disciplina_1" id="id_disciplina_1" readonly>
                <?php 
                  //mostrar a disciplina atual
                  // registros tabela disciplina para listar o nome da disciplina
                  $sql_nome_disciplina1 = "SELECT q.id_disciplina_1, d.nome FROM questao q 
                      JOIN disciplina d ON q.id_disciplina_1 = d.id WHERE d.id = '".$dados['id_disciplina_1']."'";
                  
                  $registros_nome_disciplina1 = mysqli_query($con, $sql_nome_disciplina1) or 
                      die("ERRO NA BUSCA DA DISCIPLINA!". mysqli_error($con));
                  
                  $nome_disciplina1 = mysqli_num_rows($registros_nome_disciplina1);

                  $dados_nome_disciplina1 = mysqli_fetch_array($registros_nome_disciplina1);

                  $id_disciplina_atual = $dados_nome_disciplina1["id_disciplina_1"];
                  $disciplina_atual = $dados_nome_disciplina1["nome"];
                  
                ?>
                <option value="<?php echo $id_disciplina_atual; ?>">
                  <?php echo "$disciplina_atual"; ?>
                </option>
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
            <select class="form-control" name="id_disciplina_2" id="id_disciplina_2" readonly>

              <?php 
                  //mostrar a disciplina atual
                  // registros tabela disciplina para listar o nome da disciplina
                  $sql_nome_disciplina2 = "SELECT q.id_disciplina_2, d.nome FROM questao q 
                      JOIN disciplina d ON q.id_disciplina_2 = d.id WHERE d.id = '".$dados['id_disciplina_2']."'";
                  
                  $registros_nome_disciplina2 = mysqli_query($con, $sql_nome_disciplina2) or 
                      die("ERRO NA BUSCA DA DISCIPLINA!". mysqli_error($con));
                  
                  $nome_disciplina2 = mysqli_num_rows($registros_nome_disciplina2);

                  $dados_nome_disciplina2 = mysqli_fetch_array($registros_nome_disciplina2);

                  $id_disciplina_atual = $dados_nome_disciplina2["id_disciplina_2"];
                  $disciplina_atual = $dados_nome_disciplina2["nome"];
                  
                ?>
                <option value="<?php echo $id_disciplina_atual; ?>">
                  <?php echo "$disciplina_atual"; ?>
                </option>
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
            <select class="form-control" name="id_disciplina_3" id="id_disciplina_3" readonly>

              <?php 
                  //mostrar a disciplina atual
                  // registros tabela disciplina para listar o nome da disciplina
                  $sql_nome_disciplina3 = "SELECT q.id_disciplina_3, d.nome FROM questao q 
                      JOIN disciplina d ON q.id_disciplina_3 = d.id WHERE d.id = '".$dados['id_disciplina_3']."'";
                  
                  $registros_nome_disciplina3 = mysqli_query($con, $sql_nome_disciplina3) or 
                      die("ERRO NA BUSCA DA DISCIPLINA!". mysqli_error($con));
                  
                  $nome_disciplina3 = mysqli_num_rows($registros_nome_disciplina3);

                  $dados_nome_disciplina3 = mysqli_fetch_array($registros_nome_disciplina3);

                  $id_disciplina_atual = $dados_nome_disciplina3["id_disciplina_3"];
                  $disciplina_atual = $dados_nome_disciplina3["nome"];
              ?>
              <option value="<?php echo $id_disciplina_atual; ?>">
                <?php echo "$disciplina_atual"; ?>
              </option>
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
            <select class="form-control" name="id_disciplina_4" id="id_disciplina_4" readonly>
              
              <?php 
                  //mostrar a disciplina atual
                  // registros tabela disciplina para listar o nome da disciplina
                  $sql_nome_disciplina4 = "SELECT q.id_disciplina_4, d.nome FROM questao q 
                      JOIN disciplina d ON q.id_disciplina_4 = d.id WHERE d.id = '".$dados['id_disciplina_4']."'";
                  
                  $registros_nome_disciplina4 = mysqli_query($con, $sql_nome_disciplina4) or 
                      die("ERRO NA BUSCA DA DISCIPLINA!". mysqli_error($con));
                  
                  $nome_disciplina4 = mysqli_num_rows($registros_nome_disciplina4);

                  $dados_nome_disciplina4 = mysqli_fetch_array($registros_nome_disciplina4);

                  $id_disciplina_atual = $dados_nome_disciplina4["id_disciplina_4"];
                  $disciplina_atual = $dados_nome_disciplina4["nome"];
                  
                ?>
                <option value="<?php echo $id_disciplina_atual; ?>">
                  <?php echo "$disciplina_atual"; ?>
                </option>
            </select>
          </div><!-- /disciplina 4 -->
          
          <!-- /disciplinas -->
        </div>

        <!-- dificuldade -->
        <div class="form-group col-6">
          <label for="id_dificuldade">Dificuldade</label>
          <select class="form-control" name="id_dificuldade" id="id_dificuldade" readonly>

            <?php 
              //mostrar a dificuldade atual
              // registros tabela dificuldade para listar o nome da dificuldade
              $sql_nome_dificuldade = "SELECT q.id_dificuldade, d.descricao_dif FROM questao q 
                      JOIN dificuldade d ON q.id_dificuldade = d.id WHERE d.id = '".$dados['id_dificuldade']."'";
                  
              $registros_nome_dificuldade = mysqli_query($con, $sql_nome_dificuldade) or 
                      die("ERRO NA BUSCA DA DISCIPLINA!". mysqli_error($con));
                  
              $nome_dificuldade = mysqli_num_rows($registros_nome_dificuldade);

              $dados_nome_dificuldade = mysqli_fetch_array($registros_nome_dificuldade);

              $id_dificuldade_atual = $dados_nome_dificuldade["id_dificuldade"];
              $dificuldade_atual = $dados_nome_dificuldade["descricao_dif"];
                  
            ?>
            <option value="<?php echo $id_dificuldade_atual; ?>">
              <?php echo "$dificuldade_atual"; ?>
            </option>
            
          </select>
        </div><!-- /dificuldade -->
        
        <!-- enunciado -->
        <div class="form-group col-8">
          <label for="enunciado">Enunciado</label>
          <textarea class="form-control" name="enunciado" id="enunciado" cols="30" rows="5" readonly>
            <?php echo $dados["enunciado"] ?>
          </textarea>
        </div><!-- /enunciado -->
      </section>

        <!-- tipo de resposta -->
        <?php
            // definir o tipo de questão que será listado
            switch($dados["tipo_questao"]){
                    
                // case múltiplas escolhas
                case 'M':   echo "
                                <div class='row'> 
                                    <div class='col-1'></div>
                                    <div class='col-10'>
                                        <h6>Múltiplas Escolhas</h6>
                                    </div>
                                    <div class='col-1'></div>
                                </div>";
            ?>
                <!-- alternartivas -->
                <?php
                    // alternativa a
                    echo "      <div class='row mt-1'>
                                    <div class='col-1'></div>
                                    <div class='col-10'>
                                      <div class='form-check form-check-inline'>
                                        <label class='form-check-label' for='alternativa_correta'>a.</label>
                                        <input class='form-check-input' type='radio' value='A'
                    ";
                    // veficação para check 
                                        if($dados['alternativa_correta'] == 'A'){ 
                                            echo 'checked'; 
                                            } 
                    echo "                  >"; //fechar o input
                                        
                    echo "              <textarea class='form-control' cols='110' rows='1' 
                                                 maxlength='2000' readonly>
                                            ".$dados["resposta_alt_a"]."
                                        </textarea>
                                      </div>
                                    </div>
                                    <div class='col-1'></div>
                                </div>
                    "; // fim alternativa a
                ?>
                <?php
                    // alternativa b
                    echo "      <div class='row mt-1'>
                                    <div class='col-1'></div>
                                    <div class='col-10'>
                                      <div class='form-check form-check-inline'>
                                        <label class='form-check-label' for='alternativa_correta'>b.</label>
                                        <input class='form-check-input' type='radio' value='B'
                    ";
                    // veficação para check 
                                        if($dados['alternativa_correta'] == 'B'){ 
                                            echo 'checked'; 
                                            } 
                    echo "                  >"; //fechar o input
                                        
                    echo "              <textarea class='form-control' cols='110' rows='1' 
                                                 maxlength='2000' readonly>
                                            ".$dados["resposta_alt_b"]."
                                        </textarea>
                                      </div>
                                    </div>
                                    <div class='col-1'></div>
                                </div>
                    "; // fim alternativa b
                ?>
                <?php
                    // alternativa c
                    echo "      <div class='row mt-1'>
                                    <div class='col-1'></div>
                                    <div class='col-10'>
                                      <div class='form-check form-check-inline'>
                                        <label class='form-check-label' for='alternativa_correta'>c.</label>
                                        <input class='form-check-input' type='radio' value='C'
                    ";
                    // veficação para check 
                                        if($dados['alternativa_correta'] == 'C'){ 
                                            echo 'checked'; 
                                            } 
                    echo "                  >"; //fechar o input
                                        
                    echo "              <textarea class='form-control' cols='110' rows='1' 
                                                 maxlength='2000' readonly>
                                            ".$dados["resposta_alt_c"]."
                                        </textarea>
                                      </div>
                                    </div>
                                    <div class='col-1'></div>
                                </div>
                    "; // fim alternativa c
                ?>
                <?php
                    // alternativa d
                    echo "      <div class='row mt-1'>
                                    <div class='col-1'></div>
                                    <div class='col-10'>
                                      <div class='form-check form-check-inline'>
                                        <label class='form-check-label' for='alternativa_correta'>d.</label>
                                        <input class='form-check-input' type='radio' value='D'
                    ";
                    // veficação para check 
                                        if($dados['alternativa_correta'] == 'D'){ 
                                            echo 'checked'; 
                                            } 
                    echo "                  >"; //fechar o input
                                        
                    echo "              <textarea class='form-control' cols='110' rows='1' 
                                                 maxlength='2000' readonly>
                                            ".$dados["resposta_alt_d"]."
                                        </textarea>
                                      </div>
                                    </div>
                                    <div class='col-1'></div>
                                </div>
                    "; // fim alternativa d
                ?>
                <?php
                    // alternativa e
                    echo "      <div class='row mt-1'>
                                    <div class='col-1'></div>
                                    <div class='col-10'>
                                      <div class='form-check form-check-inline'>
                                        <label class='form-check-label' for='alternativa_correta'>e.</label>
                                        <input class='form-check-input' type='radio' value='E'
                    ";
                    // veficação para check 
                                        if($dados['alternativa_correta'] == 'E'){ 
                                            echo 'checked'; 
                                            } 
                    echo "                  >"; //fechar o input
                                        
                    echo "              <textarea class='form-control' cols='110' rows='1' 
                                                 maxlength='2000' readonly>
                                                 ".$dados["resposta_alt_e"]."
                                        </textarea>
                                      </div>
                                    </div>
                                    <div class='col-1'></div>
                                </div>
                    "; // fim alternativa e

                    break; // fim case multiplas escolhas
                ?>
                <!-- /alternativas -->
                
                <!-- dissertativa -->
                <?php
                    // case dissertativa
                    case 'D':
                    // titulo dissertativa
                    echo "
                                <div class='row'> 
                                    <div class='col-1'></div>
                                    <div class='col-10'>
                                        <h6>Dissertativa</h6>
                                    </div>
                                    <div class='col-1'></div>
                                </div>
                    ";
                    // resposta dissertativa
                    echo "
                                <div class='row'>
                                    <div class='col-1'></div>
                                    <div class='form-group col-10'>
                                        <textarea class='form-control'cols='110' rows='5' maxlength='2000' readonly>
                                            ".$dados['resposta_dissertativa']."
                                        </textarea>
                                    </div>
                                    <div class='col-1'></div>
                                </div>
                    ";
                    
                    break; // fim case dissertativa

                    default: echo "<h2>Erro ao listar o tipo de questão</h2>";
                } //fim switch
                
                ?>
                <!-- /dissertativa -->

        <br><br>
        <button class="btn btn-outline-dark m-4" type="submit">Excluir Questão</button>

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