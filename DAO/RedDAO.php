<!-- File: /DAO/RedDAO.php -->

<?php
    require_once '/DAO/AppDAO.php';
    require_once '/models/Red.php';
    require_once '/Libs/BaseDatos.php';
    
    class RedDAO implements appDAO {

        public static function getAll() {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Red WHERE estado = 1");
            $result->execute();
            while ($rs = $result->fetch()) {
                $red = new Red();
                $red->setIdRed($rs['idRed']);
                $red->setDescripcion($rs['descripcion']);
                $red->setDireccion($rs['direccion']);
                $red->setTelefono($rs['telefono']);
                $red->setEstado($rs['estado']);
                $redes[] = $red; 
            }
            return isset($redes) ? $redes : false;
        }
        
        public static function getBy($campo, $valor) {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Red where $campo = :$campo");
            $result->bindParam(":$campo", $valor);
            $result->execute();
            while ($rs = $result->fetch()) {
                $red = new Red();
                $red->setIdRed($rs['idRed']);
                $red->setDescripcion($rs['descripcion']);
                $red->setDireccion($rs['direccion']);
                $red->setTelefono($rs['telefono']);
                $red->setEstado($rs['estado']);
                $redes[] = $red; 
            }
            return isset($redes) ? $redes : false;
        }
               
        public static function crear($red) {
            $result = BaseDatos::getDbh()->prepare("INSERT INTO Red(idRed, descripcion, direccion, telefono, estado) values(:idRed, :descripcion, :direccion, :telefono, :estado)");
            $result->bindParam(':idRed', $red->getIdRed());
            $result->bindParam(':descripcion', $red->getDescripcion());
            $result->bindParam(':direccion', $red->getDireccion());
            $result->bindParam(':telefono', $red->getTelefono());
            $result->bindParam(':estado', $red->getEstado());
            return $result->execute();
        }
               
        public static function editar($red) {
            $result = BaseDatos::getDbh()->prepare("UPDATE Red SET descripcion = :descripcion, direccion = :direccion, telefono = :telefono, estado = :estado WHERE idRed = :idRed");
            $result->bindParam(':descripcion', $red->getDescripcion());
            $result->bindParam(':direccion', $red->getDireccion());
            $result->bindParam(':telefono', $red->getTelefono());
            $result->bindParam(':estado', $red->getEstado());
            $result->bindParam(':idRed', $red->getIdRed());
            return $result->execute();
        }
        
        public static function eliminar($red) {
            $result = BaseDatos::getDbh()->prepare("UPDATE Red SET estado = 2 WHERE idRed = :idRed");
            $result->bindParam(':idRed', $red->getIdRed());
            return $result->execute();
        }
        
        public static function getNextID() {
            $result = BaseDatos::getDbh()->prepare("call usp_GetNextIdRed");
            $result->execute();
            $rs = $result->fetch();
            return $rs['nextID'];
        }
        
    }
?>
