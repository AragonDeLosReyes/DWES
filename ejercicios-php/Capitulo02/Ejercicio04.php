<!DOCTYPE html>
<!--
@autor: Carlos Aragón De Los Reyes
2º DAW
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Capítulo 2 - Ejercicio 3</title>
        <link type="text/css" rel="stylesheet" href="css/stylesheet.css">
    </head>
    <body>
        <div id="cuerpo">
            <h1 id="cabecera">Escribe un programa que sume, reste, multiplique y divida dos números introducidos por teclado.</h1>
            <form action="Ejercicio04.php" method="get">
                <fieldset>
                    <legend>Formulario</legend>        
                    <p>X <input autofocus type="number" name="x"></p><br>
                    <p>Y <input type="number" name="y"></p><br>
                    <input type="submit" value="Enviar">
                </fieldset>
                <fieldset>
                    <legend>Resultado</legend>
        
                    <?php
                        $x =  $_GET['x']; 
                        $y = $_GET['y'];
                            echo "<p>$x + $y = " , ($x+$y) , "<br>";
                            echo "$x - $y = " , ($x-$y) , "<br>";
                            echo "$x / $y = " , ($x/$y) , "<br>";
                            echo "$x x $y = " , ($x*$y) , "<br></p>";
                    ?>
                </fieldset>
                
        </form>
    </body>
</html>
