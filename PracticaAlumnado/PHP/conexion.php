<?php

$conexion = mysqli_connect("localhost", "root", "", "alumnado");

if (!$conexion) {
    echo "Error en la conexión con la base de datos";
}

?>