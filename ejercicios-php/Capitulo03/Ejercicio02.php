<!DOCTYPE html>
<!--
@autor: Carlos Aragón De Los Reyes
2º DAW
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Capítulo 3 - Ejercicio 2</title>
        <link type="text/css" rel="stylesheet" href="css/stylesheet.css">
    </head>
    <body>
        <div id="cuerpo">
            <h1 id="cabecera">Realiza un programa que pida una hora por teclado y que muestre luego buenos días, buenas
            tardes o buenas noches según la hora. Se utilizarán los tramos de 6 a 12, de 13 a 20 y de 21 a 5.
            respectivamente. Sólo se tienen en cuenta las horas, los minutos no se deben introducir por teclado.</h1>
            <form action="Ejercicio02.php" method="post">
                <fieldset>
                    <legend>Formulario</legend>
                    <p>hora <input autofocus min="0" max="24" title="números entre 0 y 24" type="number" name="x"></p><br>
                    
                    <input type="submit" value="Enviar">
                </fieldset>
                
                <fieldset>
                    <legend>Resultado</legend>
                    <?php
                        if (isset($_POST['x'])) {
                          $hora =  $_POST['x']; 

                          if (($hora >= 6) && ($hora <= 12)) {

                              echo "<p>Buenos días</p>"; 
                          } if (($hora >= 13) && ($hora <= 20)) {

                              echo "<p>Buenas tardes</p>"; 
                          } if (($hora >= 21) && ($hora <= 24)) {

                              echo "<p>Buenas noches</p>"; 

                          } if (($hora >= 0) && ($hora <= 5)) {

                              echo "<p>Buenas noches</p>";                              
                          }
                        }
                    ?>
                </fieldset>
            </form>
        </div>
    </body>
</html>
