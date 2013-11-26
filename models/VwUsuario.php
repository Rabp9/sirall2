<!-- File: /models/VwUsuario.php -->

<?php
    require_once '/models/AppModel.php';
    /*
     * Clase de Vista VwUsuario
     */
    class VwUsuario implements AppModel {
        private $idUsuario;
        private $dependencia;
        private $red;
        private $nombreCompleto;
        private $correo;
        
        public function __construct($idUsuario = "", $dependencia = "", $red = "", $nombreCompleto = "", $correo = "") {
            $this->idUsuario = $idUsuario;
            $this->dependencia = $dependencia;
            $this->red = $red;
            $this->nombreCompleto = $nombreCompleto;
            $this->correo = $correo;
        }
        
        // <editor-fold defaultstate="collapsed" desc="Sets y Gets">
    
        public function setIdUsuario($idUsuario) {
            $this->idUsuario = $idUsuario;
        }
         
        public function getIdUsuario() {
            return $this->idUsuario;
        }
        
        public function setDependencia($dependencia) {
            $this->dependencia = $dependencia;
        }
        
        public function getDependencia() {
            return $this->dependencia;
        }
             
        public function setRed($red) {
            $this->red = $red;
        }
        
        public function getRed() {
            return $this->red;
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