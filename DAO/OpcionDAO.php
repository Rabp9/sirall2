<!-- File: /DAO/OpcionDAO.php -->

<?php
    require_once '/DAO/AppDAO.php';
    require_once '/models/Opcion.php';
    require_once '/Libs/BaseDatos.php';
    
    class OpcionDAO implements appDAO {
        
        public static function getAll() {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Opcion WHERE");
            $result->execute();
            while ($rs = $result->fetch()) {
                $opcion = new Opcion($rs['idOpcion'], $rs['idTipoEquipo'], $rs['descripcion']);
                $opciones[] = $opcion; 
            }
            return isset($opciones) ? $opciones : false;
        }
                
        public static function getBy($campo, $valor) {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Opcion where $campo = :$campo");
            $result->bindParam(":$campo", $valor);
            $result->execute();
            while ($rs = $result->fetch()) {
                $opcion = new Opcion($rs['idOpcion'], $rs['idTipoEquipo'], $rs['descripcion']);
                $opciones[] = $opcion; 
            }
            return isset($opciones) ? $opciones : false;
        }
        
        public static function crear($opcion) {
            $result = BaseDatos::getDbh()->prepare("INSERT INTO Opcion(idOpcion, idTipoEquipo, descripcion) values(:idOpcion, :idTipoEquipo, :descripcion)");
            $result->bindParam(':idOpcion', $opcion->getIdOpcion());
            $result->bindParam(':idTipoEquipo', $opcion->getIdTipoEquipo());
            $result->bindParam(':descripcion', $opcion->getDescripcion());
            return $result->execute();
        }

        public static function editar($opcion) {
        }

        public static function eliminar($opcion) {
        }
        
        public static function toXML($opciones) {
            $xml = '<?xml version="1.0" encoding="UTF-8"?>';
            $xml .= "\n<Opciones>\n";
            if(is_array($opciones))
                foreach($opciones as $opcion)
                    $xml .= $opcion->toXML() . "\n";
            $xml .= "</Opciones>\n";
            return $xml;
        }
        
        public static function ultimoLastId() { 
            $result = BaseDatos::getDbh()->prepare("SELECT idOpcion as lastId FROM Opcion ORDER BY idOpcion DESC LIMIT 1");
            $result->execute();
            $rs = $result->fetch();
            return $rs["lastId"];
        }
        
        public static function eliminarByTipoEquipo(TipoEquipo $tipoEquipo) { 
            $result = BaseDatos::getDbh()->prepare("DELETE FROM Opcion WHERE idTipoEquipo = :idTipoEquipo");
            $result->bindParam(':idTipoEquipo', $tipoEquipo->getIdTipoEquipo());
            return $result->execute();
        }
        
    }
?>