<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link rel="shortcut icon" href="../../img/favicon-16x16.png" type="image/x-icon">

    <title>Incluir Prova</title>
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
      $sql_curso = "SELECT id, nome FROM disciplina ORDER BY id";

      // trazer a seleção do banco
      $registros_disciplinas = mysqli_query($con, $sql_curso) or die("ERRO NA BUSCA DAS DISCIPLINAS!". mysqli_error($con));

      // registros encontrados
      $disciplinas = mysqli_num_rows($registros_disciplinas);
    ?>
    
    <!-- container -->
    <div class="container">

    <header>
        <div class="row">
          <a href="../../../index.html" class="m-4">
            <button class="btn btn-outline-dark" type="button"><i class="fas fa-arrow-left fas-3x mr-2"></i>Voltar</button>
          </a>
          <h1 class="m-3">Incluir Prova</h1>
        </div>
      </header>

      <form name="formProva" method="post" action="../validacoes/validaProva.php">

        <!-- ***** TABELA PROVA ***** -->
        <!-- id prova -->
        <input type="hidden" name="id_prova" id="id_prova">
        <!-- fileira cursos/disciplinas -->
        <div class="row">

          <!-- cursos -->
          <div class="form-group col-6">
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

          <!-- disciplinas -->
          <div class="form-group col-6">
              <label for="id_disciplina">Disciplina</label>
              <select class="form-control" name="id_disciplina" id="id_disciplina">
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
          </div><!-- /disciplinas -->
        </div><!-- /fileira cursos/disciplinas -->

        <!-- fileira descricao/ano -->
        <div class="row">

          <!-- descrição da prova -->
          <div class="form-group col-6">
            <label for="descricao">Descrição</label>
            <input class="form-control" type="text" name="descricao" id="descricao" required placeholder="Enade 2021" maxlength="255">
          </div><!-- /descrição da prova -->

          <!-- ano da prova -->
          <div class="form-group col-6">
            <label for="ano">Ano</label>
            <input class="form-control" type="text" name="ano" id="ano" required placeholder="2021" maxlength="4">
          </div><!-- /ano da prova -->
        </div><!-- fileira descricao/ano-->
        <!-- ***** /TABELA PROVA ***** -->

        <hr><hr><hr>
        <!-- ***** TABELA QUESTÃO DISSERTATIVA ***** -->
        <h3>Questões Dissertativas</h3>

        <!-- dissertativa 1 -->
        <!-- id prova -->
        <input type="hidden" name="id_prova" id="id_prova">
        
        <div class="form-group col-8">
          <label for="numero_dissertativa">Número da Questão</label>
          <input class="form-control" type="number" name="numero_dissertativa" id="numero_dissertativa" min="1" placeholder="ex.. 01">
        </div>
  
        <div class="form-group col-8">
          <label for="questao_dissertativa">Questão</label>
          <textarea class="form-control" name="questao_dissertativa" id="questao_dissertativa" cols="30" rows="5"></textarea>
        </div>

        <div class="form-group col-8">
          <label for="resposta_dissertativa">Resposta</label>
          <textarea class="form-control" name="resposta_dissertativa" id="resposta_dissertativa" cols="30" rows="5"></textarea>
        </div><!-- /dissertativa 1 --><hr>

        <!-- dissertativa 2 -->
        <!-- id prova -->
        <input type="hidden" name="id_prova" id="id_prova">
        
        <div class="form-group col-8">
          <label for="numero_dissertativa">Número da Questão</label>
          <input class="form-control" type="number" name="numero_dissertativa" id="numero_dissertativa" min="1" placeholder="ex.. 02">
        </div>
  
        <div class="form-group col-8">
          <label for="questao_dissertativa">Questão</label>
          <textarea class="form-control" name="questao_dissertativa" id="questao_dissertativa" cols="30" rows="5"></textarea>
        </div>

        <div class="form-group col-8">
          <label for="resposta_dissertativa">Resposta</label>
          <textarea class="form-control" name="resposta_dissertativa" id="resposta_dissertativa" cols="30" rows="5"></textarea>
        </div><!-- /dissertativa 2 --><hr>

        <!-- dissertativa 3 -->
        <!-- id prova -->
        <input type="hidden" name="id_prova" id="id_prova">
        
        <div class="form-group col-8">
          <label for="numero_dissertativa">Número da Questão</label>
          <input class="form-control" type="number" name="numero_dissertativa" id="numero_dissertativa" min="1" placeholder="ex.. 03">
        </div>
  
        <div class="form-group col-8">
          <label for="questao_dissertativa">Questão</label>
          <textarea class="form-control" name="questao_dissertativa" id="questao_dissertativa" cols="30" rows="5"></textarea>
        </div>

        <div class="form-group col-8">
          <label for="resposta_dissertativa">Resposta</label>
          <textarea class="form-control" name="resposta_dissertativa" id="resposta_dissertativa" cols="30" rows="5"></textarea>
        </div><!-- /dissertativa 3--><hr>

        <!-- dissertativa 4 -->
        <!-- id prova -->
        <input type="hidden" name="id_prova" id="id_prova">
        
        <div class="form-group col-8">
          <label for="numero_dissertativa">Número da Questão</label>
          <input class="form-control" type="number" name="numero_dissertativa" id="numero_dissertativa" min="1" placeholder="ex.. 04">
        </div>
  
        <div class="form-group col-8">
          <label for="questao_dissertativa">Questão</label>
          <textarea class="form-control" name="questao_dissertativa" id="questao_dissertativa" cols="30" rows="5"></textarea>
        </div>

        <div class="form-group col-8">
          <label for="resposta_dissertativa">Resposta</label>
          <textarea class="form-control" name="resposta_dissertativa" id="resposta_dissertativa" cols="30" rows="5"></textarea>
        </div><!-- /dissertativa 4 --><hr>

        <!-- dissertativa 5 -->
        <!-- id prova -->
        <input type="hidden" name="id_prova" id="id_prova">
        
        <div class="form-group col-8">
          <label for="numero_dissertativa">Número da Questão</label>
          <input class="form-control" type="number" name="numero_dissertativa" id="numero_dissertativa" min="1" placeholder="ex.. 05">
        </div>
  
        <div class="form-group col-8">
          <label for="questao_dissertativa">Questão</label>
          <textarea class="form-control" name="questao_dissertativa" id="questao_dissertativa" cols="30" rows="5"></textarea>
        </div>

        <div class="form-group col-8">
          <label for="resposta_dissertativa">Resposta</label>
          <textarea class="form-control" name="resposta_dissertativa" id="resposta_dissertativa" cols="30" rows="5"></textarea>
        </div><!-- /dissertativa 5 -->
        <!-- ***** /TABELA QUESTÃO DISSERTATIVA ***** -->

        <hr><hr><hr>
        <!-- ***** TABELA QUESTÃO ESCOLHA ***** -->
        <h3>Questões de Múltiplas Escolhas</h3>

        <!-- multipla escolha 1 -->
        <section>
          <!-- id prova -->
          <input type="hidden" name="id_prova" id="id_prova">
          <!-- numero da questão -->
          <div class="form-group col-8">
            <label for="numero_escolha">Número da Questão</label>
            <input class="form-control" type="number" name="numero_escolha" id="numero_escolha" min="1" placeholder="ex.. 01">
          </div>
          <!-- questão -->
          <div class="form-group col-8">
            <label for="questao_escolha">Questão</label>
            <textarea class="form-control" name="questao_escolha" id="questao_escolha" cols="30" rows="5" maxlength="2000"></textarea>
          </div>
          <!-- ***** /TABELA QUESTÃO ESCOLHA ***** -->
          <!-- ***** TABELA QUESTÃO ESCOLHA ITEM ***** -->
          <!-- id questão escolha -->
          <input type="hidden" name="id_questao_escolha">
          <!-- alternativa A -->
          <div class="form-check form-check-inline">
          <label class="form-check-label" for="letra_numero">a.</label>
            <input class="form-check-input" type="checkbox" name="letra_numero" id="letra_numero" value="A">
            <textarea class="form-control" name="resposta_escolha_item" id="resposta_escolha_item" cols="90" rows="1" maxlength="2000"></textarea>
          </div>
          <br>
          <!-- alternativa B -->
          <div class="form-check form-check-inline">
          <label class="form-check-label" for="letra_numero">b.</label>
            <input class="form-check-input" type="checkbox" name="letra_numero" id="letra_numero" value="B">
            <textarea class="form-control" name="resposta_escolha_item" id="resposta_escolha_item" cols="90" rows="1" maxlength="2000"></textarea>
          </div>
          <br>
          <!-- alternativa C -->
          <div class="form-check form-check-inline">
          <label class="form-check-label" for="letra_numero">c.</label>
            <input class="form-check-input" type="checkbox" name="letra_numero" id="letra_numero" value="C">
            <textarea class="form-control" name="resposta_escolha_item" id="resposta_escolha_item" cols="90" rows="1" maxlength="2000"></textarea>
          </div>
          <br>
          <!-- alternativa D -->
          <div class="form-check form-check-inline">
          <label class="form-check-label" for="letra_numero">d.</label>
            <input class="form-check-input" type="checkbox" name="letra_numero" id="letra_numero" value="D">
            <textarea class="form-control" name="resposta_escolha_item" id="resposta_escolha_item" cols="90" rows="1" maxlength="2000"></textarea>
          </div>
          <br>
          <!-- alternativa E -->
          <div class="form-check form-check-inline">
          <label class="form-check-label" for="letra_numero">e.</label>
            <input class="form-check-input" type="checkbox" name="letra_numero" id="letra_numero" value="E">
            <textarea class="form-control" name="resposta_escolha_item" id="resposta_escolha_item" cols="90" rows="1" maxlength="2000"></textarea>
          </div><hr>
          <!-- ***** /TABELA QUESTÃO ESCOLHA ITEM ***** -->
          
        </section><!-- /multipla escolha 1 -->

        <!-- multipla escolha 2 -->
        <section>
          <!-- id prova -->
          <input type="hidden" name="id_prova" id="id_prova">
          <!-- numero da questão -->
          <div class="form-group col-8">
            <label for="numero_escolha">Número da Questão</label>
            <input class="form-control" type="number" name="numero_escolha" id="numero_escolha" min="1" placeholder="ex.. 02">
          </div>
          <!-- questão -->
          <div class="form-group col-8">
            <label for="questao_escolha">Questão</label>
            <textarea class="form-control" name="questao_escolha" id="questao_escolha" cols="30" rows="5" maxlength="2000"></textarea>
          </div>
          <!-- ***** /TABELA QUESTÃO ESCOLHA ***** -->
          <!-- ***** TABELA QUESTÃO ESCOLHA ITEM ***** -->
          <!-- id questão escolha -->
          <input type="hidden" name="id_questao_escolha">
          <!-- alternativa A -->
          <div class="form-check form-check-inline">
          <label class="form-check-label" for="letra_numero">a.</label>
            <input class="form-check-input" type="checkbox" name="letra_numero" id="letra_numero" value="A">
            <textarea class="form-control" name="resposta_escolha_item" id="resposta_escolha_item" cols="90" rows="1" maxlength="2000"></textarea>
          </div>
          <br>
          <!-- alternativa B -->
          <div class="form-check form-check-inline">
          <label class="form-check-label" for="letra_numero">b.</label>
            <input class="form-check-input" type="checkbox" name="letra_numero" id="letra_numero" value="B">
            <textarea class="form-control" name="resposta_escolha_item" id="resposta_escolha_item" cols="90" rows="1" maxlength="2000"></textarea>
          </div>
          <br>
          <!-- alternativa C -->
          <div class="form-check form-check-inline">
          <label class="form-check-label" for="letra_numero">c.</label>
            <input class="form-check-input" type="checkbox" name="letra_numero" id="letra_numero" value="C">
            <textarea class="form-control" name="resposta_escolha_item" id="resposta_escolha_item" cols="90" rows="1" maxlength="2000"></textarea>
          </div>
          <br>
          <!-- alternativa D -->
          <div class="form-check form-check-inline">
          <label class="form-check-label" for="letra_numero">d.</label>
            <input class="form-check-input" type="checkbox" name="letra_numero" id="letra_numero" value="D">
            <textarea class="form-control" name="resposta_escolha_item" id="resposta_escolha_item" cols="90" rows="1" maxlength="2000"></textarea>
          </div>
          <br>
          <!-- alternativa E -->
          <div class="form-check form-check-inline">
          <label class="form-check-label" for="letra_numero">e.</label>
            <input class="form-check-input" type="checkbox" name="letra_numero" id="letra_numero" value="E">
            <textarea class="form-control" name="resposta_escolha_item" id="resposta_escolha_item" cols="90" rows="1" maxlength="2000"></textarea>
          </div><hr>
          <!-- ***** /TABELA QUESTÃO ESCOLHA ITEM ***** -->
          
        </section><!-- /multipla escolha 2 -->

        <!-- multipla escolha 3 -->
        <section>
          <!-- id prova -->
          <input type="hidden" name="id_prova" id="id_prova">
          <!-- numero da questão -->
          <div class="form-group col-8">
            <label for="numero_escolha">Número da Questão</label>
            <input class="form-control" type="number" name="numero_escolha" id="numero_escolha" min="1" placeholder="ex.. 03">
          </div>
          <!-- questão -->
          <div class="form-group col-8">
            <label for="questao_escolha">Questão</label>
            <textarea class="form-control" name="questao_escolha" id="questao_escolha" cols="30" rows="5" maxlength="2000"></textarea>
          </div>
          <!-- ***** /TABELA QUESTÃO ESCOLHA ***** -->
          <!-- ***** TABELA QUESTÃO ESCOLHA ITEM ***** -->
          <!-- id questão escolha -->
          <input type="hidden" name="id_questao_escolha">
          <!-- alternativa A -->
          <div class="form-check form-check-inline">
          <label class="form-check-label" for="letra_numero">a.</label>
            <input class="form-check-input" type="checkbox" name="letra_numero" id="letra_numero" value="A">
            <textarea class="form-control" name="resposta_escolha_item" id="resposta_escolha_item" cols="90" rows="1" maxlength="2000"></textarea>
          </div>
          <br>
          <!-- alternativa B -->
          <div class="form-check form-check-inline">
          <label class="form-check-label" for="letra_numero">b.</label>
            <input class="form-check-input" type="checkbox" name="letra_numero" id="letra_numero" value="B">
            <textarea class="form-control" name="resposta_escolha_item" id="resposta_escolha_item" cols="90" rows="1" maxlength="2000"></textarea>
          </div>
          <br>
          <!-- alternativa C -->
          <div class="form-check form-check-inline">
          <label class="form-check-label" for="letra_numero">c.</label>
            <input class="form-check-input" type="checkbox" name="letra_numero" id="letra_numero" value="C">
            <textarea class="form-control" name="resposta_escolha_item" id="resposta_escolha_item" cols="90" rows="1" maxlength="2000"></textarea>
          </div>
          <br>
          <!-- alternativa D -->
          <div class="form-check form-check-inline">
          <label class="form-check-label" for="letra_numero">d.</label>
            <input class="form-check-input" type="checkbox" name="letra_numero" id="letra_numero" value="D">
            <textarea class="form-control" name="resposta_escolha_item" id="resposta_escolha_item" cols="90" rows="1" maxlength="2000"></textarea>
          </div>
          <br>
          <!-- alternativa E -->
          <div class="form-check form-check-inline">
          <label class="form-check-label" for="letra_numero">e.</label>
            <input class="form-check-input" type="checkbox" name="letra_numero" id="letra_numero" value="E">
            <textarea class="form-control" name="resposta_escolha_item" id="resposta_escolha_item" cols="90" rows="1" maxlength="2000"></textarea>
          </div><hr>
          <!-- ***** /TABELA QUESTÃO ESCOLHA ITEM ***** -->
          
        </section><!-- /multipla escolha 3 -->

        <!-- multipla escolha 4 -->
        <section>
          <!-- id prova -->
          <input type="hidden" name="id_prova" id="id_prova">
          <!-- numero da questão -->
          <div class="form-group col-8">
            <label for="numero_escolha">Número da Questão</label>
            <input class="form-control" type="number" name="numero_escolha" id="numero_escolha" min="1" placeholder="ex.. 04">
          </div>
          <!-- questão -->
          <div class="form-group col-8">
            <label for="questao_escolha">Questão</label>
            <textarea class="form-control" name="questao_escolha" id="questao_escolha" cols="30" rows="5" maxlength="2000"></textarea>
          </div>
          <!-- ***** /TABELA QUESTÃO ESCOLHA ***** -->
          <!-- ***** TABELA QUESTÃO ESCOLHA ITEM ***** -->
          <!-- id questão escolha -->
          <input type="hidden" name="id_questao_escolha">
          <!-- alternativa A -->
          <div class="form-check form-check-inline">
          <label class="form-check-label" for="letra_numero">a.</label>
            <input class="form-check-input" type="checkbox" name="letra_numero" id="letra_numero" value="A">
            <textarea class="form-control" name="resposta_escolha_item" id="resposta_escolha_item" cols="90" rows="1" maxlength="2000"></textarea>
          </div>
          <br>
          <!-- alternativa B -->
          <div class="form-check form-check-inline">
          <label class="form-check-label" for="letra_numero">b.</label>
            <input class="form-check-input" type="checkbox" name="letra_numero" id="letra_numero" value="B">
            <textarea class="form-control" name="resposta_escolha_item" id="resposta_escolha_item" cols="90" rows="1" maxlength="2000"></textarea>
          </div>
          <br>
          <!-- alternativa C -->
          <div class="form-check form-check-inline">
          <label class="form-check-label" for="letra_numero">c.</label>
            <input class="form-check-input" type="checkbox" name="letra_numero" id="letra_numero" value="C">
            <textarea class="form-control" name="resposta_escolha_item" id="resposta_escolha_item" cols="90" rows="1" maxlength="2000"></textarea>
          </div>
          <br>
          <!-- alternativa D -->
          <div class="form-check form-check-inline">
          <label class="form-check-label" for="letra_numero">d.</label>
            <input class="form-check-input" type="checkbox" name="letra_numero" id="letra_numero" value="D">
            <textarea class="form-control" name="resposta_escolha_item" id="resposta_escolha_item" cols="90" rows="1" maxlength="2000"></textarea>
          </div>
          <br>
          <!-- alternativa E -->
          <div class="form-check form-check-inline">
          <label class="form-check-label" for="letra_numero">e.</label>
            <input class="form-check-input" type="checkbox" name="letra_numero" id="letra_numero" value="E">
            <textarea class="form-control" name="resposta_escolha_item" id="resposta_escolha_item" cols="90" rows="1" maxlength="2000"></textarea>
          </div><hr>
          <!-- ***** /TABELA QUESTÃO ESCOLHA ITEM ***** -->
          
        </section><!-- /multipla escolha 4 -->

        <!-- multipla escolha 5 -->
        <section>
          <!-- id prova -->
          <input type="hidden" name="id_prova" id="id_prova">
          <!-- numero da questão -->
          <div class="form-group col-8">
            <label for="numero_escolha">Número da Questão</label>
            <input class="form-control" type="number" name="numero_escolha" id="numero_escolha" min="1" placeholder="ex.. 05">
          </div>
          <!-- questão -->
          <div class="form-group col-8">
            <label for="questao_escolha">Questão</label>
            <textarea class="form-control" name="questao_escolha" id="questao_escolha" cols="30" rows="5" maxlength="2000"></textarea>
          </div>
          <!-- ***** /TABELA QUESTÃO ESCOLHA ***** -->
          <!-- ***** TABELA QUESTÃO ESCOLHA ITEM ***** -->
          <!-- id questão escolha -->
          <input type="hidden" name="id_questao_escolha">
          <!-- alternativa A -->
          <div class="form-check form-check-inline">
          <label class="form-check-label" for="letra_numero">a.</label>
            <input class="form-check-input" type="checkbox" name="letra_numero" id="letra_numero" value="A">
            <textarea class="form-control" name="resposta_escolha_item" id="resposta_escolha_item" cols="90" rows="1" maxlength="2000"></textarea>
          </div>
          <br>
          <!-- alternativa B -->
          <div class="form-check form-check-inline">
          <label class="form-check-label" for="letra_numero">b.</label>
            <input class="form-check-input" type="checkbox" name="letra_numero" id="letra_numero" value="B">
            <textarea class="form-control" name="resposta_escolha_item" id="resposta_escolha_item" cols="90" rows="1" maxlength="2000"></textarea>
          </div>
          <br>
          <!-- alternativa C -->
          <div class="form-check form-check-inline">
          <label class="form-check-label" for="letra_numero">c.</label>
            <input class="form-check-input" type="checkbox" name="letra_numero" id="letra_numero" value="C">
            <textarea class="form-control" name="resposta_escolha_item" id="resposta_escolha_item" cols="90" rows="1" maxlength="2000"></textarea>
          </div>
          <br>
          <!-- alternativa D -->
          <div class="form-check form-check-inline">
          <label class="form-check-label" for="letra_numero">d.</label>
            <input class="form-check-input" type="checkbox" name="letra_numero" id="letra_numero" value="D">
            <textarea class="form-control" name="resposta_escolha_item" id="resposta_escolha_item" cols="90" rows="1" maxlength="2000"></textarea>
          </div>
          <br>
          <!-- alternativa E -->
          <div class="form-check form-check-inline">
          <label class="form-check-label" for="letra_numero">e.</label>
            <input class="form-check-input" type="checkbox" name="letra_numero" id="letra_numero" value="E">
            <textarea class="form-control" name="resposta_escolha_item" id="resposta_escolha_item" cols="90" rows="1" maxlength="2000"></textarea>
          </div><hr>
          <!-- ***** /TABELA QUESTÃO ESCOLHA ITEM ***** -->
          
        </section><!-- /multipla escolha 5 -->

        <!-- multipla escolha 6 -->
        <section>
          <!-- id prova -->
          <input type="hidden" name="id_prova" id="id_prova">
          <!-- numero da questão -->
          <div class="form-group col-8">
            <label for="numero_escolha">Número da Questão</label>
            <input class="form-control" type="number" name="numero_escolha" id="numero_escolha" min="1" placeholder="ex.. 06">
          </div>
          <!-- questão -->
          <div class="form-group col-8">
            <label for="questao_escolha">Questão</label>
            <textarea class="form-control" name="questao_escolha" id="questao_escolha" cols="30" rows="5" maxlength="2000"></textarea>
          </div>
          <!-- ***** /TABELA QUESTÃO ESCOLHA ***** -->
          <!-- ***** TABELA QUESTÃO ESCOLHA ITEM ***** -->
          <!-- id questão escolha -->
          <input type="hidden" name="id_questao_escolha">
          <!-- alternativa A -->
          <div class="form-check form-check-inline">
          <label class="form-check-label" for="letra_numero">a.</label>
            <input class="form-check-input" type="checkbox" name="letra_numero" id="letra_numero" value="A">
            <textarea class="form-control" name="resposta_escolha_item" id="resposta_escolha_item" cols="90" rows="1" maxlength="2000"></textarea>
          </div>
          <br>
          <!-- alternativa B -->
          <div class="form-check form-check-inline">
          <label class="form-check-label" for="letra_numero">b.</label>
            <input class="form-check-input" type="checkbox" name="letra_numero" id="letra_numero" value="B">
            <textarea class="form-control" name="resposta_escolha_item" id="resposta_escolha_item" cols="90" rows="1" maxlength="2000"></textarea>
          </div>
          <br>
          <!-- alternativa C -->
          <div class="form-check form-check-inline">
          <label class="form-check-label" for="letra_numero">c.</label>
            <input class="form-check-input" type="checkbox" name="letra_numero" id="letra_numero" value="C">
            <textarea class="form-control" name="resposta_escolha_item" id="resposta_escolha_item" cols="90" rows="1" maxlength="2000"></textarea>
          </div>
          <br>
          <!-- alternativa D -->
          <div class="form-check form-check-inline">
          <label class="form-check-label" for="letra_numero">d.</label>
            <input class="form-check-input" type="checkbox" name="letra_numero" id="letra_numero" value="D">
            <textarea class="form-control" name="resposta_escolha_item" id="resposta_escolha_item" cols="90" rows="1" maxlength="2000"></textarea>
          </div>
          <br>
          <!-- alternativa E -->
          <div class="form-check form-check-inline">
          <label class="form-check-label" for="letra_numero">e.</label>
            <input class="form-check-input" type="checkbox" name="letra_numero" id="letra_numero" value="E">
            <textarea class="form-control" name="resposta_escolha_item" id="resposta_escolha_item" cols="90" rows="1" maxlength="2000"></textarea>
          </div><hr>
          <!-- ***** /TABELA QUESTÃO ESCOLHA ITEM ***** -->
          
        </section><!-- /multipla escolha 6 -->
        
          
        <br><br>
        <button class="btn btn-outline-dark" type="submit">Enviar</button>
      </form>

    </div><!-- /container -->

    <!-- SCRIPT BOOTSTRAP -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
   
  </body>
</html>