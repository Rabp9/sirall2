<!-- File: /models/Tecnico.php -->

<?php
    require_once '/models/AppModel.php';
    /*
     * Clase Técnico de Mantenimiento
     */
    class Tecnico implements AppModel {
        private $idTecnico;
        private $nombres;
        private $apellidoPaterno;
        private $apellidoMaterno;
        private $rpm;
        private $estado;
        
        public function __construct($idTecnico = "", $nombres = "", $apellidoPaterno = "", $apellidoMaterno = "", $rpm = "", $estado = 1) {
            $this->idTecnico = $idTecnico;
            $this->nombres = $nombres;
            $this->apellidoPaterno = $apellidoPaterno;
            $this->apellidoMaterno = $apellidoMaterno;
            $this->rpm = $rpm;
            $this->estado = $estado;
        }
     
        // <editor-fold defaultstate="collapsed" desc="Sets y Gets">
       
        public function setIdTecnico($idTecnico) {
            $this->idTecnico = $idTecnico;
        }
        
        public function getIdTecnico() {
            return $this->idTecnico;
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
                        
        public function setRpm($rpm) {
            $this->rpm = $rpm;
        }
        
        public function getRpm() {
            return $this->rpm;
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
         * Activa a un Técnico
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
         * Desactiva a un técnico
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
         * Devulve el nombre completo de un técnico
         */
        public function getNombreCompleto() {
            return $this->apellidoPaterno . " " . $this->apellidoMaterno . ", " . $this->nombres;
        }
    }
?>