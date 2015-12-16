<?php
  $conexion = mysql_connect("localhost", "root", "root");
  mysql_select_db("banco", $conexion);
  mysql_set_charset('utf8');
  $consulta = mysql_query("SELECT dni, nombre, direccion, telefono FROM cliente", $conexion);

  if($_POST['accion'] == "Modificado") {
    $modifica = "UPDATE cliente SET  nombre=\"$_POST[nombre]\", direccion=\"$_POST[direccion]\", telefono=\"$_POST[telefono]\" WHERE dni=\"$_POST[dni]\"";
    mysql_query($modifica, $conexion);
    header('Location: Ejercicio02.php');
  }

  if($_POST['accion'] == "Borrar") {
    $borra = "DELETE FROM cliente WHERE dni=\"$_POST[dni]\"";
    mysql_query($borra, $conexion);
    header('Location: Ejercicio02.php');
  }
?>

