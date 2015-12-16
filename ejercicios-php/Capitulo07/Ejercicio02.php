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
      <h1 id="cabecera">Modifica el programa anterior añadiendo las siguientes mejoras:
      <br>• El listado debe aparecer paginado en caso de que haya muchos clientes.
      <br>• Al hacer un alta, se debe comprobar que no exista ningún cliente con el DNI introducido en
      el formulario.
      <br>• La opción de borrado debe pedir confirmación.
      <br>• Cuando se realice la modificación de los datos de un cliente, los campos que no se han
      cambiado deberán permanecer inalterados en la base de datos.
      </h1>
      
      
      <?php
      

      
      
      
      //inicializa la variable de session página en 1 la primera vez que se ejecuta
      if (!isset($_SESSION['pagina']))  {
        $_SESSION['pagina'] = 1;
      }
      //inicializa el factor de orden de la consulta por nombre la primera vez que se ejecuta
      if (!isset($_SESSION['factorOrden']))  {
        $_SESSION['factorOrden'] = "nombre";
      }
      
      //guarda en sessión el factor orden.
      if (isset($_POST['factorOrden'])){
        $_SESSION['factorOrden'] = $_POST['factorOrden'];
      }
        
      
      //conecta con la base de datos
      $conexion = mysql_connect("localhost", "root", "root");
      //entra a la base de datos banco con los datos de la conexión
      mysql_select_db("banco", $conexion);
      //el tipo de codificación
      mysql_set_charset('utf8');
      //la consulta que se realiza
      $consulta = mysql_query("SELECT * FROM cliente", $conexion);
      //consulta la cantidad de filas
      $numFilas = mysql_num_rows($consulta);
      //Esto paginará la consulta en 5 resultados por página
      $numPag = floor(abs($numFilas - 1) / 5) + 1;
      //determina la página en la que está en cada momento
      $pagina = $_POST['pagina'];
      
      
      if($_POST['accion'] == "Modificado") {
          $modifica = "UPDATE cliente SET  nombre=\"$_POST[nombre]\", direccion=\"$_POST[direccion]\", telefono=\"$_POST[telefono]\" WHERE dni=\"$_POST[dni]\"";
          mysql_query($modifica, $conexion);
      }
      
      
      if ($pagina == "Primera") {
        $_SESSION['pagina'] = 1;
      }
      
      if (($pagina == "Anterior") && ($_SESSION['pagina'] > 1))  {
        $_SESSION['pagina']--;
      }
     
      if (($pagina == "Siguiente") && ($_SESSION['pagina'] < $numPag))  {
        $_SESSION['pagina']++;
      }
      
      if ($pagina == "Ultima")  {
        $_SESSION['pagina'] = $numPag;
      }
      
      
      ?>
      <table>
        <tr>
          <td>DNI</td>
          <td>Nombre</td>
          <td>Dirección</td>
          <td>Teléfono</td>
          <td colspan="2"></td>
          
        </tr><!-- Añade Registro -->
        <?PHP
        //añade los nuevos clientes
        if($_POST['accion'] == "Nuevo") {
          //consulta si existe el dni primero
          $selectDNI = "Select * from cliente where dni=". $_POST['dni'];
          $extraeNombre = "Select nombre from cliente where dni=". $_POST['dni'];
          $nombreExtraidoArray = mysql_query($extraeNombre, $conexion);
          $nombreExtraido = mysql_fetch_array($nombreExtraidoArray);
          //echo "Select * from cliente where dni=". $_POST[dni] .";";
          $consultaDNI = mysql_query($selectDNI, $conexion);
          
          //si existe el dni arroja un fallo
          if (mysql_num_rows($consultaDNI) > 0) {  
            if ($nombreExtraido[nombre] == ""){ 
              echo "<p class='fallo'>El DNI ". $_POST[dni] . " pertenece a Anónimo</p>";
            } else {
              echo "<p class='fallo'>El DNI ". $_POST[dni] . " pertenece a " . $nombreExtraido[nombre] . "</p>";
            }
          } else {  
            
            $inserta = "INSERT INTO cliente VALUES('"."$_POST[dni]"."','".$_POST[nombre]."','".$_POST[direccion]."','".$_POST[telefono]."')";
            mysql_query($inserta, $conexion);
          }
        }
        
        ?>
        
        <tr>
          <form action="Ejercicio02.php" method="post">
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
       
        $listadoClientes = "select * from cliente order by " . $_SESSION['factorOrden'] . " limit " .(($_SESSION['pagina'] - 1) * 5). ", 5";
        $consulta = mysql_query($listadoClientes, $conexion);
        
        while ($registro = mysql_fetch_array($consulta))  {
          if (($_POST['accion'] == "Modificar") && ($_POST['dni'] == $registro['dni']))  {
          ?>
            <tr>
            <form action="Ejercicio02Modificar.php" method="post">
              <td><?=$registro[dni]?></td>
              <td><input type="text" name="nombre"value="<?=$registro[nombre]?>"></td>
              <td><input type="text" name="direccion" value="<?=$registro[direccion]?>"></td>
              <td><input type="text" name="telefono" value="<?=$registro[telefono]?>"></td>
              <td>
                  <input type="hidden" name ="dni" value="<?=$registro[dni]?>">
                  <input type="hidden" name="accion" value="Modificado">
                  <button type="submit" class="fa fa-pencil">Modificar</button>
              </td>
            </form>
            </tr>
          <?php
              
          } else {
            ?>
            <tr>
              <td><?=$registro[dni]?></td>
              <td><?=$registro[nombre]?></td>
              <td><?=$registro[direccion]?></td>
              <td><?=$registro[telefono]?></td>
              <!-- Modificar Registro -->
              <td>            
                <form action="Ejercicio02.php" method="post">
                  <input type="hidden" name="accion" value="Modificar">
                  <input type="hidden" name="dni" value="<?=$registro[dni]?>">
                  <button type="submit" class="fa fa-pencil">Modificar</button>
                </form>
              </td>

              <!-- Borrar Registro -->
              <td>

                <form action="Ejercicio02Modificar.php" method="post">
                  <input type="hidden" name="accion" value="Borrar">
                  <input type="hidden" name="dni" value="<?=$registro[dni]?>">
                  <button type="submit" class="fa fa-trash">Borrar</button>
                </form>
              </td>
            </tr>

          <?php

          }
        }
      ?>
        <tr>
          <td>
          Página <?= $_SESSION['pagina']?> de <?=$numPag?>    
          </td>
          <!--Página Anterior-->
          <td>
            <form action="Ejercicio02.php" method="post">
              <input type="hidden" name="pagina" value="Anterior">
              <button type="submit">Anterior</button>
            </form>  
          </td>
          <!--Página Siguiente-->
          <td>
            <form action="Ejercicio02.php" method="post">
              <input type="hidden" name="pagina" value="Siguiente">
              <button type="submit">Siguiente</button>
            </form>  
          </td>
          <!--Última Página-->
          <td>
            <form action="Ejercicio02.php" method="post">
              <input type="hidden" name="pagina" value="Ultima">
              <button type="submit">Última</button>
            </form>  
          </td>
          <!--Factor de Orden de la Consulta-->
          <td>
            <form action="Ejercicio02.php" method="post">
              <select name="factorOrden">
                <option>Ordenar Por</option>
                <option value="nombre">Nombre</option>
                <option value="dni">DNI</option>
                <option value="direccion">Dirección</option>
                <option value="telefono">Teléfono</option>
              </select>
              <button type="submit">Actualizar</button>
              </form>
          </td>
          
        </tr>
      </table>
    </div>
  </body>
</html>