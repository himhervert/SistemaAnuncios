<!DOCTYPE html>
<html lang="es">
<?php
/**
 * PHP Version 7.1.10
 * Vista Principal de la configuracion del usuairo
 *
 * @category View
 * @package  UserConfig
 * @author   Leonardo Iván Hervert Morales <leohervert@gmail.com>
 * @author   Francisco Javier Gómez Vázquez <jagova@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License|
 * @link     https://github.com/himhervert/himhervert.github.io
 * @link     https://github.com/himhervert/jagova.github.io      
 */
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
}
?>
<head>
    <meta charset="UTF-8">
    <title>Área de Computación e Informática</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css" type="text/css">
    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
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
            </div></div>
        <!-- Navegador  -->
        <nav id="main-navbar" class="navbar navbar-default">
            <ul class="nav navbar-nav">
                <li>
                    <a class="link-to" href="index.php">Inicio</a>
                </li>
                <li>
                    <a class="link-to" href="anuncios.php">Anuncios</a>
                </li>
                <?php if (isset($_SESSION['usuario'])) : ?>
                <li>
                    <a id="" href="#">Configuración</a>
                </li>
                <?php endif; ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            <?php if (!isset($_SESSION['usuario'])) : ?>
                <li>
                    <a class="link-to" href="login.html">Iniciar Sesión</a>
                </li>
            <?php endif; ?>
            <?php if (isset($_SESSION['usuario'])) : ?>
                <li>
                    <a class="link-to" href="logout.php">Cerrar Sesión</a>
                </li>
            <?php endif; ?>
            </ul>
        </nav>
        <!-- Cuerpo del body-->
        <div id="main-content" class="content container-fluid">
                <div class="row">
                    <div id="menu_conf" class="col-sm-3 col-lg-2">
                        <nav class="navbar navbar-default navbar-side">
                            <!-- normal collapsible navbar markup -->
                            <ul class="nav nav-pills nav-stacked">
                                <?php if ($_SESSION['permiso'] == 0) : ?>
                                    <li><a class="active" data-toggle="pill" href="#usuarios">Usuarios</a></li>
                                <?php endif; ?>
                                <li><a data-toggle="pill" href="#imagenes">Imagenes</a></li>
                                <li><a data-toggle="pill" href="#anuncios">Anuncios</a></li>

                            </ul>
                        </nav>
                    </div>
                    <div id="op_conf"class="col-sm-9 col-lg-10">
                        <div class="tab-content container-fluid">
                            <div id="perfil" class="tab-pane fade in active">
                            </div>
                            <div id="usuarios" class="tab-pane fade table-responsive">
                                <h3>Usuarios</h3>
                                <form class="form form-responsive" action="registro.html">
                                <label class="" for="nuevousuario">Seleccione su imagen:</label>
                                <input type="submit" class="btn btn-default"value="Nuevo usuario"/>
                                </form>
                                <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Email</th>
                                        <th>Tipo Usuario</th>
                                    </tr>
                                </thead>
                                <?php
                                    require "tableusers.php";
                                ?>
                                </table>
                            </div>
                            <div id="imagenes" class="tab-pane fade">
                            <form class="form form-responsive" enctype="multipart/form-data" action="uploadimg.php" method="POST">
                                <input type="hidden" name="MAX_FILE_SIZE" value="5242880" />
                                <label class="" for="imagen_anuncio">Seleccione su imagen:</label>
                                <input name="imagen_anuncio" accept="image/*" type="file" class="form-control">
                                <label class="" for="tempoimg">Tiempo de muestra:</label>
                                <input name="tempoimg" type="number" height="2"
                                class="form-control" id="tempoimg" min="1" max="60" value="10">
                                <input type="submit" class="btn btn-default"value="Subir Archivo"/>
                            </form>
                            <br>
                        
                            <?php
                                    require "tableimgs.php";
                                ?>
                            </div>
                            <div id="anuncios" class="tab-pane fade table-responsive">
                                <h3>Anuncios de Texto</h3>
                                <form class="form form-responsive" action="uploadAnun.php" method="POST">
                                    <label class="" for="titulo">Inserte un titulo al anuncio:</label>
                                    <input name="titulo" type="text" class="form-control">
                                    <label class="" for="descripcion">Descripción del anuncio:</label>
                                    <input name="descripcion" type="text" class="form-control">
                                    <input type="submit" class="btn btn-default" value="Subir Anuncio"/>
                                </form>
                                <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Titulo</th>
                                        <th>Descripcion</th>
                                        <th>Usuario</th>
                                    </tr>
                                </thead>
                                <?php
                                    require "tableanuns.php";
                                ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <!-- Píe de página -->
        <nav id="main-footer" class="navbar navbar-default">
            <div class="col-lg-12 col-md-12 col-sm-12"> 
                Copyright © 2017 Universidad Autónoma de San Luis Potosí,
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12"> 
                Facultad de Ingeniería, Área de Computación e Informática
            </div>
        </nav>
    </div>
</body>

<!-- <script src="main.js"></script> -->
</html>