<?php 
$producto = $_SESSION['producto'];
$codigo = $_POST['codigo'];
$imagen = $_POST['imagen'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$descricion = $_POST['descripcion'];
$elemento = $producto[$codigo];
?>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Capítulo 6 - Ejercicio 6 Detalles</title>
    <link type="text/css" rel="stylesheet" href="css/Style.css">
    <link type="text/css" rel="stylesheet" href="css/font-awesome.css">
  </head>
  <body>
    <div id="cuerpo">
      <h1 id="cabecera">Tienda de Carlos</h1>
      <div class="cuadro">
        <p class="centrado"><?=$nombre?></p>
        <img class="imgCent" src="<?=$imagen?>">
        <table class="sinBordes">
          <tr>
              <td colspan="2" class="sinBordes centrado">
                  <p><?=$precio?>€</p>
              </td>
          </tr>
          <tr>
            <td class="sinBordes">
              <form action="Ejercicio06.php" method="post">
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
               <td colspan="4" class="sinBordes">
              <form action="Ejercicio06.php" method="post">
                <button type="submit" class="cesta fa fa-undo">Atrás</button>
            </td>
              </form>
          </tr>
        </table>
      </div>
      <div class="cuadroGrande">
          <ul><?=$descricion?></ul>
      </div>
    </div>
  </body>
</html>