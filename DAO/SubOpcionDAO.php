<!-- File: /DAO/SubOpcionDAO.php -->

<?php
    require_once './DAO/AppDAO.php';
    require_once './models/SubOpcion.php';
    require_once './models/Opcion.php';
    require_once './Libs/BaseDatos.php';
    
    class SubOpcionDAO implements appDAO {
        
        public static function getAll() {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM SubOpcion WHERE");
            $result->execute();
            while ($rs = $result->fetch()) {
                $subOpcion = new SubOpcion($rs['idSubOpcion'], $rs['idOpcion'], $rs['descripcion']);
                $subOpciones[] = $subOpcion; 
            }
            return isset($subOpciones) ? $subOpciones : false;
        }
        
        public static function getBy($campo, $valor) {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM SubOpcion where $campo = :$campo");
            $result->bindParam(":$campo", $valor);
            $result->execute();
            while ($rs = $result->fetch()) {
                $subOpcion = new SubOpcion($rs['idSubOpcion'], $rs['idOpcion'], $rs['descripcion']);
                $subOpciones[] = $subOpcion; 
            }
            return isset($subOpciones) ? $subOpciones : false;
        }
        
        public static function crear($subOpcion) {
            $result = BaseDatos::getDbh()->prepare("INSERT INTO SubOpcion(idSubOpcion, idOpcion, descripcion) values(:idSubOpcion, :idOpcion, :descripcion)");
            $result->bindParam(':idSubOpcion', $subOpcion->getIdSubOpcion());
            $result->bindParam(':idOpcion', $subOpcion->getIdOpcion());
            $result->bindParam(':descripcion', $subOpcion->getDescripcion());
            return $result->execute();
        }
        
        public static function editar($opcion) {
        }
        
        public static function eliminar($opcion) {
        }
        
        public static function toXML($subOpciones) {
            $xml = '<?xml version="1.0" encoding="UTF-8"?>';
            $xml .= "\n<SubOpciones>\n";
            if(is_array($subOpciones))
                foreach($subOpciones as $subOpcion)
                    $xml .= $subOpcion->toXML() . "\n";
            $xml .= "</SubOpciones>\n";
            return $xml;
        }
        
        public static function eliminarByOpcion(Opcion $opcion) {
            $result = BaseDatos::getDbh()->prepare("DELETE FROM SubOpcion WHERE idOpcion = :idOpcion");
            $result->bindParam(':idOpcion', $opcion->getIdOpcion());
            return $result->execute();
        }
        
    }
?>