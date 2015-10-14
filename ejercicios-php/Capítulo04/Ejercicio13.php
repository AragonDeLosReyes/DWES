<!DOCTYPE html>
<!--
@autor: Carlos Aragón De Los Reyes
2º DAW
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Capítulo 4 - Ejercicio 13</title>
        <link type="text/css" rel="stylesheet" href="css/stylesheet.css">
    </head>
    <body>
        <div id="cuerpo">
            <h1 id="cabecera">Escribe un programa que lea una lista de diez números y determine cuántos son positivos, y cuántos
son negativos.</h1>
            <form action="Ejercicio13.php" method="post">
                <fieldset>
                    <legend>Formulario</legend>
                    <p><input autofocus id="numeros" title="Introduce un número" type="number" name="num0"></p>
                    <p><input id="numeros" title="Introduce un número" type="number" name="num1"></p>
                    <p><input id="numeros" title="Introduce un número" type="number" name="num2"></p>
                    <p><input id="numeros" title="Introduce un número" type="number" name="num3"></p>
                    <p><input id="numeros" title="Introduce un número" type="number" name="num4"></p>
                    <p><input id="numeros" title="Introduce un número" type="number" name="num5"></p>
                    <p><input id="numeros" title="Introduce un número" type="number" name="num6"></p>
                    <p><input id="numeros" title="Introduce un número" type="number" name="num7"></p>
                    <p><input id="numeros" title="Introduce un número" type="number" name="num8"></p>
                    <p><input id="numeros" title="Introduce un número" type="number" name="num9"></p>
                    
                    <input type='submit' value='Enviar'>
                    
                </fieldset>
                
                <fieldset>
                    <legend>Resultado</legend>
                    <?php
                        
                        if (!isset($_POST['num0'])) {
                          $total = 0;
                          $num0 = 0;
                          $num1 = 0;
                          $num2 = 0;
                          $num3 = 0;
                          $num4 = 0;
                          $num5 = 0;
                          $num6 = 0;
                          $num7 = 0;
                          $num8 = 0;
                          $num9 = 0;
                          
                          $contadorNeg = 0;
                        } else {
                         
                          
                          echo "<p>numeros negativos:</p>";
                            for ($i = 0; $i < 10; $i++) {
                              if ($_POST["num$i"] < 0) {
                                 echo "<p id='rojo'>" , $_POST["num$i"] , " </p>";
                              } 
                            }
                            
                            echo "<p>numeros positivos:</p>";
                            for ($i = 0; $i < 10; $i++) {
                              if ($_POST["num$i"] >= 0) {
                                 echo "<p id='rojo'>" , $_POST["num$i"] , " </p>";
                              }
                            }
                        }

                          
              
                          
                    ?>
                </fieldset>
            </form>
        </div>
    </body>
</html>
