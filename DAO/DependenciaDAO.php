<?php
    require_once '/models/Dependencia.php';
    require_once '/Libs/BaseDatos.php';
    
    class DependenciaDAO {

        public static function getAllDependencia() {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Dependencia");
            $result->execute();
            while ($rs = $result->fetch()) {
                $dependencia = new Dependencia();
                $dependencia->setIdDependencia($rs['idDependencia']);
                $dependencia->setDescripcion($rs['descripcion']);
                $dependencia->setIdRed($rs['idRed']);
                $dependencia->setSuperIdDependencia($rs['superIdDependencia']);
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
            return $rs['nextID'];
        }
        
        public static function crear(Dependencia $dependencia) {
            if($dependencia->getSuperIdDependencia() != 0) {
                $result = BaseDatos::getDbh()->prepare("INSERT INTO Dependencia(idRed, descripcion, superIdDependencia) values(:idRed, :descripcion, :superIdDependencia)");
                $result->bindParam(':superIdDependencia', $dependencia->getSuperIdDependencia());
            }
            else
                $result = BaseDatos::getDbh()->prepare("INSERT INTO Dependencia(idRed, descripcion) values(:idRed, :descripcion)");
            $result->bindParam(':idRed', $dependencia->getIdRed());
            $result->bindParam(':descripcion', $dependencia->getDescripcion());
            return $result->execute();
        }
        
        public static function getVwDependencia() {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM vw_Dependencia");
            $result->execute();
            return $result;
        }
    }
?>
