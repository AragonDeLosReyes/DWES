<?php
include_once 'Bicicleta.php';
include_once 'Coche.php';
include_once 'Vehiculo.php';
session_start();
if (!isset($_SESSION['coche'])) {
  $_SESSION['coche'] = serialize(new Coche("Saab", "93"));
  
}

if (!isset($_SESSION['bici'])){
  $_SESSION['bici'] = serialize(new Bicicleta("2", "Roja"));
}

$coche = unserialize($_SESSION['coche']);
$bici = unserialize($_SESSION['bici']);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>


        <?php
        $numeroDeKm = $_POST['numeroDeKm'];
        if ($_POST['vehiculo'] == "coche"){
          if (isset($numeroDeKm)) {
            $coche->recorre($numeroDeKm);
          }
        } else {
          if (isset($numeroDeKm)) {
            $bici->recorre($numeroDeKm);
          }
        }
        ?>
        <h2>Soy el Coche he recorrido <?= $coche->getKilometraje(); ?> Kms.</h2>
        <h2>Soy la bici he recorrido <?= $bici->getKilometraje(); ?> Kms.</h2>
        <h2>Total km Recorridos <?= Vehiculo::getKilometrajeTotal() ?> Kms.</h2>
        <form action="Ejercicio04.php" method="POST" id="vehiculos">
            No de Kms:
            <input type="number" name="numeroDeKm" min="1">
            <input type="submit">
        </form>

        <select name="vehiculo" form="vehiculos">
            <option value="coche">Coche</option>
            <option value="bici">Bici</option>
        </select>
        <?php
        $_SESSION['coche'] = serialize($coche);
        $_SESSION['bici'] = serialize($bici);
        ?>

    </body>
</html>