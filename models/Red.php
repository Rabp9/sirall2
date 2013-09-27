<?php
    class Red {
        private $idRed;
        private $descripcion;
        private $direccion;
        
        public function __construct() {
            $this->idRed = 0;
            $this->descripcion = "";
            $this->direccion = "";
        }
        
        //Sets
        public function setIdRed($idRed) {
            $this->idRed = $idRed;
        }
        
        public function setDescripcion($descripcion) {
            $this->descripcion = $descripcion;
        }
        
        public function setDireccion($direccion) {
            $this->direccion = $direccion;
        }
        
        //Gets
        public function getIdRed() {
            return $this->idRed;
        }
        
        public function getDescripcion() {
            return $this->descripcion;
        }
        
        public function getDireccion() {
            return $this->direccion;
        }
        
        public function toArray(){
            return get_object_vars($this);
        }
        
        public function toXML() {
            $xml = "<Red>\n";
            $xml .= "\t<idRed>" . $this->getIdRed() . "</idRed>\n";
            $xml .= "\t<descripcion>" . $this->getDescripcion() . "</descripcion>\n";
            $xml .= "\t<direccion>" . $this->getDireccion() . "</direccion>\n";
            $xml = $xml . "</Red>";
            return $xml;
        }
    }
?>
