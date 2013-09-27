<?php
    class Permiso {
        private $idPermiso;
        private $idRol;
        private $descripcion;
        
        public function __construct() {
            $this->idPermiso = 0;
            $this->idRol = 0;
            $this->descripcion = "";
        }
        
        //Sets
        public function setIdPermiso($idPermiso) {
            $this->idPermiso = $idPermiso;
        }
        
        public function setIdRol($idRol) {
            $this->idRol = $idRol;
        }
        
        public function setDescripcion($descripcion) {
            $this->descripcion = $descripcion;
        }
        
        //Gets
        public function getIdPermiso() {
            return $this->idPermiso;
        }
        
        public function getIdRol() {
            return $this->idRol;
        }
        
        public function getDescripcion() {
            return $this->descripcion;
        }
        
        public function toArray(){
            return get_object_vars($this);
        }
        
        public function toXML() {
            $xml = "<Permiso>\n";
            $xml .= "\t<idPermiso>" . $this->getIdRol() . "</idPermiso>\n";
            $xml .= "\t<idRol>" . $this->getIdRol() . "</idRol>\n";
            $xml .= "\t<descripcion>" . $this->getDescripcion() . "</descripcion>\n";
            $xml = $xml . "</Permiso>";
            return $xml;
        }
    }
?>
