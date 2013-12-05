<!-- File: /DAO/EstablecimientoDAO.php -->

<?php
    require_once '/DAO/AppDAO.php';
    require_once '/models/Establecimiento.php';
    require_once '/Libs/BaseDatos.php';
    
    class EstablecimientoDAO implements appDAO {

        public static function getAll() {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Establecimiento WHERE estado = 1");
            $result->execute();
            while ($rs = $result->fetch()) {
                $establecimiento = new Establecimiento();
                $establecimiento->setIdEstablecimiento($rs['idEstablecimiento']);
                $establecimiento->setDescripcion($rs['descripcion']);
                $establecimiento->setDireccion($rs['direccion']);
                $establecimiento->setTelefono($rs['telefono']);
                $establecimiento->setEstado($rs['estado']);
                $establecimientos[] = $establecimiento; 
            }
            return isset($establecimientos) ? $establecimientos : false;
        }
        
        public static function getBy($campo, $valor) {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Establecimiento where $campo = :$campo");
            $result->bindParam(":$campo", $valor);
            $result->execute();
            while ($rs = $result->fetch()) {
                $establecimiento = new Establecimiento();
                $establecimiento->setIdEstablecimiento($rs['idEstablecimiento']);
                $establecimiento->setDescripcion($rs['descripcion']);
                $establecimiento->setDireccion($rs['direccion']);
                $establecimiento->setTelefono($rs['telefono']);
                $establecimiento->setEstado($rs['estado']);
                $establecimientos[] = $establecimiento; 
            }
            return isset($establecimientos) ? $establecimientos : false;
        }
               
        public static function crear($establecimiento) {
            $result = BaseDatos::getDbh()->prepare("INSERT INTO Establecimiento(idEstablecimiento, descripcion, direccion, telefono, estado) values(:idEstablecimiento, :descripcion, :direccion, :telefono, :estado)");
            $result->bindParam(':idEstablecimiento', $establecimiento->getIdEstablecimiento());
            $result->bindParam(':descripcion', $establecimiento->getDescripcion());
            $result->bindParam(':direccion', $establecimiento->getDireccion());
            $result->bindParam(':telefono', $establecimiento->getTelefono());
            $result->bindParam(':estado', $establecimiento->getEstado());
            return $result->execute();
        }
               
        public static function editar($establecimiento) {
            $result = BaseDatos::getDbh()->prepare("UPDATE Establecimiento SET descripcion = :descripcion, direccion = :direccion, telefono = :telefono, estado = :estado WHERE idEstablecimiento = :idEstablecimiento");
            $result->bindParam(':descripcion', $establecimiento->getDescripcion());
            $result->bindParam(':direccion', $establecimiento->getDireccion());
            $result->bindParam(':telefono', $establecimiento->getTelefono());
            $result->bindParam(':estado', $establecimiento->getEstado());
            $result->bindParam(':idEstablecimiento', $establecimiento->getIdEstablecimiento());
            return $result->execute();
        }
        
        public static function eliminar($establecimiento) {
            $result = BaseDatos::getDbh()->prepare("UPDATE Establecimiento SET estado = 2 WHERE idEstablecimiento = :idEstablecimiento");
            $result->bindParam(':idEstablecimiento', $establecimiento->getIdEstablecimiento());
            return $result->execute();
        }
        
        public static function getNextID() {
            $result = BaseDatos::getDbh()->prepare("call usp_GetNextIdEstablecimiento");
            $result->execute();
            $rs = $result->fetch();
            return $rs['nextID'];
        }
            
        public static function toXML($establecimientos) {
            $xml = '<?xml version="1.0" encoding="UTF-8"?>';
            $xml .= "\n<Establecimientoes>\n";
            if(is_array($establecimientos))
                foreach($establecimientos as $establecimiento)
                    $xml .= $establecimiento->toXML() . "\n";
            $xml .= "</Establecimientoes>\n";
            return $xml;
        }
        
    }
?>
