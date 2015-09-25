<!DOCTYPE html>
<!--
@autor: Carlos Aragón De Los Reyes
2º DAW
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Capítulo 2 - Ejercicio 8</title>
        <link type="text/css" rel="stylesheet" href="css/stylesheet.css">
    </head>
    <body>
        <div id="cuerpo">
            <h1 id="cabecera">Escribe un programa que calcule el salario semanal de un trabajador en base a las horas trabajadas.
            Se pagarán 12 euros por hora.</h1>
            <form action="Ejercicio08.php" method="get">
                <fieldset>
                    <legend>Formulario</legend>         
                    <p><input autofocus type="number" name="horas" placeholder="Horas Trabajadas"></p><br>
            <br>
                    <input type="submit" value="Enviar" >
                </fieldset>
                <fieldset>
                    <?php 
                        $horas =  $_GET['horas']; 
                        $resultado = ($horas * 12);
                        if ($horas <> 0)  {
                            echo "<p>El salario semanal es: $resultado €</p>";
                        }
                    ?>

                </fieldset>
            </form>
        </div>
    </body>
</html>