<!DOCTYPE html>
<!--
@autor: Carlos Aragón De Los Reyes
2º DAW
-->
<?php 
session_start();
?>
<html>
  <head>
      <meta charset="UTF-8">
      <title>Capítulo 6 - Ejercicio 1</title>
      <link type="text/css" rel="stylesheet" href="css/stylesheet.css">
    </head>
  <body>
    <div id="cuerpo">
      <h1 id="cabecera">Escribe un programa que calcule la media de un conjunto de números positivos introducidos por
      teclado. A priori, el programa no sabe cuántos números se introducirán. El usuario indicará que ha
      terminado de introducir los datos cuando meta un número negativo. Utiliza sesiones.</h1>
      <?php
        //Si se inicia la página por primera vez entra en este bucle e inicializa
        //las variables por primera vez
        $numeroIntroducido = $_POST['numeroIntroducido'];
        if (!isset($numeroIntroducido) || ($numeroIntroducido > 0))  {
          $_SESSION['total'] += $numeroIntroducido;
          $_SESSION['contador']++;
          ?>
          <form action="Ejercicio01.php" method="post">
            <fieldset>
              <legend>Numero <?= $_SESSION['contador'] ?></legend>

              <p><input autofocus placeholder="Introduce un número" type="number" name="numeroIntroducido" required=""></p><br>
              <input type="submit" value="OK">

            </fieldset>
          </form>
          <?php
        //Si ya se ha iniciado el programa sigue aquí
        } else {       
          ?>
          <fieldset>
            <legend>Resultado</legend>
            <p>El resultado es <?= $_SESSION['total'] / ($_SESSION['contador']-1); ?></p>
          </fieldset>
          <?php
          session_destroy();
        }
                      
                    
          ?>
                   
    </div>
  </body>
</html>