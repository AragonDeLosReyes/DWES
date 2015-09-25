<!DOCTYPE html>
<!--
@autor: Carlos Aragón De Los Reyes
2º DAW
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Capítulo 2 - Ejercicio 1</title>
        <link type="text/css" rel="stylesheet" href="css/stylesheet.css">
    </head>
    <body>
        <div id="cuerpo">
            <h1 id="cabecera">Realiza un programa que pida dos números y luego muestre el resultado de su multiplicación</h1>
            <form action="Ejercicio01.php" method="get">
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
                        $resultado = $x*$y;
                        if ($resultado != 0) {

                            echo "<p> $x x $y = " , $resultado , "</p>"; 
                        } else {
                            echo "<p>0<p>";
                        }
                    ?>
                </fieldset>
            </form>
        </div>
    </body>
</html>
