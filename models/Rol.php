<?php
    class Rol {
        private $idRol;
        private $descripcion;
        
        public function __construct() {
            $this->idRed = 0;
            $this->descripcion = "";
        }
        
        //Sets
        public function setIdRol($idRol) {
            $this->idRol = $idRol;
        }
        
        public function setDescripcion($descripcion) {
            $this->descripcion = $descripcion;
        }
        
        //Gets
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
            $xml = "<Rol>\n";
            $xml .= "\t<idRol>" . $this->getIdRed() . "</idRol>\n";
            $xml .= "\t<descripcion>" . $this->getDescripcion() . "</descripcion>\n";
            $xml = $xml . "</Rol>";
            return $xml;
        }
    }
?>
