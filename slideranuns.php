<?php
require 'anuncio.php';
    $anuncio = new Anuncio("localhost", "", "gestoranuncios", "root", "");
    $anuncio->fetch(1);

?>