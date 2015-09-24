<!DOCTYPE html>
<!--
@autor: Carlos Aragón De Los Reyes
2º DAW
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Capítulo 2 - Ejercicio 3</title>
        <link type="text/css" rel="stylesheet" href="css/stylesheet.css">
    </head>
    <body>
        <div id="cuerpo">
            <h1 id="cabecera">Realiza un conversor de pesetas a euros. La cantidad en pesetas que se quiere convertir se deberá
                introducir por teclado.</h1>
            <form action="Ejercicio03.php" method="get">
                <fieldset>
                    <legend>Formulario</legend>        
                    <p><input type="number" name="pesetas" placeholder="Pesetas"></p><br>
                    <input type="submit" value="Enviar">
                </fieldset>
                <fieldset>
                    <legend>Resultado</legend>
            
                    <?php 
                    $pesetas =  $_GET['pesetas']; 
                    $euros = $pesetas / 166.386;    
                    if ($pesetas != 0) {
                    echo "<p>$pesetas Ptas son " , number_format($euros, 2) , " €</p>";
                    }
                    ?>
                </fieldset>
            </form>
        </div>   
    </body>
</html>
