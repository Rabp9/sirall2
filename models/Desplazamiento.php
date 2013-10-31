<?php
    class Dependencia {
        private $idDesplazamiento;
        private $codigoPatrimonial;
        private $serie;
        private $idOrigen;
        private $idDestino;
        private $fecha;
        private $observacion;
        
        public function __construct() {
            $this->idDesplazamiento = "";
            $this->codigoPatrimonial = "";
            $this->serie = "";
            $this->idOrigen = "";
            $this->idDestino = "";
            $this->fecha = "";
            $this->observacion = "";
        }
        
        // <editor-fold defaultstate="collapsed" desc="Sets y Gets">
        
        //Sets
        public function setIdDesplazamiento($idDesplazamiento) {
            $this->idDesplazamiento = $idDesplazamiento;
        }
        
        public function setCodigoPatrimonial($codigoPatrimonial) {
            $this->codigoPatrimonial = $codigoPatrimonial;
        }
        
        public function setSerie($serie) {
            $this->serie = $serie;
        }

        public function setIdOrigen($idOrigen) {
            $this->idOrigen = $idOrigen;
        }
                
        public function setIdDestino($idDestino) {
            $this->idDestino = $idDestino;
        }
        
        public function setFecha($fecha) {
            $this->fecha = $fecha;
        }
        
        public function setEstado($estado) {
            $this->estado = $estado;
        }      
        
        public function setObservacion($observacion) {
            $this->observacion = $observacion;
        }
        
        //Gets
        public function getIdDesplazamiento() {
            return $this->idDesplazamiento;
        }
        
        public function getIdCodigoPatrimonial() {
            return $this->codigoPatrimonial;
        }
        
        public function getSerie() {
            return $this->serie;
        }
        
        public function getIdOrigen() {
            return $this->idOrigen;
        }
        
        public function getIdDestino() {
            return $this->idDestino;
        }      
        
        public function getFecha() {
            return $this->fecha;
        }
        
        public function getObservacion() {
            return $this->observacion;
        }
        
        // </editor-fold>
  
        //Funciones extras
     
        public function toArray(){
            return get_object_vars($this);
        }
        
        public function toXML() {
            $xml = "<Desplazamiento>\n";
            $xml .= "\t<idDesplazamiento>" . $this->getIdDependencia() . "</idDesplazamiento>\n";
            $xml .= "\t<codigoPatrimonial>" . $this->getIdRed() . "</codigoPatrimonial>\n";
            $xml .= "\t<serie>" . $this->getDescripcion() . "</serie>\n";
            $xml .= "\t<idOrigen>" . $this->idOrigen() . "</idOrigen>\n";
            $xml .= "\t<idDestino>" . $this->idDestino() . "</idDestino>\n";
            $xml .= "\t<fecha>" . $this->getFecha() . "</fecha>\n";
            $xml .= "\t<observacion>" . $this->getObservacion() . "</observacion>\n";
            $xml = $xml . "</Desplazamiento>";
            return $xml;
        }
    }
?>