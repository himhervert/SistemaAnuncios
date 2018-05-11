<?php
/**
 * PHP Version 7.1.10
 * Codigo para que el usuario intente iniciar sesion
 *
 * @category Function
 * @package  UserLogin
 * @author   Leonardo Iván Hervert Morales <leohervert@gmail.com>
 * @author   Francisco Javier Gómez Vázquez <jagova@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License|
 * @link     https://github.com/himhervert/himhervert.github.io
 * @link     https://github.com/himhervert/jagova.github.io      
 */
require 'usuario.php';
session_start();
    
$sal = "@fgz%"; //
$nombre =  $_POST['username'];
$pwd = md5($_POST['pwd'].$sal);
$objeto;
$usuario = new Usuario("localhost", "", "sistemaanuncios", "root", "");
/* Creando la conexion con la bd por medio de una clase */
if ($usuario->verificar($nombre, $pwd)) {
    $array = $usuario->datos();
    var_dump($array);
    $_SESSION['usuario'] = true;
    $_SESSION['nombre_usuario'] = $array[0]["NombreUsuario"];
    $_SESSION['tipo'] = $array[0]["TipoUsuario"];
    $_SESSION['nombre'] = $array[0]["Nombre"];
    $_SESSION['apellidoPaterno'] = $array[0]["ApellidoPaterno"];
    $_SESSION['apellidoMaterno'] = $array[0]["ApellidoMaterno"];
    $_SESSION['email'] = $array[0]["Email"];
    $_SESSION["telefono"] = $array[0]["Telefono"];
    header('Location: ../index.php');
} else {
    header('Location: ../login.php');     
}
?>