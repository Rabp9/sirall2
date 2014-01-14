<!-- File: /models/VwUsuario.php -->

<?php
    require_once './models/AppModel.php';
    /*
     * Clase de Vista VwUsuario
     */
    class VwUsuario implements AppModel {
        private $username;
        private $rol;
        private $establecimiento;
        
        public function __construct($username = "", $rol = "", $establecimiento = "") {
            $this->username = $username;
            $this->rol = $rol;
            $this->establecimiento = $establecimiento;
        }
        
        // <editor-fold defaultstate="collapsed" desc="Sets y Gets">
    
        public function setUsername($username) {
            $this->username = $username;
        }
         
        public function getUsername() {
            return $this->username;
        }
        
        public function setRol($rol) {
            $this->rol = $rol;
        }
        
        public function getRol() {
            return $this->rol;
        }
        
        public function setEstablecimiento($establecimiento) {
            $this->establecimiento = $establecimiento;
        }
        
        public function getEstablecimiento() {
            return $this->establecimiento;
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