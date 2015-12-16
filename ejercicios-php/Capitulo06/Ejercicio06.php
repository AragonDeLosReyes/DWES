<!DOCTYPE html>
<!--
@autor: Carlos Aragón De Los Reyes
2º DAW
Crea una tienda on-line sencilla con un catálogo de productos y un carrito de la compra. Un
catálogo de cuatro o cinco productos será suficiente. De cada producto se debe conocer al menos
la descripción y el precio. Todos los productos deben tener una imagen que los identifique. Al lado
de cada producto del catálogo deberá aparecer un botón Comprar que permita añadirlo al carrito.
Si el usuario hace clic en el botón Comprar de un producto que ya estaba en el carrito, se deberá
incrementar el número de unidades de dicho producto. Para cada producto que aparece en el carrito,
habrá un botón Eliminar por si el usuario se arrepiente y quiere quitar un producto concreto del
carrito de la compra. A continuación se muestra una captura de pantalla de una posible solución.



-->
<?php 
session_start();
 $producto = array ( 
    "M18 CPD 502C" => array( "descripcion" => "<li class='tic'>Motor sin escobillas POWERSTATE™ diseñado y construído por Milwaukee® para conseguir 10 veces más de durabilidad y un 25% más de potencia</li>
      <li class='tic'>Electrónica inteligente REDLINK PLUS, es el sistema digital más avanzado contra la sobrecarga de la máquina y batería, mejorando el rendimiento de la máquina bajo carga</li>
      <li class='tic'>Batería REDLITHIUM-ION™ proporciona el doble de autonomía, un 20% más de potencia, 2,5 veces más durabilidad y es capaz de funcionar a 20°C</li>
      <li class='tic'>Monitorización individual de las celdas de la batería optimiza la autonomía de la máquina y asegura una gran durabilidad de la batería</li>
      <li class='tic'>Indicador de carga de la batería</li>
      <li class='tic'>La mejor iluminación del área de trabajo</li>
      <li class='tic'>Enganche de cinturón totalmente metálico y reversible – para colgarse la herramienta de manera fácil y rápida</li>
      <li class='tic'>Sistema flexible de baterías: trabaja con todas las baterías Milwaukee® M18</li>
    ", "nombre" => "M18 CPD 502C – TALADRO PERCUTOR COMPACTO M18 FUEL", "precio" => 599.01, "imagen" => "./images/taladro.jpg"),
    
    "M18 BH 402C" => array( "descripcion" => "<li class='tic'>Motor sin escobillas POWERSTATE™ diseñado y construído por Milwaukee® para conseguir 10 veces más de durabilidad y un 25% más de potencia</li><li class='tic'>Electrónica inteligente REDLINK PLUS, es el sistema digital más avanzado contra la sobrecarga de la máquina y batería, mejorando el rendimiento de la máquina bajo carga</li><li class='tic'>Batería REDLITHIUM-ION™ proporciona el doble de autonomía, un 20% más de potencia, 2,5 veces más durabilidad y es capaz de funcionar a 20°C</li><li class='tic'>Monitorización individual de las celdas de la batería optimiza la autonomía de la máquina y asegura una gran durabilidad de la batería</li><li class='tic'>Indicador de carga de la batería</li><li class='tic'>La mejor iluminación del área de trabajo</li><li class='tic'>Enganche de cinturón totalmente metálico y reversible – para colgarse la herramienta de manera fácil y rápida</li><li class='tic'>Sistema flexible de baterías: trabaja con todas las baterías Milwaukee® M18™</li>", "nombre" => "M18 BH 402C – MARTILLO COMPACTO SDS-PLUS", "precio" => 299.01, "imagen" => "./images/martillo.jpg"),
    "M18 BMT 421C" => array( "descripcion" => "<li class='tic'>Solución a batería versátil para aplicaciones de corte y renovación</li><li class='tic'>Protección electrónica REDLINK™ contra la sobrecarga que protege la herramienta y a la batería</li><li class='tic'>Velocidad variable (12,000 - 18,000 rpm) y oscilación derecha/izquierda de 1.7° apta para trabajos profesionales tanto en metal, madera y plástico</li><li class='tic'>Cambio rápido de la hoja FIXTEC, incluye adaptador universal que acepta accesorios de la competencia</li><li class='tic'>Batería REDLITHIUM-ION™ proporciona 2 veces más autonomía, un 20% más de potencia, 2 veces mayor durabilidad y esta tecnología permite trabajar a temperaturas extremas hasta -20°C</li><li class='tic'>Tope de profundidad de corte que previene el corte accidental</li><li class='tic'>Kit de aspiración único con posibilidad de trabajar en AC y DC, para mantener el espacio limpio</li><li class='tic'>La mejor iluminación del área de trabajo</li><li class='tic'>Sistema flexible de baterías: trabaja con todas las baterías Milwaukee® M18™</li><li class='tic'>Sistema flexible a batería, trabaja con todas las baterías Milwaukee® M18™</li>", "nombre" => "M18 BMT 421C – MULTIHERRAMIENTA M18", "precio" => 199.01, "imagen" => "./images/multiherramienta.jpg"),
    "M18 CCS55" => array( "descripcion" => "<li class='tic'>Motor Milwaukee® sin escobillas POWERSTATE™, 3 veces más durabilidad, doble de cortes por carga y 2 veces más corte por carga</li><li class='tic'>Electrónica inteligente REDLINK PLUS, es el sistema digital más avanzado contra la sobrecarga de la máquina y batería, mejorando el rendimiento de la máquina bajo carga</li><li class='tic'>Batería REDLITHIUM-ION™ proporciona el doble de autonomía, un 20% más de potencia, 2,5 veces más durabilidad y es capaz de funcionar a 20°C</li><li class='tic'>Monitorización individual de las celdas de la batería optimiza la autonomía de la máquina y asegura una gran durabilidad de la batería</li><li class='tic'>Capacidad de corte a bisel 50°</li><li class='tic'>Protector superior e inferior de magnesio para una mayor resistencia a los impactos</li><li class='tic'>Base de magnesio, reduce el peso y aumenta la durabilidad</li><li class='tic'>Función de soplado de polvo integrado, limpia la línea de corte</li><li class='tic'>Gancho que facilita el almacenaje de la herramienta</li><li class='tic'>Indicador de carga y luz LED integrado</li><li class='tic'>Sistema flexible de baterías: trabaja con todas las baterías Milwaukee® M18™</li>", "nombre" => "M18 CCS55 SIERRA CIRCULAR SIN ESCOBILLAS FUEL", "precio" => 499.01, "imagen" => "./images/sierra.jpg"),
    "M12 CID 202C" => array( "descripcion" => "<li class='tic'>Motor Milwaukee sin escobillas POWERSTATE™, 3 veces más duradero y mayor potencia</li><li class='tic'>Electrónica inteligente REDLINK PLUS, es el sistema digital más avanzado contra la sobrecarga de la máquina y batería, mejorando el rendimiento de la máquina bajo carga</li><li class='tic'>Motor sin escobillas POWERSTATE™ diseñado y construido por Milwaukee® para conseguir una mayor durabilidad y un 20% de mayor potencia</li><li class='tic'>Modo 1 para trabajos de precisión</li><li class='tic'>Modo 2 ofrece el máximo rendimiento para las aplicaciones más exigentes</li><li class='tic'>Batería REDLITHIUM-ION™ proporciona 2 veces más autonomía, un 20% más de potencia, 2 veces mayor durabilidad y esta tecnología permite trabajar a temperaturas extremas hasta -20°C</li><li class='tic'>Monitorización individual de las celdas de la batería optimiza la autonomía de la máquina y asegura una gran durabilidad de la batería</li><li class='tic'>Fijación hexagonal de ¼˝ de cambio rápido</li><li class='tic'>Indicador de carga de la batería</li><li class='tic'>Sistema flexible de batería: Trabaja con todas las baterías Milwaukee® M12™</li><li class='tic'>Sistema flexible de batería: Trabaja con todas las baterías Milwaukee® M12™</li>", "nombre" => "M12 CID 202C – ATORN. COMPACTO DE IMPACTO M12 FUEL ¼", "precio" => 399.01, "imagen" => "./images/atornillador.jpg")
  );
?>
<html>
  <head>
      <meta charset="UTF-8">
      <title>Capítulo 6 - Ejercicio 6</title>
      <link type="text/css" rel="stylesheet" href="css/Style.css">
      <link type="text/css" rel="stylesheet" href="css/font-awesome.css">
    </head>
  <body>
    <div id="cuerpo">
      <h1 id="cabecera">Tienda de Carlos</h1>
            <div class="articulos">
    <?php
      $_SESSION['producto'] = $producto;
      foreach ($producto as $codigo => $elemento) {

    ?>

        <div class="cuadro">
          <p class="centrado"><?=$elemento[nombre]?></p>
          <img class="imgCent" src="<?=$elemento[imagen]?>">
          <table class="sinBordes">
              <tr>
                  <td colspan="2" class="sinBordes centrado">
                      <p><?=$elemento[precio]?>€</p>
                  </td>
              </tr>
              <tr>
                  <td class="sinBordes">
                    <form action="Ejercicio03.php" method="post">
                      <input type="hidden" name="codigo" value="<?=$codigo?>">
                      <input type="hidden" name="accion" value="comprar">
                      <input class="cantidad" type="number" value="1" name="cantidad" min="0" max="99">
                  </td>
                  <td class="sinBordes">
                     
                      <button type="submit" class="cesta fa fa-2x fa-cart-plus"></button>
                      
                  </td>
                  </form>
              </tr>
              <tr>
                  <td colspan="2" class="sinBordes">
                    <form action="Ejercicio03Detalles.php" method="post">
                      <input type="hidden" name="codigo" value="<?=$codigo?>">
                      <input type="hidden" name="imagen" value="<?=$elemento[imagen]?>">
                      <input type="hidden" name="nombre" value="<?=$elemento[nombre]?>">
                      <input type="hidden" name="precio" value="<?=$elemento[precio]?>">
                      <input type="hidden" name="descripcion" value="<?=$elemento[descripcion]?>">
                 
                     
                      <button type="submit" class="cesta fa  fa-file-text-o"> Detalles</button>
                      
                  </td>
                  </form>
              </tr>
          </table>
            
        </div>

    <?php
    }
    
    ?>
      </div>
      <div class="CarritoLateral"> 
        <?php //carrito
          $accion = $_POST['accion'];
          $codigo = $_POST['codigo'];
          $cantidad = $_POST['cantidad'];
          if (!isset($_SESSION[carrito])) {
            $_SESSION[carrito]= array("M18 CPD 502C" => 0, "M18 BH 402C" => 0, "M18 BMT 421C" => 0, "M18 CCS55" => 0, "M12 CID 202C" => 0, );

          }

          if ($accion == "comprar") {
            $_SESSION[carrito][$codigo] += $cantidad;
          }

          if ($accion == "eliminar") {
            $_SESSION[carrito][$codigo] = 0;
          }

          $total = 0;
          ?>
          <table>
              <tbody>
            <tr>
                <td class="titCarrito" colspan="2">Carrito</td>
            </tr>
          <?php
          foreach ($producto as $cod => $elemento) {
            if ($_SESSION[carrito][$cod] > 0) {
              $total = $total + ($_SESSION[carrito][$cod] * $elemento[precio]);
              ?>
              <tr>
                  <td><img class="imgCarrito" src="<?=$elemento[imagen]?>">
                  <form action="Ejercicio03.php" method="post">
                <input type="hidden" name="codigo" value="<?=$cod?>">
                <input type="hidden" name="accion" value="eliminar">
                <input type="submit" value="Eliminar">
                
              </form>
                  </td>
                  <td><p class="carritoP"><?=$elemento[nombre]?></p>
                  <p class="carritoP"><?=$elemento[precio]?> €</p>
                  <p class="carritoP">Unidades: <?=$_SESSION[carrito][$cod]?></p></td>
              </tr>
              <td colspan="2">
              
              </td>
             
              <?php
            }
          }
          ?>
              <tr><td class="precioCarrito" colspan="2"><b>Total: <?=$total?> €</b></td></tr>
         </tbody>
      </table>
      </div>
    </div>
  </body>
</html>