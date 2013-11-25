<!-- File: /models/Equipo.php -->

<?php
    require_once '/models/AppModel.php';
    /*
     * Clase Equipo
     */
    class Equipo implements AppModel {
        private $codigoPatrimonial;
        private $serie;
        private $idModelo;
        private $idUsuario;
        private $indicacion;
        private $estado;
        
        public function __construct($codigoPatrimonial = "", $serie = "", $idModelo = "", $idUsuario = "", $indicacion = "", $estado = 1) {
            $this->codigoPatrimonial = $codigoPatrimonial;
            $this->serie = $serie;
            $this->idModelo = $idModelo;
            $this->idUsuario = $idUsuario;
            $this->indicacion = $indicacion;
            $this->estado = $estado;
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
        
        public function setIdModelo($idModelo) {
            $this->idModelo = $idModelo;
        }
       
        public function getIdModelo() {
            return $this->idModelo;
        }
        
        public function setIdUsuario($idUsuario) {
            $this->idUsuario = $idUsuario;
        }
        
        public function getIdUsuario() {
            return $this->idUsuario;
        }      
        
        public function setIndicacion($indicacion) {
            $this->indicacion = $indicacion;
        }
        
        public function getIndicacion() {
            return $this->indicacion;
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
         * Activa a un Equipo
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
         * Desactiva a un Equipo
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
