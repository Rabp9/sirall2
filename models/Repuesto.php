<?php
    class Repuesto {
        private $idRepuesto;
        private $descripcion;
        private $unidadMedida;
        private $stock;
        
        public function __construct() {
            $this->idRepuesto = 0;
            $this->descripcion = "";
            $this->stock = "";
        }
        
        //Sets
        public function setIdRepuesto($idRepuesto) {
            $this->idRepuesto = $idRepuesto;
        }
        
        public function setDescripcion($descripcion) {
            $this->descripcion = $descripcion;
        }
        
        public function setUnidadMedida($unidadMedida) {
            $this->unidadMedida = $unidadMedida;
        }
        
        public function setStock($stock) {
            $this->stock = $stock;
        }
        
        //Gets
        public function getIdRepuesto() {
            return $this->idRepuesto;
        }
        
        public function getDescripcion() {
            return $this->descripcion;
        }
        
        public function getUnidadMedida() {
            return $this->unidadMedida;
        }
        
        public function getStock() {
            return $this->stock;
        }
                
        public function toArray(){
            return get_object_vars($this);
        }
        
        public function toXML() {
            $xml = "<Repuesto>\n";
            $xml .= "\t<idRepuesto>" . $this->getIdRed() . "</idRepuesto>\n";
            $xml .= "\t<descripcion>" . $this->getDescripcion() . "</descripcion>\n";
            $xml .= "\t<descripcion>" . $this->getUnidadMedida() . "</descripcion>\n";
            $xml .= "\t<descripcion>" . $this->getStock() . "</descripcion>\n";
            $xml = $xml . "</Repuesto>";
            return $xml;
        }
    }
?>
