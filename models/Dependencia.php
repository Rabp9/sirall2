<?php
    class Dependencia {
        private $idDependencia;
        private $descripcion;
        private $superDependencia;
        
        public function __construct() {
            $this->idDependencia = 0;
            $this->descripcion = "";
        }

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
    }
?>