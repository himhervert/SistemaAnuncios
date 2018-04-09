<?php

class Anuncio
{
    private $_sql;
    private $_db;

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

    public function agregarAnuncio($titulo, $descripcion, $iduser)
    {
        try
        {
            $titulo_anuncio = $titulo;
            $descripcion_anuncio=$descripcion;
            $sql = "INSERT INTO anuncio 
            (`titulo`,`descripcion`,`id_usuario`)
            VALUES (?, ?, ?)";
            $consulta = $this->_db->prepare($sql);
            $consulta->execute(
                array($titulo, $descripcion, $iduser)
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
            $sql = "SELECT * FROM `anuncio`";
            $instruccion = $this->_db->prepare($sql);
            $instruccion->execute();
            if ($opt == 0) {
                $this->divConfig($instruccion);
            } else {
                if ($opt == 1) {
                    $this->divAnuncios($instruccion, $opt);
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
            echo "<tr>" 
            ."<td>".$row["titulo"]."</td>" 
            ."<td>".$row["descripcion"]."</td>" 
            ."<td>".$row["id_usuario"]."</td>" 
            ."</tr>"; 
        }
    }

    public function divAnuncios($instruccion, $opt)
    {
        foreach ($instruccion->fetchAll(PDO::FETCH_ASSOC) as $row) {
            $titulo = $row["titulo"];
            $descripcion = $row["descripcion"];
            echo '<div class="anuncio-item text-content row" id="anuncios-div">';            
            echo '<div class="text-title col-md-12 col-lg-12">
            <h1 id="announcement-title">'.$titulo.'</h1></div>
            <div class="text-body col-md-12 col-lg-12">
            <p id="announcement-body">'.$descripcion.'</p></div>';
            echo '</div>';            
        }
    }
}
?>