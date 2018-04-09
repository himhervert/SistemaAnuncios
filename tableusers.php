<?php

require 'usuario.php';
if (isset($_SESSION['usuario'])) {
    if ($_SESSION['permiso'] == 0) {
        $usuario = new Usuario("localhost", "", "gestoranuncios", "root", "");
        $usuario->fetch();
    }
} 

?>