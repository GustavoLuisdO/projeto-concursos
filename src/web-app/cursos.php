<?php

require_once"../DTO/CursoDTO.php";
require_once"../DAL/CursoDAL.php";
require_once"../Controller/CursoController.php";

#RETORNAR CURSOS
$cursoController = new CursoController();
$result = $cursoController->RetornarCursos();
?>     
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Cursos</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href=''>
    <script src=''></script>
</head>
<body>
    <h3>Cursos - Enade</h3>
    <table style="border:1px solid #cecece;">
        <tr style="border:1px solid #cecece;">
            <th style="border:1px solid #cecece;">Id</th>
            <th style="border:1px solid #cecece;">Curso</th>            
        </tr>
        <?php
            foreach($result as $reg)
            {
                echo "<tr>";
                echo "<td style='border:1px solid #cecece;'>";
                print_r($reg["id"]);
                echo "</td>";
                echo "<td style='border:1px solid #cecece;'>";
                print_r($reg["nome"]);
                echo "</td>";        
                echo "</tr>";
            }
        ?>
    </table>         
</body>
</html>