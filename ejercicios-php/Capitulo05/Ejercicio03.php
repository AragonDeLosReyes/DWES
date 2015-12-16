<!DOCTYPE html>
<!--
@autor: Carlos Aragón De Los Reyes
2º DAW
-->
<html>
  <head>
      <meta charset="UTF-8">
      <title>Capítulo 5 - Ejercicio 3</title>
      <link type="text/css" rel="stylesheet" href="css/stylesheet.css">
  </head>
  <body>
    <div id="cuerpo">
      <h1 id="cabecera">Escribe un programa que lea 15 números por teclado y que los almacene en un array. Rota los
      elementos de ese array, es decir, el elemento de la posición 0 debe pasar a la posición 1, el de la 1 a
      la 2, etc. El número que se encuentra en la última posición debe pasar a la posición 0. Finalmente,
      muestra el contenido del array.</h1>
      <?php
        //Si se inicia la página por primera vez entra en este bucle e inicializa
        //las variables por primera vez
        if (!isset($_POST['numeroIntroducido']))  {
          $contadorNumerosInt = 0;
          $numeroTexto = "";
        //Si ya se ha iniciado el programa sigue aquí
        } else {       
          //Recoge datos mientras no se hayan introducido 10 números
          if ($contadorNumerosInt < 15) {
            $contadorNumerosInt = $_POST['contadorNumerosInt'];
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
            $contadorNumerosInt++;
          }     
        }
        //si no se han introducido números o el contador es inferior a 10 se muestra el formulario.
        if (!isset($_POST['numeroIntroducido']) || ($contadorNumerosInt < 15))  {
        ?>
        <form action="Ejercicio03.php" method="post">
          <fieldset>
            <legend>Número <?= $contadorNumerosInt+1; ?></legend>

            <p><input autofocus placeholder="Introduce un número" type="number" name="numeroIntroducido" required=""></p><br>
            <input type="hidden" name="contadorNumerosInt" value="<?= $contadorNumerosInt; ?>">
            <input type="hidden" name="numeroTexto" value="<?= $numeroTexto; ?>">
            <input type="submit" value="OK">

          </fieldset>
      <?php
        }
      ?>
      </form>
        <div class="centrado"> 
            
                
      <?php
      //Programa principal que ordena el array
      
        
        if ($contadorNumerosInt == 15) {
          $numArr = explode(" ", $numeroTexto);
          //un foreach que recorre y muestra por pantalla el primer array sin ordenar
          echo "<table><tr><td>Array Original</td>";
          foreach ($numArr as $numero) {
              echo  "<td>$numero</td>";
            }
          $aux = $numArr[14];
          for ($i = 14; $i > 0; $i--)  {
            $numArr[$i] =  $numArr[$i - 1];
            
          }
          $numArr[0] = $aux;
          
          echo "</tr><tr><td>Array Ordenado</td>";
          for ($i = 0; $i < 15; $i++) {
              echo  "<td>$numArr[$i]</td>";
          }
          
          
        }
      ?>
                </tr>
            </table>
        </div>
    </div>
  </body>
</html>
