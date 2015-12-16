<!DOCTYPE html>
<!--
@autor: Carlos Aragón De Los Reyes
2º DAW
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Capítulo 5 - Ejercicio 11</title>
        <link type="text/css" rel="stylesheet" href="css/stylesheet.css">
    </head>
    <body>
      <div id="cuerpo">
        <h1 id="cabecera">Crea un mini-diccionario español-inglés que contenga, al menos, 20 palabras (con su traducción).
        Utiliza un array asociativo para almacenar las parejas de palabras. El programa pedirá una palabra
        en español y dará la correspondiente traducción en inglés.</h1>
          <div class="centrado">
          <?php
            
            if (isset($_POST['palabraIntroducida']))  {
              $palabraIntroducida = $_POST[palabraIntroducida];
              
              $diccionario = array ("uno" => "one", "dos" => "two", "tres" =>"three", "cuatro" => "four", "cinco" => "five", "seis" => "six", "siete" => "seven", "ocho" => "eight", 
              "nueve" => "nine", "diez" => "ten");
              
          foreach ($diccionario as $clave => $valor)  {
            $palabraEspanol[] = $clave;
          }
          
          if (in_array($palabraIntroducida, $palabraEspanol)){
            echo "<p>$palabraIntroducida es $diccionario[$palabraIntroducida]</p><br><br>";
            
          } else {
            
            echo"<p>La palabra introducida no se encuentra en el dicccionario<br><br></p>";
            
          }
             
        } 
 
          ?>
                <form action="Ejercicio11.php" method="post">
                  <fieldset>
                    <legend>Escribe una palabra en Espanol</legend>
                    <p><input autofocus placeholder="Introduce una palabra" type="text" name="palabraIntroducida" required=""></p><br>
                    <input type="submit" value="OK">
                  </fieldset>
                </form>
        </div>
      </div>
    </body>
</html>
