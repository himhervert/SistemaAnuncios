<!DOCTYPE html>
<html lang="es">
<?php
/**
 * PHP Version 7.1.10
 * Vista principal del Index
 *
 * @category View
 * @package  UserLogin
 * @author   Leonardo Iván Hervert Morales <leohervert@gmail.com>
 * @author   Francisco Javier Gómez Vázquez <jagova@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License|
 * @link     https://github.com/himhervert/himhervert.github.io
 * @link     https://github.com/himhervert/jagova.github.io      
 */
    session_start();
?>
<head>
    <meta charset="UTF-8">
    <title>Área de Ciencias de la Computación</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">        
    <link rel="stylesheet" href="css/styles.css">
    
</head>

<body>
    <div id="main-container" class="container">
        <!-- Encabezado -->
        <div id="main-header" class="container-fluid">
            <div class="header-body row">
                <div class="uaslp logo col-lg-2 col-md-2 col-sm-6 col-xs-6">
                    <a href="#"></a>
                </div>
                <div class="engine logo col-lg-2 col-md-2 col-sm-6 col-xs-6">
                    <a href="#"></a>
                </div>
                <div class="info-comp col-lg-8 col-md-8">
                    <div class="row">
                        <div class="area-title col-lg-9 col-md-9"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navegador  -->
        <nav id="main-navbar" class="navbar navbar-default">
            <ul class="nav navbar-nav">
                <li>
                    <a class="link-to" href="#">Inicio</a>
                </li>
                <li>
                    <a class="link-to" href="anuncios.php">Anuncios</a>
                </li>
                <?php if (isset($_SESSION['usuario'])) : ?>
                <li>
                    <a id="" href="config.php">Configuración</a>
                </li>
                <?php endif; ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            <?php if (!isset($_SESSION['usuario'])) : ?>
                <li>
                    <a class="link-to" href="login.php">Iniciar Sesión</a>
                </li>
            <?php endif; ?>
            
            <?php if (isset($_SESSION['usuario'])) : ?>
                <li>
                    <a class="link-to" href="php/botlogout.php">Cerrar Sesión</a>
                </li>
            <?php endif; ?>
            </ul>
        </nav>
        <!-- Cuerpo del body-->
        <div id="main-content" class="content container-fluid">
                <h1 id="welcomeT">Bienvenido</h1>
                <h2 class="welcomeS">Objetivo</h2>
                <p class="welcomeP">Esta sistema será utilizado para que los alumnos del area de computación e informática estén enterados de los anuncios por medio de una aplicación web.</p>
                <h2 class="welcomeS">Estrategias</h2>
                <ul id="listE">
                    <li>Facilidad de publicación de anuncios</li>
                    <li>Restricción de acceso al sistema</li>
                    <li>Control de usuario registrados</li>
                    <li>Facilidad de acceso</li>
                </ul>
                <h2 class="welcomeS">Contacto</h2>
                <p>Leonardo Iván Hervert Morales: leohervertt@gmail.com </p>
                <p>Tel. 4443305333 </p>
        </div>
        <!-- Píe de página -->
        <nav id="main-footer" class="navbar navbar-default">
            <div class="col-lg-12 col-md-12 col-sm-12"> Copyright © 2018 Universidad Autónoma de San Luis Potosí, </div>
            <div class="col-lg-12 col-md-12 col-sm-12"> Facultad de Ingeniería, Área de Ciencias de la Computación </div>
        </nav>
    </div>
</body>
<script src="js/main.js"></script>
</html>