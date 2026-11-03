<?php
require_once "Monoplaza.php";

class F3 extends Monoplaza {
  private $academia;

  public function __construct($nombrePiloto, $nacionalidad, $numero, $escuderia, $puntos, $academia) {
    parent::__construct($nombrePiloto, $nacionalidad, $numero, $escuderia, $puntos);
    $this->academia = $academia;
  }

  public function getAcademia() {
    return $this->academia;
  }

  public function posicionValida($posicion) {
    return $posicion >= 1 && $posicion <= 30;
  }

  public function otorgarPuntos($posicion, $vueltaRapida) {
    $tablaPuntos = [
      1 => 10, 2 => 8, 3 => 7, 4 => 6, 5 => 5,
      6 => 4, 7 => 3, 8 => 2, 9 => 1
    ];

    $this->actualizarPuntos($posicion, $tablaPuntos, $vueltaRapida, 30, false);
  }

  public function subirCategoria($datoExtra = null) {
    return new F2(
      $this->nombrePiloto,
      $this->nacionalidad,
      $this->numero,
      $this->escuderia,
      $this->puntos,
      (bool) $datoExtra
    );
  }
}
