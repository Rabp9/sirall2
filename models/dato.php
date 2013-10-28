<?php
    class Dato {
        private $idDato;
        private $codigoPatrimonial;
        private $serie;
        private $clave;
        private $valor;
        
        public function __construct() {
            $this->idDato = "";
            $this->codigoPatrimonial = "";
            $this->serie = "";
            $this->clave = "#";
            $this->valor = "";
        }
        
        // <editor-fold defaultstate="collapsed" desc="Sets y Gets">
        
        //Sets
        public function setIdDato($idDato) {
            $this->idDato = $idDato;
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
        public function getIdDato() {
            return $this->idDato;
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
            $xml .= "\t<idDato>" . $this->getIdDato() . "</idDato>\n";
            $xml .= "\t<codigoPatrimonial>" . $this->getCodigoPatrimonial() . "</codigoPatrimonial>\n";
            $xml .= "\t<serie>" . $this->getSerie() . "</serie>\n";
            $xml .= "\t<clave>" . $this->getClave() . "</clave>\n";
            $xml .= "\t<valor>" . $this->getValor() . "</valor>\n";
            $xml = $xml . "</Dato>";
            return $xml;
        }
    }
?>
