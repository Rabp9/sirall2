<!-- File: /models/UsuarioSistema.php -->

<?php
    require_once '/models/AppModel.php';
    /*
     * Clase Usuario del Sistema
     */
    class UsuarioSistema implements AppModel {
        private $username;
        private $idRol;
        private $password;
        private $idDependencia;
        private $estado;

        public function __construct($username = "", $idRol = 0, $password = "", $idDependencia = 1, $estado = 1) {
            $this->username = $username;
            $this->idRol = $idRol;
            $this->password = $password;
            $this->estado = $estado;
        }
        
        // <editor-fold defaultstate="collapsed" desc="Sets y Gets">
    
        public function setUsername($username) {
            $this->username = $username;
        }
         
        public function getUsername() {
            return $this->username;
        }
        
        public function setIdRol($idRol) {
            $this->idRol = $idRol;
        }
        
        public function getIdRol() {
            return $this->idRol;
        }
        
        public function setPassword($password) {
            $this->password = $password;
        }
        
        public function getPassword() {
            return $this->password;
        }
        
        public function setIdDependencia($idDependencia) {
            $this->idDependencia = $idDependencia;
        }
        
        public function getIdDependencia() {
            return $this->idDependencia;
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
         * Activa a un Usuario de Sistema
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
         * Desactiva a un Usuario de Sistema
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