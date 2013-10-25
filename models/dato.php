<?php
    class Dato {
        private $idClave;
        private $codigoPatrimonial;
        private $serie;
        private $clave;
        private $valor;
        
        public function __construct() {
            $this->idClave = 0;
            $this->codigoPatrimonial = "";
            $this->serie = "";
            $this->clave = "#";
            $this->valor = "";
        }
        
        // <editor-fold defaultstate="collapsed" desc="Sets y Gets">
        
        //Sets
        public function setIdClave($idClave) {
            $this->idClave = $idClave;
        }
        
        public function setCodigoPatrimonial($codigoPatrimonial) {
            $this->codigoPatrimonial = $codigoPatrimonial;
        }
        
        public function setSerie($serie) {
            $this->serie = $serie;
        }
        
        public function setClave($clave) {
            $this->clave = $clave;
        }

        public function setValor($valor) {
            $this->valor = $valor;
        }
 
        //Gets
        public function getIdClave() {
            return $this->idClave;
        }
        
        public function getCodigoPatrimonial() {
            return $this->codigoPatrimonial;
        }
        
        public function getSerie() {
            return $this->serie;
        }
        
        public function getClave() {
            return $this->clave;
        }
        
        public function getValor() {
            return $this->valor;
        }
        // </editor-fold>
         
        public function toArray(){
            return get_object_vars($this);
        }
        
        public function toXML() {
            $xml = "<Dato>\n";
            $xml .= "\t<idClave>" . $this->getIdClave() . "</idClave>\n";
            $xml .= "\t<codigoPatrimonial>" . $this->getCodigoPatrimonial() . "</codigoPatrimonial>\n";
            $xml .= "\t<serie>" . $this->getSerie() . "</serie>\n";
            $xml .= "\t<clave>" . $this->getClave() . "</clave>\n";
            $xml .= "\t<valor>" . $this->getValor() . "</valor>\n";
            $xml = $xml . "</Dato>";
            return $xml;
        }
    }
?>
