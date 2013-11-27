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
        }

        public static function editar($opcion) {
        }

        public static function eliminar($opcion) {
        }
    }
?>