<!-- File: /models/VwEquipo.php -->

<?php
    require_once '/models/AppModel.php';
    /*
     * Clase de Vista VwEquipo
     */
    class VwEquipo implements AppModel {
        private $codigoPatrimonial;
        private $serie;
        private $marca;
        private $tipoEquipo;
        private $modelo;
        private $usuario;
        private $dependencia;
        private $establecimiento;
        private $indicacion;
                
        public function __construct($codigoPatrimonial = "", $serie = "", $marca = "", $tipoEquipo = "", $modelo = "", $usuario = "", $dependencia = "", $establecimiento = "", $indicacion = "") {
            $this->codigoPatrimonial = $codigoPatrimonial;
            $this->serie = $serie;
            $this->marca = $establecimiento;
            $this->tipoEquipo = $tipoEquipo;
            $this->modelo = $modelo;
            $this->usuario = $usuario;
            $this->dependencia = $dependencia;
            $this->establecimiento = $establecimiento;
            $this->indicacion = $indicacion;
        }
                
        // <editor-fold defaultstate="collapsed" desc="Sets y Gets">
 
        public function setCodigoPatrimonial($codigoPatrimonial) {
            $this->codigoPatrimonial = $codigoPatrimonial;
        }
        
        public function getCodigoPatrimonial() {
            return $this->codigoPatrimonial;
        }
        
        public function setSerie($serie) {
            $this->serie = $serie;
        }
        
        public function getSerie() {
            return $this->serie;
        }
        
        public function setMarca($marca) {
            $this->marca = $marca;
        }
        
        public function getMarca() {
            return $this->marca;
        }
             
        public function setTipoEquipo($tipoEquipo) {
            $this->tipoEquipo = $tipoEquipo;
        }
        
        public function getTipoEquipo() {
            return $this->tipoEquipo;
        }
        
        public function setModelo($modelo) {
            $this->modelo = $modelo;
        }
        
        public function getModelo() {
            return $this->modelo;
        }          
                      
        public function setUsuario($usuario) {
            $this->usuario = $usuario;
        }
        
        public function getUsuario() {
            return $this->usuario;
        }        
           
        public function setDependencia($dependencia) {
            $this->dependencia = $dependencia;
        }
        
        public function getDependencia() {
            return $this->dependencia;
        }        
        
        public function setEstablecimiento($establecimiento) {
            $this->establecimiento = $establecimiento;
        }
        
        public function getEstablecimiento() {
            return $this->establecimiento;
        }          
                
        public function setIndicacion($indicacion) {
            $this->indicacion = $indicacion;
        }
        
        public function getIndicacion() {
            return $this->indicacion;
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