<!DOCTYPE html>
<!--
@autor: Carlos Aragón De Los Reyes
2º DAW
-->
<html>
  <head>
      <meta charset="UTF-10">
      <title>Capítulo 5 - Ejercicio 8</title>
      <link type="text/css" rel="stylesheet" href="css/stylesheet.css">
    </head>
  <body>
    <div id="cuerpo">
      <h1 id="cabecera">Realiza un programa que pida 10 números por teclado y que los almacene en un array. A
      continuación se mostrará el contenido de ese array junto al índice (0 – 9) utilizando para ello una
      tabla. Seguidamente el programa pasará los primos a las primeras posiciones, desplazando el resto
      de números (los que no son primos) de tal forma que no se pierda ninguno. Al final se debe mostrar
      el array resultante.</h1>
      <?php
        //Si se inicia la página por primera vez entra en este bucle e inicializa
        //las variables por primera vez
        if (!isset($_POST['numeroIntroducido']))  {
          $contadorNumInt = 0;
          $numeroTexto = "";
          
        //Si ya se ha iniciado el programa sigue aquí
        } else {       
          //Recoge datos mientras no se hayan introducido 10 números

          if ($contadorNumInt < 10) {
            $contadorNumInt = $_POST['contadorNumInt'];
            $numeroIntroducido = $_POST['numeroIntroducido'];
            $numeroTexto = $_POST['numeroTexto'];

            //si la variable todavía no tiene ningún dato almacenado
            if ($numeroTexto == "") {
              $numeroTexto = $numeroIntroducido;
              // si ya tiene datos almacenados, se almacena lo que ya tiene como texto 
              // + el nuevo número introducido.
            } else  {
              $numeroTexto = $numeroTexto . ' ' . $numeroIntroducido;
            }
            //aumento el contador de los número introducidos
            $contadorNumInt++;
          }     
        }
        //si no se han introducido números o el contador es inferior a 10 se muestra el formulario.
        if (!isset($_POST['numeroIntroducido']) || ($contadorNumInt < 10))  {
        ?>
        <form action="Ejercicio08.php" method="post">
          <fieldset>
            <legend>Numero <?= ($contadorNumInt+1); ?></legend>

            <p><input autofocus placeholder="Introduce un número" type="number" name="numeroIntroducido" required=""></p><br>
            <input type="hidden" name="contadorNumInt" value="<?= $contadorNumInt; ?>">
            <input type="hidden" name="numeroTexto" value="<?= $numeroTexto; ?>">
            <input type="submit" value="OK">

          </fieldset>
      <?php
        }
      ?>
      </form>
        <div class="centrado"> 
      <?php        
        //programa principal
        if ($contadorNumInt == 10) {
          $numero = explode(" ", $numeroTexto);
          
      ?>
          <p>Array Original</p>
          <table>
            <tr>
            <?php

            for ($i = 0; $i < 10; $i++) {
            ?>
              <td class="lineaInferior"><?= $i; ?></td>
            <?php
            }
            ?>
            </tr>
            <tr>
              <?php
                foreach ($numero as $numeroEach)  {
                  echo "<td>$numeroEach</td>";
                }
              ?>              
            </tr>
          </table>
      <?php
        $cuentaPrimos = 0;
        $cuentaNoPrimos = 0;

        //Programa principal
          for ($i = 0; $i < 10; $i++)  {    
          //si el número de esta posición es par lo almacena en array primos
            $esPrimo = true;
            for ($j = 2; $j < $numero[$i]; $j++) {
              if (($numero[$i] % $j) == 0) {
                $esPrimo = false;
              }
            }

            if ($esPrimo) {
              $primos[$cuentaPrimos] = $numero[$i];
              $cuentaPrimos++;
            } else {
              $noPrimos[$cuentaNoPrimos] = $numero[$i];
              $cuentaNoPrimos++;
            }
          
          }
        
        //almaacena los número primos en el array llegando hasta la posición última del array primos
        for ($i = 0; $i < $cuentaPrimos; $i++) {
          $numero[$i] = $primos[$i]; 
        }

        
        //va recorriendo las posiciones del array no primo y va almacenando los valores en la última posición del array principal
        //libre que se dejó al almacenar los primos.
        for ($i = $cuentaPrimos; $i < ($cuentaPrimos + $cuentaNoPrimos); $i++) {
        
          $numero[$i] = $noPrimos[$i - $cuentaPrimos]; 
          
        }
        ?>
        <p>Array Ordenado</p>
        <table>
          <tr>
          <?php
            for ($i = 0; $i < 10; $i++) {
          ?>
            
          <td class="lineaInferior"><?= $i; ?></td>
                
          <?php
            }
          ?>
          </tr>
          <tr>
          <?php
          //ya estan ordenados y esto muestra el resultado del array principal.
            for ($i = 0; $i < 10; $i++)  {
              echo  "<td>" . $numero[$i] . "</td>";
            }
      }
          ?>
                    
          </tr>
        </table>
      </div>
    </div>
  </body>
</html>