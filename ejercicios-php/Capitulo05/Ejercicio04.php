<!DOCTYPE html>
<!--
@autor: Carlos Aragón De Los Reyes
2º DAW
-->
<html>
  <head>
      <meta charset="UTF-8">
      <title>Capítulo 5 - Ejercicio 4</title>
      <link type="text/css" rel="stylesheet" href="css/stylesheet.css">
  </head>
  <body>
    <div id="cuerpo">
      <h1 id="cabecera">Escribe un programa que genere 100 números aleatorios del 0 al 20 y que los muestre por pantalla
      separados por espacios. El programa pedirá entonces por teclado dos valores y a continuación
      cambiará todas las ocurrencias del primer valor por el segundo en la lista generada anteriormente.
      Los números que se han cambiado deben aparecer resaltados de un color diferente.</h1>
      <?php
        $tamañoArray = 100;
        $numeroText = "";

        //Genero el array con los 100 números aleatorios
        for ($i = 0; $i < $tamañoArray; $i++) {
          // números aleatorios entre 0 y 100 (ambos incluidos)
          $numero[$i] = rand(0, 100);
        }
        echo "<p>";
        if (!isset($_POST['numeroParaCambiar']))  {
          $numeroParaCambiar = 0;
          $numeroCambiado = 0;
          foreach ($numero as $numeroEach){
            echo "$numeroEach ";
            
          }
          $numeroText = implode(" ", $numero);
          echo "</p>";
        
        ?>
          
          <form action="Ejercicio04.php" method="post">
                <fieldset>
                    <legend>Formulario</legend>
                    <p><input autofocus placeholder="Número a Cambiar" title="Introduce un número" type="number" name="numeroParaCambiar"></p><br>
                    <p><input placeholder="Número para el Cambio" title="Introduce un número" type="number" name="numeroCambiado"></p><br>
                    <input type="hidden" name="numeroText" value="<?= $numeroText; ?>">
                    <input type='submit' value='Enviar'>
                    
                </fieldset>
          </form>
        <?php
        } else {
          $numeroText = $_POST['numeroText'];
          $numeroParaCambiar = $_POST['numeroParaCambiar'];
          $numeroCambiado = $_POST['numeroCambiado'];
          $numero = explode(" ", $numeroText);
          
          foreach ($numero as $numeroEach)  {
            if ($numeroEach == $numeroParaCambiar) {
              echo "<span class='rojo' >" . $numeroCambiado . "</span> ";
              
            } else {
            
            echo $numeroEach . " ";
            
            
            }
          }
        }
        ?>
    </div>
  </body>
</html>
