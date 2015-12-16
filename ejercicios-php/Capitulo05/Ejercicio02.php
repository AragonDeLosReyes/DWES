<!DOCTYPE html>
<!--
@autor: Carlos Aragón De Los Reyes
2º DAW
-->
<html>
  <head>
      <meta charset="UTF-8">
      <title>Capítulo 5 - Ejercicio 2</title>
      <link type="text/css" rel="stylesheet" href="css/stylesheet.css">
  </head>
  <body>
    <div id="cuerpo">
      <h1 id="cabecera">Escribe un programa que pida 10 números por teclado y que luego muestre los números introducidos
      junto con las palabras “máximo” y “mínimo” al lado del máximo y del mínimo respectivamente.</h1>
      <?php
        //Si se inicia la página por primera vez entra en este bucle e inicializa
        //las variables por primera vez
        if (!isset($_POST['numeroIntroducido']))  {
          $contadorNumerosInt = 0;
          $numeroTexto = "";
        //Si ya se ha iniciado el programa sigue aquí
        } else {       
          //Recoge datos mientras no se hayan introducido 10 números
          if ($contadorNumerosInt < 10) {
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
        if (!isset($_POST['numeroIntroducido']) || ($contadorNumerosInt < 10))  {
        ?>
        <form action="Ejercicio02.php" method="post">
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
        if ($contadorNumerosInt == 10) {
          $numero = explode(" ", $numeroTexto);

          $maximo = -PHP_INT_MAX;
          $minimo = PHP_INT_MAX;

          foreach ($numero as $numeroIntroducido) {
            if ($numeroIntroducido < $minimo) {
              $minimo = $numeroIntroducido;
            }
            if ($numeroIntroducido > $maximo) {
              $maximo = $numeroIntroducido;
            }
          }

          foreach ($numero as $numeroIntroducido) {
            if ($numeroIntroducido == $minimo) {
              echo "<p>$numeroIntroducido mínimo</p>";
            } else if ($numeroIntroducido == $maximo) {
              echo "<p>$numeroIntroducido máximo</p>";
            } else {
              echo "<p>$numeroIntroducido</p>";
            }
          }
        }
      ?>
        </div>
    </div>
  </body>
</html>
