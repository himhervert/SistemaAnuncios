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
    if (isset($_SESSION['usuario'])){
        header('Location: index.php');
    }
?>
<head>
        <meta charset="UTF-8">
        <title>Área de Ciencias de la Computación</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- <link rel="stylesheet" href="css/bootstrap.css">         -->
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
                        <a class="link-to" href="index.php">Inicio</a>
                    </li>
                    <li>
                        <a class="link-to" href="anuncios.php">Anuncios</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="link-to" href="#">Iniciar Sesión</a>
                    </li>
                </ul>
            </nav>
            <!-- Cuerpo del body-->
            <div id="main-content" class="content container-fluid">
                    <div class="container container-form-usuario">
                            <form action="php/botlogin.php" method="POST">
                                <legend>Iniciar sesión</legend>
                                <fieldset>
                                    <label for="username">Nombre</label>                    
                                    <input type="text" class="form-control" name="username" placeholder="Nombre Usuario" required autofocus />
                                    <label for="pwd">Contraseña</label>                
                                    <input type="password" class="form-control" name="pwd" placeholder="Contraseña" required/>
                                    <input type="submit" value="Iniciar sesión">
                                </fieldset>
                            </form>
                        </div>
            </div>
            <!-- Píe de página -->
            <nav id="main-footer" class="navbar navbar-default">
                <div class="col-lg-12 col-md-12 col-sm-12"> Copyright © 2017 Universidad Autónoma de San Luis Potosí, </div>
                <div class="col-lg-12 col-md-12 col-sm-12"> Facultad de Ingeniería, Área de Ciencias de la Computación </div>
            </nav>
        </div>
    </body>
    <script src="js/main.js"></script>
    </html>