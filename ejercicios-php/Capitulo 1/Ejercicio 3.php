<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this ingleslate file, choose Tools | Templates
and open the ingleslate in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            table, th, td {
                border: 1px solid black;
                padding: 20px;
                border-collapse: collapse;
            }
        </style>
        
    </head>
    <body>
        <?php
            $ingles = array("hello", "green", "washing machine", "bag", "head", "road", "way", "car", "cloud", "computer");
    
            $español[0] = "hola";
            $español[1] = "verde";
            $español[2] = "labadora";
            $español[3] = "maleta";
            $español[4] = "cabeza";
            $español[5] = "carretera";
            $español[6] = "camino";
            $español[7] = "coche";
            $español[8] = "cielo";
            $español[9] = "ordenador";
            
            echo '<table> <tr><th>Inglés</th><th>Español</th></tr>';
            
            for($i = 0 ; $i < 10 ; $i++) {
               echo "<tr><td>" , $ingles[$i] , "<td>" , $español[$i] , "</tr>";
            }
            
            echo '</table>';
        ?>
    </body>
</html>
