<?php

include_once 'Vehiculo.php';

class Coche extends Vehiculo {

  private $marca;
  private $modelo;


  public function __construct($ma, $mo) {
    $this->marca = $ma;
    $this->modelo = $mo;
  }
  
  public function quemaRuedas() {
    return parent::__toString() . "Quemando Ruedas";
  }

}
