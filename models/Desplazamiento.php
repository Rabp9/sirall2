<!-- File: /models/Desplazamiento.php -->

<?php
    require_once '/models/AppModel.php';
    /*
     * Clase Deesplazamiento
     */
    class Desplazamiento implements AppModel {
        private $idDesplazamiento;
        private $codigoPatrimonial;
        private $serie;
        private $idOrigen;
        private $idDestino;
        private $fecha;
        private $observacion;
        private $usuario;
        
        public function __construct($idDesplazamiento = "", $codigoPatrimonial = "", $serie = "", $idOrigen = "", $idDestino = "", $fecha = "", $observacion = "", $usuario = "") {
            $this->idDesplazamiento = $idDesplazamiento;
            $this->codigoPatrimonial = $codigoPatrimonial;
            $this->serie = $serie;
            $this->idOrigen = $idOrigen;
            $this->idDestino = $idDestino;
            $this->fecha = $fecha;
            $this->observacion = $observacion;
            $this->usuario = $usuario;
        }
        
        // <editor-fold defaultstate="collapsed" desc="Sets y Gets">

        public function setIdDesplazamiento($idDesplazamiento) {
            $this->idDesplazamiento = $idDesplazamiento;
        }
                
        public function getIdDesplazamiento() {
            return $this->idDesplazamiento;
        }
        
        public function setCodigoPatrimonial($codigoPatrimonial) {
            $this->codigoPatrimonial = $codigoPatrimonial;
        }
        
        public function getIdCodigoPatrimonial() {
            return $this->codigoPatrimonial;
        }
        
        public function setSerie($serie) {
            $this->serie = $serie;
        }
       
        public function getSerie() {
            return $this->serie;
        }
        
        public function setIdOrigen($idOrigen) {
            $this->idOrigen = $idOrigen;
        }
                        
        public function getIdOrigen() {
            return $this->idOrigen;
        }
        
        public function setIdDestino($idDestino) {
            $this->idDestino = $idDestino;
        }
             
        public function getIdDestino() {
            return $this->idDestino;
        }      
        
        public function setFecha($fecha) {
            $this->fecha = $fecha;
        }
              
        public function getFecha() {
            return $this->fecha;
        }
        
        public function setObservacion($observacion) {
            $this->observacion = $observacion;
        }
 
        public function getObservacion() {
            return $this->observacion;
        }
        
        public function setUsuario($usuario) {
            $this->usuario = $usuario;
        }
 
        public function getUsuario() {
            return $this->usuario;
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