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
    "M18 CPD 502C" => array( "nombre" => "M18 CPD 502C – TALADRO PERCUTOR COMPACTO M18 FUEL", "precio" => 599.01, "imagen" => "./images/taladro.jpg"),
    "M18 BH 402C" => array( "nombre" => "M18 BH 402C – MARTILLO COMPACTO SDS-PLUS", "precio" => 299.01, "imagen" => "./images/martillo.jpg"),
    "M18 BMT 421C" => array( "nombre" => "M18 BMT 421C – MULTIHERRAMIENTA M18", "precio" => 199.01, "imagen" => "./images/multiherramienta.jpg"),
    "M18 CCS55" => array( "nombre" => "M18 CCS55 SIERRA CIRCULAR SIN ESCOBILLAS FUEL", "precio" => 499.01, "imagen" => "./images/sierra.jpg"),
    "M12 CID 202C" => array( "nombre" => "M12 CID 202C – ATORN. COMPACTO DE IMPACTO M12 FUEL ¼", "precio" => 399.01, "imagen" => "./images/atornillador.jpg")
  );
?>
<html>
  <head>
      <meta charset="UTF-8">
      <title>Capítulo 6 - Ejercicio 5</title>
      <link type="text/css" rel="stylesheet" href="css/Style.css">
      <link type="text/css" rel="stylesheet" href="css/font-awesome.css">
    </head>
  <body>
    <div id="cuerpo">
      <h1 id="cabecera">Tienda de Carlos</h1>
            <div class="articulos">
    <?php
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
                    <form action="Ejercicio05.php" method="post">
                      <input type="hidden" name="codigo" value="<?=$codigo?>">
                      <input type="hidden" name="accion" value="comprar">
                      <input class="cantidad" type="number" value="1" name="cantidad" min="0" max="99">
                  </td>
                  <td class="sinBordes">
                     
                      <button type="submit" class="cesta fa fa-2x fa-cart-plus"></button>
                      
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
        <?php
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
                  <form action="Ejercicio05.php" method="post">
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