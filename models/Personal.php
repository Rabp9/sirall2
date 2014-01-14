<!-- File: /models/Personal.php -->

<?php
    require_once './models/AppModel.php';
    /*
     * Clase Personal
     */
    class Personal implements AppModel {
        private $idPersonal;
        private $idDependencia;
        private $nombres;
        private $apellidoPaterno;
        private $apellidoMaterno;
        private $correo;
        private $rpm;
        private $anexo;
        private $estado;

        public function __construct($idPersonal = "", $idDependencia = "", $nombres = "", $apellidoPaterno = "", $apellidoMaterno = "", $correo = "", $rpm = "", $anexo = "", $estado = 1) {
            $this->idPersonal = $idPersonal;
            $this->idDependencia = $idDependencia;
            $this->nombres = $nombres;
            $this->apellidoPaterno = $apellidoPaterno;
            $this->apellidoMaterno = $apellidoMaterno;
            $this->correo = $correo;
            $this->rpm = $rpm;
            $this->anexo = $anexo;
            $this->estado = $estado;
        }
        
        // <editor-fold defaultstate="collapsed" desc="Sets y Gets">
    
        public function setIdPersonal($idPersonal) {
            $this->idPersonal = $idPersonal;
        }
         
        public function getIdPersonal() {
            return $this->idPersonal;
        }
        
        public function setIdDependencia($idDependencia) {
            $this->idDependencia = $idDependencia;
        }
        
        public function getIdDependencia() {
            return $this->idDependencia;
        }
        
        public function setNombres($nombres) {
            $this->nombres = $nombres;
        }
        
        public function getNombres() {
            return $this->nombres;
        }
        
        public function setApellidoPaterno($apellidoPaterno) {
            $this->apellidoPaterno = $apellidoPaterno;
        }
        
        public function getApellidoPaterno() {
            return $this->apellidoPaterno;
        }
        
        public function setApellidoMaterno($apellidoMaterno) {
            $this->apellidoMaterno = $apellidoMaterno;
        }
        
        public function getApellidoMaterno() {
            return $this->apellidoMaterno;
        }
        
        public function setCorreo($correo) {
            $this->correo = $correo;
        }
            
        public function getCorreo() {
            return $this->correo;
        }
        
        public function setRpm($rpm) {
            $this->rpm = $rpm;
        }
        
        public function getRpm() {
            return $this->rpm;
        }
        
        public function setAnexo($anexo) {
            $this->anexo = $anexo;
        }
                
        public function getAnexo() {
            return $this->anexo;
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
         * Activa a un Usuario
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
         * Desactiva a un Usuario
         */
        public function desactivar() {
            if($this->getEstado() == 2)
                return false;
            else {
                $this->setEstado(2);
                return true;
            }
        }
               
        /*
         * Devulve el nombre completo del usuario
         */
        public function getNombreCompleto() {
            return $this->apellidoPaterno . " " . $this->apellidoMaterno . ", " . $this->nombres;
        }
    }
?>