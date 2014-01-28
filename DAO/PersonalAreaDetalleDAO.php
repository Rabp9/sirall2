<!-- File: /DAO/PersonalAreaDetalleDAO.php -->
    
<?php
    require_once './DAO/AppDAO.php';
    require_once './models/PersonalAreaDetalle.php';
    require_once './Libs/BaseDatos.php';
    
    class PersonalAreaDetalleDAO implements appDAO {
        
        public static function getAll() {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM PersonalAreaDetalle WHERE estado = 1");
            $result->execute();
            while ($rs = $result->fetch()) {
                $personalAreaDetalle = new PersonalAreaDetalle();
                $personalAreaDetalle->setIdPersonalAreaDetalle($rs['idPersonalAreaDetalle']);
                $personalAreaDetalle->setIdPersonal($rs['idPersonal']);
                $personalAreaDetalle->setIdArea($rs['idArea']);
                $personalAreaDetalle->setFechaRegistro($rs['fechaRegistro']);
                $personalAreaDetalle->setEstado($rs['estado']);
                $personalAreaDetalles[] = $personalAreaDetalle;
            }
            return isset($personalAreaDetalles) ? $personalAreaDetalles : false;
        }
               
        public static function getBy($campo, $valor) {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM PersonalAreaDetalle where $campo = :$campo");
            $result->bindParam(":$campo", $valor);
            $result->execute();
            while ($rs = $result->fetch()) {
                $personalAreaDetalle = new PersonalAreaDetalle();
                $personalAreaDetalle->setIdPersonalAreaDetalle($rs['idPersonalAreaDetalle']);
                $personalAreaDetalle->setIdPersonal($rs['idPersonal']);
                $personalAreaDetalle->setIdArea($rs['idArea']);
                $personalAreaDetalle->setFechaRegistro($rs['fechaRegistro']);
                $personalAreaDetalle->setEstado($rs['estado']);
                $personalAreaDetalles[] = $personalAreaDetalle;
            }
            return isset($personalAreaDetalles) ? $personalAreaDetalles : false;
        }
        
        public static function crear($personalAreaDetalle) {
        }
           
        public static function editar($personalAreaDetalle) {
        }
        
        public static function eliminar($personalAreaDetalle) {
        }
        
    }
?>
