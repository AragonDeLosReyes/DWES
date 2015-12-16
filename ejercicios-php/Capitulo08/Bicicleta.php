<?php

include_once 'Vehiculo.php';

class Bicicleta extends Vehiculo {

  private $ruedas;
  private $color;


  public function __construct($ru, $co) {
    $this->ruedas = $ru;
    $this->color = $co;
  }
  
  public function caballito() {
    return parent::__toString() . "Haciendo el caballito: Mec, Mec";
  }

}
