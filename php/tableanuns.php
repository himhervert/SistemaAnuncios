<?php

require 'anuncio.php';
if (isset($_SESSION['usuario'])) {
    $anuncio = new Anuncio("localhost", "", "sistemaanuncios", "root", "");
    $anuncio->fetch(0);
} 

?>