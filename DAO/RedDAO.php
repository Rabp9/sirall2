<?php
    require_once '/models/Red.php';
    require_once '/Libs/BaseDatos.php';
    
    class RedDAO {

        public static function getAllRed() {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Red WHERE estado = 1");
            $result->execute();
            while ($rs = $result->fetch()) {
                $red = new Red();
                $red->setIdRed($rs['idRed']);
                $red->setDescripcion($rs['descripcion']);
                $red->setDireccion($rs['direccion']);
                $red->setEstado($rs['estado']);
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
            $n = $rs['nextID'] + 1;
            if($n < 10) 
                return 'R00' . $n;
            elseif ($n < 100)
                return 'R0' . $n;
            else
                return 'R' . $n;
        }
        
        public static function crear(Red $red) {
            $result = BaseDatos::getDbh()->prepare("INSERT INTO Red(idRed, descripcion, direccion, estado) values(:idRed, :descripcion, :direccion, :estado)");
            $result->bindParam(':idRed', $red->getIdRed());
            $result->bindParam(':descripcion', $red->getDescripcion());
            $result->bindParam(':direccion', $red->getDireccion());
            $result->bindParam(':estado', $red->getEstado());
            return $result->execute();
        }
        
        public static function editar(Red $red) {
            $result = BaseDatos::getDbh()->prepare("UPDATE Red SET descripcion = :descripcion, direccion = :direccion, estado = :estado WHERE idRed = :idRed");
            $result->bindParam(':descripcion', $red->getDescripcion());
            $result->bindParam(':direccion', $red->getDireccion());
            $result->bindParam(':idRed', $red->getIdRed());
            $result->bindParam(':estado', $red->getEstado());
            return $result->execute();
        }
        
        public static function eliminar(Red $red) {
            $result = BaseDatos::getDbh()->prepare("UPDATE Red SET estado = 2 WHERE idRed = :idRed");
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
            $red->setEstado($rs['estado']);
            return $red;
        }
    }
?>
