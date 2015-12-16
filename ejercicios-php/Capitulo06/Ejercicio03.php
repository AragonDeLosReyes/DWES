<!DOCTYPE html>
<!--
@autor: Carlos Aragón De Los Reyes
2º DAW
-->
<?php 
session_start(); // inicio la sesión
?>
<html>
  <head>
      <meta charset="UTF-8">
      <title>Capítulo 6 - Ejercicio 3</title>
      <link type="text/css" rel="stylesheet" href="css/stylesheet.css">
    </head>
  <body>
    <div id="cuerpo">
      <h1 id="cabecera">Escribe un programa que permita ir introduciendo una serie indeterminada de números mientras
      su suma no supere el valor 10000. Cuando esto último ocurra, se debe mostrar el total acumulado,
      el contador de los números introducidos y la media. Utiliza sesiones.</h1>
      <?php
        
        //Si se inicia la página por primera vez entra en este bucle e inicializa
        //las variables por primera vez
        $numeroIntroducido = $_POST['numeroIntroducido'];
        $_SESSION['total'] += $numeroIntroducido;
        if (!isset($numeroIntroducido) || ($_SESSION['total'] < 10001))  {
          
          $_SESSION['contador']++;
          ?>
          <form action="Ejercicio03.php" method="post">
            <fieldset>
              <legend>Numero <?= $_SESSION['contador'] ?></legend>

              <p><input autofocus placeholder="Introduce un número" type="number" name="numeroIntroducido" required=""></p><br>
              <input type="submit" value="OK">

            </fieldset>
          </form>
          <?php
        //Si ya se ha superado la barrera de los 10000...
        } else {       
          ?>
          <fieldset>
            <legend>Resultado</legend>
            <p>El total acumulado es: <?= $_SESSION['total']; ?></p>
            <p>Ha introducido <?=$_SESSION['contador']; ?> números</p>
            <p>La media es: <?= $_SESSION['total'] ?> / <?= $_SESSION['contador']; ?>  = <?= $_SESSION['total'] / ($_SESSION['contador']);?></p>
          </fieldset>
          <?php
          session_destroy();
        }
                      
                    
          ?>
                   
    </div>
  </body>
</html>