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
      <title>Capítulo 6 - Ejercicio 2</title>
      <link type="text/css" rel="stylesheet" href="css/stylesheet.css">
    </head>
  <body>
    <div id="cuerpo">
      <h1 id="cabecera">Realiza un programa que vaya pidiendo números hasta que se introduzca un numero negativo y
      nos diga cuantos números se han introducido, la media de los impares y el mayor de los pares. El
      número negativo sólo se utiliza para indicar el final de la introducción de datos pero no se incluye
      en el cómputo. Utiliza sesiones.</h1>
      <?php
        
        $numeroIntroducido = $_POST['numeroIntroducido'];
        //Si se inicia la página por primera vez o el número es mayor a -1 entra en este bucle
        if (!isset($numeroIntroducido) || ($numeroIntroducido > -1))  {
          //suma contadores
          $_SESSION['contador']++;
          //Programa que calcula los pares
            //si el número de esta posición es par entra al bucke
            if (($numeroIntroducido % 2) == 0) {
              //si el número introducido es mayor que el más grande de los de la sesión se almacena en la sesión
              if ($numeroIntroducido > $_SESSION['maxPar'] ) {
                $_SESSION['maxPar'] = $numeroIntroducido;
              }
              //si el número no es par entra aquí
            } else {
              $_SESSION['totalImpares'] += $numeroIntroducido;
              $_SESSION['contadorImpares']++;
              
            

          }
          ?>
          <form action="Ejercicio02.php" method="post">
            <fieldset>
              <legend>Numero <?= $_SESSION['contador'] ?></legend>

              <p><input autofocus placeholder="Introduce un número" type="number" name="numeroIntroducido" required=""></p><br>
              <p><?php $numeroIntroducido ?></p>
              <input type="submit" value="OK">

            </fieldset>
          </form>
          <?php
        //Si se mete un número negativo entra aquí
        } else {       
          ?>
          <fieldset>
            <legend>Resultado</legend>
            <p>Se han introducido <?= $_SESSION['contador']-1 ?> Números</p>
            <p>El mayor de los pares es <?= $_SESSION['maxPar'] ?> </p>
            <p>La Media de los impares es <?= $_SESSION['totalImpares'] ?> / <?= $_SESSION['contadorImpares'] ?> = <?= $_SESSION['totalImpares'] / $_SESSION['contadorImpares'] ?></p>
          </fieldset>
          <?php
          session_destroy();//destruimos la sesión
        } //fin del bucle
                      
                    
          ?>
                   
    </div>
  </body>
</html>