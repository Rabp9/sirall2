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
                if($rs['superIdDependencia'] != NULL) {
                    $d = self::getDependenciaByIdDependencia($rs['superIdDependencia']);
                    $dependencia->setSuperDependencia($d[0]);
                }
                $dependencias[] = $dependencia; 
            }
            return $dependencias;
        }
        
        public static function getDependenciaByIdDependencia($idDependencia) {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Dependencia where idDependencia = :idDependencia");
            $result->bindParam(':idDependencia', $idDependencia);
            $result->execute();
            while($rs = $result->fetch()) {
                $dependencia = new Dependencia();
                $dependencia->setIdDependencia($rs['idDependencia']);
                $dependencia->setDescripcion($rs['descripcion']);
                if($rs['superIdDependencia'] != NULL) {
                    $d = self::getDependenciaByIdDependencia($rs['superIdDependencia']);
                    $dependencia->setSuperDependencia($d[0]);
                }
                $dependencias[] = $dependencia;
            }
            return $dependencias;
        }
        
        public static function getDependenciaByDescripcion($descripcion) {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Dependencia where descripcion = :descripcion");
            $result->bindParam(':descripcion', $descripcion);
            $result->execute();
            while($rs = $result->fetch()) {
                $dependencia = new Dependencia();
                $dependencia->setIdDependencia($rs['idDependencia']);
                $dependencia->setDescripcion($rs['descripcion']);
                if($rs['superIdDependencia'] != NULL) {
                    $d = self::getDependenciaByIdDependencia($rs['superIdDependencia']);
                    $dependencia->setSuperDependencia($d[0]);
                }
                $dependencias[] = $dependencia;
            }
            return $dependencias;
        }
                
        public static function getDependenciaBySuperIdDependencia($superIdDependencia) {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Dependencia where superIdDependencia = :superIdDependencia");
            $result->bindParam(':superIdDependencia', $superIdDependencia);
            $result->execute();
            while($rs = $result->fetch()) {
                $dependencia = new Dependencia();
                $dependencia->setIdDependencia($rs['idDependencia']);
                $dependencia->setDescripcion($rs['descripcion']);
                if($rs['superIdDependencia'] != NULL) {
                    $d = self::getDependenciaByIdDependencia($rs['superIdDependencia']);
                    $dependencia->setSuperDependencia($d[0]);
                }
                $dependencias[] = $dependencia;
            }
            return $dependencias;
        }
                
        public static function getDependenciaByRoot() {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Dependencia where superIdDependencia is NULL");
            $result->execute();
            while($rs = $result->fetch()) {
                $dependencia = new Dependencia();
                $dependencia->setIdDependencia($rs['idDependencia']);
                $dependencia->setDescripcion($rs['descripcion']);
                if($rs['superIdDependencia'] != NULL) {
                    $d = self::getDependenciaByIdDependencia($rs['superIdDependencia']);
                    $dependencia->setSuperDependencia($d[0]);
                }
                $dependencias[] = $dependencia;
            }
            return $dependencias;
        }
        
    }
?>
