<!DOCTYPE html>
<!--
@autor: Carlos Aragón De Los Reyes
2º DAW
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Capítulo 4 - Ejercicio 16</title>
        <link type="text/css" rel="stylesheet" href="css/stylesheet.css">
    </head>
    <body>
        <div id="cuerpo">
            <h1 id="cabecera">Escribe un programa que diga si un número introducido por teclado es o no primo. Un número
            primo es aquel que sólo es divisible entre él mismo y la unidad.</h1>
            <form action="Ejercicio16.php" method="post">
                <fieldset>
                    <legend>Formulario</legend>
                    <p><input placeholder="Introduce un número" autofocus title="Introduce un número" type="number" name="numero"></p><br>
                    
                    <input type='submit' value='Enviar'>
                    
                </fieldset>
                
                <fieldset>
                    <legend>Resultado</legend>
                    <?php
                        
                        if (isset($_POST['numero'])) {              
                        
                          $numero = $_POST['numero'];
                         
                            $esPrimo = true;
                            for ($i = 2; $i < $numero; $i++) {
                              if (($numero % $i) == 0) {
                                $esPrimo = false;
                              }
                            }
                            
                            if ($esPrimo) {
                              echo "<p>El $numero es primo.</p>";
                            } else {
                              echo "<p>El $numero no es primo.</p>";
                            }
                        }
                    ?>
                </fieldset>
            </form>
        </div>
    </body>
</html>
