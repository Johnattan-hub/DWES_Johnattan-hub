<?php

include "conexion.php";

$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$fechaDeNacimiento = $_POST['fechaDeNacimiento'];
$curso = $_POST['curso'];
$email = $_POST['email'];
$contrasena = $_POST['contrasena'];

$sql = "SELECT COUNT(*) AS cantidad FROM alumnos WHERE curso = '$curso'";

$resultado = mysqli_query($conexion, $sql);

$fila = mysqli_fetch_assoc($resultado);

if ($fila['cantidad'] >= 25) {

    echo "No se puede matricular al alumno porque el curso ya tiene 25 alumnos.";

} else {

    $sql = "INSERT INTO alumnos
    (nombre, apellidos, fechaDeNacimiento, curso, email, contrasena)
    VALUES
    ('$nombre', '$apellidos', '$fechaDeNacimiento', '$curso', '$email', '$contrasena')";

    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        echo "Alumno matriculado correctamente";
    } else {
        echo "Error al matricular al alumno";
    }

}

mysqli_close($conexion);

?>