<?php

require 'anuncio.php';
session_start();

$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$iduser = $_SESSION['id_usuario'];

$anuncio = new Anuncio("localhost", "", "gestoranuncios", "root", "");
if ($anuncio->agregarAnuncio($titulo, $descripcion, $iduser)) {
    header('Location:config.php');
}
?>