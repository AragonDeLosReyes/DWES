<!DOCTYPE html>
<!--
@autor: Carlos Aragón De Los Reyes
2º DAW
-->
<?php 
session_start();
?>
<html>
  <head>
      <meta charset="UTF-8">
      <title>Capítulo 6 - Ejercicio 1</title>
      <link type="text/css" rel="stylesheet" href="css/stylesheet.css">
      <link type="text/css" rel="stylesheet" href="css/font-awesome.css">
    </head>
  <body>
    <div id="cuerpo">
      <h1 id="cabecera">Crea una aplicación web que permita hacer listado, alta, baja y modificación sobre la tabla cliente
      de la base de datos banco.
          <br>Para realizar el listado bastará un SELECT, tal y como se ha visto en los ejemplos.
          <br>El alta se realizará mediante un formulario donde se especificarán todos los campos del nuevo
          registro. Luego esos datos se enviarán a una página que ejecutará INSERT .
          <br>Para realizar una baja, se pedirá el DNI del cliente mediante un formulario y a continuación
          se ejecutará DELETE para borrar el registro cuyo DNI coincida con el introducido.
          <br>La modificación se realiza mediante UPDATE . Se pedirá previamente en un formulario el DNI
          del cliente para el que queremos modificar los datos.
      </h1>
      <?php
      $conexion = mysql_connect("localhost", "root", "root");
      mysql_select_db("banco", $conexion);
      mysql_set_charset('utf8');
      $consulta = mysql_query("SELECT dni, nombre, direccion, telefono FROM cliente", $conexion);
      ?>
      <table>
        <tr>
          <td>DNI</td>
          <td>Nombre</td>
          <td>Dirección</td>
          <td>Teléfono</td>
          <td colspan="2"></td>
        </tr><!-- Añade Registro -->
        <form action="Ejercicio01Modificar.php" method="post">
        <tr>
          <td><input Placeholder="DNI" type="text" name="dni"></td>
          <td><input Placeholder="Nombre" type="text" name="nombre"></td>
          <td><input Placeholder="Dirección" type="text" name="direccion"></td>
          <td>
              <input Placeholder="Teléfono" min="100000000" max="999999999" type="number" name="telefono">
              <input type="hidden" name="accion" value="Nuevo">
          </td>
          
          <td colspan="2"><button type="submit" class="cesta fa  fa-file-text-o">Añadir</button></td>
        </form>
        </tr>
        <?php //Este bucle extrae los datos de la bbddd
        while ($registro = mysql_fetch_array($consulta))  {
           
        ?>
        <tr>
          <td><?=$registro[dni]?></td>
          <td><?=$registro[nombre]?></td>
          <td><?=$registro[direccion]?></td>
          <td><?=$registro[telefono]?></td>
          <!-- Modificar Registro -->
          <td>            
            <form action="Ejercicio01Modificar.php" method="post">
              <input type="hidden" name="accion" value="Modificar">
              <input type="hidden" name="dni" value="<?=$registro[dni]?>">
              <input type="hidden" name="nombre" value="<?=$registro[nombre]?>">
              <input type="hidden" name="direccion" value="<?=$registro[direccion]?>">
              <input type="hidden" name="telefono" value="<?=$registro[telefono]?>">
              <button type="submit" class="fa fa-pencil">Modificar</button>
            </form>
          </td>
          
          <!-- Borrar Registro -->
          <td>
              
            <form action="Ejercicio01Modificar.php" method="post">
              <input type="hidden" name="accion" value="Borrar">
              <input type="hidden" name="dni" value="<?=$registro[dni]?>">
              <button type="submit" class="fa fa-trash">Borrar</button>
            </form>
          </td>
        </tr>
      
      <?php
        
      }
      ?>
      </table>
    </div>
  </body>
</html>