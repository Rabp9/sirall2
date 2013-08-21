<?php
    class Dependencia {
        private $idDependencia;
        private $descripcion;
        private $superIdDependencia;
        
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

        public function setSuperIdDependencia($superIdDependencia) {
            $this->superIdDependencia = $superIdDependencia;
        }

        //Gets
        public function getIdDependencia() {
            return $this->idDependencia;
        }
        
        public function getDescripcion() {
            return $this->descripcion;
        }
        
        public function getSuperIdDependencia() {
            return $this->superIdDependencia;
        }
        // </editor-fold>
  
        //Funciones extras
     
        public function toArray(){
            return get_object_vars($this);
        }
        
        public function toXML() {
            $xml = "<Dependencia>\n";
            $xml .= "\t<idDependencia>" . $this->getIdDependencia() . "</idDependencia>\n";
            $xml .= "\t<descripcion>" . $this->getDescripcion() . "</descripcion>\n";
            $xml .= "\t<superIdDependencia>" . $this->getSuperIdDependencia() . "</superIdDependencia>\n";
            $xml = $xml . "</Dependencia>";
            return $xml;
        }
    }
?>