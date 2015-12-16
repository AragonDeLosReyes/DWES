<!DOCTYPE html>
<!--
@autor: Carlos Aragón De Los Reyes
2º DAW
-->
<?php
session_start();
//inicializa la variable de session página en 1 la primera vez que se ejecuta

if (isset($_SESSION['autenticado'])) {

  $conexionPDO = new PDO("mysql:host=localhost;dbname=gestisimal;charset=utf8", "root", "root");
  $consulta = $conexionPDO->query("SELECT * FROM articulos");

  //consulta la cantidad de filas
  $numFilas = $consulta->rowCount();
  //Esto paginará la consulta en 5 resultados por página
  $numPag = floor(abs($numFilas - 1) / $_SESSION['cantidadPorPagina']) + 1;
  //determina la página en la que está en cada momento
  $pagina = $_GET['pagina'];
  //inicializa la pagina en la que estamos
  if (!isset($_SESSION['pagina'])) {
    $_SESSION['pagina'] = 1;
  }
  
  //inicializa la cantidad de productos por página la primera vez que se ejecut
  if (!isset($_SESSION['cantidadPorPagina'])) {
    $_SESSION['cantidadPorPagina'] = "5";
  }
  //guarda en sessión la cantidad de productos por página
  if (isset($_GET['cantidadPorPagina'])) {
    $_SESSION['cantidadPorPagina'] = $_GET['cantidadPorPagina'];
  }
  //inicializa el factor de orden de la consulta por nombre la primera vez que se ejecuta
  if (!isset($_SESSION['factorOrden'])) {
    $_SESSION['factorOrden'] = "codigo";
  }

  //guarda en sessión el factor orden.
  if (isset($_GET['factorOrden'])) {
    $_SESSION['factorOrden'] = $_GET['factorOrden'];
  }

  //reccoge los valores de la variable $pagina
  if ($pagina == "Primera") {
    $_SESSION['pagina'] = 1;
  }

  if (($pagina == "Anterior") && ($_SESSION['pagina'] > 1)) {
    $_SESSION['pagina'] --;
  }

  if (($pagina == "Siguiente") && ($_SESSION['pagina'] < $numPag)) {
    $_SESSION['pagina'] ++;
  }

  if ($pagina == "Ultima") {
    $_SESSION['pagina'] = $numPag;
  }






  if ($_GET['accion'] == "") {
    $_GET['accion'] = "listado";
  }
  ?>
  <html>
      <head>
          <meta charset="UTF-8">
          <title>Capítulo 6 - Ejercicio 5</title>

          <link type="text/css" rel="stylesheet" href="css/stylesheet.css">
          <link type="text/css" rel="stylesheet" href="css/font-awesome.css">
      </head>
      <body>
          <div id="cuerpo">
              <div class="login">
                  <p>Bienvenido <?php echo $_SESSION['usuario'] ?></p>
                  <a href="Ejercicio04Login.php?salir=si"> Desconectar</a>
                  <p>Cantidad Por Página
                  <a href="Ejercicio04.php?cantidadPorPagina=5">5</a>
                  <a href="Ejercicio04.php?cantidadPorPagina=10">10</a>
                  </p>
              </div>
              <h1 class="cabeceraGesti">Gestisimal - 
                  <?php echo $_GET['accion']; ?>
              </h1>
              <div id="menu">
                  <div class="menu"><a href="Ejercicio04.php?accion=listado">Listado</a></div>
                  <div class="menu"><a href="Ejercicio04.php?accion=entrada"> Entrada de Mercancias</a></div>
                  <div class="menu"><a href="Ejercicio04.php?accion=salida"> Salida de Mercancias</a></div>
                  <?php
                  if ($_SESSION['permisos'] == "todos") {
                    ?>
                    <div class="menu"><a href="Ejercicio04.php?accion=anadirArticulo"> Añadir Articulo</a></div>
                    <?php
                  }
                  ?>

              </div>
              <?php
              //Salida de mercancias
              if ($_POST['accion'] == "salidaMercancia") {
                $codigo = $_POST['codigo'];
                $cantidadActual = $conexionPDO->query("select * FROM articulos WHERE codigo=" . $codigo);
                $consultaCantidad = $cantidadActual->fetchObject();
                $restarCantidad = $consultaCantidad->stock;
                if (!($restarCantidad < $_POST['cantidad'] )) {

                  $restarCantidad -= $_POST['cantidad'];
                  $restar = "update articulos set stock =" . $restarCantidad . " where codigo = " . $codigo;
                  $conexionPDO->exec($restar);
                  header('Location: Ejercicio04.php?accion=salida');
                } else {
                  echo "<p class='fallo'>El Código " . $_POST[codigo] . " solo tiene " . $consultaCantidad->stock . " unidades en Stock</p>";
                }
              }

              if ($_POST['accion'] == "entradaMercancia") {
                $codigo = $_POST['codigo'];
                $cantidadActual = $conexionPDO->query("select * FROM articulos WHERE codigo=" . $codigo);
                $consultaCantidad = $cantidadActual->fetchObject();
                $sumarCantidad = $consultaCantidad->stock;


                $sumarCantidad+= $_POST['cantidad'];
                $sumar = "update articulos set stock =" . $sumarCantidad . " where codigo = " . $codigo;
                $conexionPDO->exec($sumar);
                header('Location: Ejercicio04.php?accion=entrada');
              }

              ///
              //añadir artículo
              ///

              if (($_GET['accion'] == "anadirArticulo") && ($_SESSION['permisos'] == "todos")) {
                ?>
                <form action="Ejercicio04.php" method="post">
                    <table>
                        <tr>
                            <td><a href="Ejercicio04.php?factorOrden=codigo&accion=anadirArticulo">Codigo</a></td>
                            <td><a href="Ejercicio04.php?factorOrden=descripcion&accion=anadirArticulo">Descripcion</a></td>
                            <td><a href="Ejercicio04.php?factorOrden=precioCompra&accion=anadirArticulo">Precio De Compra</a></td>
                            <td><a href="Ejercicio04.php?factorOrden=precioVenta&accion=anadirArticulo">Precio De Venta</a></td>
                            <td><a href="Ejercicio04.php?factorOrden=stock&accion=anadirArticulo">Cantidad</a></td>
                            <td>Añadir</td>
                        </tr>
                        <tr>
                            <td><input required="" Placeholder="codigo" type="text" name="codigo" autofocus="" min="0"></td>
                            <td><input required="" Placeholder="descripcion" type="text" name="descripcion"></td>
                            <td><input required="" Placeholder="precioCompra" step="0.01" type="number" name="precioCompra" min="1"></td>
                            <td><input required="" Placeholder="precioVenta" step="0.01" type="number" name="precioVenta" min="1"></td>
                            <td>
                                <input required="" Placeholder="stock" min="0" max="9999" type="number" name="stock">
                                <input type="hidden" name="accion" value="Nuevo">

                            </td>

                            <td colspan="2"><button type="submit" class="cesta fa  fa-file-text-o"></button></td>
                            </form>
                            <?php
                            $listadoArticulos = "select * from articulos order by " . $_SESSION['factorOrden'] . " limit " . (($_SESSION['pagina'] - 1) * 5) . "," . $_SESSION['cantidadPorPagina'];
                            $consultaListado = $conexionPDO->query($listadoArticulos);
                            while ($registro = $consultaListado->fetchObject()) {
                              ?>
                          <tr>
                              <td><?= $registro->codigo ?></td>
                              <td><?= $registro->descripcion ?></td>
                              <td><?= $registro->precioCompra ?></td>
                              <td><?= $registro->precioVenta ?></td>
                              <td><?= $registro->stock ?></td>
                          </tr>
                        <?php } ?>
                        <tr>
                            <td>
                                Número de Artículos: <?= $consulta->rowCount() ?>
                            </td>
                            <td>
                                Página <?= $_SESSION['pagina'] ?> de <?= $numPag ?>    
                            </td>
                            <!--Página Primera-->
                            <td>
                                <form action="Ejercicio04.php" method="get">
                                    <input type="hidden" name="accion" value="anadirArticulo">
                                    <input type="hidden" name="pagina" value="Primera">
                                    <button type="submit">Primera</button>
                                </form>  
                            </td>
                            <!--Página Anterior-->
                            <td>
                                <form action="Ejercicio04.php" method="get">
                                    <input type="hidden" name="accion" value="anadirArticulo">
                                    <input type="hidden" name="pagina" value="Anterior">
                                    <button type="submit">Anterior</button>
                                </form>  
                            </td>
                            <!--Página Siguiente-->
                            <td>
                                <form action="Ejercicio04.php" method="get">
                                    <input type="hidden" name="accion" value="anadirArticulo">
                                    <input type="hidden" name="pagina" value="Siguiente">
                                    <button type="submit">Siguiente</button>
                                </form>  
                            </td>
                            <!--Última Página-->
                            <td>
                                <form action="Ejercicio04.php" method="get">
                                    <input type="hidden" name="accion" value="anadirArticulo">
                                    <input type="hidden" name="pagina" value="Ultima">
                                    <button type="submit">Última</button>
                                </form>  
                            </td>
                        </tr>
                    </table>
                    <?php
                  }

                  if ($_POST['accion'] == "Nuevo") {
                    //consulta si existe el codigo primero
                    $codigo = $_POST['codigo'];
                    $añadir = $conexionPDO->query("select codigo,descripcion from articulos where codigo =" . $codigo);
                    $consultaCodigo = $añadir->fetchObject();
                    //si existe el codigo arroja un fallo
                    if ($añadir->rowCount() > 0) {
                      if ($consultaCodigo->descripcion == "") {
                        echo "<p class='fallo'>El Código " . $_POST[codigo] . " pertenece a Anónimo</p>";
                      } else {
                        echo "<p class='fallo'>El Código " . $_POST[codigo] . " pertenece a " . $consultaCodigo->descripcion . "</p>";
                      }
                    } else {

                      $inserta = "INSERT INTO articulos VALUES (\"$_POST[codigo]\", \"$_POST[descripcion]\", \"$_POST[precioCompra]\", \"$_POST[precioVenta]\", \"$_POST[stock]\")";
                      $conexionPDO->exec($inserta);
                      header('Location: Ejercicio04.php?accion=anadirArticulo');
                    }
                  }

                  ////
                  //salida de mercancias
                  ////

                  if ($_GET['accion'] == "salida") {
                    $listadoArticulos = "select * from articulos order by " . $_SESSION['factorOrden'] . " limit " . (($_SESSION['pagina'] - 1) * 5) . "," . $_SESSION['cantidadPorPagina'];
                    $consultaListado = $conexionPDO->query($listadoArticulos);
                    //Este bucle extrae los datos de la bbddd
                    ?>
                    <table>
                        <tr>
                            <td><a href="Ejercicio04.php?factorOrden=codigo&accion=salida">Codigo</a></td>
                            <td><a href="Ejercicio04.php?factorOrden=descripcion&accion=salida">Descripcion</a></td>
                            <td><a href="Ejercicio04.php?factorOrden=precioCompra&accion=salida">Precio De Compra</a></td>
                            <td><a href="Ejercicio04.php?factorOrden=precioVenta&accion=salida">Precio De Venta</a></td>
                            <td><a href="Ejercicio04.php?factorOrden=stock&accion=salida">Cantidad</a></td>
                            <td>Salida de stock</td>
                            <?php
                            if ($_GET['accion'] == "listado") {
                              ?>
                              <td colspan="2"></td>
                              <?php
                            }
                            ?>
                        </tr>
                        <?php
                        while ($registro = $consultaListado->fetchObject()) {
                          ?>
                          <tr>
                              <td><?= $registro->codigo ?></td>
                              <td><?= $registro->descripcion ?></td>
                              <td><?= $registro->precioCompra ?></td>
                              <td><?= $registro->precioVenta ?></td>
                              <td><?= $registro->stock ?></td>
                              <td>
                                  <form action="Ejercicio04.php" method="post">
                                      <input min="0" type="number" name="cantidad"></td>
                                      <input type="hidden" name="codigo" value="<?= $registro->codigo ?>">
                                      <input type="hidden" name="accion" value="salidaMercancia">
                                  </form>
                          </tr>

                        <?php } ?>
                        <tr>
                            <td>
                                Número de Artículos: <?= $consulta->rowCount() ?>
                            </td>
                            <td>
                                Página <?= $_SESSION['pagina'] ?> de <?= $numPag ?>    
                            </td>
                            <!--Página Primera-->
                            <td>
                                <form action="Ejercicio04.php" method="get">
                                    <input type="hidden" name="accion" value="salida">
                                    <input type="hidden" name="pagina" value="Primera">
                                    <button type="submit">Primera</button>
                                </form>  
                            </td>
                            <!--Página Anterior-->
                            <td>
                                <form action="Ejercicio04.php" method="get">
                                    <input type="hidden" name="accion" value="salida">
                                    <input type="hidden" name="pagina" value="Anterior">
                                    <button type="submit">Anterior</button>
                                </form>  
                            </td>
                            <!--Página Siguiente-->
                            <td>
                                <form action="Ejercicio04.php" method="get">
                                    <input type="hidden" name="accion" value="salida">
                                    <input type="hidden" name="pagina" value="Siguiente">
                                    <button type="submit">Siguiente</button>
                                </form>  
                            </td>
                            <!--Última Página-->
                            <td>
                                <form action="Ejercicio04.php" method="get">
                                    <input type="hidden" name="accion" value="salida">
                                    <input type="hidden" name="pagina" value="Ultima">
                                    <button type="submit">Última</button>
                                </form>  
                            </td>
                        </tr>
                        <?php
                      }

                      ///
                      //entrada de mercancias
                      ///

                      if ($_GET['accion'] == "entrada") {
                        $listadoArticulos = "select * from articulos order by " . $_SESSION['factorOrden'] . " limit " . (($_SESSION['pagina'] - 1) * 5) . "," . $_SESSION['cantidadPorPagina'];
                        $consultaListado = $conexionPDO->query($listadoArticulos);
                        //Este bucle extrae los datos de la bbddd
                        ?>
                        <table>
                            <tr>
                                <td><a href="Ejercicio04.php?factorOrden=codigo&accion=entrada">Codigo</a></td>
                                <td><a href="Ejercicio04.php?factorOrden=descripcion&accion=entrada">Descripcion</a></td>
                                <td><a href="Ejercicio04.php?factorOrden=precioCompra&accion=entrada">Precio De Compra</a></td>
                                <td><a href="Ejercicio04.php?factorOrden=precioVenta&accion=entrada">Precio De Venta</a></td>
                                <td><a href="Ejercicio04.php?factorOrden=stock&accion=entrada">Cantidad</a></td>
                                <td>Entrada de Stock</td>
                                <?php
                                if ($_GET['accion'] == "listado") {
                                  ?>
                                  <td colspan="2"></td>
                                  <?php
                                }
                                ?>
                            </tr>
                            <?php
                            while ($registro = $consultaListado->fetchObject()) {
                              ?>
                              <tr>
                                  <td><?= $registro->codigo ?></td>
                                  <td><?= $registro->descripcion ?></td>
                                  <td><?= $registro->precioCompra ?></td>
                                  <td><?= $registro->precioVenta ?></td>
                                  <td><?= $registro->stock ?></td>
                                  <td>
                                      <form action="Ejercicio04.php" method="post">
                                          <input min="0" type="number" name="cantidad"></td>
                                          <input type="hidden" name="codigo" value="<?= $registro->codigo ?>">
                                          <input type="hidden" name="accion" value="entradaMercancia">
                                      </form>
                              </tr>
                              <?php
                            }
                            ?>
                            <tr>
                                <td>
                                    Número de Artículos: <?= $consulta->rowCount() ?>
                                </td>
                                <td>
                                    Página <?= $_SESSION['pagina'] ?> de <?= $numPag ?>    
                                </td>
                                <!--Página Primera-->
                            <td>
                                <form action="Ejercicio04.php" method="get">
                                    <input type="hidden" name="accion" value="entrada">
                                    <input type="hidden" name="pagina" value="Primera">
                                    <button type="submit">Primera</button>
                                </form>  
                            </td>
                                <!--Página Anterior-->
                                <td>
                                    <form action="Ejercicio04.php" method="get">
                                        <input type="hidden" name="accion" value="entrada">
                                        <input type="hidden" name="pagina" value="Anterior">
                                        <button type="submit">Anterior</button>
                                    </form>  
                                </td>
                                <!--Página Siguiente-->
                                <td>
                                    <form action="Ejercicio04.php" method="get">
                                        <input type="hidden" name="accion" value="entrada">
                                        <input type="hidden" name="pagina" value="Siguiente">
                                        <button type="submit">Siguiente</button>
                                    </form>  
                                </td>
                                <!--Última Página-->
                                <td>
                                    <form action="Ejercicio04.php" method="get">
                                        <input type="hidden" name="accion" value="entrada">
                                        <input type="hidden" name="pagina" value="Ultima">
                                        <button type="submit">Última</button>
                                    </form>  
                                </td>
                            </tr>
                            <?php
                          }


                          ///
                          //listado
                          ///

                          if ($_GET['accion'] == "listado") {
                            $listadoArticulos = "select * from articulos order by " . $_SESSION['factorOrden'] . " limit " . (($_SESSION['pagina'] - 1) * 5) . "," . $_SESSION['cantidadPorPagina'];
                            $consultaListado = $conexionPDO->query($listadoArticulos);
                            ?>
                            <table>
                                <tr>
                                    <td><a href="Ejercicio04.php?factorOrden=codigo">Codigo</a></td>
                                    <td><a href="Ejercicio04.php?factorOrden=descripcion">Descripcion</a></td>
                                    <td><a href="Ejercicio04.php?factorOrden=precioCompra">Precio De Compra</a></td>
                                    <td><a href="Ejercicio04.php?factorOrden=precioVenta">Precio De Venta</a></td>
                                    <td><a href="Ejercicio04.php?factorOrden=stock">Cantidad</a></td>
                                    <?php
                                    if (($_GET['accion'] == "listado") && ($_SESSION['permisos'] == "todos")) {
                                      ?>
                                      <td colspan="2"></td>
                                      <?php
                                    }
                                    ?>
                                </tr><!-- Añade Registro -->
                                <?php
                                //Este bucle extrae los datos de la bbddd
                                while ($registro = $consultaListado->fetchObject()) {
                                  ?>
                                  <tr>
                                      <td><?= $registro->codigo ?></td>
                                      <td><?= $registro->descripcion ?></td>
                                      <td><?= $registro->precioCompra ?>€</td>
                                      <td><?= $registro->precioVenta ?>€</td>
                                      <td><?= $registro->stock ?></td>
                                      <!-- Modificar Registro -->
                                      <?php
                                      if ($_SESSION['permisos'] == "todos") {
                                        ?>
                                        <td>            
                                            <form action="Ejercicio04Modificar.php" method="post">
                                                <input type="hidden" name="accion" value="Modificar">
                                                <input type="hidden" name="codigo" value="<?= $registro->codigo ?>">
                                                <input type="hidden" name="descripcion" value="<?= $registro->descripcion ?>">
                                                <input type="hidden" name="precioCompra" value="<?= $registro->precioCompra ?>">
                                                <input type="hidden" name="precioVenta" value="<?= $registro->precioVenta ?>">
                                                <input type="hidden" name="stock" value="<?= $registro->stock ?>">


                                                <button type="submit" class="fa fa-pencil">Modificar</button>

                                            </form>
                                        </td>

                                        <!-- Borrar Registro -->
                                        <td>

                                            <form action="Ejercicio04Modificar.php" method="post">
                                                <input type="hidden" name="accion" value="Borrar">
                                                <input type="hidden" name="codigo" value="<?= $registro->codigo ?>">
                                                <button type="submit" class="fa fa-trash">Borrar</button>
                                            </form>
                                        </td>
                                        <?php
                                      }
                                      ?>
                                  </tr>


                                  <?php
                                }
                                ?>
                                <tr>
                                    <td>
                                        Número de Artículos: <?= $consulta->rowCount() ?>
                                    </td>
                                    <td>
                                        Página <?= $_SESSION['pagina'] ?> de <?= $numPag ?>    
                                    </td>
                                    <!--Página Primera-->
                            <td>
                                <form action="Ejercicio04.php" method="get">
                                    <input type="hidden" name="accion" value="listado">
                                    <input type="hidden" name="pagina" value="Primera">
                                    <button type="submit">Primera</button>
                                </form>  
                            </td>
                                    <!--Página Anterior-->
                                    <td>
                                        <form action="Ejercicio04.php" method="get">
                                            <input type="hidden" name="accion" value="listado">
                                            <input type="hidden" name="pagina" value="Anterior">
                                            <button type="submit">Anterior</button>
                                        </form>  
                                    </td>
                                    <!--Página Siguiente-->
                                    <td>
                                        <form action="Ejercicio04.php" method="get">
                                            <input type="hidden" name="accion" value="listado">
                                            <input type="hidden" name="pagina" value="Siguiente">
                                            <button type="submit">Siguiente</button>
                                        </form>  
                                    </td>
                                    <!--Última Página-->
                                    <td>
                                        <form action="Ejercicio04.php" method="get">
                                            <input type="hidden" name="accion" value="listado">
                                            <input type="hidden" name="pagina" value="Ultima">
                                            <button type="submit">Última</button>
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
                          <?php
                        } else {
                          header("Refresh: 2; url=Ejercicio04Login.php"); // recarga la página
                        }