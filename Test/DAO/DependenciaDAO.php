<?php
    require_once '../models/Dependencia.php';
    require_once '../Libs/BaseDatos.php';
    
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
            if(isset($dependencias))
                return $dependencias;
            else
                return false;
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
            if(isset($dependencias))
                return $dependencias;
            else
                return false;
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
            if(isset($dependencias))
                return $dependencias;
            else
                return false;
        }
                
        public static function getDependenciaBySuperIdDependencia($superIdDependencia) {
            if($superIdDependencia != null){
                $result = BaseDatos::getDbh()->prepare("SELECT * FROM Dependencia where superIdDependencia = :superIdDependencia");
                $result->bindParam(':superIdDependencia', $superIdDependencia);
            }
            else {
                $result = BaseDatos::getDbh()->prepare("SELECT * FROM Dependencia where superIdDependencia is NULL");
            }
            $result->execute();
            while($rs = $result->fetch()) {
                $dependencia = new Dependencia();
                $dependencia->setIdDependencia($rs['idDependencia']);
                $dependencia->setDescripcion($rs['descripcion']);
                /*if($rs['superIdDependencia'] != NULL) {
                    $d = self::getDependenciaByIdDependencia($rs['superIdDependencia']);
                    $dependencia->setSuperDependencia($d[0]);
                }*/
                if(self::getDependenciaBySuperIdDependencia($dependencia->getIdDependencia())) {
                    $subDependencias = self::getDependenciaBySuperIdDependencia($dependencia->getIdDependencia());
                    foreach($subDependencias as $subDependencia) {
                        $dependencia->addDependencia($subDependencia);
                    }
                }
                $dependencias[] = $dependencia;
            }
            if(isset($dependencias))
                return $dependencias;
            else
                return false;
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
                if(self::getDependenciaBySuperIdDependencia($dependencia->getIdDependencia())) {
                    foreach(self::getDependenciaBySuperIdDependencia($dependencia->getIdDependencia()) as $d)
                        $dependencia->addDependencia($d);
                }
                $dependencias[] = $dependencia;
            }
            return $dependencias;
        }
        
        public static function getNextID() {
            $result = BaseDatos::getDbh()->prepare("call sp_GetNextIdDependencia");
            $result->execute();
            $rs = $result->fetch();
            return $rs['nextID'];
        }
    }
?>
