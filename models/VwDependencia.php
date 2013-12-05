<!-- File: /models/VwDependencia.php -->

<?php
    require_once '/models/AppModel.php';
    /*
     * Clase de Vista VwDependencia
     */
    class VwDependencia implements AppModel {
        private $idDependencia;
        private $descripcion;
        private $establecimiento;
        private $superDependencia;
                
        public function __construct($idDependencia = "", $descripcion = "", $establecimiento = "", $superDependencia = "") {
            $this->idDependencia = $idDependencia;
            $this->descripcion = $descripcion;
            $this->establecimiento = $establecimiento;
            $this->superDependencia = $superDependencia;
        }
                
        // <editor-fold defaultstate="collapsed" desc="Sets y Gets">
 
        public function setIdDependencia($idDependencia) {
            $this->idDependencia = $idDependencia;
        }
        
        public function getIdDependencia() {
            return $this->idDependencia;
        }
        
        public function setDescripcion($descripcion) {
            $this->descripcion = $descripcion;
        }
        
        public function getDescripcion() {
            return $this->descripcion;
        }
        
        public function setEstablecimiento($establecimiento) {
            $this->establecimiento = $establecimiento;
        }
        
        public function getEstablecimiento() {
            return $this->establecimiento;
        }
         
        public function setSuperDependencia($superDependencia) {
            $this->superDependencia = $superDependencia;
        }
        
        public function getSuperDependencia() {
            return $this->superDependencia;
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