<!DOCTYPE html>
<!--
@autor: Carlos Aragón De Los Reyes
2º DAW
-->
<html>
  <head>
      <meta charset="UTF-10">
      <title>Capítulo 5 - Ejercicio 9</title>
      <link type="text/css" rel="stylesheet" href="css/stylesheet.css">
    </head>
  <body>
    <div id="cuerpo">
      <h1 id="cabecera">Realiza un programa que pida 10 números por teclado y que los almacene en un array. A
      continuación se mostrará el contenido de ese array junto al índice (0 – 9). Seguidamente el programa
      pedirá dos posiciones a las que llamaremos “inicial” y “final”. Se debe comprobar que inicial es
      menor que final y que ambos números están entre 0 y 9. El programa deberá colocar el número de
      la posición inicial en la posición final, rotando el resto de números para que no se pierda ninguno.
      Al final se debe mostrar el array resultante.</h1>
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
          <form action="Ejercicio09.php" method="post">
            <fieldset>
              <legend>Numero <?= ($contadorNumInt+1); ?></legend>

              <p><input autofocus placeholder="Introduce un número" type="number" name="numeroIntroducido" required=""></p><br>
              <input type="hidden" name="contadorNumInt" value="<?= $contadorNumInt; ?>">
              <input type="hidden" name="numeroTexto" value="<?= $numeroTexto; ?>">
              <input type="submit" value="OK">

            </fieldset>
          </form>
              
        <?php
          } 
          
          
          //se han introducido los 10 números  
          if ($contadorNumInt == 10) {         
            //hacemos de la variable numeroTexto un Array.
            $numero = explode(" ", $numeroTexto);
          
          
          ?>
        <div class="centrado">
        <p>Array Original</p>
        <table>
          <tr>
          <?php

          //cabezera del array que muestra los números
          for ($i = 0; $i < 10; $i++) {
            echo "<td>" . $i . "</td>";

          }
          echo "</tr><tr>";
          for ($i = 0; $i < 10; $i++) {
            echo "<td>" . $numero[$i] . "</td>";

          }
          ?>
          </tr>
        </table>
        <form action="Ejercicio09.php" method="post">
            <fieldset>
              <legend>Introduce las posiciones inicial y final></legend>
              <p><input autofocus placeholder="Posición Inicial" type="number" name="inicial" min="0" max="8" required=""></p>
              <p><input autofocus placeholder="Posición Final" type="number" name="final" min="1" max="9" required=""></p>
              <input type="hidden" name="contadorNumInt" value="<?= $contadorNumInt+1; ?>">
              <input type="hidden" name="numeroTexto" value="<?= $numeroTexto; ?>">
              <input type="hidden" name="numeroIntroducido" value="prueba">
              <input type="submit" value="OK">

            </fieldset>
          </form>
            
          <?php  
          }
          
          //Se han introducido las posiciones y números
          
          if ($contadorNumInt > 10)  {
            $inicial = $_POST['inicial'];
            $final = $_POST['final'];
            
            //si inicial mayor que final
            if ($inicial > $final)  {
              ?>
              <div class="centrado">
                <p>La posición inicial a de ser menor que la final</p>
                <form action="Ejercicio09.php" method="post">
                  <fieldset>
                    <legend>Introduce las posiciones inicial y final</legend>
                    <p><input autofocus placeholder="Posición Inicial" type="number" name="inicial" min="0" max="8" required=""></p>
                    <p><input autofocus placeholder="Posición Final" type="number" name="final" min="1" max="9" required=""></p>
                    <input type="hidden" name="contadorNumInt" value="<?= $contadorNumInt+1; ?>">
                    <input type="hidden" name="numeroTexto" value="<?= $numeroTexto; ?>">
                    <input type="hidden" name="numeroIntroducido" value="prueba">
                    <input type="submit" value="OK">

                  </fieldset>
                </form>
              </div>
            <?PHP
            
            //si inicial es menor que Final
          } else {
            
            $numero = explode(" ", $numeroTexto);
            ?>
            <div class="centrado">
                
            <!--muestra array original-->
            
              <p>Array Original</p>
              <table>
                <tr>
                <?php

                //cabezera del array que muestra los números
                for ($i = 0; $i < 10; $i++) {
                  echo "<td>" . $i . "</td>";

                }
                
                
                //números contenidos en el array
                echo "</tr><tr>";
                for ($i = 0; $i < 10; $i++) {
                  echo "<td>" . $numero[$i] . "</td>";

                }
                echo "</tr></table>";
                
                
                  ///////////////////////////////////
                 //       Array transformado      //
                ///////////////////////////////////
                
                
                //almaceno el array en un array auxiliar
                for ($i = 0; $i < 10; $i++){              
                  $auxiliar[$i] = $numero[$i];                 
                }
                
                
                
                
                //muevo los números por encima del número final
                for($i = 9; $i > $final; $i--) {
                  $numero[$i] = $numero[$i-1];
                  
                }
                
                //muevo el número de la posición inicial a la final
                $numero[$final] = $numero[$inicial];
                
                //muevo los números por debajo del número inicial
                for ($i = $inicial; $i > 0; $i--) {
                  $numero[$i] = $numero[$i - 1];
                }
                
                $numero[0] = $auxiliar[9];
                
                //muestro el array
                echo "<p>Array Final</p><table><tr>";
                //cabezera del array que muestra los números
                for ($i = 0; $i < 10; $i++) {
                  echo "<td>" . $i . "</td>";

                }
                
                //números contenidos en el array
                echo "</tr><tr>";
                for ($i = 0; $i < 10; $i++) {
                  echo "<td>" . $numero[$i] . "</td>";

                }
                
                ?>
                </tr>
              </table>
            </div>
          <?php
          }}
                ?>
            </tr>  
        </table>
      </div>
    </div>
  </body>
</html>