<?php

require 'anuncio.php';
if (isset($_SESSION['usuario'])) {
    $anuncio = new Anuncio("localhost", "", "gestoranuncios", "root", "");
    $anuncio->fetch(0);
} 

?>