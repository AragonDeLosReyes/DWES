<!DOCTYPE html>
<!--
@autor: Carlos Aragón De Los Reyes
2º DAW
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Capítulo 3 - Ejercicio 10</title>
        <link type="text/css" rel="stylesheet" href="css/stylesheet.css">
    </head>
    <body>
        <div id="cuerpo">
            <h1 id="cabecera">Escribe un programa que nos diga el horóscopo a partir del día y el mes de nacimiento.</h1>
            <form action="Ejercicio10.php" method="get">
                <fieldset>
                    <legend>Formulario</legend>
                    <p><input autofocus min="1" max="31" placeholder="Día de Nacimiento" title="introduzca tu día de nacimiento" type="number" name="dia"></p><br>
                    <p><input placeholder="Mes de Nacimiento" title="introduzca tu mes de nacimiento" type="text" name="mes"></p><br>

                    <input type="submit" value="Enviar">
                </fieldset>
                
                <fieldset>
                  <legend>Resultado</legend>
                  <?php
                    $dia =  strtolower($_GET['dia']);
                    $mes =  strtolower($_GET['mes']);
                    
                    if (($dia > 29) && ($mes == "febrero")) {
                      echo "<p>¿Seguro que has nacido el $dia de $mes?</p>";
                    } else {


                      if (($mes == "enero") && ($dia < 20)) {
                      echo "<p>Tu horóscopo es Capricornio</p>";
                      } else if (($mes == "enero") && ($dia >= 31)) {
                      echo "<p>Tu horóscopo es Aquario</p>";
                      } else if  (($mes == "febrero") && ($dia < 18)) {
                      echo "<p>Tu horóscopo es Aquario</p>";
                      } else if  (($mes == "febrero") && ($dia >= 18)) {
                      echo "<p>Tu horóscopo es Piscis</p>";
                      } else if  (($mes == "marzo") && ($dia < 20)) {
                      echo "<p>Tu horóscopo es Piscis</p>";
                      } else if  (($mes == "marzo") && ($dia >= 20)) {
                      echo "<p>Tu horóscopo es Aries</p>";
                      } else if  (($mes == "abril") && ($dia < 20)) {
                      echo "<p>Tu horóscopo es Aries</p>";
                      } else if  (($mes == "abril") && ($dia >= 20)) {
                      echo "<p>Tu horóscopo es Tauro</p>";
                      } else if  (($mes == "mayo") && ($dia < 21)) {
                      echo "<p>Tu horóscopo es Tauro</p>";
                      } else if  (($mes == "mayo") && ($dia >= 21)) {
                      echo "<p>Tu horóscopo es Géminis</p>";
                      } else if  (($mes == "junio") && ($dia < 21)) {
                      echo "<p>Tu horóscopo es Géminis</p>";
                      } else if  (($mes == "junio") && ($dia >= 21)) {
                      echo "<p>Tu horóscopo es Cáncer</p>";
                      } else if  (($mes == "julio") && ($dia < 23)) {
                      echo "<p>Tu horóscopo es Cáncer</p>";
                      } else if  (($mes == "julio") && ($dia >= 23)) {
                      echo "<p>Tu horóscopo es Leo</p>";
                      } else if  (($mes == "agosto") && ($dia < 23)) {
                      echo "<p>Tu horóscopo es Leo</p>";
                      } else if  (($mes == "agosto") && ($dia >= 23)) {
                      echo "<p>Tu horóscopo es Virgo</p>";            
                      } else if  (($mes == "septiembre") && ($dia < 23)) {
                      echo "<p>Tu horóscopo es virgo</p>";
                      } else if  (($mes == "septiembre") && ($dia >= 23)) {
                      echo "<p>Tu horóscopo es Libra</p>";    
                      } else if  (($mes == "octubre") && ($dia < 23)) {
                      echo "<p>Tu horóscopo es Libra</p>";    
                      } else if  (($mes == "octubre") && ($dia >= 23)) {
                      echo "<p>Tu horóscopo es Escorpio</p>";    
                      } else if  (($mes == "noviembre") && ($dia < 22)) {
                      echo "<p>Tu horóscopo es Escorpio</p>";    
                      } else if  (($mes == "noviembre") && ($dia >= 22)) {
                      echo "<p>Tu horóscopo es Sagitario</p>";    
                      } else if  (($mes == "diciembre") && ($dia < 22)) {
                      echo "<p>Tu horóscopo es Sagitario</p>";    
                      } else if  (($mes == "diciembre") && ($dia >= 22)) {
                      echo "<p>Tu horóscopo es Capricornio</p>";    
                      }
                    }
                  ?>
                </fieldset>
            </form>
        </div>
    </body>
</html>
