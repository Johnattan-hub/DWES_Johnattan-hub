<?php
require_once "Monoplaza.php";

class F1 extends Monoplaza {
  private $patrocinadorPrincipal;

  public function __construct($nombrePiloto, $nacionalidad, $numero, $escuderia, $puntos, $patrocinadorPrincipal) {
    parent::__construct($nombrePiloto, $nacionalidad, $numero, $escuderia, $puntos);
    $this->patrocinadorPrincipal = $patrocinadorPrincipal;
  }

  public function getPatrocinadorPrincipal() {
    return $this->patrocinadorPrincipal;
  }

  public function posicionValida($posicion) {
    return $posicion >= 1 && $posicion <= 22;
  }

  public function otorgarPuntos($posicion, $vueltaRapida) {
    $tablaPuntos = [
      1 => 25, 2 => 18, 3 => 15, 4 => 12, 5 => 10,
      6 => 8, 7 => 6, 8 => 4, 9 => 2, 10 => 1
    ];

    $this->actualizarPuntos($posicion, $tablaPuntos, $vueltaRapida, 22, true);
  }

  public function subirCategoria($datoExtra = null) {
    return null;
  }
}
