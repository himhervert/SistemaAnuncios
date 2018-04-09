<?php
/**
 * PHP Version 7.1.10
 * Codigo para cerrar sesion del usuario
 * 
 * @category Function
 * @package  UserLogin
 * @author   Leonardo Iván Hervert Morales <leohervert@gmail.com>
 * @author   Francisco Javier Gómez Vázquez <jagova@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License|
 * @link     https://github.com/himhervert/himhervert.github.io
 * @link     https://github.com/himhervert/jagova.github.io
 */
session_start(); // Se inicializa el arreglo de $_SESSION
session_destroy(); // Se destruye el arreglo de $_SESSION
header('Location:index.php'); // Te redirecciona al index.
?>