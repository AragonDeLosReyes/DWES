<?php
      $conexion = mysql_connect("localhost", "root", "root");
      mysql_select_db("banco", $conexion);
      mysql_set_charset('utf8');
      $consulta = mysql_query("SELECT dni, nombre, direccion, telefono FROM cliente", $conexion);
      $noModificado = true;
      
        if($_POST['accion'] == "Nuevo") {
          $inserta = "INSERT INTO cliente VALUES (\"$_POST[dni]\", \"$_POST[nombre]\", \"$_POST[direccion]\", \"$_POST[telefono]\")";
          mysql_query($inserta, $conexion);
          header('Location: Ejercicio01.php');
        }

        if($_POST['accion'] == "Modificar") {
      ?>
        <head>
            <meta charset="UTF-8">
            <title>Capítulo 6 - Ejercicio 1</title>
            <link type="text/css" rel="stylesheet" href="css/stylesheet.css">
            <link type="text/css" rel="stylesheet" href="css/font-awesome.css">
          </head>
        <body>
          <table>
            <tr>
              <td>DNI</td>
              <td>Nombre</td>
              <td>Dirección</td>
              <td>Teléfono</td>
              <td colspan="2"></td>
            </tr>
            <tr>
              <form action="Ejercicio01Modificar.php" method="post">
              <td><?=$_POST['dni']?></td>
              <td><input Placeholder="<?=$_POST['nombre']?>" type="text" name="nombre"></td>
              <td><input Placeholder="<?=$_POST['direccion']?>" type="text" name="direccion"></td>
              <td><input Placeholder="<?=$_POST['telefono']?>" type="text" name="telefono"></td>
              <td>
                  <input type="hidden" name="dni" value="<?=$_POST['dni']?>">
                  <input type="hidden" name="accion" value="Modificado">
                  <button type="submit" class="fa fa-pencil">Modificar</button>
              </td>
              </form>
            </tr>
          </table>
        </body>
        <?php
        }
        if($_POST['accion'] == "Modificado") {

          $modifica = "UPDATE cliente SET  nombre=\"$_POST[nombre]\", direccion=\"$_POST[direccion]\", telefono=\"$_POST[telefono]\" WHERE dni=\"$_POST[dni]\"";
          mysql_query($modifica, $conexion);
          header('Location: Ejercicio01.php');
        }
        

        if($_POST['accion'] == "Borrar") {
          $borra = "DELETE FROM cliente WHERE dni=\"$_POST[dni]\"";
          mysql_query($borra, $conexion);
          header('Location: Ejercicio01.php');
        }
      ?>