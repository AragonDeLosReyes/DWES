<!DOCTYPE html>
<!--
@autor: Carlos Aragón De Los Reyes
2º DAW
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Capítulo 4 - Ejercicio 10</title>
        <link type="text/css" rel="stylesheet" href="css/stylesheet.css">
    </head>
    <body>
        <div id="cuerpo">
            <h1 id="cabecera">Escribe un programa que calcule la media de un conjunto de números positivos introducidos por
            teclado. A priori, el programa no sabe cuántos números se introducirán. El usuario indicará que ha
            terminado de introducir los datos cuando meta un número negativo.</h1>
            <form action="Ejercicio10.php" method="post">
                <fieldset>
                    <legend>Formulario</legend>
                    <p><input autofocus placeholder="finaliza introduciendo número < 0" title="Introduce un número" type="number" name="numero"></p><br>
                    <input type='submit' value='Enviar'>
                    
                </fieldset>
                
                <fieldset>
                    <legend>Resultado</legend>
                    <?php
                        
                        if (!isset($_POST['numero'])) {
                          $contador = 0;
                          $total = 0;
                          $numero = 0;
                          
                        } else {
                          
                          $numero =  $_POST['numero'];
                          $totalRecibido = $_POST['total'];
                          $total = $totalRecibido + $numero;
                          $contador = $_POST['contador'];
                          $media = $totalRecibido / $contador;
                          //Comprobar entrada / salida de datos
                          // echo "<p>$numero - $contador - $total</p>";
                          
                        
                          
                          if ($numero < 0) {
                            
                            echo "<p>la media es $media</p>";
                            //Comprobar entrada / salida de datos
                            // echo "<p>$numero - $contador - $total</p>";

                          } else {

                            $contador++;

                            
                            echo "<input type='hidden' value='" , $contador , "' name='contador'>";
                            echo "<input type='hidden' value='", $total , "' name='total'>";
                            
                          }
                        }
                        

                          
              
                          
                    ?>
                </fieldset>
            </form>
        </div>
    </body>
</html>
