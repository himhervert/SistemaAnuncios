<?php

require 'imagen.php';
$imagen = new Imagen("localhost", "", "gestoranuncios", "root", "");
$imagen->fetch(2);
?>