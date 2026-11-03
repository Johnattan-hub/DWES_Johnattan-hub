<?php
require_once "Monoplaza.php";

class F2 extends Monoplaza {
  private $tieneSuperlicencia;

  public function __construct($nombrePiloto, $nacionalidad, $numero, $escuderia, $puntos, $tieneSuperlicencia) {
    parent::__construct($nombrePiloto, $nacionalidad, $numero, $escuderia, $puntos);
    $this->tieneSuperlicencia = $tieneSuperlicencia;
  }

  public function getTieneSuperlicencia() {
    return $this->tieneSuperlicencia;
  }

  public function posicionValida($posicion) {
    return $posicion >= 1 && $posicion <= 24;
  }

  public function otorgarPuntos($posicion, $vueltaRapida) {
    $tablaPuntos = [
      1 => 10, 2 => 8, 3 => 7, 4 => 6, 5 => 5,
      6 => 4, 7 => 3, 8 => 2, 9 => 1
    ];

    $this->actualizarPuntos($posicion, $tablaPuntos, $vueltaRapida, 24, true);
  }

  public function subirCategoria($datoExtra = null) {
    if (!$this->tieneSuperlicencia) {
      throw new RuntimeException("El piloto todavía no tiene los puntos necesarios de superlicencia para subir a F1.");
    }

    return new F1(
      $this->nombrePiloto,
      $this->nacionalidad,
      $this->numero,
      $this->escuderia,
      $this->puntos,
      $datoExtra
    );
  }
}
