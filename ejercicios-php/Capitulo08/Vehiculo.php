<?php

abstract class Vehiculo {

// atributo de clase
  private static $kilometrajeTotal = 0;
  private $kilometraje;

// método de clase
  public static function getKilometrajeTotal() {
    return Vehiculo::$kilometrajeTotal;
  }
  
  public function __construct($km) {
    $this->kilometraje = $km;
  }

  public function getKilometraje() {
    return $this->kilometraje;
  }
  
  
    public function recorre($km) {
    $this->kilometraje += $km;
    Vehiculo::$kilometrajeTotal += $km;
  }

}
