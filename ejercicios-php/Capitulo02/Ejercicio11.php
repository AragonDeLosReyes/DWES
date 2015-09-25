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
            <h1 id="cabecera">Realiza un conversor de Kb a Mb.</h1>
            <form action="Ejercicio11.php" method="get">
                <fieldset>
                    <legend>Formulario</legend>   
                    <p><input autofocus type="number" name="kb" placeholder="Kb"></p><br>
                    <br>
                    <input type="submit" value="Enviar" >
                </fieldset>
                <fieldset>
                    <?php 
                        $kb =  $_GET['kb']; 
                        $mb = ($kb / 1024);    
                        if ($mb <> 0)   {
                            if ($mb > 1) {
                                echo "<p>$kb Kb son " , number_format($mb, 2) , " Mb</p>";
                            } else {
                                echo "<p>$kb Kb es " , number_format($mb, 2) , " Mb</p>";
                            }
                        }
                    ?>
                </fieldset>
        </form>
    </body>
</html>
