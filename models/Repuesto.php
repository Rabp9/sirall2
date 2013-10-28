<?php
    class Repuesto {
        private $idRepuesto;
        private $descripcion;
        private $unidadMedida;
        private $stock;
        private $estado;
        
        public function __construct() {
            $this->idRepuesto = "";
            $this->descripcion = "";
            $this->unidadMedida = "";
            $this->stock = 0;
            $this->estado = 1;
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
        
        public function setEstado($estado) {
            $this->estado = $estado;
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
                
        public function getEstado() {
            return $this->estado;
        }
                
        public function toArray(){
            return get_object_vars($this);
        }
        
        public function toXML() {
            $xml = "<Repuesto>\n";
            $xml .= "\t<idRepuesto>" . $this->getIdRepuesto() . "</idRepuesto>\n";
            $xml .= "\t<descripcion>" . $this->getDescripcion() . "</descripcion>\n";
            $xml .= "\t<unidadMedida>" . $this->getUnidadMedida() . "</unidadMedida>\n";
            $xml .= "\t<stock>" . $this->getStock() . "</stock>\n";
            $xml .= "\t<estado>" . $this->getEstado() . "</estado>\n";
            $xml = $xml . "</Repuesto>";
            return $xml;
        }
    }
?>
