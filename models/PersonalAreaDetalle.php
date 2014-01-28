<!-- File: /models/PersonalAreaDetalle.php -->

<?php
    require_once './models/AppModel.php';
    /*
     * Clase PersonalAreaDetalle
     */
    class PersonalAreaDetalle implements AppModel {
        private $idPersonalAreaDetalle;
        private $idPersonal;
        private $idArea;
        private $fechaRegistro;
        private $estado;

        public function __construct($idPersonalAreaDetalle = 0, $idPersonal = "", $idArea = "", $fechaRegistro = "", $estado = 1) {
            $this->idPersonalAreaDetalle = $idPersonalAreaDetalle;
            $this->idPersonal = $idPersonal;
            $this->idArea = $idArea;
            $this->fechaRegistro = $fechaRegistro;
            $this->estado = $estado;
        }
        
        // <editor-fold defaultstate="collapsed" desc="Sets y Gets">
    
        public function setIdPersonalAreaDetalle($idPersonalAreaDetalle) {
            $this->idPersonalAreaDetalle = $idPersonalAreaDetalle;
        }
         
        public function getIdPersonalAreaDetalle() {
            return $this->idPersonalAreaDetalle;
        }
        
        public function setIdPersonal($idPersonal) {
            $this->idPersonal = $idPersonal;
        }
        
        public function getIdPersonal() {
            return $this->idPersonal;
        }
        
        public function setIdArea($idArea) {
            $this->idArea = $idArea;
        }
        
        public function getIdArea() {
            return $this->idArea;
        }
        
        public function setFechaRegistro($fechaRegistro) {
            $this->fechaRegistro = $fechaRegistro;
        }
        
        public function getFechaRegistro() {
            return $this->fechaRegistro;
        }
     
        public function setEstado($estado) {
            $this->estado = $estado;
        }
        
        public function getEstado() {
            return $this->estado;
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
        
        /*
         * Activa a un PersonalAreaDetalle
         */
        public function activar() {
            if($this->getEstado() == 1)
                return false;
            else {
                $this->setEstado(1);
                return true;
            }
        }
        
        /*
         * Desactiva a un PersonalAreaDetalle
         */
        public function desactivar() {
            if($this->getEstado() == 2)
                return false;
            else {
                $this->setEstado(2);
                return true;
            }
        }
        
    }
?>