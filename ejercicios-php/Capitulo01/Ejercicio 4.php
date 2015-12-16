<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
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
        <table>
        <?php
            
            $dia = array("hora" , "lunes", "martes", "miércoles", "jueves", "viernes");
            $DWES = "DWES";
            $EINEM = "EINEM";
            $DIW = "DIW";
            
            for($i = 0 ; $i < 6 ; $i++) {
                echo "<th>" , $dia[$i];
            }
            for($i = 0 ; $i < 6 ; $i++) {
                if ($i < 3) {
                    echo "</th><tr><td>", $i+1 , "</td><td>DWES</td><td>DWEC</td><td>DWES</td><td>DWEC</td><td>DIW</td>";
                }
                if ($i == 3) {

                    echo "</th><tr><td>", $i+1 , "</td><td>EINEM</td><td>DAW</td><td>HLC</td><td>EINEM</td><td>DIW</td>";

                } if ($i > 3) {
                    echo "</th><tr><td>", $i+1 , "</td><td>DIW</td><td>DAW</td><td>HLC</td><td>EINEM</td><td>DWES</td>";
                }
            }
            
        ?>
        </table>
    </body>
</html>
