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
    <title>Área de Computación e Informática</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">        
    <link rel="stylesheet" href="css/estilosSlider.css" type="text/css">
    <link rel="stylesheet" href="css/styles.css">
    <style>
    html, body {
      position: relative;
      height: 100%;
    }
    body {
      background: #eee;
      font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
      font-size: 14px;
      color:#000;
      margin: 0;
      padding: 0;
    }
    .swiper-container {
      width: 100%;
      height: 100%;
    }
    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;
      /* Center slide text vertically */
      display: -webkit-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      -webkit-justify-content: center;
      justify-content: center;
      -webkit-box-align: center;
      -ms-flex-align: center;
      -webkit-align-items: center;
      align-items: center;
    }
    
  </style>
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
                    <a class="link-to" href="#">Anuncios</a>
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
            <div class="left-panel row separator col-lg-5 col-md-5 col-sm-12">
                <div id="time-panel" class="view-panel container-fluid">
                    <div class="date-time-content row">
                        <div>
                            <h1 id="date"></h1>
                        </div>
                        <div>
                                <h2 id="timer"></h2>
                            </div>
                        </div>
                    </div>
                <div id="text-panel" class="view-panel container-fluid">
                        <?php
                        require 'slideranuns.php';
                        ?>
                </div>
            </div>
            <div class="right-panel row separator col-lg-7 col-md-5 col-sm-12">
                <div  class="image view-panel col-lg-12 col-sm-12" id="images-div">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                        <?php
                            require 'slider2.php';
                        ?>
                        </div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination"></div>
                        <!-- Add Arrows -->
                    </div>
                </div>
                <div  class="image view-panel col-lg-12 col-sm-12" id="images2-div">                    
                    <?php
                        require 'slider1.php';
                    ?>
                </div>
            </div>
        </div>
        <!-- Píe de página -->
        <nav id="main-footer" class="navbar navbar-default">
            <div class="col-lg-12 col-md-12 col-sm-12"> Copyright © 2017 Universidad Autónoma de San Luis Potosí, </div>
            <div class="col-lg-12 col-md-12 col-sm-12"> Facultad de Ingeniería, Área de Computación e Informática </div>
        </nav>
    </div>
</body>

<script src="js/scriptSlider.js"></script>
<script src="js/main.js"></script>
<script>
    var swiper = new Swiper('.swiper-container', {
      spaceBetween: 30,
      centeredSlides: true,
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
    });
  </script>
</html>