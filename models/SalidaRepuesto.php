<?php
    class SalidaRepuesto {
        private $idSalidaRepuesto;
        private $idRepuesto;
        private $cantidad;
        private $fecha;
        private $observacion;
        
        public function __construct() {
            $this->idSalidaRepuesto = 0;
            $this->idRepuesto = "";
            $this->cantidad = "";
            $this->fecha = "";
            $this->observacion = "";
        }
        
        //Sets
        public function setIdSalidaRepuesto($idSalidaRepuesto) {
            $this->idSalidaRepuesto = $idSalidaRepuesto;
        }
        
        public function setIdRepuesto($idRepuesto) {
            $this->idRepuesto = $idRepuesto;
        }
        
        public function setCantidad($cantidad) {
            $this->cantidad = $cantidad;
        }
        
        public function setFecha($fecha) {
            $this->fecha = $fecha;
        }
        
        public function setObservacion($observacion) {
            $this->observacion = $observacion;
        }    
        
        //Gets
        public function getIdSalidaRepuesto() {
            return $this->idSalidaRepuesto;
        }
        
        public function getIdRepuesto() {
            return $this->idRepuesto;
        }
        
        public function getCantidad() {
            return $this->cantidad;
        }
        
        public function getFecha() {
            return $this->fecha;
        }
        
        public function getObservacion() {
            return $this->observacion;
        }
                
        public function toArray(){
            return get_object_vars($this);
        }
        
        public function toXML() {
            $xml = "<SalidaRepuesto>\n";
            $xml .= "\t<idSalidaRepuesto>" . $this->getIdSalidaRepuesto() . "</idRepuesto>\n";
            $xml .= "\t<idRepuesto>" . $this->getIdRepuesto() . "</idRepuesto>\n";
            $xml .= "\t<cantidad>" . $this->getCantidad() . "</cantidad>\n";
            $xml .= "\t<fecha>" . $this->getFecha() . "</fecha>\n";
            $xml .= "\t<observacion>" . $this->getObservacion() . "</observacion>\n";
            $xml = $xml . "</SalidaRepuesto>";
            return $xml;
        }
    }
?>
