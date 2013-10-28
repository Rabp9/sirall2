<?php
    require_once '/models/Dependencia.php';
    require_once '/Libs/BaseDatos.php';
    
    class DependenciaDAO {

        public static function getAllDependencia() {
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
            if(isset($dependencias))
                return $dependencias;
            else
                return false;
        }
        
        public static function getDependenciaByIdDependencia($idDependencia) {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Dependencia where idDependencia = :idDependencia");
            $result->bindParam(':idDependencia', $idDependencia);
            $result->execute();
            $rs = $result->fetch();
            $dependencia = new Dependencia();
            $dependencia->setIdDependencia($rs['idDependencia']);
            $dependencia->setDescripcion($rs['descripcion']);
            $dependencia->setIdRed($rs['idRed']);
            $dependencia->setSuperIdDependencia($rs['superIdDependencia']);
            $dependencia->setIdUsuarioJefe($rs['idUsuarioJefe']);
            $dependencia->setEstado($rs['estado']);
            return $dependencia;
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
            if(isset($dependencias))
                return $dependencias;
            else
                return false;
        }
        
        public static function getDependenciaByIdRed($idRed) {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Dependencia where idRed = :idRed");
            $result->bindParam(':idRed', $idRed);
            $result->execute();
            while($rs = $result->fetch()) {
                $dependencia = new Dependencia();
                $dependencia->setIdDependencia($rs['idDependencia']);
                $dependencia->setDescripcion($rs['descripcion']);
                $dependencia->setIdRed($rs['idRed']);
                $dependencia->setSuperIdDependencia($rs['superIdDependencia']);
                $dependencia->setIdUsuarioJefe($rs['idUsuarioJefe']);
                $dependencia->setEstado($rs['estado']);
                $dependencias[] = $dependencia;
            }
            if(isset($dependencias))
                return $dependencias;
            else
                return false;
        }
        
        public static function getNextID() {
            $result = BaseDatos::getDbh()->prepare("call usp_GetNextIdDependencia");
            $result->execute();
            $rs = $result->fetch();
            $n = $rs['nextID'] + 1;
            if($n < 10) 
                return 'D000' . $n;
            elseif ($n < 100)
                return 'D00' . $n;
            elseif ($n < 1000)
                return 'D0' . $n;
            else
                return 'D' . $n;
        }
        
        public static function crear(Dependencia $dependencia) {
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
        
        public static function editar(Dependencia $dependencia) {
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
         
        public static function eliminar(Dependencia $dependencia) {
            $result = BaseDatos::getDbh()->prepare("UPDATE Dependencia SET estado = 2 WHERE idDependencia = :idDependencia");
            $result->bindParam(':idDependencia', $dependencia->getIdDependencia());
            return $result->execute();
        }
        
        public static function getVwDependencia() {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM vw_Dependencia");
            $result->execute();
            return $result;
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
    }
?>
