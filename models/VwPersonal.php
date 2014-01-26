<!-- File: /models/VwPersonal.php -->

<?php
    require_once './models/AppModel.php';
    /*
     * Clase de Vista VwPersonal
     */
    class VwPersonal implements AppModel {
        private $idPersonal;
        private $area;
        private $areaGeneral;
        private $establecimeinto;
        private $nombreCompleto;
        private $correo;
        
        public function __construct($idPersonal = "", $area = "", $areaGeneral = "", $establecimiento = "", $nombreCompleto= "", $correo = "") {
            $this->idPersonal = $idPersonal;
            $this->area = $area;
            $this->areaGeneral = $areaGeneral;
            $this->establecimeinto = $establecimiento;
            $this->nombreCompleto = $nombreCompleto;
            $this->correo = $correo;
        }
        
        // <editor-fold defaultstate="collapsed" desc="Sets y Gets">
    
        public function setIdPersonal($idPersonal) {
            $this->idPersonal = $idPersonal;
        }
         
        public function getIdPersonal() {
            return $this->idPersonal;
        }
        
        public function setArea($area) {
            $this->area = $area;
        }
        
        public function getArea() {
            return $this->area;
        }
             
        public function setAreaGeneral($areaGeneral) {
            $this->areaGeneral = $areaGeneral;
        }
        
        public function getAreaGeneral() {
            return $this->areaGeneral;
        }
        
        public function setEstablecimiento($establecimiento) {
            $this->establecimeinto = $establecimiento;
        }
        
        public function getEstablecimiento() {
            return $this->establecimeinto;
        }
        
        public function setNombreCompleto($nombreCompleto) {
            $this->nombreCompleto = $nombreCompleto;
        }
        
        public function getNombreCompleto() {
            return $this->nombreCompleto;
        }
        
        public function setCorreo($correo) {
            $this->correo = $correo;
        }
        
        public function getCorreo() {
            return $this->correo;
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