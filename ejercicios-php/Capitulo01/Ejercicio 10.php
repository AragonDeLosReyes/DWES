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
    </head>
    <body>
        <?php
        $relleno = "*";
        $base = 9;
        $altura = 1;
        $espacioDel = $base -1;
        $contador = 0;

        while ($altura <= ($base+1)/2) {

          for ($contador = 1; $contador <= $espacioDel; $contador++) {
            echo "&nbsp&nbsp";
          }

          for ($contador = 1; $contador < $altura * 2; $contador++)  {
            echo $relleno;
          }

          echo "</br>";

          $altura++;
          $espacioDel--;
        }

      
        ?>
    </body>
</html>
