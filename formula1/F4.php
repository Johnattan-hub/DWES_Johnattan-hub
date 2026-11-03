<?php
require_once "Monoplaza.php";

class F4 extends Monoplaza {
  private $paisCategoria;

  public function __construct($nombrePiloto, $nacionalidad, $numero, $escuderia, $puntos, $paisCategoria) {
    parent::__construct($nombrePiloto, $nacionalidad, $numero, $escuderia, $puntos);
    $this->paisCategoria = $paisCategoria;
  }

  public function getPaisCategoria() {
    return $this->paisCategoria;
  }

  public function posicionValida($posicion) {
    return $posicion >= 1 && $posicion <= 30;
  }

  public function otorgarPuntos($posicion, $vueltaRapida) {
    $tablaPuntos = [
      1 => 25, 2 => 18, 3 => 15, 4 => 12, 5 => 10,
      6 => 8, 7 => 6, 8 => 4, 9 => 2, 10 => 1
    ];

    $this->actualizarPuntos($posicion, $tablaPuntos, $vueltaRapida, 30, false);
  }

  public function subirCategoria($datoExtra = null) {
    return new F3(
      $this->nombrePiloto,
      $this->nacionalidad,
      $this->numero,
      $this->escuderia,
      $this->puntos,
      $datoExtra
    );
  }
}
