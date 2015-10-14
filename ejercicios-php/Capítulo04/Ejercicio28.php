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
            <h1 id="cabecera">Escribe un programa que calcule el factorial de un número entero leído por teclado.</h1>
            <form action="Ejercicio28.php" method="post">
                <fieldset>
                    <legend>Formulario</legend>
                    <p><input autofocus placeholder="Introduce un número" title="Introduce un número" type="number" name="numero"></p><br>
                    <input type='submit' value='Enviar'>
                    
                </fieldset>
                
                <fieldset>
                    <legend>Resultado</legend>
                    <?php
                        
                        if (!isset($_POST['numero'])) {
                          $numero = 0;
                          $factorial = 0;
                          
                        } else {
                          
                          
                          $numero =  $_POST['numero'];
                          $factorial =  $numero;
                          
                          if ($numero < 0) {
                            
                            echo "<p>El número es negativo y por lo tanto incorrecto</p>";
                            
                          } else {
                            
                            if ($numero == 0) {
                              
                              echo "<p>El factorial de $numero es 1</p>";
                              
                            } else {
                              for ($i = 1; $i < $numero; $i++) {
                                
                                $factorial *= $i;
                                
                              }
                              echo "<p>El factorial de $numero es $factorial</p>";
                            }
                            
                          }
                          
                        }                                                 
                    ?>
                </fieldset>
            </form>
        </div>
    </body>
</html>
