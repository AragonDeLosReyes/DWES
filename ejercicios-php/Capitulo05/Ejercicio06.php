
<!DOCTYPE html>
<!--
@autor: Carlos Aragón De Los Reyes
2º DAW
-->
<html>
  <head>
      <meta charset="UTF-8">
      <title>Capítulo 5 - Ejercicio 6</title>
      <link type="text/css" rel="stylesheet" href="css/stylesheet.css">
  </head>
  <body>
    <div id="cuerpo">
      <h1 id="cabecera">Realiza un programa que pida 8 números enteros y que luego muestre esos números de colores, los
      pares de un color y los impares de otro.</h1>
      <?php
        //Si se inicia la página por primera vez entra en este bucle e inicializa
        //las variables por primera vez
        if (!isset($_POST['numeroIntroducido']))  {
          $contadorNumInt = 0;
          $numeroTexto = "";
          
        //Si ya se ha iniciado el programa sigue aquí
        } else {       
          //Recoge datos mientras no se hayan introducido 8 números

          if ($contadorNumInt < 8) {
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
        //si no se han introducido números o el contador es inferior a 8 se muestra el formulario.
        if (!isset($_POST['numeroIntroducido']) || ($contadorNumInt < 8))  {
        ?>
        <form action="Ejercicio06.php" method="post">
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
        if ($contadorNumInt == 8) {
          $numero = explode(" ", $numeroTexto);
          
          $pares = "";
          $impares = "";

          foreach ($numero as $numeroEach) {
            if ($numeroEach % 2 ==  0) {
              ?><p class="verde"><?= $numeroEach;?></p>
            
          <?php
            } else {
              ?><p class="rojo"><?= $numeroEach;?></p>
          <?php
            }
          }
          
        }
        
      ?>
          </table>
        </div>
    </div>
  </body>
</html>
