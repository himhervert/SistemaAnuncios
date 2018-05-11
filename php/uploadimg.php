<?php

require '../imagen.php';
session_start();

$files = $_FILES;
$tiempo = $_POST['tempoimg'];
$nombreuser = $_SESSION['nombre_usuario'];
$fechaini = $_POST['fechaini'];
$fechafin = $_POST['fechafin'];

$imagen = new Imagen("localhost", "", "sistemaanuncios", "root", "");
if ($imagen->agregarImagen($files, $nombreuser, $tiempo, $fechaini, $fechafin)) {
    echo "<script>alert('Registro Realizado con Exito');</script>";
    header('Location: ../config.php');
} else {
    echo "<script>alert('Error al registrar el usuario');</script>";
}
?>