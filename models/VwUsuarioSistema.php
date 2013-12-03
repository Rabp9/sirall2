<!-- File: /models/VwUsuarioSistema.php -->

<?php
    require_once '/models/AppModel.php';
    /*
     * Clase de Vista VwUsuarioSistema
     */
    class VwUsuarioSistema implements AppModel {
        private $username;
        private $rol;
        
        public function __construct($username = "", $rol = "") {
            $this->username = $username;
            $this->rol = $rol;
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