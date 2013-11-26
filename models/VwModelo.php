<!-- File: /models/VwModelo.php -->

<?php
    require_once '/models/AppModel.php';
    /*
     * Clase de Vista VwModelo
     */
    class VwModelo implements AppModel {
        private $idModelo;
        private $marca;
        private $tipoEquipo;
        private $descripcion;
        private $indicacion;
        private $nroEquipos;
                
        public function __construct($idModelo = "", $marca = "", $tipoEquipo = "", $descripcion = "", $indicacion = "", $nroEquipos = "") {
            $this->idModelo = $idModelo;
            $this->marca = $marca;
            $this->tipoEquipo = $tipoEquipo;
            $this->descripcion = $descripcion;
            $this->indicacion = $indicacion;
            $this->nroEquipos = $nroEquipos;
        }
                
        // <editor-fold defaultstate="collapsed" desc="Sets y Gets">
 
        public function setIdModelo($idModelo) {
            $this->idModelo = $idModelo;
        }
        
        public function getIdModelo() {
            return $this->idModelo;
        }
        
        public function setMarca($marca) {
            $this->marca = $marca;
        }
        
        public function getMarca() {
            return $this->marca;
        }
        
        public function setTipoEquipo($tipoEquipo) {
            $this->tipoEquipo = $tipoEquipo;
        }
        
        public function getTipoEquipo() {
            return $this->tipoEquipo;
        }
             
        public function setDescripcion($descripcion) {
            $this->descripcion = $descripcion;
        }
        
        public function getDescripcion() {
            return $this->descripcion;
        }
        
        public function setIndicacion($indicacion) {
            $this->indicacion = $indicacion;
        }
        
        public function getIndicacion() {
            return $this->indicacion;
        }         
        
        public function setNroEquipos($nroEquipos) {
            $this->nroEquipos = $nroEquipos;
        }
        
        public function getNroEquipos() {
            return $this->nroEquipos;
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