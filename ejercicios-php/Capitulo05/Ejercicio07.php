<!DOCTYPE html>
<!--
@autor: Carlos Aragón De Los Reyes
2º DAW
-->
<html>
  <head>
      <meta charset="UTF-8">
      <title>Capítulo 5 - Ejercicio 7</title>
      <link type="text/css" rel="stylesheet" href="css/stylesheet.css">
  </head>
  <body>
    <div id="cuerpo">
      <h1 id="cabecera">Escribe un programa que genere 20 números enteros aleatorios entre 0 y 100 y que los almacene en
      un array. El programa debe ser capaz de pasar todos los números pares a las primeras posiciones del
      array (del 0 en adelante) y todos los números impares a las celdas restantes. Utiliza arrays auxiliares
      si es necesario.</h1>
      <?php
        $tamañoArray = 20;
        $numeroText = "";
        //contadores de arrays par e impar 
        $a = 0;
        $b = 0;
        $contador++;

        //Genero el array con los 20 números aleatorios de 0 a 100
        for ($i = 0; $i < $tamañoArray; $i++) {
          // números aleatorios entre 0 y 100 (ambos incluidos)
          $numero[$i] = rand(0, 100);
        }
        
        //muestra los números antes de ordenar
        echo "<p>numeros antes de ordenar</p><p>";
        foreach ($numero as $numeroEach)  {
          echo $numeroEach . " ";
          
        }
        echo "</p>";
        
        
        //Programa principal
        foreach ($numero as $numeroEach)  {
          //si el número de esta posición es par lo almacena en array pares
          if ($numeroEach % 2 == 0) {
            $pares[$a] = $numeroEach;
            $a++;
          } else {
            $impares[$b] = $numeroEach;
            $b++;
          }
          
        }
        
        //almaacena los número pares en el array llegando hasta la posición última del array pares
        for ($i = 0; $i < count($pares); $i++) {
          $numero[$i] = $pares[$i]; 
          $contador++;
          
        }
        
        //va recorriendo las posiciones del array impar y va almacenando los valores en la última posición del array principal
        //libre que se dejó al almacenar los pares.
        foreach ($impares as $imparesEach)  {
          $numero[$contador-1] = $imparesEach; 
          $contador++;
          
        }
        
        //ya estan ordenados y esto muestra el resultado del array principal.
        echo "<p>numeros despues de ordenar</p><p>";
        foreach ($numero as $numeroEach)  {
          echo  $numeroEach . " ";
          
        }
        ?>
      </p>
    </div>
  </body>
</html>
