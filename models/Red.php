<?php
    class Red {
        private $idRed;
        private $descripcion;
        private $direccion;
        private $estado;
        
        public function __construct() {
            $this->idRed = "";
            $this->descripcion = "";
            $this->direccion = "";
            $this->estado = 1;
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
        
        public function setEstado($estado) {
            $this->estado = $estado;
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
               
        public function getEstado() {
            return $this->estado;
        }
        
        public function toArray(){
            return get_object_vars($this);
        }
        
        public function toXML() {
            $xml = "<Red>\n";
            $xml .= "\t<idRed>" . $this->getIdRed() . "</idRed>\n";
            $xml .= "\t<descripcion>" . $this->getDescripcion() . "</descripcion>\n";
            $xml .= "\t<direccion>" . $this->getDireccion() . "</direccion>\n";
            $xml .= "\t<estado>" . $this->getEstado() . "</estado>\n";
            $xml = $xml . "</Red>";
            return $xml;
        }
    }
?>
