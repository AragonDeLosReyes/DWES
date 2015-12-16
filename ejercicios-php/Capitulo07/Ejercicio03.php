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
$conexion = new PDO("mysql:host=localhost;dbname=ferreteria;charset=utf8", "root", "root");
$consulta = $conexion->query("SELECT * FROM herramientas");
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
      while ($herramientas = $consulta->fetchObject()) {
          $producto[$herramientas->id] = array(
          "descripcion" => $herramientas ->descripcion,
          "nombre" => $herramientas->nombre,
          "precio" => $herramientas->precio,
          "imagen" => $herramientas->imagen,
          "id" => $herramientas->id
          );
              
        
?>
        <div class="cuadro">
          <p class="centrado"><?=$herramientas->nombre?></p>
          <img class="imgCent" src="<?=$herramientas->imagen?>">
          <table class="sinBordes">
              <tr>
                  <td colspan="2" class="sinBordes centrado">
                      <p><?=$herramientas->precio?>€</p>
                  </td>
              </tr>
              <tr>
                  <td class="sinBordes">
                    <form action="Ejercicio03.php" method="post">
                      <input type="hidden" name="codigo" value="<?=$herramientas->id?>">
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
                      <input type="hidden" name="imagen" value="<?=$herramientas->imagen?>">
                      <input type="hidden" name="nombre" value="<?=$herramientas->nombre?>">
                      <input type="hidden" name="precio" value="<?=$herramientas->precio?>">
                      <input type="hidden" name="descripcion" value="<?=$herramientas->descripcion?>">
                 
                     
                      <button type="submit" class="cesta fa  fa-file-text-o"> Detalles</button>
                    </td>
                  </form>
              </tr>
          </table>
            
        </div>
                <?php
      }
      $_SESSION['producto'] = $producto;
     
                ?>
                      
      </div>
      <div class="CarritoLateral"> 
        <?php //carrito
          $accion = $_POST['accion'];
          $codigo = $_POST['codigo'];
          $cantidad = $_POST['cantidad'];
          if (!isset($_SESSION[carrito])) {
            
          foreach ($_SESSION as $key => $valor){
              $_SESSION[carrito][$key] = 0;
            }
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
          

          
          foreach ($producto as $id => $elemento) {
            if ($_SESSION[carrito][$id] > 0) {
              $total = $total + ($_SESSION[carrito][$id] * $elemento[precio]);
              ?>
              <tr>
                  <td><img class="imgCarrito" src="<?=$elemento[imagen]?>">
                  <form action="Ejercicio03.php" method="post">
                    <input type="hidden" name="codigo" value="<?=$elemento[id]?>">
                    <input type="hidden" name="accion" value="eliminar">
                    <input type="submit" value="Eliminar">

                  </form>
                  </td>
                  <td><p class="carritoP"><?=$elemento[nombre]?></p>
                  <p class="carritoP"><?=$elemento[precio]?> €</p>
                  <p class="carritoP">Unidades: <?=$_SESSION[carrito][$id]?></p></td>
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