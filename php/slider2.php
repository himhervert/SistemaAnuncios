<?php

require 'php/imagen.php';
$imagen = new Imagen("localhost", "", "sistemaanuncios", "root", "");
$imagen->fetch(2);
?>