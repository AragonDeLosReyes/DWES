<!DOCTYPE html>
<!--
@autor: Carlos Aragón De Los Reyes
2º DAW
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Capítulo 2 - Ejercicio 9</title>
        <link type="text/css" rel="stylesheet" href="css/stylesheet.css">
    </head>
    <body>
        <div id="cuerpo">
            <h1 id="cabecera">Escribe un programa que calcule el volumen de un cono mediante la fórmula V = 1/3πr<sup>2</sup> h.</h1>
            <form action="Ejercicio09.php" method="get">
                <fieldset>
                    <legend>Formulario</legend>   
                    <p>Altura <input autofocus type="number" name="altura" placeholder="cm"></p><br>
                    <p>Radio&nbsp <input type="number" name="radio" placeholder="cm"></p><br>
                    <br>
                    <input type="submit" value="Enviar" >
                </fieldset>
                <fieldset>
                    <?php 
                        $altura =  $_GET['altura']; 
                        $radio = $_GET['radio'];   
                        $resultado = (1/3 * M_PI * pow($radio, 2) * $altura);
                        if ($resultado <> 0)    {
                            echo "<p>El volumen del cono es: " , number_format($resultado, 2) , "cm<sup>3</sup></p>";
                        }
                    ?>
                </fieldset>
            </form>
        </div>
    </body>
</html>