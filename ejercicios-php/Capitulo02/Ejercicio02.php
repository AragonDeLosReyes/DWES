<!DOCTYPE html>
<!--
@autor: Carlos Aragón De Los Reyes
2º DAW
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Capítulo 2 - Ejercicio 2</title>
        <link type="text/css" rel="stylesheet" href="css/stylesheet.css">
    </head>
    <body>
        <div id="cuerpo">
            <h1 id="cabecera">Realiza un conversor de euros a pesetas. Ahora la cantidad en euros que se quiere convertir se
            deberá introducir por teclado.</h1>
            <form action="Ejercicio02.php" method="get">
                <fieldset>
                    <legend>Formulario</legend>        
                    <p><input type="number" name="euros" placeholder="Pesetas"></p><br>
                    <input type="submit" value="Enviar">
                </fieldset>
                <fieldset>
                    <legend>Resultado</legend>
            
                    <?php 
                    $euros =  $_GET['euros']; 
                    $pesetas = $euros * 166.386;    
                    if ($pesetas != 0) {
                    echo "<p>$euros € son " , number_format($pesetas, 2) , " Ptas</p>";
                    }
                    ?>
                </fieldset>
            </form>
        </div>   
    </body>
</html>
