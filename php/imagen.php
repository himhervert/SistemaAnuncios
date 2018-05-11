<?php
/**
 * PHP Version 5
 * Codigo para Subir Imagenes al servidor con la clave primaria de quien la subio
 * 
 * @category Class
 * @package  UploadImagen
 * @author   Leonardo Iván Hervert Morales <leohervert@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License|
 * @link     https://github.com/himhervert/himhervert.github.io
 */

/**
 * PHP Version 5
 * Clase para Subir Imagenes al servidor con la clave primaria de quien la subio
 * 
 * @category Class
 * @package  UploadImagen
 * @author   Leonardo Iván Hervert Morales <leohervert@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License|
 * @link     https://github.com/himhervert/himhervert.github.io
 */
class Imagen
{

    /**
     * The current PHP version.
     * 
     * @var string $_sql base de datos.
     * @var string $_db;
     */
    private $_sql;
    private $_db;

    /**
     * Constructor de la clase Imagen.
     * 
     * @param string $host   nombre del host.
     * @param string $port   puerto que se utilizara.
     * @param string $dbname nombre de la base de datos.
     * @param string $dbuser nombre del usuario.
     * @param string $passwd contraseña del usuario.
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
     *  Inserta una imagen en la base de datos.
     * 
     * @param string $files   nombre del host.
     * @param string $usuario puerto que se utilizara.
     * @param string $tiempo  nombre de la base de datos.
     * 
     * @return true||false
     */
    public function agregarImagen($files, $usuario, $tiempo, $fechaini, $fechafin)
    {
        try
        {
            $nombre_Imagen = $files['imagen_anuncio']['name'];
            $tipoImagen=$files['imagen_anuncio']['type'];
            $tamanoImagen=$files['imagen_anuncio']['size'];
            $carpeta_destino=$_SERVER['DOCUMENT_ROOT'].'/sistemaanuncios/upload/';

            echo $nombre_Imagen;
            echo "<br>";
            echo $tipoImagen;
            echo "<br>";
            echo $tamanoImagen;
            echo "<br>";
            echo $carpeta_destino;
            //$this->_db->real_escape_string($nombre_Imagen);
            //$this->_db->real_escape_string($tipoImagen);
            // $res=$this->_db->query(
            //     "INSERT INTO imagen (id_usuario,nombre,tipo,size)
            // VALUES ($usuario,'$nombre_Imagen','$tipoImagen',$tamanoImagen)"
            // );
            $sql = "INSERT INTO imagen 
            (`nombre`,`tipo`,`tamimagen`, `tempo`,`FechaInicio`,`FechaFinal`,`Usuario`)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
            $consulta = $this->_db->prepare($sql);
            $consulta->execute(
                array( $nombre_Imagen, $tipoImagen, $tamanoImagen, $tiempo, $fechaini, $fechafin, $usuario)
            );
            move_uploaded_file(
                $files['imagen_anuncio']['tmp_name'], $carpeta_destino.$nombre_Imagen
            );
            return true;
        } catch(PDOexception $ex) {
            echo "Error en la inserción de la imagen: ". $ex->getMessage();
            return false;
        }
    }
    public function eliminarImagen($files, $usuario, $tiempo, $fechaini, $fechafin)
    {
        try
        {
            $nombre_Imagen = $files['imagen_anuncio']['name'];
            $tipoImagen=$files['imagen_anuncio']['type'];
            $tamanoImagen=$files['imagen_anuncio']['size'];
            $carpeta_destino=$_SERVER['DOCUMENT_ROOT'].'/sistemaanuncios/upload/';

            echo $nombre_Imagen;
            echo "<br>";
            echo $tipoImagen;
            echo "<br>";
            echo $tamanoImagen;
            echo "<br>";
            echo $carpeta_destino;
            //$this->_db->real_escape_string($nombre_Imagen);
            //$this->_db->real_escape_string($tipoImagen);
            // $res=$this->_db->query(
            //     "INSERT INTO imagen (id_usuario,nombre,tipo,size)
            // VALUES ($usuario,'$nombre_Imagen','$tipoImagen',$tamanoImagen)"
            // );
            $sql = "INSERT INTO imagen 
            (`nombre`,`tipo`,`tamimagen`, `tempo`,`FechaInicio`,`FechaFinal`,`Usuario`)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
            $consulta = $this->_db->prepare($sql);
            $consulta->execute(
                array( $nombre_Imagen, $tipoImagen, $tamanoImagen, $tiempo, $fechaini, $fechafin, $usuario)
            );
            move_uploaded_file(
                $files['imagen_anuncio']['tmp_name'], $carpeta_destino.$nombre_Imagen
            );
            return true;
        } catch(PDOexception $ex) {
            echo "Error en la inserción de la imagen: ". $ex->getMessage();
            return false;
        }
    }

    public function fetch($opt)
    {
        try
        {
            $sql = "SELECT 
                `idimagen`, `nombre`, `tipo`, `tamimagen`, `tempo`, `fechainicio`, `fechafinal`, `usuario` 
                FROM `imagen`";
            $instruccion = $this->_db->prepare($sql);
            $instruccion->execute();
            if ($opt == 0) {
                $this->divConfig($instruccion);
            } else {
                if ($opt == 1) {
                    $this->divAnunciosPar($instruccion, $opt);
                } else {
                    if ($opt == 2) {
                        $this->divAnunciosInpar($instruccion, $opt);
                    }
                }
            }
        } catch (PDOEXCEPTION $ex){
            echo 'Error en la conexion a la BD'. $ex->getMessage();
            die();
        }
    }


    public function divConfig($instruccion)
    {
        echo '<div class = "row">';
        foreach ($instruccion->fetchAll(PDO::FETCH_ASSOC) as $row) {
            $dir = 'upload/'.$row["nombre"];
            $id = 'img'.$row["idimagen"];
            $tiempo = $row["tempo"];
            echo '<div class="col-md-3" id="'."$id ".'">';
            echo '<img src="'."$dir".'" 
            class="img-config img-responsive img-thumbnail">
            <p>Tiempo de muestra: '. $tiempo. '</p>
            </div>';
        }
        echo '</div>';
    }
    

    public function divAnunciosPar($instruccion, $opt)
    {
        foreach ($instruccion->fetchAll(PDO::FETCH_ASSOC) as $row) {
            $dir = 'upload/'.$row["nombre"];
            $id = 'img'.$row["idimagen"];
            $id = intval($id);
            $valor = $row["idimagen"];
            if ($valor%2 == 0) {
                $tiempo = $row["tempo"];
                echo '<img src="'."$dir".'" id="image-two1" class="sliderItem2"
                alt= "'."$tiempo".'" >';
            }
        }
    }
    public function divAnunciosInpar($instruccion, $opt)
    {
        foreach ($instruccion->fetchAll(PDO::FETCH_ASSOC) as $row) {
            $dir = 'upload/'.$row["nombre"];
            $id = 'img'.$row["idimagen"];
            $valor = $row["idimagen"];
            if ($valor%2 == 1) {
                $tiempo = $row["tempo"];
                echo '<div class="swiper-slide"><img src="'."$dir".'
                " id="image-two1" class="sliderItem11"
                alt= "'."$tiempo".'" >
                </div>';
            }
        }
    }
}
?>