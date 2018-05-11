<?php

require 'anuncio.php';
session_start();

$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$nombreuser = $_SESSION['nombre_usuario'];
$fechaini = $_POST['fechaini2'];
$fechafin = $_POST['fechafin2'];

$anuncio = new Anuncio("localhost", "", "sistemaanuncios", "root", "");
if ($anuncio->agregarAnuncio($titulo, $descripcion, $fechaini, $fechafin, $nombreuser)) {
    header('Location: ../config.php');
}
?>