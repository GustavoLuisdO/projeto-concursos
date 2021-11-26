<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link rel="stylesheet" href="../../css/incluirCurso-Disciplina.css">

    <link rel="shortcut icon" href="../../img/favicon-16x16.png" type="image/x-icon">

    <title>Alterar Curso</title>
  </head>
  <body>
    
    <div class="container">

        <?php
        
            // caso tente chamar pela url
            if(! isset($_GET["id"]) or ! isset($_GET["nome"])){
                die("ROTINA CHAMADA DE FORMA INCORRETA!". mysqli_error($con));
            }

            // salvar os dados da chamada
            $id     = $_GET["id"];
            $nome   = $_GET["nome"];

            // conexao com o banco
            include "../conexao.php";

            // trazer os dados para alteração
            $sql = "SELECT * FROM curso WHERE id='$id'";

            // trazer a seleção do banco
            $registros = mysqli_query($con, $sql) or die("ERRO NA BUSCA DO CURSO!". mysqli_error($con));
            
            // registro encontrado
            $curso = mysqli_num_rows($registros);

            // colocar o curso em um array
            $dados = mysqli_fetch_array($registros);

            // monstrar curso que está sendo alterado
            //echo "<h2>Alterar Curso [$nome]</h2>";
        ?>

      <header>
        <div class="row">
          
          <h1 class="m-3">Alterar Curso</h1>

          <a href="../../../index.html" class="m-4">
            <button class="btn btn-outline-dark" type="button">
              <i class="fas fa-house-damage fas-3x mr-2"></i></i>Página Inicial
            </button>
          </a>

          <a href="../listagens/listaCursos.php" class="m-4">
            <button class="btn btn-outline-dark" type="button">
              <i class="fas fa-th-list fas-3x mr-2"></i>Listagem de Cursos
            </button>
          </a>

        </div>
      </header>

      

      <form name="formAltCurso" method="post" action="../validacoes/validaAltCurso.php">
        
        <div class="form-group">
            <input type="hidden" name="id" readonly size="1" 
            value="<?php echo $id; ?>">
        </div>

        <div class="row">
          <div class="col-1"></div>

          <div class="col-6">
            <div class="form-group">
                <label for="nome">Nome do Curso</label>
                <input class="form-control" type="text" id="nome" name="nome" required maxlength="100" value="<?php echo $dados['nome'] ?>">
            </div>
          </div>

          <div class="col-4">
            <div class="form-group">
                <label for="duracao_meses">Duração do Curso (meses)</label>
                <input class="form-control" type="number" id="duracao_meses" name="duracao_meses" min="1" required value="<?php echo $dados['duracao_meses'] ?>">
            </div>
          </div>

          <div class="col-1"></div>
        </div>

        <div class="row float-right mr-5 mt-3">
          <button class="btn btn-outline-dark" id="btn" type="submit">Alterar Curso</button>
        </div>
      </form>
      
    </div>

    <!-- SCRIPT BOOTSTRAP -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
   
  </body>
</html>