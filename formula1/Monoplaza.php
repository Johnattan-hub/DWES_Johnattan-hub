<?php

abstract class Monoplaza {
  protected $nombrePiloto;
  protected $nacionalidad;
  protected $numero;
  protected $escuderia;
  protected $puntos;

  public function __construct($nombrePiloto, $nacionalidad, $numero, $escuderia, $puntos = 0) {
    $this->nombrePiloto = $nombrePiloto;
    $this->nacionalidad = $nacionalidad;
    $this->numero = $numero;
    $this->escuderia = $escuderia;
    $this->puntos = $puntos;
  }

  public function getNombrePiloto() {
    return $this->nombrePiloto;
  }

  public function getNacionalidad() {
    return $this->nacionalidad;
  }

  public function getNumero() {
    return $this->numero;
  }

  public function getEscuderia() {
    return $this->escuderia;
  }

  public function getPuntos() {
    return $this->puntos;
  }

  public function setPuntos($puntos) {
    $this->puntos = $puntos;
  }

  public function posicionValida($posicion) {
    return false;
  }

  protected function actualizarPuntos($posicion, $tablaPuntos, $vueltaRapida, $maximoPilotos, $puntuaVueltaRapida) {
    if (!$this->posicionValida($posicion)) {
      throw new InvalidArgumentException("La posición no es válida para esta categoría.");
    }

    $puntosGanados = isset($tablaPuntos[$posicion]) ? $tablaPuntos[$posicion] : 0;

    if ($puntuaVueltaRapida && $vueltaRapida && $posicion <= 10) {
      $puntosGanados++;
    }

    $this->puntos += $puntosGanados;
  }

  abstract public function otorgarPuntos($posicion, $vueltaRapida);

  abstract public function subirCategoria($datoExtra = null);
}
