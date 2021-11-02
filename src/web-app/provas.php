<?php

require_once"../DTO/ProvaDTO.php";
require_once"../DAL/ProvaDAL.php";
require_once"../Controller/ProvaController.php";

#RETORNAR PROVAS
$provaController = new ProvaController();
$result = $provaController->RetornarProvas();
?>     
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Provas</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href=''>
    <script src=''></script>
</head>
<body>
    <h3>Provas - Enade</h3>
    <table style="border:1px solid #cecece;">
        <tr style="border:1px solid #cecece;">
            <th style="border:1px solid #cecece;">Id</th>
            <th style="border:1px solid #cecece;">Id Curso</th>
            <th style="border:1px solid #cecece;">Id Disciplina</th>
            <th style="border:1px solid #cecece;">Descrição</th>
            <th style="border:1px solid #cecece;">Ano</th>            
        </tr>
        <?php
            foreach($result as $reg)
            {
                echo "<tr>";
                echo "<td style='border:1px solid #cecece;'>";
                print_r($reg["id"]);
                echo "</td>";
                echo "<td style='border:1px solid #cecece;'>";
                print_r($reg["id_curso"]);
                echo "</td>";
                echo "<td style='border:1px solid #cecece;'>";
                print_r($reg["id_disciplina"]);
                echo "</td>";
                echo "<td style='border:1px solid #cecece;'>";
                print_r($reg["descricao"]);
                echo "</td>";
                echo "<td style='border:1px solid #cecece;'>";
                print_r($reg["ano"]);
                echo "</td>";
                echo "</tr>";
            }
        ?>
    </table>         
</body>
</html>