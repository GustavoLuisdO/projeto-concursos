<?php

require_once"../DTO/DisciplinaDTO.php";
require_once"../DAL/DisciplinaDAL.php";
require_once"../Controller/DisciplinaController.php";

#RETORNAR DISCIPLINAS
$disciplinaController = new DisciplinaController();
$result = $disciplinaController->RetornarDisciplinas();
?>     
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Disciplinas</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href=''>
    <script src=''></script>
</head>
<body>
    <h3>Disciplinas - Enade</h3>
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