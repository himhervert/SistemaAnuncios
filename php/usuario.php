<?php
/**
 * Codigo para que el usuario intente iniciar sesion
 * 
 * Clase usuario que contendra los metodos de validación de usuarios.
 * 
 * @file     usuarios.php
 * @category Class
 * @package  Gestor
 * @author   Leonardo Iván Hervert Morales <leohervert@gmail.com>
 * @author   Francisco Javier Gómez Vázquez <jagova@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License|
 * @link     https://github.com/himhervert/himhervert.github.io
 * @link     https://github.com/himhervert/jagova.github.io
 * @release  1.0.0 
 */

class Usuario
{
    private $_db;
    private $_datos;
    /**
     * Constructor de la clase usuario.
     *
     * @param string  $host   Recibe el nombre del host del servidor.
     * @param integer $port   Puerto por el cual se establecera la comunicación.
     * @param string  $dbname nombre de la base de datos que se va a conectar.
     * @param string  $dbuser usuario que va a iniciar sesion en el servidor.
     * @param string  $passwd contraseña del usuario que va a iniciar sesion.
     */
    public function __construct($host, $port, $dbname, $dbuser, $passwd)
    {
        $dsn = "mysql:host=$host;port=$port;dbname=$dbname";
        try
        {
            $this->_db = new PDO($dsn, $dbuser, $passwd);
            $this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOEXCEPTION $ex){
            echo 'Error en la conexion a la BD'. $ex->getMessage();
            die();
        }
    }
    
    /**
     * Verifica si el usuario existe en la base de datos con la contraseña correcta.
     * 
     * @param string $usuario variable que contiene el nombre de usuario.
     * @param string $pwd     contraseña del usuario que desea iniciar sesion.
     * 
     * @return false|true
     */
    public function verificar($usuario, $pwd)
    {
        try
        { //Preparar la consulta
            $resultado = $this->_db->prepare(
                "SELECT * FROM `Usuario`
                 WHERE `NombreUsuario` = ? AND `Passwd` = ?"
            );
            //Ejecuta la consulta
            $resultado->execute(array($usuario,$pwd));
            $renglon = $resultado->fetchAll();
            if (count($renglon) === 1) {
                $this->_datos = $renglon;
                return true;
            } else {
                return false;
            }
        }
        catch(PDOException $e){
            echo "Error en la consulta" . $e->getMessage();
        }
    }


    public function fetch()
    {
        try
        {
            $sql = "SELECT `Nombre`, `ApellidoPaterno`, `ApellidoMaterno`, `TipoUsuario`, `Email`, `Telefono` FROM `Usuario`";
            $instruccion = $this->_db->prepare($sql);
            $instruccion->execute();
            foreach ($instruccion->fetchAll(PDO::FETCH_ASSOC) as $row) {
                echo "<tr>" 
                ."<td>".$row["Nombre"]." " .$row["ApellidoPaterno"]." ".$row["ApellidoMaterno"]."</td>" 
                ."<td>".$row["TipoUsuario"]."</td>" 
                ."<td>".$row["Email"]."</td>" 
                ."<td>".$row["Telefono"]."</td>" 
                ."</tr>"; 
            }

        } catch (PDOEXCEPTION $ex){
            echo 'Error en la conexion a la BD'. $ex->getMessage();
            die();
        }
    }

    public function datos()
    {
        return $this->_datos;
    }
    /**
     * Ejemplo de consulta en SQL por el usuario
     * 
     * @param string $consulta variable que contiene el nombre de usuario.
     * 
     * @return true|false
     */
    public function consultar($consulta)
    {
        try
        {
            $resultado = $this->_db->query($consulta); // Regresa un result set
            return $resultado;
        } catch(PDOEXCEPTION $ex) {
            echo 'Error al hacer la consulta con la BD'. $ex->getMessage();
            return null;
        }
    }
    /**
     * Funcion agregar usuario a la base datos.
     * Los datos llegan sin errores del FRONT.
     * 
     * @param string  $nombre_usuario Nombre del nuevo usuario.
     * @param string  $password       Contraseña del usuario nuevo.
     * @param string  $nombre         Nombre de pila del nuevo usuario.
     * @param string  $apellido       Apellido paterno del nuevo usuario.
     * @param string  $tipo           Apellido materno del nuevo usuario.
     * @param string  $email          Email del nuevo usuario.
     * @param integer $telefono       Numero de telefono del nuevo usuario.
     * 
     * @return null
     */
    public function agregar($nombre_usuario, $password, $nombre, $apellido, 
        $tipo, $email, $telefono
    ) {
        try
        {
            $sql = "INSERT INTO `usuario` 
            (`NombreUsuario`, `Passwd`, `TipoUsuario`,`Nombre`,
             `Apellido`,`Email`, `Telefono`) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
            
            $instruccion = $this->_db->prepare($sql);
            $instruccion->execute( 
                array($nombre_usuario,$password,$nombre,
                 $apellido, $tipo, $email, $telefono)
            );
            return true;
        } catch(PDOException $ex) {
            echo "Error en la inserción ".$ex->getMessage();
            return false;
        }
    }

    public function modificar($password, $nombre, $apellido, 
        $tipo, $email, $telefono, $nombre_usuario
    ) {
        try
        {
            $sql = "UPDATE `usuario` 
            SET  `Passwd` = ?, `TipoUsuario` = ?,`Nombre` = ?,
             `Apellido` = ?,`Email` = ?, `Telefono` = ? 
            WHERE `NombreUsuario` = ?";
            
            $instruccion = $this->_db->prepare($sql);
            $instruccion->execute( 
                array($password, $nombre, $apellido,
                 $tipo, $email, $telefono, $nombre_usuario)
            );
            return true;
        } catch(PDOException $ex) {
            echo "Error en la inserción ".$ex->getMessage();
            return false;
        }
    }

    public function eliminar($nombre_usuario, $password
    ) {
        try
        {
            $sql = "DELETE FROM `usuario` 
            WHERE `NombreUsuario` = ?, `Passwd` = ?";
            
            $instruccion = $this->_db->prepare($sql);
            $instruccion->execute( 
                array($nombre_usuario, $password)
            );
            return true;
        } catch(PDOException $ex) {
            echo "Error en la inserción ".$ex->getMessage();
            return false;
        }
    }

}
?>