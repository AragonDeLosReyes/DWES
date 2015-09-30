<!DOCTYPE html>
<!--
@autor: Carlos Aragón De Los Reyes
2º DAW
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Capítulo 3 - Ejercicio 09</title>
        <link type="text/css" rel="stylesheet" href="css/stylesheet.css">
    </head>
    <body>
        <div id="cuerpo">
            <h1 id="cabecera">Realiza un programa que resuelva una ecuación de segundo grado (del tipo ax<sup>2</sup> + bx + c = 0).</h1>
            <form action="Ejercicio09.php" method="get">
                <fieldset>
                    <legend>Formulario</legend>
                    <p>A <input autofocus type="number" name="a"></p><br>
                    <p>B <input type="number" name="b"></p><br>
                    <p>C <input type="number" name="c"></p><br>
                    <input type="submit" value="Enviar">
                </fieldset>
                
                <fieldset>
                    <legend>Resultado</legend>
                    <?php
                      $a =  $_GET['a']; 
                      $b =  $_GET['b']; 
                      $c =  $_GET['c']; 

                      // 0x^2 + 0x + 0 = 0

                      if (($a == 0) && ($b == 0) && ($c == 0)) {
                        echo "<p>La ecuación tiene infinitas soluciones.</p>";
                      }

                      // 0x^2 + bx + c = 0  con a = 0

                      if (($a == 0) && ($b != 0) && ($c != 0)) {	
                        $x1 = + (-$c / $b);
                        echo "<p>x = $x1</p>" ;
                      }

                      // ax^2 + 0x + c = 0  con b = 0

                      if (($a != 0) && ($b == 0) && ($c != 0)) {	
                        echo "<p>La ecuación no tiene solución</p>";
                      }

                      // ax^2 + bx + 0 = 0  con c = 0

                      if (($a != 0) && ($b != 0) && ($c == 0)) {	
                        echo "<p>x<sub>1</sub> = 0</p>";
                        echo "<p>x<sub>2</sub> = " , (-$b / $a) , "</p>";
                      }

                      // ax^2 + 0x + 0 = 0 con a distinto de 0

                      if (($a != 0) && ($b == 0) && ($c == 0)) {
                        echo "<p>x = 0</p>";
                      }

                      // 0x^2 + bx + 0 = 0 con b distinto de 0

                      if (($a == 0) && ($b != 0) && ($c == 0)) {
                        echo "<p>x = 0</p>";
                      }

                      // 0x^2 + 0x + c = 0  con c distinto de 0

                      if (($a == 0) && ($b == 0) && ($c != 0)) {
                        echo "<p>La ecuación no tiene solución.</p>";
                      }

                      // ax^2 + bx + c = 0  con a, b y c distintos de 0

                      if (($a != 0) && ($b != 0) && ($c != 0)) {	

                      $discriminante = (pow($b, 2) - (4 * $a * $c));

                        if ($discriminante < 0) {
                          echo "<p>La ecuación no tiene soluciones reales</p>";
                        } else {
                            echo "<p>x<sub>1</sub> = " , round((-$b + sqrt($discriminante)) / (2 * $a) , 4) , "</p>";
                            echo "<p>x<sub>2</sub> = " , round((-$b - sqrt($discriminante)) / (2 * $a) , 4) , "</p>";
                        }
                      }
                    ?>
                </fieldset>
            </form>
        </div>
    </body>
</html>
