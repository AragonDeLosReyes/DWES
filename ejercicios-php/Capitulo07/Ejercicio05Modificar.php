<?php
      $conexionPDO = new PDO("mysql:host=localhost;dbname=gestisimal;charset=utf8", "root", "root");
      $consulta = $conexionPDO->query("SELECT * FROM articulos");

      
        if($_POST['accion'] == "Nuevo") {
          $inserta = "INSERT INTO articulos VALUES (\"$_POST[codigo]\", \"$_POST[descripcion]\", \"$_POST[precioCompra]\", \"$_POST[precioVenta]\", \"$_POST[stock]\")";
          $conexionPDO->exec($inserta);
          header('Location: Ejercicio05.php');
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
              <td>Codigo</td>
              <td>Descripcion</td>
              <td>Precio De Compra</td>
              <td>Precio De Venta</td>
              <td>Cantidad</td>
              <td colspan="2"></td>
            </tr>
            <tr>
              <form action="Ejercicio05Modificar.php" method="post">
              <td><?=$_POST['codigo']?></td>
              <td><input value="<?=$_POST['descripcion']?>" type="text" name="descripcion"></td>
              <td><input value="<?=$_POST['precioCompra']?>" type="number" step="0.01" name="precioCompra"></td>
              <td><input value="<?=$_POST['precioVenta']?>" type="number" step="0.01" name="precioVenta"></td>
              <td><input value="<?=$_POST['stock']?>" type="number" name="stock"></td>
              <td>
                  <input type="hidden" name="codigo" value="<?=$_POST['codigo']?>">
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

          $modifica = "UPDATE articulos SET codigo=\"$_POST[codigo]\", descripcion=\"$_POST[descripcion]\", precioCompra=\"$_POST[precioCompra]\",  precioVenta=\"$_POST[precioVenta]\", stock=\"$_POST[stock]\" WHERE codigo=\"$_POST[codigo]\"";
          $conexionPDO->exec($modifica);
          header('Location: Ejercicio05.php');
        }
        

        if($_POST['accion'] == "Borrar") {
          $borra = "DELETE FROM articulos WHERE codigo=\"$_POST[codigo]\"";
          $conexionPDO->exec($borra);
          header('Location: Ejercicio05.php');
        }
        
        if($_POST['accion'] == "entradaMercancia") {
          $codigo = $_POST['codigo'];
          $cantidadActual = "select stock FROM articulos WHERE codigo=\"$codigo]\"";
          $consultaCantidad = $cantidadActual->fetchObject();
          $añadirCantidad = $consultaCantidad->stock;
           header('Location: Ejercicio05.php');
        }
        
        if($_POST['accion'] == "salidaMercancia") {
         
          $codigo = $_POST['codigo'];
          $entrada = "select * FROM articulos WHERE codigo=\"$codigo]\"";
          $añadir = mysql_query($entrada, $conexion);
          $consultaCodigo = $añadir->fetchObject();
          //si existe el codigo arroja un fallo
          if ($añadir->rowCount() > 0) {  
            if ($consultaCodigo->descripcion == ""){ 
              echo "<p class='fallo'>El Código ". $_POST[codigo] . " pertenece a Anónimo</p>";
            } else {
              echo "<p class='fallo'>El Código ". $_POST[codigo] . " pertenece a " . $consultaCodigo->descripcion . "</p>";
            }
          } else {  
            
            $inserta = "INSERT INTO articulos VALUES (\"$_POST[codigo]\", \"$_POST[descripcion]\", \"$_POST[precioCompra]\", \"$_POST[precioVenta]\", \"$_POST[stock]\")";
            $conexionPDO->exec($inserta);
            header('Location: Ejercicio05.php');
          }
          mysql_query($borra, $conexion);
          header('Location: Ejercicio05.php');
        }
        
        
      ?>