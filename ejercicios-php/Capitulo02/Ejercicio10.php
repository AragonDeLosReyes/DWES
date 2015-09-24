<!DOCTYPE html>
<!--
@autor: Carlos Aragón De Los Reyes
2º DAW
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Capítulo 2 - Ejercicio 9</title>
        <link type="text/css" rel="stylesheet" href="css/stylesheet.css">
    </head>
    <body>
        <div id="cuerpo">
            <h1 id="cabecera">Realiza un conversor de Mb a Kb.</h1>
            <form action="Ejercicio10.php" method="get">
                <fieldset>
                    <legend>Formulario</legend>   
                    <p><input type="number" name="mb" placeholder="Mb"></p><br>
                    <br>
                    <input type="submit" value="Enviar" >
                </fieldset>
                <fieldset>
                    <?php 
                    $mb =  $_GET['mb']; 
                    $kb = ($mb * 1024);    
                    echo "$mb Mb son $kb Kb";
                ?>
                </fieldset>
        </form>
    </body>
</html>
