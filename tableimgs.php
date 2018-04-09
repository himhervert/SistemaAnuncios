<?php

require 'imagen.php';
if (isset($_SESSION['usuario'])) {
    $imagen = new Imagen("localhost", "", "gestoranuncios", "root", "");
    $imagen->fetch(0);
} 
?>