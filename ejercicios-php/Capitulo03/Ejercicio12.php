<!DOCTYPE html>
<!--
@autor: Carlos Aragón De Los Reyes
2º DAW
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Capítulo 3 - Ejercicio 12</title>
        <link type="text/css" rel="stylesheet" href="css/stylesheet.css">
    </head>
    <body>
        <div id="cuerpo">
            <h1 id="cabecera">Realiza un minicuestionario con 10 preguntas tipo test sobre las asignaturas que se imparten en
            el curso. Cada pregunta acertada sumará un punto. El programa mostrará al final la calificación
            obtenida. Pásale el minicuestionario a tus compañeros y pídeles que lo hagan para ver qué tal andan
            de conocimientos en las diferentes asignaturas del curso.</h1>
            <form action="Ejercicio12.php" method="get">
                 </fieldset>
                
                <fieldset>
                  <legend>Resultado</legend>
                  <?php
                    for ($i = 0; $i <= 10; $i++) {
                      $total += $_GET["pregunta$i"];
                    }
                    
                    echo "<p> Has obtenido $total de 10 puntos.</p>";
                    if ($total < 5) {
                      echo "<p> Deberías estudiar más.</p>";
                    } if (($total == 5) && (total < 9)) {
                      echo "<p> Enhorabuena has sacado una buena puntuación.</p>";
                    } if ($total >= 9) {
                       echo "<p> Enhorabuena has sacado una gran puntuación.</p>";
                    }
                    
                  ?>
                </fieldset>
              <fieldset>
                <legend id="pregunta">1 - ¿Cómo se definen las variables en Javascript?</legend>
                <p><input type="radio" name="pregunta1" checked value="0">var $nombreDeVariable</p>
                <p><input type="radio" name="pregunta1" value="1">$nombreDeVariable</p>
                <p><input type="radio" name="pregunta1" value="0">var nombreDeVariable</p>
              </fieldset>
              <fieldset>
                <legend id="pregunta">2 - ¿Etiquetas que marcan el inicio y fin de PhP en un documento HTML?</legend>
                <p><input type="radio" name="pregunta2" checked value="0" <?php highlight_string('<php (sentencias) <?')  ?></p>
                <p><input type="radio" name="pregunta2" value="1"><?php highlight_string('<?php (sentencias) ?>')  ?></p>
                <p><input type="radio" name="pregunta2" value="0"><?php highlight_string('<php (sentencias) ?>')  ?></p>
              </fieldset>
                <fieldset>
                <legend id="pregunta">3 - ¿Para que sirve el triple igual en programación ($a === $b)?</legend>
                <p><input type="radio" name="pregunta3" checked value="0"> Realiza comparaciones entre dos variables segun su valor</p>
                <p><input type="radio" name="pregunta3" value="0">Realiza comparaciones entre dos variables segun su tipo</p>
                <p><input type="radio" name="pregunta3" value="1">Realiza comparaciones entre dos variables segun su valor y tipo</p>
              </fieldset>
              <fieldset>
                <legend id="pregunta">4 - ¿Cómo se definen las variables en Javascript?</legend>
                <p><input type="radio" name="pregunta4" checked value="0">var $nombreDeVariable</p>
                <p><input type="radio" name="pregunta4" value="1">$nombreDeVariable</p>
                <p><input type="radio" name="pregunta4" value="0">var nombreDeVariable</p>
              </fieldset>
              <fieldset>
                <legend id="pregunta">5 - ¿Etiquetas que marcan el inicio y fin de PhP en un documento HTML?</legend>
                <p><input type="radio" name="pregunta5" checked value="0" <?php highlight_string('<php (sentencias) <?')  ?></p>
                <p><input type="radio" name="pregunta5" value="1"><?php highlight_string('<?php (sentencias) ?>')  ?></p>
                <p><input type="radio" name="pregunta5" value="0"><?php highlight_string('<php (sentencias) ?>')  ?></p>
              </fieldset>
                <fieldset>
                <legend id="pregunta">6 - ¿Para que sirve el triple igual en programación ($a === $b)?</legend>
                <p><input type="radio" name="pregunta6" checked value="0"> Realiza comparaciones entre dos variables segun su valor</p>
                <p><input type="radio" name="pregunta6" value="0">Realiza comparaciones entre dos variables segun su tipo</p>
                <p><input type="radio" name="pregunta6" value="1">Realiza comparaciones entre dos variables segun su valor y tipo</p>
              </fieldset>
              <fieldset>
                <legend id="pregunta">7 - ¿Cómo se definen las variables en Javascript?</legend>
                <p><input type="radio" name="pregunta7" checked value="0">var $nombreDeVariable</p>
                <p><input type="radio" name="pregunta7" value="1">$nombreDeVariable</p>
                <p><input type="radio" name="pregunta7" value="0">var nombreDeVariable</p>
              </fieldset>
              <fieldset>
                <legend id="pregunta">8 - ¿Etiquetas que marcan el inicio y fin de PhP en un documento HTML?</legend>
                <p><input type="radio" name="pregunta8" checked value="0" <?php highlight_string('<php (sentencias) <?')  ?></p>
                <p><input type="radio" name="pregunta8" value="1"><?php highlight_string('<?php (sentencias) ?>')  ?></p>
                <p><input type="radio" name="pregunta8" value="0"><?php highlight_string('<php (sentencias) ?>')  ?></p>
              </fieldset>
              <fieldset>
                <legend id="pregunta">9 - ¿Para que sirve el triple igual en programación ($a === $b)?</legend>
                <p><input type="radio" name="pregunta9" checked value="0"> Realiza comparaciones entre dos variables segun su valor</p>
                <p><input type="radio" name="pregunta9" value="0">Realiza comparaciones entre dos variables segun su tipo</p>
                <p><input type="radio" name="pregunta9" value="1">Realiza comparaciones entre dos variables segun su valor y tipo</p>
              </fieldset>
              <fieldset>
                <legend id="pregunta">10 - ¿Para que sirve el triple igual en programación ($a === $b)?</legend>
                <p><input type="radio" name="pregunta10" checked value="0"> Realiza comparaciones entre dos variables segun su valor</p>
                <p><input type="radio" name="pregunta10" value="0">Realiza comparaciones entre dos variables segun su tipo</p>
                <p><input type="radio" name="pregunta10" value="1">Realiza comparaciones entre dos variables segun su valor y tipo</p>
              </fieldset>
                          
                    

                    <input type="submit" value="Enviar">
               
            </form>
        </div>
    </body>
</html>
