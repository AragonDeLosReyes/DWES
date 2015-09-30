<!DOCTYPE html>
<!--
@autor: Carlos Aragón De Los Reyes
2º DAW
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Capítulo 3 - Ejercicio 13</title>
        <link type="text/css" rel="stylesheet" href="css/stylesheet.css">
    </head>
    <body>
        <div id="cuerpo">
            <h1 id="cabecera">Escribe un programa que ordene tres números enteros introducidos por teclado.</h1>
            <form action="Ejercicio13.php" method="get">
                <fieldset>
                    <legend>Formulario</legend>
                    <p>X <input autofocus type="number" name="x"></p><br>
                    <p>Z <input type="number" name="z"></p><br>
                    <p>Y <input type="number" name="y"></p><br>
                    <input type="submit" value="Enviar">
                </fieldset>
                
                <fieldset>
                    <legend>Resultado</legend>
                    <?php
                      $x =  $_GET['x']; 
                      $y =  $_GET['y']; 
                      $z =  $_GET['z']; 
                      
                      
                      if (($x < $y) && ($x < $z)) {
                        if ($y < $z ) {
                          echo "<p>$x, $y, $z</p>";
                        } else {
                          echo "<p>$x, $z, $y</p>";
                        } 
                      }
                      
                      if (($y < $x) && ($y < $z)) {
                        if ($x < $z) {
                          echo "<p>$y, $x, $z</p>";
                        } else {
                          echo "<p>$y, $z, $x</p>";
                          
                        } 
                      }
                      
                      if (($z < $x) && ($z < $y)) {
                        if ($x < $y) {
                          echo "<p>$z, $x, $y</p>";
                        } else {
                          echo "<p>$z, $y, $x</p>";
                          
                        } 
                      } 
                    ?>
                </fieldset>
            </form>
        </div>
    </body>
</html>
