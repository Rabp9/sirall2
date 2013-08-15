<?php
    class Dependencia {
        private $idDependencia;
        private $descripcion;
        private $superDependencia;
        private $dependencias;
        
        public function __construct() {
            $this->idDependencia = 0;
            $this->descripcion = "";
            $this->dependencias = array();
        }
        
        // <editor-fold defaultstate="collapsed" desc="Sets y Gets">
        
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

        public function setDependencias($dependencias) {
            $this->dependencias = $dependencias;
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
        
        public function getDependencias() {
            return $this->dependencias;
        }
        // </editor-fold>
  
        //Funciones extras
        public function addDependencia(Dependencia $dependencia) {
            return $this->dependencias[] = $dependencia;
        }
    }
?>