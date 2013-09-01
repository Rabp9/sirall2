<?php
    require_once '/models/Red.php';
    require_once '/Libs/BaseDatos.php';
    
    class RedDAO {

        public static function getAllRed() {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Red");
            $result->execute();
            while ($rs = $result->fetch()) {
                $red = new Red();
                $red->setIdRed($rs['idRed']);
                $red->setDescripcion($rs['descripcion']);
                $red->setDireccion($rs['direccion']);
                $redes[] = $red; 
            }
            if(isset($redes))
                return $redes;
            else
                return false;
        }
        
        public static function getNextID() {
            $result = BaseDatos::getDbh()->prepare("call usp_GetNextIdRed");
            $result->execute();
            $rs = $result->fetch();
            return $rs['nextID'];
        }
        
        
        public static function crear(Red $red) {
            $result = BaseDatos::getDbh()->prepare("INSERT INTO Red(descripcion, direccion) values(:descripcion, :direccion)");
            $result->bindParam(':descripcion', $red->getDescripcion());
            $result->bindParam(':direccion', $red->getDireccion());
            return $result->execute();
        }
        
        public static function editar(Red $red) {
            $result = BaseDatos::getDbh()->prepare("UPDATE Red SET descripcion = :descripcion, direccion = :direccion WHERE idRed = :idRed");
            $result->bindParam(':descripcion', $red->getDescripcion());
            $result->bindParam(':direccion', $red->getDireccion());
            $result->bindParam(':idRed', $red->getIdRed());
            return $result->execute();
        }
        
        public static function eliminar(Red $red) {
            $result = BaseDatos::getDbh()->prepare("DELETE FROM Red WHERE idRed = :idRed");
            $result->bindParam(':idRed', $red->getIdRed());
            return $result->execute();
        }
        
        public static function getRedByIdRed($idRed) {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Red where idRed = :idRed");
            $result->bindParam(':idRed', $idRed);
            $result->execute();
            $rs = $result->fetch();
            $red = new Red();
            $red->setIdRed($rs['idRed']);
            $red->setDescripcion($rs['descripcion']);
            $red->setDireccion($rs['direccion']);
            return $red;
        }
    }
?>
