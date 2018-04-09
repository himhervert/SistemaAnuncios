<?php

require 'imagen.php';
session_start();

$files = $_FILES;
$tiempo = $_POST['tempoimg'];
$iduser = $_SESSION['id_usuario'];

$imagen = new Imagen("localhost", "", "sistemaanuncios", "root", "");
if ($imagen->agregarImagen($files, $iduser, $tiempo)) {
    echo "<script>alert('Registro Realizado con Exito');</script>";
    header('Location:config.php');
} else {
    echo "<script>alert('Error al registrar el usuario');</script>";
}
?>