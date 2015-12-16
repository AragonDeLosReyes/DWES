<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
    <?php
    echo "prueba";

      //$conexion = mysql_connect("localhost", "root", "root");
      if (mysql_connect("localhost", "root", "root")) {
        echo "Se ha establecido una conexión con el servidor de bases de datos.";
      } else {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.";
      }

    ?>
  </body>
</html>
