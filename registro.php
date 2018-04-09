<?php
/**
 * PHP Version 5
 * Codigo para el login del usuario
 * 
 * @category Function
 * @package  UserLogin
 * @author   Leonardo Iván Hervert Morales <leohervert@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License|
 * @link     https://github.com/himhervert/himhervert.github.io
 */
$sal = "@fgz%";
$username =  $_POST['username'];
$pwd = md5($_POST['pwd'].$sal);
$type = $_POST['type'];
$nombre = $_POST['name'];
$apPat = $_POST['apPaterno'];
$apMat = $_POST['apMaterno'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];

require 'usuario.php';
$usuario = new Usuario("localhost", "", "gestoranuncios", "root", "");
if ($usuario->agregar(
    $username, $pwd, $type, $nombre, $apPat, $apMat, $email, $telefono
)
) {
    header('Location: index.php');
    echo "<script>javascript: alert('Registro Realizado con Exito')></script>";
} else {
    echo "<script>javascript: alert('Error al registrar el usuario')></script>";
}


?>
