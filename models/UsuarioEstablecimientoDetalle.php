<!-- File: /models/UsuarioEstablecimientoDetalle.php -->

<?php
    require_once './models/AppModel.php';
    /*
     * Clase UsuarioEstablecimientoDetalle
     */
    class UsuarioEstablecimiento implements AppModel {
        private $idUsuarioEstablecimientoDetalle;
        private $idEstablecimiento;
        private $username;

        public function __construct($idUsuarioEstablecimientoDetalle = 0, $idEstablecimiento = 0, $username = "") {
            $this->idUsuarioEstablecimientoDetalle = $idUsuarioEstablecimientoDetalle;
            $this->idEstablecimiento = $idEstablecimiento;
            $this->username = $username;
        }
        
        // <editor-fold defaultstate="collapsed" desc="Sets y Gets">
    
        public function setIdUsuarioEstablecimientoDetalle($idUsuarioEstablecimientoDetalle) {
            $this->idUsuarioEstablecimientoDetalle = $idUsuarioEstablecimientoDetalle;
        }
         
        public function getIdUsuarioEstablecimientoDetalle() {
            return $this->idUsuarioEstablecimientoDetalle;
        }
        
        public function setIdEstablecimiento($idEstablecimiento) {
            $this->idEstablecimiento = $idEstablecimiento;
        }
        
        public function getIdEstablecimiento() {
            return $this->idEstablecimiento;
        }
        
        public function setUsername($username) {
            $this->username = $username;
        }
        
        public function getUsername() {
            return $this->username;
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