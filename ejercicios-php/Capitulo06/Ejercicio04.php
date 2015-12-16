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
      <title>Capítulo 6 - Ejercicio 4</title>
      <link type="text/css" rel="stylesheet" href="css/stylesheet.css">
    </head>
  <body>
    <div id="cuerpo">
      <h1 id="cabecera">Establece un control de acceso mediante nombre de usuario y contraseña para cualquiera de los
      programas de la relación anterior. La aplicación no nos dejará continuar hasta que iniciemos sesión
      con un nombre de usuario y contraseña correctos.</h1>
      <?php
        $usuario = "user";
        $password = "password";
        if (!$_SESSION['autenticado'])  {
          ?>
          <form action="Ejercicio04.php" method="post">
            <fieldset>
              <legend>Autentificación</legend>

              <p><input autofocus placeholder="Usuario" type="text" name="user" required=""></p><br>
              <p><input placeholder="Contraseña" type="password" name="pass" required=""></p><br>
              <input type="submit" value="OK">

            </fieldset>
          </form>
          <?php
        //Si ya se ha iniciado el programa sigue aquí
        
          if (isset($_POST['user'])) {
            if (($_POST['user'] == $usuario) && ($_POST['pass'] == $password)) {       

              $_SESSION['autenticado'] = true;
              echo '<p>Acceso Permitido</p>';
              header("Refresh: 1; url=Ejercicio01.php"); // recarga la página
              
            } else {
              echo '<p>Acceso Denegado</p>';
              header("Refresh: 2; url=Ejercicio04.php"); // recarga la página
            }
          } 
        }
                    
          ?>
                   
    </div>
  </body>
</html>