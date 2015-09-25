<!DOCTYPE html>
<!--
@autor: Carlos Aragón De Los Reyes
2º DAW
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Capítulo 2 - Ejercicio 5</title>
        <link type="text/css" rel="stylesheet" href="css/stylesheet.css">
    </head>
    <body>
        <div id="cuerpo">
            <h1 id="cabecera">Escribe un programa que calcule el área de un rectángulo.</h1>
                <form action="Ejercicio05.php" method="get">
                <fieldset>
                    <legend>Formulario</legend>         
                    <p>Base <input autofocus type="number" name="base"  placeholder="cm"></p><br>
                    <p>Altura <input type="number" name="altura" placeholder="cm"></p><br>
                    <input type="submit" value="Enviar">
                </fieldset>
                <fieldset>
                    <?php 
                        $base =  $_GET['base']; 
                        $altura = $_GET['altura'];   
                        $resultado = ($base * $altura);

                        if ($resultado != 0) {
                            echo "<p>El Area del rectángulo es: $resultado cm<sup>2</sup></p>";
                        }
                    ?>
                </fieldset>
        </form>
    </body>
</html>

