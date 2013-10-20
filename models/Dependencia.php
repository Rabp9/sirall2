<?php
    class Dependencia {
        private $idDependencia;
        private $idRed;
        private $descripcion;
        private $superIdDependencia;
        private $idUsuarioJefe;
        private $estado;
        
        public function __construct() {
            $this->idDependencia = "";
            $this->idRed = "";
            $this->descripcion = "";
            $this->idUsuarioJefe = "";
            $this->estado = 1;
        }
        
        // <editor-fold defaultstate="collapsed" desc="Sets y Gets">
        
        //Sets
        public function setIdDependencia($idDependencia) {
            $this->idDependencia = $idDependencia;
        }
        
        public function setIdRed($idRed) {
            $this->idRed = $idRed;
        }
        
        public function setDescripcion($descripcion) {
            $this->descripcion = $descripcion;
        }

        public function setSuperIdDependencia($superIdDependencia) {
            $this->superIdDependencia = $superIdDependencia;
        }
        
        public function setIdUsuarioJefe($idUsuarioJefe) {
            $this->idUsuarioJefe = $idUsuarioJefe;
        }
        
        public function setEstado($estado) {
            $this->estado = $estado;
        }
        
        //Gets
        public function getIdDependencia() {
            return $this->idDependencia;
        }
        
        public function getIdRed() {
            return $this->idRed;
        }
        
        public function getDescripcion() {
            return $this->descripcion;
        }
        
        public function getSuperIdDependencia() {
            return $this->superIdDependencia;
        }
        
        public function getIdUsuariojefe() {
            return $this->idUsuarioJefe;
        }
        
        public function getEstado() {
            return $this->estado;
        }
        
        // </editor-fold>
  
        //Funciones extras
     
        public function toArray(){
            return get_object_vars($this);
        }
        
        public function toXML() {
            $xml = "<Dependencia>\n";
            $xml .= "\t<idDependencia>" . $this->getIdDependencia() . "</idDependencia>\n";
            $xml .= "\t<idRed>" . $this->getIdRed() . "</idRed>\n";
            $xml .= "\t<descripcion>" . $this->getDescripcion() . "</descripcion>\n";
            $xml .= "\t<superIdDependencia>" . $this->getSuperIdDependencia() . "</superIdDependencia>\n";
            $xml .= "\t<idUsuarioJefe>" . $this->getIdUsuariojefe() . "</idUsuarioJefe>\n";
            $xml .= "\t<estado>" . $this->getEstado() . "</estado>\n";
            $xml = $xml . "</Dependencia>";
            return $xml;
        }
    }
?>