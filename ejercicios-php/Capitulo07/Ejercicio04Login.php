<!DOCTYPE html>
<!--
@autor: Carlos Aragón De Los Reyes
2º DAW
-->
<?php 
session_start();
$conexionPDO = new PDO("mysql:host=localhost;dbname=gestisimal;charset=utf8", "root", "root");

?>
<html>
  <head>
      <meta charset="UTF-8">
      <title>Capítulo 6 - Ejercicio 4</title>
      <link type="text/css" rel="stylesheet" href="css/stylesheet.css">
    </head>
  <body>
    <div id="cuerpo">
        <h1 class="cabeceraGesti">GestiSiMal</h1>
        <?php
        if ($_GET['salir'] == "si")  {
          session_destroy();
        }
        

        if (!$_SESSION['autenticado'])  {
          ?>
          <form action="Ejercicio04Login.php" method="post" class="panelLogin">
              <p class="panelLogin">Login</p>
            <fieldset>
                
              <form action="Ejercicio04Login.php" method="post" >
              <p><input autofocus placeholder="Usuario" type="text" name="user" required=""></p><br>
              <p><input placeholder="Contraseña" type="password" name="pass" required=""></p><br>
              <input type="submit" value="OK">
              </form>
            </fieldset>
          </form>
          <?php
        //Si ya se ha iniciado el programa sigue aquí
          if (isset($_POST['user'])) {
            $consulta = $conexionPDO->query("SELECT * FROM usuarios where user='" . $_POST['user'] . "'");
            if ($consulta->rowCount() > 0) {
              $consultaUsuario = $consulta->fetchObject();
              $usuario = $consultaUsuario->user;
              $password = $consultaUsuario->password;
              $permisos = $consultaUsuario->permisos;
              if (($_POST['user'] == $usuario) && ($_POST['pass'] == $password)) {       

                $_SESSION['autenticado'] = true;
                echo '<p>Acceso Permitido</p>';
                header("Refresh: 1; url=Ejercicio04.php"); // recarga la página
                $_SESSION['usuario'] = $usuario;
                $_SESSION['permisos'] = $permisos;
              }
              } else {
                echo '<p>Acceso Denegado</p>';
                header("Refresh: 2; url=Ejercicio04Login.php"); // recarga la página
              }
            
          }
        } else {
              header("Refresh: 0; url=Ejercicio04.php"); // recarga la página
        }
                    
          ?>
                   
    </div>
  </body>
</html>