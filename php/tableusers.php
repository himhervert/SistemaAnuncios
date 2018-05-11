<?php

require 'usuario.php';
if (isset($_SESSION['usuario'])) {
    if ($_SESSION['tipo'] == 'Administrador') {
        $usuario = new Usuario("localhost", "", "sistemaanuncios", "root", "");
        $usuario->fetch();
    }
} 

?>