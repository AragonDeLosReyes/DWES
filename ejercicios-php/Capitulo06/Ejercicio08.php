<!DOCTYPE html>
<!--
@autor: Carlos Aragón De Los Reyes
2º DAW
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Capítulo 6 - Ejercicio </title>
        <link type="text/css" rel="stylesheet" href="css/stylesheet.css">
    </head>
    <body>
      <div id="cuerpo">
        <h1 id="cabecera">Realiza un programa que escoja al azar 5 palabras en inglés de un mini-diccionario. El programa
        pedirá que el usuario teclee la traducción al español de cada una de las palabras y comprobará si son
        correctas. Al final, el programa deberá mostrar cuántas respuestas son válidas y cuántas erróneas.
        La aplicación debe tener una opción para introducir los pares de palabras (inglés - español) que se
        deben guardar en cookies; de esta forma, si de vez en cuando se dan de alta nuevas palabras, la
        aplicación puede llegar a contar con un número considerable de entradas en el mini-diccionario.</h1>
          <div class="centrado">
          <?php
          $_SESSION['diccionario'][];
          $diccionario = array ("uno" => "one", "dos" => "two", "tres" =>"three", "cuatro" => "four", "cinco" => "five");
           if (!isset($_POST['nuevaPalabra']))  {  
            if (!isset($_POST['espanol']))  {
              
              echo "<p>Introduce las palabras en inglés</p>";
              
              //extraigo las palabras españolas
              foreach ($diccionario as $clave => $valor)  {
                $palabraEspanol[] = $clave;
              }
              
              //Elijo 5 palabras en español
              $contador = 0;
              do {
                $palabra = $palabraEspanol[rand(0, 4)];
                if (!in_array($palabra, $espanol))  {
                  $espanol[] = $palabra;
                  $contador++;
                }
              } while ($contador < 5);
              
              ?>
                <form action="Ejercicio8.php" method="post">
                  <fieldset>
              <?php
                    for ($i = 0; $i < 5; $i++) {
                      echo "<p>" . $espanol[$i] . " ";
                      echo '<input type="hidden" name="espanol['.$i.']" value="'.$espanol[$i].'">';
                      echo '<input type="text" name="ingles['.$i.']" ></p>';
                    }
              ?>
                      <input type="submit" value="Aceptar">
                   </fieldset>
                </form>
              <?php
            } else {
                $espanol = $_POST['espanol'];
                $ingles = $_POST['ingles'];

                for ($i = 0; $i < 5; $i++) {
                  if ($diccionario[$espanol[$i]] == $ingles[$i]) {
                    echo '<p>'.$espanol[$i].": ".$ingles[$i];
                    echo " - correcto</p>";
                  } else {
                    echo '<p class="rojo">'.$espanol[$i].": ".$ingles[$i];
                    echo " - incorrecto, la respuesta correcta es ".$diccionario[$espanol[$i]]."</p>";
                  }
                }
              }
              ?>
              </div>
              <div class="centrado">
                <form action="#" method="post">
                  <input type="hidden" name ="nuevaPalabra">
                  <button type="submit" class="cesta fa  fa-share">Nueva Palabra</button>
                </form>
          <?php  
           }
        
                
        if (isset($_POST['nuevaPalabra'])){
          echo "hola";
        }
        
        ?>
          </div>
      </div>
    </body>
</html>
