<?php
require 'php/anuncio.php';
    $anuncio = new Anuncio("localhost", "", "sistemaanuncios", "root", "");
    $anuncio->fetch(1);

?>