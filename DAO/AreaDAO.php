<!-- File: /DAO/AreaDAO.php -->
    
<?php
    require_once './DAO/AppDAO.php';
    require_once './models/Area.php';
    require_once './models/VwArea.php';
    require_once './Libs/BaseDatos.php';
    
    class AreaDAO implements appDAO {

        public static function getAll() {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Area WHERE estado = 1");
            $result->execute();
            while ($rs = $result->fetch()) {
                $area = new Area();
                $area->setIdArea($rs['idArea']);
                $area->setIdEstablecimiento($rs['idEstablecimiento']);
                $area->setDescripcion($rs['descripcion']);
                $area->setDireccion($rs["direccion"]);
                $area->setSuperIdArea($rs['superIdArea']);
                $area->setOrden($rs['orden']);
                $area->setEstado($rs['estado']);
                $areas[] = $area; 
            }
            return isset($areas) ? $areas : false;
        }
        
        public static function getBy($campo, $valor) {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Area WHERE $campo = :$campo");
            $result->bindParam(":$campo", $valor);
            $result->execute();
            while ($rs = $result->fetch()) {
                $area = new Area();
                $area->setIdArea($rs['idArea']);
                $area->setIdEstablecimiento($rs['idEstablecimiento']);
                $area->setDescripcion($rs['descripcion']);
                $area->setDireccion($rs["direccion"]);
                $area->setSuperIdArea($rs['superIdArea']);
                $area->setOrden($rs['orden']);
                $area->setEstado($rs['estado']);
                $areas[] = $area;
            }
            return isset($areas) ? $areas : false;
        }
        
        public static function crear($area) {
            if($area->getSuperIdArea() != null) {
                $result = BaseDatos::getDbh()->prepare("INSERT INTO Area(idArea, idEstablecimiento, descripcion, direccion, superIdArea, orden, estado) values(:idArea, :idEstablecimiento, :descripcion, :direccion, :superIdArea, :estado)");
                $result->bindParam(':superIdArea', $area->getSuperIdArea());
            }
            else
                $result = BaseDatos::getDbh()->prepare("INSERT INTO Area(idArea, idEstablecimiento, descripcion, direccion, orden, estado) values(:idArea, :idEstablecimiento, :descripcion, :direccion, :estado)");
            $result->bindParam(':idArea', $area->getIdArea());
            $result->bindParam(':idEstablecimiento', $area->getIdEstablecimiento());
            $result->bindParam(':descripcion', $area->getDescripcion());
            $result->bindParam(':direccion', $area->getDireccion());
            $result->bindParam(':orden', $area->getOrden());
            $result->bindParam(':estado', $area->getEstado());
            return $result->execute();
        }
        
        public static function editar($area) {
            if($area->getSuperIdArea() != null) {
                $result = BaseDatos::getDbh()->prepare("UPDATE Area SET idEstablecimiento = :idEstablecimiento, descripcion = :descripcion, direccion = :direccion, superIdArea = :superIdArea, orden = :orden, estado = :estado WHERE idArea = :idArea");
                $result->bindParam(':superIdArea', $area->getSuperIdArea());
            }
            else
                $result = BaseDatos::getDbh()->prepare("UPDATE Area SET idEstablecimiento = :idEstablecimiento, descripcion = :descripcion, direccion = :direccion, superIdArea = null, orden = :orden, estado = :estado WHERE idArea = :idArea");
            $result->bindParam(':idEstablecimiento', $area->getIdEstablecimiento());
            $result->bindParam(':descripcion', $area->getDescripcion());
            $result->bindParam(':direccion', $area->getDireccion());
            $result->bindParam(':idArea', $area->getIdArea());
            $result->bindParam(':orden', $area->getOrden());
            $result->bindParam(':estado', $area->getEstado());
            $result->execute();
            return true;
        }
         
        public static function eliminar($area) {
            $result = BaseDatos::getDbh()->prepare("UPDATE Area SET estado = 2 WHERE idArea = :idArea");
            $result->bindParam(':idArea', $area->getIdArea());
            return $result->execute();
        }
           
        public static function getNextID() {
            $result = BaseDatos::getDbh()->prepare("call usp_GetNextIdArea");
            $result->execute();
            $rs = $result->fetch();
            return $rs['nextID'];
        }
        
        public static function getDependenciaBySuperIdDependencia($superIdDependencia) {
            if($superIdDependencia != null){
                $result = BaseDatos::getDbh()->prepare("SELECT * FROM Dependencia where superIdDependencia = :superIdDependencia");
                $result->bindParam(':superIdDependencia', $superIdDependencia);
            }
            else
                $result = BaseDatos::getDbh()->prepare("SELECT * FROM Dependencia where superIdDependencia is NULL");
            $result->execute();
            while($rs = $result->fetch()) {
                $dependencia = new Dependencia();
                $dependencia->setIdDependencia($rs['idDependencia']);
                $dependencia->setDescripcion($rs['descripcion']);
                $dependencia->setIdEstablecimiento($rs['idEstablecimiento']);
                $dependencia->setSuperIdDependencia($superIdDependencia);
                $dependencia->setIdUsuarioJefe($rs['idUsuarioJefe']);
                $dependencia->setEstado($rs['estado']);
                $dependencias[] = $dependencia;
            }
            return isset($dependencias) ? $dependencias : false;
        }
  
        public static function getVwArea() {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM vw_Area");
            $result->execute();
            while ($rs = $result->fetch()) {
                $vwArea = new VwArea();
                $vwArea->setIdArea($rs['idArea']);
                $vwArea->setDescripcion($rs['descripcion']);
                $vwArea->setEstablecimiento($rs['establecimiento']);
                $vwArea->setJefaturaInmediata($rs['jefaturaInmediata']);
                $vwArea->setAreaGeneral($rs['areaGeneral']);
                $vwAreas[] = $vwArea; 
            }
            return isset($vwAreas) ? $vwAreas : false;
        }
             
        public static function getVwBy($campo, $valor) {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM vw_Area WHERE $campo = :$campo");
            $result->bindParam(":$campo", $valor);
            $result->execute();
            while ($rs = $result->fetch()) {
                $vwArea = new VwArea();
                $vwArea->setIdArea($rs['idArea']);
                $vwArea->setDescripcion($rs['descripcion']);
                $vwArea->setEstablecimiento($rs['establecimiento']);
                $vwArea->setJefaturaInmediata($rs['jefaturaInmediata']);
                $vwArea->setAreaGeneral($rs['areaGeneral']);
                $vwAreas[] = $vwArea; 
            }
            return isset($vwAreas) ? $vwAreas : false;
        }
        
        public static function asignarJefe(Dependencia $dependencia) {
            if($dependencia->getSuperIdDependencia() != null) {
                $result = BaseDatos::getDbh()->prepare("UPDATE Dependencia SET idEstablecimiento = :idEstablecimiento, descripcion = :descripcion, superIdDependencia = :superIdDependencia, idUsuarioJefe = :idUsuarioJefe, estado = :estado WHERE idDependencia = :idDependencia");
                $result->bindParam(':superIdDependencia', $dependencia->getSuperIdDependencia());
            }
            else
                $result = BaseDatos::getDbh()->prepare("UPDATE Dependencia SET idEstablecimiento = :idEstablecimiento, descripcion = :descripcion, superIdDependencia = null, idUsuarioJefe = :idUsuarioJefe, estado = :estado  WHERE idDependencia = :idDependencia");
            $result->bindParam(':idEstablecimiento', $dependencia->getIdEstablecimiento());
            $result->bindParam(':descripcion', $dependencia->getDescripcion());
            $result->bindParam(':idUsuarioJefe', $dependencia->getIdUsuariojefe());
            $result->bindParam(':estado', $dependencia->getEstado());
            $result->bindParam(':idDependencia', $dependencia->getIdDependencia());
            return $result->execute();
        }
        
        public static function toXML($dependencias) {
            $xml = '<?xml version="1.0" encoding="UTF-8"?>';
            $xml .= "\n<Dependencias>\n";
            if(is_array($dependencias))
                foreach($dependencias as $dependencia)
                    $xml .= $dependencia->toXML() . "\n";
            $xml .= "</Dependencias>\n";
            return $xml;
        }
    }
?>
