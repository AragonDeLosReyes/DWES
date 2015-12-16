<!DOCTYPE html>
<!--
@autor: Carlos Aragón De Los Reyes
2º DAW
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Capítulo 4 - Ejercicio 19</title>
        <link type="text/css" rel="stylesheet" href="css/stylesheet.css">
    </head>
    <body>
        <div id="cuerpo">
            <h1 id="cabecera">Realiza un programa que pinte una pirámide por pantalla. La alturaInt se debe pedir por teclado
            mediante un formulario. La pirámide estará hecha de bolitas, ladrillos o cualquier otra imagen
            de las 5 que se deben dar a elegir mediante un formulario.</h1>
            <form action="Ejercicio19.php" method="post">
                <fieldset>
                    <legend>Formulario</legend>
                      <p><input type="radio" name="caracter" value="images/ladrillos.jpg" checked><img src="images/ladrillos.jpg" height="60" width="60">
                      <input type="radio" name="caracter" value="images/persona.png"><img src="images/persona.png" height="60" width="60">
                      <input type="radio" name="caracter" value="images/arena.jpg"><img src="images/arena.jpg" height="60" width="60">
                      <input type="radio" name="caracter" value="images/botella.png"><img src="images/botella.png"height="60" width="60">
                      <input type="radio" name="caracter" value="images/estrella.png"><img src="images/estrella.png" height="60" width="60"></p>
                      <p><input type="text" placeholder="Introduce la altura de la pirámide" name="alturaInt"></p><br>
                      
                      <input type='submit' value='Enviar'>
                    
                </fieldset>
                
                <fieldset>
                  <legend>Resultado</legend>
                  <div class="sinCentrar">
                    <?php
                      $relleno = $_POST['caracter'];
                      $alturaInt = $_POST['alturaInt'];
                      $altura = 1;
                      $espacioDel = ($alturaInt - 1);
                      $contador = 0;
                      //pinta la piramide dependiendo de la alturaInt que le demos
                      while ($altura <= $alturaInt) {
                        //pinta los espacios delanteros de cada alturaInt
                        for ($contador = 1; $contador <= $espacioDel; $contador++) {
                          echo "<img src='$relleno' height='42' width='42' style='opacity: 0;'>";
                        }
                        //pinta el relleno de la piramide dependiendo de la alturaInt
                        for ($contador = 1; $contador < $altura * 2; $contador++)  {
                          echo "<img src='$relleno' height='42' width='42'>";
                        }
                        //salto de línea despues de una altura.
                        echo "</br>";

                        //cada altura se aumenta la altura, para finalizar el bucle al llegar a la altura introducida
                        $altura++;
                        //cada altura se disminuye los espacios delanteros a pintar.
                        $espacioDel--;
                      }


                    ?>
                  </div>
                </fieldset>
            </form>
        </div>
    </body>
</html>
