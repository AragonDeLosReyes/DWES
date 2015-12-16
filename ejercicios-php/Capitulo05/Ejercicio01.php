<!DOCTYPE html>
<!--
@autor: Carlos Aragón De Los Reyes
2º DAW
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Capítulo 5 - Ejercicio 1</title>
        <link type="text/css" rel="stylesheet" href="css/stylesheet.css">
    </head>
    <body>
        <div id="cuerpo">
            <h1 id="cabecera">Define tres arrays de 20 números enteros cada una, con nombres “numero”, “cuadrado” y “cubo”.
            Carga el array “numero” con valores aleatorios entre 0 y 100. En el array “cuadrado” se deben
            almacenar los cuadrados de los valores que hay en el array “numero”. En el array “cubo” se deben
            almacenar los cubos de los valores que hay en “numero”. A continuación, muestra el contenido de
            los tres arrays dispuesto en tres columnas.</h1>
                  <?php

                    $tamañoArray = 20;

                    //Genero el array con los 20 números aleatorios
                    for ($i = 0; $i < $tamañoArray; $i++) {
                      // números aleatorios entre 0 y 100 (ambos incluidos)
                      $numero[$i] = rand(0, 100);
                    }

                    //Meto los cuadrados en otro array
                    for ($i = 0; $i < $tamañoArray; $i++) {
                      // números aleatorios entre 0 y 100 (ambos incluidos)
                      $numeroCuadrado[$i] = pow($numero[$i], 2); 
                    }

                    //Meto los cubos en otro array
                    for ($i = 0; $i < $tamañoArray; $i++) {
                      // números aleatorios entre 0 y 100 (ambos incluidos)
                      $numeroCubo[$i] = pow($numero[$i], 3); 
                    }

                  ?>
                  <div class="centrado">
                    <table>
                      <tr>
                          <td class="rojo">Número</td>
                      <?php
                        //muestro los valores al cuadrado
                        foreach ($numero as $elemento) {
                          echo "<td>" , $elemento, "</td>";
                        }
                      ?>
                      <tr>
                          <td class="rojo">Cuadrado</td>
                      <?php
                        //muestro los valores al cuadrado
                        foreach ($numeroCuadrado as $elemento) {
                          echo "<td>" , $elemento, "</td>";
                        }
                      ?>
                      <tr>
                        <td class="rojo">Cubo</td>
                      <?php
                        //muestro los valores al cubo
                        foreach ($numeroCubo as $elemento) {
                          echo "<td>" , $elemento, "</td>";
                        }
                      ?>
                      </tr>
                    </table>
                  </div>
        </div>
    </body>
</html>
