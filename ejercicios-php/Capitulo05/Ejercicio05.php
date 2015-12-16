
<!DOCTYPE html>
<!--
@autor: Carlos Aragón De Los Reyes
2º DAW
-->
<html>
  <head>
      <meta charset="UTF-8">
      <title>Capítulo 5 - Ejercicio 5</title>
      <link type="text/css" rel="stylesheet" href="css/stylesheet.css">
  </head>
  <body>
    <div id="cuerpo">
      <h1 id="cabecera">Realiza un programa que pida la temperatura media que ha hecho en cada mes de un determinado
      año y que muestre a continuación un diagrama de barras horizontales con esos datos. Las barras
      del diagrama se pueden dibujar a base de la concatenación de una imagen.</h1>
      <?php
        //Si se inicia la página por primera vez entra en este bucle e inicializa
        //las variables por primera vez
        if (!isset($_POST['temperaturaIntroducida']))  {
          $contadorMesInt = 0;
          $temperaturaTexto = "";
          
        //Si ya se ha iniciado el programa sigue aquí
        } else {       
          //Recoge datos mientras no se hayan introducido 3 números

          if ($contadorMesInt < 12) {
            $contadorMesInt = $_POST['contadorMesInt'];
            $temperaturaIntroducida = $_POST['temperaturaIntroducida'];
            $temperaturaTexto = $_POST['temperaturaTexto'];

            //si la variable todavía no tiene ningún dato almacenado
            if ($temperaturaTexto == "") {
              $temperaturaTexto = $temperaturaIntroducida;
              // si ya tiene datos almacenados, se almacena lo que ya tiene como texto 
              // + el nuevo número introducido.
            } else  {
              $temperaturaTexto = $temperaturaTexto . ' ' . $temperaturaIntroducida;
            }
            //aumento el contador de los número introducidos
            $contadorMesInt++;
          }     
        }
        //si no se han introducido números o el contador es inferior a 12 se muestra el formulario.
        if (!isset($_POST['temperaturaIntroducida']) || ($contadorMesInt < 12))  {
          $mes = ["enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"];
        ?>
        <form action="Ejercicio05.php" method="post">
          <fieldset>
            <legend>Temperatura de <?= $mes[$contadorMesInt]; ?></legend>

            <p><input autofocus placeholder="Introduce la temperatura" type="number" name="temperaturaIntroducida" required=""></p><br>
            <input type="hidden" name="contadorMesInt" value="<?= $contadorMesInt; ?>">
            <input type="hidden" name="temperaturaTexto" value="<?= $temperaturaTexto; ?>">
            <input type="submit" value="OK">

          </fieldset>
      <?php
        }
      ?>
      </form>
        <div class="centrado"> 
            
      <?php
      
        //programa principal
        if ($contadorMesInt == 12) {
          $grado = explode(" ", $temperaturaTexto);
          $mes = ["enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"];
          
          
          $maximo = -PHP_INT_MAX;
          $minimo = PHP_INT_MAX;

          foreach ($grado as $gradoEach) {
            if ($gradoEach > $maximo) {
              $maximo = $gradoEach;
            }
             if ($gradoEach < $minimo) {
              $minimo = $gradoEach;
            }
          }
          
          if ($maximo < 0)  {
            $totalMax = (-$maximo);
          } else {
            $totalMax = $maximo;
          }
          
          if ($minimo < 0)  {
            $totalMin = (-$minimo);
            
          } else {
            $totalMin = $minimo;
          }

          $totalGrados = ($totalMax + $totalMin);
          if ($totalGrados < 0) {
            $totalGrados = -$totalGrados;
            
          } 
          
          //pinto una tabla hago dos columnas en principio, una será para los meses, otra para los grados de cada mes,
          //la columna de los grados de cada mes es tan grande como el total de la suma de la cantidad de subcolumnas
          //que habrá entre la suma del mes más frio y el més mas cálido
          ?><table>
              <tr>
                  <td></td>
                  <!-- Esta celda tendrá una anchura tan grande como la suma de la máxima y mínima de los grados de los meses del año + 1 para contar el 0-->
                  <td colspan="<?=($totalGrados+1)?>">Temperatura</td>
              </tr>
              <tr>
                  <td>mes</td>
              <?php
              
              //voy a pintar tantos grados como la suma desde el més más frio al más caluroso, para enumerarlos.
                for ($d = $minimo; ($d < ($maximo+1)) || ($d < 1) ; $d++)  {
                  
                  //si son menores a 0 va a pintarlos en 
                  if ($d < 0) {
                    echo "<td class='azulCelda'>$d</td>";
                  } else {
                    echo "<td class='verdeCelda'>$d</td>";
                  }
                  
                }
              ?>
              
              </tr>
          <?php
          //este for pinta los nombres de los meses contenidos en el array mes y los grados que tiene representados con celdas cada grado.
          for ($i = 0; $i < 12; $i++)   {
            echo "<tr><td>$mes[$i]</td>";
            //vamos a pintar celdas por debajo de 0 a todos los meses que sean superior al mínimo
            //es decir si marzo tiene 0 grados, pero hay un mes que tiene -5 va a pintar, 5 celdas más a marzo 
            //para que cuadre la tabla
            if (($grado[$i] > $minimo) && ($grado[$i] < 0) ) {
              //este for pinta las celdas desde la temperatura si el mes es negativo hasta 0
              for ($auxGrados = $grado[$i]; $auxGrados > $minimo; $auxGrados--){
                echo "<td></td>";
              }

            }
            //este for va a pintar columnas por cada grado negativo que haya en un mes negativo hasta llegar a 0
            for ($b = 0; $b > $grado[$i]; $b--) {

              echo "<td class='azulCelda'></td>";
            }
            // este if lo que hará es que si el mes tiene una temperatura mayor a 0, me va a pintar grados negativos en rojo
            //tantos como haya en el més más bajo, es por tema de que cuadren las celdas de todos los meses.
            if ($grado[$i] > 0) {
              for ($c = $minimo; $c < 0; $c++ ) {
                echo "<td></td>";
              }
            }
             //este if lo que me pinta los meses con 0 grados, 
            if ($grado[$i] == 0) {
              //cada mes pinta, tantas celdas como el mínimo
              for ($c = $minimo; $c < 0; $c++ ) {
                echo "<td></td>";
              }
             echo "<td class='verdeCelda'></td>";
            //este else me pinta tambien la celda 0 en los meses que sean distintos a 0 grados
            } else {
              echo "<td class='verdeCelda'></td>";

            }
            //Este pinta las celdas de los meses con más de 0 grados.
              for ($a = 0; $a < $grado[$i]; $a++)  {
                echo "<td class='verdeCelda'></td>";
              }
              echo "</tr>";
            }
              
              
          }
        
      ?>
          </table>
        </div>
    </div>
  </body>
</html>
