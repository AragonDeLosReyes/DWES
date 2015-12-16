<!DOCTYPE html>
<!--
@autor: Carlos Aragón De Los Reyes
2º DAW
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Capítulo 2 - Ejercicio 7</title>
        <link type="text/css" rel="stylesheet" href="css/stylesheet.css">
    </head>
    <body>
        <div id="cuerpo">
            <h1 id="cabecera">Escribe un programa que calcule el total de una factura a partir de la base imponible.</h1>
            <form action="Ejercicio07.php" method="get">
                <fieldset>
                    <legend>Formulario</legend>         
                    <p>Base imponible <input autofocus type="number" name="base"  placeholder="Euros"></p><br>
                    <p>Porcentaje de IVA 
                      <select name="iva">
                        <option value="4">4%</option>
                        <option value="10">10%</option>
                        <option selected="selected" value="21">21%</option>
                      </select>
                    </p>
                    <br>
                    <input type="submit" value="Enviar">
                </fieldset>
                <fieldset>
                    <?php 
                        $base =  $_GET['base']; 
                        $iva = $_GET['iva']/100;   
                        $resultado = ($base * $iva) + $base;
                        if ($resultado != 0) {
                            echo "<p>El total de la factura es: " , number_format($resultado, 2) , "€</p>";
                        }
                    ?>
                </fieldset>
            </form>
        </div>
    </body>
</html>