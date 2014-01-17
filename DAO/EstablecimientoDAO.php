<!-- File: /DAO/EstablecimientoDAO.php -->

<?php
    require_once './DAO/AppDAO.php';
    require_once './models/Establecimiento.php';
    require_once './models/VwEstablecimiento.php';
    require_once './Libs/BaseDatos.php';
    
    class EstablecimientoDAO implements appDAO {

        public static function getAll() {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Establecimiento WHERE estado = 1");
            $result->execute();
            while ($rs = $result->fetch()) {
                $establecimiento = new Establecimiento();
                $establecimiento->setIdEstablecimiento($rs['idEstablecimiento']);
                $establecimiento->setDescripcion($rs['descripcion']);
                $establecimiento->setDireccion($rs['direccion']);
                $establecimiento->setNivel($rs['nivel']);
                $establecimiento->setTipoCAS($rs['tipoCAS']);
                $establecimiento->setSituacion($rs['situacion']);
                $establecimiento->setProvincia($rs['provincia']);
                $establecimiento->setDistrito($rs['distrito']);
                $establecimiento->setTelefono($rs['telefono']);
                $establecimiento->setRpm($rs['rpm']);
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
                $establecimiento->setNivel($rs['nivel']);
                $establecimiento->setTipoCAS($rs['tipoCAS']);
                $establecimiento->setSituacion($rs['situacion']);
                $establecimiento->setProvincia($rs['provincia']);
                $establecimiento->setDistrito($rs['distrito']);
                $establecimiento->setTelefono($rs['telefono']);
                $establecimiento->setRpm($rs['rpm']);
                $establecimiento->setEstado($rs['estado']);
                $establecimientos[] = $establecimiento; 
            }
            return isset($establecimientos) ? $establecimientos : false;
        }
               
        public static function crear($establecimiento) {
            $result = BaseDatos::getDbh()->prepare("INSERT INTO Establecimiento(idEstablecimiento, descripcion, direccion, nivel, tipoCAS, situacion, provincia, distrito, telefono, rpm, estado) values(:idEstablecimiento, :descripcion, :direccion, :nivel, :tipoCAS, :situacion, :provincia, :distrito, :telefono, :rpm, :estado)");
            $result->bindParam(':idEstablecimiento', $establecimiento->getIdEstablecimiento());
            $result->bindParam(':descripcion', $establecimiento->getDescripcion());
            $result->bindParam(':direccion', $establecimiento->getDireccion());
            $result->bindParam(':nivel', $establecimiento->getNivel());
            $result->bindParam(':tipoCAS', $establecimiento->getTipoCAS());
            $result->bindParam(':situacion', $establecimiento->getSituacion());
            $result->bindParam(':provincia', $establecimiento->getProvincia());
            $result->bindParam(':distrito', $establecimiento->getDistrito());
            $result->bindParam(':telefono', $establecimiento->getTelefono());
            $result->bindParam(':rpm', $establecimiento->getRpm());
            $result->bindParam(':estado', $establecimiento->getEstado());
            return $result->execute();
        }

        public static function editar($establecimiento) {
            $result = BaseDatos::getDbh()->prepare("UPDATE Establecimiento SET descripcion = :descripcion, direccion = :direccion, nivel = :nivel, tipoCAS = :tipoCAS, situacion = :situacion, provincia = :provincia, distrito = :distrito, telefono = :telefono, rpm = :rpm, estado = :estado WHERE idEstablecimiento = :idEstablecimiento");
            $result->bindParam(':descripcion', $establecimiento->getDescripcion());
            $result->bindParam(':direccion', $establecimiento->getDireccion());
            $result->bindParam(':nivel', $establecimiento->getNivel());
            $result->bindParam(':tipoCAS', $establecimiento->getTipoCAS());
            $result->bindParam(':situacion', $establecimiento->getSituacion());
            $result->bindParam(':provincia', $establecimiento->getProvincia());
            $result->bindParam(':distrito', $establecimiento->getDistrito());
            $result->bindParam(':telefono', $establecimiento->getTelefono());
            $result->bindParam(':rpm', $establecimiento->getRpm());
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
            $xml .= "\n<Establecimientos>\n";
            if(is_array($establecimientos))
                foreach($establecimientos as $establecimiento)
                    $xml .= $establecimiento->toXML() . "\n";
            $xml .= "</Establecimientos>\n";
            return $xml;
        }
             
        public static function getVwBy($campo, $valor) {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM vw_Establecimiento where $campo = :$campo");
            $result->bindParam(":$campo", $valor);
            $result->execute();
            while ($rs = $result->fetch()) {
                $vwEstablecimiento = new VwEstablecimiento();
                $vwEstablecimiento->setIdEstablecimiento($rs['idEstablecimiento']);
                $vwEstablecimiento->setDescripcion($rs['descripcion']);
                $vwEstablecimiento->setDireccion($rs['direccion']);
                $vwEstablecimiento->setNivel($rs['nivel']);
                $vwEstablecimiento->setTipoCAS($rs['tipoCAS']);
                $vwEstablecimiento->setSituacion($rs['situacion']);
                $vwEstablecimiento->setProvincia($rs['provincia']);
                $vwEstablecimiento->setDistrito($rs['distrito']);
                $vwEstablecimiento->setTelefono($rs['telefono']);
                $vwEstablecimiento->setRpm($rs['rpm']);
                $vwEstablecimiento->setNumArea($rs['numArea']);
                $vwEstablecimientos[] = $vwEstablecimiento; 
            }
            return isset($vwEstablecimientos) ? $vwEstablecimientos : false;
        }
    }
?>
