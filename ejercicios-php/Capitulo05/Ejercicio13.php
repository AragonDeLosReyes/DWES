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
        <h1 id="cabecera">Rellena un array bidimensional de 6 columnas por 9 filas con números enteros positivos comprendi-
        dos entre 100 y 999 (ambos incluidos). Todos los números deben ser distintos, es decir, no se puede
        repetir ninguno. Muestra a continuación por pantalla el contenido del array de tal forma que se
        cumplan los siguientes requisitos:
        • Los números de las dos diagonales donde está el mínimo deben aparecer en color verde.
        • El mínimo debe aparecer en color azul.
        • El resto de números debe aparecer en color negro.</h1>
          <div class="centrado">
          <?php
            //Genero un array de 6*9= 54 números
          $contador = 0;
          
          do {
            $numero = rand(100, 999);
            if (!in_array($numero, $linea)) {
              $linea[] = $numero;
              $contador++;
              
            }
            
          } while ($contador < 54);
          
          
          //vuelco el array en un array bidimensional de 6*9
          //y calculo las coordenadas del mínimo
          $minimo = PHP_INT_MAX;
          $contador = 0;
          for ($filas = 0; $filas < 6; $filas++) {
            for ($columnas = 0; $columnas < 9; $columnas++)  {
               $tablero[$filas][$columnas] = $linea[$contador];
               $contador++;
               if ($tablero[$filas][$columnas] < $minimo) {
                 
                 $minimo = $tablero[$filas][$columnas];
                 $filaMinimo = $filas;
                 $columnaMinimo = $columnas;
               }
            }
          } 
          
          //muestro el array con el mínimo en azul y sus diagonales en verde
          
            echo "<table>";
              for ($filas = 0; $filas < 6; $filas++) {
                echo "<tr>";
                for ($columnas = 0; $columnas < 9; $columnas++) {
                  if ($tablero[$filas][$columnas] == $minimo) {
                    echo "<td class='azul'>" . $tablero[$filas][$columnas] . "</td>";
                  } else if (abs((abs($columnas) - abs($columnaMinimo))) == abs((abs($filas) - abs($filaMinimo)))) {
                    echo "<td class='verde'><b>" . $tablero[$filas][$columnas] . "</b></td>";
                  } else {
                    echo "<td>" . $tablero[$filas][$columnas] . "</td>";
                  }
              
                }
                echo "</tr>";
          
              }
             ?>
          </table>
        </div>
      </div>
    </body>
</html>
