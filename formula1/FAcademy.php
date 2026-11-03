<?php
require_once "Monoplaza.php";

class FAcademy extends Monoplaza {
  private $potenciaMaxima;

  public function __construct($nombrePiloto, $nacionalidad, $numero, $escuderia, $puntos, $potenciaMaxima) {
    parent::__construct($nombrePiloto, $nacionalidad, $numero, $escuderia, $puntos);
    $this->potenciaMaxima = $potenciaMaxima;
  }

  public function getPotenciaMaxima() {
    return $this->potenciaMaxima;
  }

  public function posicionValida($posicion) {
    return $posicion >= 1 && $posicion <= 18;
  }

  public function otorgarPuntos($posicion, $vueltaRapida) {
    $tablaPuntos = [
      1 => 18, 2 => 15, 3 => 12, 4 => 10, 5 => 8,
      6 => 6, 7 => 4, 8 => 2, 9 => 1
    ];

    $this->actualizarPuntos($posicion, $tablaPuntos, $vueltaRapida, 18, true);
  }

  public function subirCategoria($datoExtra = null) {
    return new F4(
      $this->nombrePiloto,
      $this->nacionalidad,
      $this->numero,
      $this->escuderia,
      $this->puntos,
      $datoExtra
    );
  }
}
