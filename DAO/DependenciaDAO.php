<!-- File: /DAO/DependenciaDAO.php -->
    
<?php
    require_once '/DAO/AppDAO.php';
    require_once '/models/Dependencia.php';
    require_once '/models/VwDependencia.php';
    require_once '/Libs/BaseDatos.php';
    
    class DependenciaDAO implements appDAO {

        public static function getAll() {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Dependencia WHERE estado = 1");
            $result->execute();
            while ($rs = $result->fetch()) {
                $dependencia = new Dependencia();
                $dependencia->setIdDependencia($rs['idDependencia']);
                $dependencia->setDescripcion($rs['descripcion']);
                $dependencia->setIdRed($rs['idRed']);
                $dependencia->setSuperIdDependencia($rs['superIdDependencia']);
                $dependencia->setIdUsuarioJefe($rs['idUsuarioJefe']);
                $dependencia->setEstado($rs['estado']);
                $dependencias[] = $dependencia; 
            }
            return isset($dependencias) ? $dependencias : false;
        }
        
        public static function getBy($campo, $valor) {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Dependencia where $campo = :$campo");
            $result->bindParam(":$campo", $valor);
            $result->execute();
            while ($rs = $result->fetch()) {
                $dependencia = new Dependencia();
                $dependencia->setIdDependencia($rs['idDependencia']);
                $dependencia->setDescripcion($rs['descripcion']);
                $dependencia->setIdRed($rs['idRed']);
                $dependencia->setSuperIdDependencia($rs['superIdDependencia']);
                $dependencia->setIdUsuarioJefe($rs['idUsuarioJefe']);
                $dependencia->setEstado($rs['estado']);
                $dependencias[] = $dependencia;
            }
            return isset($dependencias) ? $dependencias : false;
        }
        
        public static function crear($dependencia) {
            if($dependencia->getSuperIdDependencia() != null) {
                $result = BaseDatos::getDbh()->prepare("INSERT INTO Dependencia(idDependencia, idRed, descripcion, superIdDependencia, estado) values(:idDependencia, :idRed, :descripcion, :superIdDependencia, :estado)");
                $result->bindParam(':superIdDependencia', $dependencia->getSuperIdDependencia());
            }
            else
                $result = BaseDatos::getDbh()->prepare("INSERT INTO Dependencia(idDependencia, idRed, descripcion, estado) values(:idDependencia, :idRed, :descripcion, :estado)");
            $result->bindParam(':idDependencia', $dependencia->getIdDependencia());
            $result->bindParam(':idRed', $dependencia->getIdRed());
            $result->bindParam(':descripcion', $dependencia->getDescripcion());
            $result->bindParam(':estado', $dependencia->getEstado());
            return $result->execute();
        }
        
        public static function editar($dependencia) {
            if($dependencia->getSuperIdDependencia() != null) {
                $result = BaseDatos::getDbh()->prepare("UPDATE Dependencia SET idRed = :idRed, descripcion = :descripcion, superIdDependencia = :superIdDependencia, estado = :estado WHERE idDependencia = :idDependencia");
                $result->bindParam(':superIdDependencia', $dependencia->getSuperIdDependencia());
            }
            else
                $result = BaseDatos::getDbh()->prepare("UPDATE Dependencia SET idRed = :idRed, descripcion = :descripcion, superIdDependencia = null, estado = :estado  WHERE idDependencia = :idDependencia");
            $result->bindParam(':idRed', $dependencia->getIdRed());
            $result->bindParam(':descripcion', $dependencia->getDescripcion());
            $result->bindParam(':idDependencia', $dependencia->getIdDependencia());
            $result->bindParam(':estado', $dependencia->getEstado());
            return $result->execute();
        }
         
        public static function eliminar($dependencia) {
            $result = BaseDatos::getDbh()->prepare("UPDATE Dependencia SET estado = 2 WHERE idDependencia = :idDependencia");
            $result->bindParam(':idDependencia', $dependencia->getIdDependencia());
            return $result->execute();
        }
           
        public static function getNextID() {
            $result = BaseDatos::getDbh()->prepare("call usp_GetNextIdDependencia");
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
                $dependencia->setIdRed($rs['idRed']);
                $dependencia->setSuperIdDependencia($superIdDependencia);
                $dependencia->setIdUsuarioJefe($rs['idUsuarioJefe']);
                $dependencia->setEstado($rs['estado']);
                $dependencias[] = $dependencia;
            }
            return isset($dependencias) ? $dependencias : false;
        }
  
        public static function getVwDependencia() {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM vw_Dependencia");
            $result->execute();
            while ($rs = $result->fetch()) {
                $vwDependencia = new VwDependencia();
                $vwDependencia->setIdDependencia($rs['idDependencia']);
                $vwDependencia->setDescripcion($rs['descripcion']);
                $vwDependencia->setRed($rs['red']);
                $vwDependencia->setSuperDependencia($rs['superDependencia']);
                $vwDependencias[] = $vwDependencia; 
            }
            return isset($vwDependencias) ? $vwDependencias : false;
        }
        
        public static function asignarJefe(Dependencia $dependencia) {
            if($dependencia->getSuperIdDependencia() != null) {
                $result = BaseDatos::getDbh()->prepare("UPDATE Dependencia SET idRed = :idRed, descripcion = :descripcion, superIdDependencia = :superIdDependencia, idUsuarioJefe = :idUsuarioJefe, estado = :estado WHERE idDependencia = :idDependencia");
                $result->bindParam(':superIdDependencia', $dependencia->getSuperIdDependencia());
            }
            else
                $result = BaseDatos::getDbh()->prepare("UPDATE Dependencia SET idRed = :idRed, descripcion = :descripcion, superIdDependencia = null, idUsuarioJefe = :idUsuarioJefe, estado = :estado  WHERE idDependencia = :idDependencia");
            $result->bindParam(':idRed', $dependencia->getIdRed());
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
