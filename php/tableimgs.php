<?php

require 'imagen.php';
if (isset($_SESSION['usuario'])) {
    $imagen = new Imagen("localhost", "", "sistemaanuncios", "root", "");
    $imagen->fetch(0);
} 
?>