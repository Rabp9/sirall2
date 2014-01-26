<!-- File: /models/VwArea.php -->

<?php
    require_once './models/AppModel.php';
    /*
     * Clase de Vista VwArea
     */
    class VwArea implements AppModel {
        private $idArea;
        private $descripcion;
        private $establecimiento;
        private $jefaturaInmediata;
        private $areaGeneral;
                
        public function __construct($idArea = "", $descripcion = "", $establecimiento = "", $jefaturaInmediata = '', $areaGeneral = "") {
            $this->idArea = $idArea;
            $this->descripcion = $descripcion;
            $this->establecimiento = $establecimiento;
            $this->jefaturaInmediata = $jefaturaInmediata;
            $this->areaGeneral = $areaGeneral;
        }
                
        // <editor-fold defaultstate="collapsed" desc="Sets y Gets">
 
        public function setIdArea($idArea) {
            $this->idArea = $idArea;
        }
        
        public function getIdArea() {
            return $this->idArea;
        }
        
        public function setDescripcion($descripcion) {
            $this->descripcion = $descripcion;
        }
        
        public function getDescripcion() {
            return $this->descripcion;
        }
        
        public function setEstablecimiento($establecimiento) {
            $this->establecimiento = $establecimiento;
        }
        
        public function getEstablecimiento() {
            return $this->establecimiento;
        }
         
        public function setJefaturaInmediata($jefaturaInmediata) {
            $this->jefaturaInmediata = $jefaturaInmediata;
        }
        
        public function getJefaturaInmediata() {
            return $this->jefaturaInmediata;
        }          
        
        public function setAreaGeneral($areaGeneral) {
            $this->areaGeneral = $areaGeneral;
        }
        
        public function getAreaGeneral() {
            return $this->areaGeneral;
        }          
        // </editor-fold>
              
        public function toArray() {
            return get_object_vars($this);
        }       
        
        public function toXML() {
            $clase = get_class($this);
            $atributos = $this->toArray();
            $xml = "<$clase>\n";
            foreach ($atributos as $nombre => $valor) {
                $xml .= "\t<$nombre>" . $valor . "</$nombre>\n";
            }
            $xml = $xml . "</$clase>";
            return $xml;
        }
        
        public function toJSON() {
            return json_encode($this->toArray(), JSON_HEX_TAG );
        }
        
        public function toString() {
            $clase = get_class($this);
            $atributos = $this->toArray();
            $string = "$clase {";
            foreach ($atributos as $nombre => $valor) {
                $string .= "($nombre => $valor) " ;
            }
            $string .= "}";
            return $string;
        }
    }
?>