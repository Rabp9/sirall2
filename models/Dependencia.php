<?php
    require '../Libs/BaseDatos.php';
    
    class Dependencia {
        private $idDependencia;
        private $descripcion;
        private $superDependencia;
        
        /*public function __construct() {
            $this->idDependencia = 0;
            $this->descripcion = "";
        }*/

        //Sets
        public function setIdDependencia($idDependencia) {
            $this->idDependencia = $idDependencia;
        }
        
        public function setDescripcion($descripcion) {
            $this->descripcion = $descripcion;
        }
        
        public function setSuperDependencia(Dependencia $dependencia) {
            $this->superDependencia = $dependencia;
        }

        //Gets
        public function getIdDependencia() {
            return $this->idDependencia;
        }
        
        public function getDescripcion() {
            return $this->descripcion;
        }
        
        public function getSuperDependencia() {
            return $this->superDependencia;
        }
        
        public static function getDependenciaByIdDependencia($idDependencia) {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Dependencia where idDependencia = :idDependencia");
            $result->bindParam(':idDependencia', $idDependencia);
            $result->execute();
            $dependencia = new Dependencia();
            if($rs = $result->fetch()) {
                $dependencia->setIdDependencia($rs['idDependencia']);
                $dependencia->setDescripcion($rs['descripcion']);
                if($rs['superIdDependencia'] != NULL)
                    $dependencia->setSuperDependencia (self::getDependenciaByIdDependencia($rs['superIdDependencia']));
            }
            else return false;
            return $dependencia;
        }
        
        public static function getAllDependencia() {
            $result = BaseDatos::getDbh()->query("SELECT * FROM Dependencia");
            $dependencia = new Dependencia();
            while ($rs = $result->fetch()) {
                $dependencia->setIdDependencia($rs['idDependencia']);
                $dependencia->setDescripcion($rs['descripcion']);
                //$dependencia->setSuperDependencia($rs['superIdDependencia']);
                $dependencias[] = $dependencia; 
            }
            return $dependencias;
        }
    }
?>