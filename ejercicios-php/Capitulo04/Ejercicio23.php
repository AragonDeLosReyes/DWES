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
            <h1 id="cabecera">Escribe un programa que permita ir introduciendo una serie indeterminada de números hasta que la
            suma de ellos supere el valor 10000. Cuando esto último ocurra, se debe mostrar el total acumulado,
            el contador de los números introducidos y la media.</h1>
            <form action="Ejercicio23.php" method="post">
                <fieldset>
                    <legend>Formulario</legend>
                    <p><input autofocus placeholder="Introduce un número" title="Introduce un número" type="number" name="numero"></p><br>
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
                         
                          //Comprobar entrada / salida de datos
                          // echo "<p>$numero - $contador - $total</p>";
                          
                        
                          
                          if ($total <= 10000) {
                            $contador++;

                            
                            echo "<input type='hidden' value='" , $contador , "' name='contador'>";
                            echo "<input type='hidden' value='", $total , "' name='total'>";
                            
                            echo "<p>numero = $numero - contador = $contador - total = $total</p>";

                          } else {
                            $contador++;
                            $media = $totalRecibido / $contador;
                            echo "<p>la media es $media</p>";
                            echo "<p>se han introducido $contador números</p>";
                            echo "<p>El total acumulado es $total</p>";
                            //Comprobar entrada / salida de datos
                            

                            
                            
                          }
                        }
                        

                          
              
                          
                    ?>
                </fieldset>
            </form>
        </div>
    </body>
</html>
