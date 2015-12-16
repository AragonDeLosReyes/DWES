<!DOCTYPE html>
<!--
@autor: Carlos Aragón De Los Reyes
2º DAW
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Capítulo 4 - Ejercicio 7</title>
        <link type="text/css" rel="stylesheet" href="css/stylesheet.css">
    </head>
    <body>
      <div id="cuerpo">
          <h1 id="cabecera">Realiza el control de acceso a una caja fuerte. La combinación será un número de 4 cifras. El
          programa nos pedirá la combinación para abrirla. Si no acertamos, se nos mostrará el mensaje
          “Lo siento, esa no es la combinación” y si acertamos se nos dirá “La caja fuerte se ha abierto
          satisfactoriamente”. Tendremos cuatro oportunidades para abrir la caja fuerte.</h1>
           
                
          <?php 

          if (!isset($_POST['oportunidades'])) {
          $oportunidades = 4;
          } else {
            $oportunidades = $_POST['oportunidades'];
            $codigoInt =  $_POST['x'];
          }
          $codigo = 1234;

              if ($codigo == $codigoInt) {
                echo "<p>Caja abierta</p>"; 
              } else if ($oportunidades == 0) {
                echo "<fieldset>
                      <legend>Resultado</legend>";
                echo "<p>La caja se ha cerrado</p> </fieldset>";

              } else {
            ?>
              <form action="Ejercicio07.php" method="post">
                <fieldset>
                  <legend>Formulario</legend>
                  <p><input autofocus min="0" max="9999" title="Introduce 4 dígitos" type="number" name="x"></p><br>


                </fieldset>
                <fieldset>
                  <legend>Resultado</legend>
            <?php
                  echo "<p>Te quedan $oportunidades oportunidades</p>"; 
                  $oportunidades--;
                  echo "<input type='hidden' name='oportunidades' value=" , $oportunidades , ">";
                  echo "</fieldset>";
                  echo "<input type='submit' value='Enviar'>";


              }
                      
                    
            ?>
                    
                </fieldset>
            </form>
        </div>
    </body>
</html>
