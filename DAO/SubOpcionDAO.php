<!-- File: /DAO/OpcionDAO.php -->

<?php
    require_once '/DAO/AppDAO.php';
    require_once '/models/SubOpcion.php';
    require_once '/Libs/BaseDatos.php';
    
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
        
        public static function crear($opcion) {
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
        
    }
?>