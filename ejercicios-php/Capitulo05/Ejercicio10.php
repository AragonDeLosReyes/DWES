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
        <h1 id="cabecera">Realiza un programa que escoja al azar 10 cartas de la baraja española y que diga cuántos puntos
        suman según el juego de la brisca. Emplea un array asociativo para obtener los puntos a partir del
        nombre de la figura de la carta. Asegúrate de que no se repite ninguna carta, igual que si las hubieras
        cogido de una baraja de verdad.</h1>
          <div class="centrado">
          <?php
            $puntuacion = array ('as' => 11, 'dos' => 0, 'tres' => 10, 'cuatro' => 0, 'cinco' => 0, 'seis' => 0, 'siete' => 0, 'sota' => 2, 'caballo' => 3, 'rey' => 4);
            $palo = array ('oro', 'bastos', 'copas', 'espadas');
            $numeros = array ('as', 'dos', 'tres', 'cuatro', 'cinco', 'seis', 'siete', 'sota', 'caballo', 'rey');
            $contador = 0;
            do {
              $paloCarta = $palo[rand(0, 3)];
              $numeroCarta = $numeros[rand(0, 9)];
              $puntuacionCarta = $puntuacion[$numeroCarta];
              $nombreCarta = "$numeroCarta de $paloCarta";
              if (!in_array($nombreCarta, $cartasEchadas))  {
                $cartasEchadas[] = $nombreCarta;
                echo "<p>" . $nombreCarta . " --> " . $puntuacionCarta . "</p>";
                $contador++;
                $puntuacionTotal += $puntuacionCarta;
              }


            } while ($contador < 10);
          ?>
          <p class="rojo">Puntuación Total = <?=$puntuacionTotal;?></p>
                    
        </div>
      </div>
    </body>
</html>
