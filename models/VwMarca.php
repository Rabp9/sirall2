<!-- File: /models/VwMarca.php -->

<?php
    require_once './models/AppModel.php';
    /*
     * Clase de Vista VwMarca
     */
    class VwMarca implements AppModel {
        private $idMarca;
        private $descripcion;
        private $indicacion;
        private $nroModelos;
        private $nroEquipos;
                
        public function __construct($idMarca = "", $descripcion = "", $indicacion = "", $nroModelos = "", $nroEquipos = "") {
            $this->idMarca = $idMarca;
            $this->descripcion = $descripcion;
            $this->indicacion = $indicacion;
            $this->nroModelos = $nroModelos;
            $this->nroEquipos = $nroEquipos;
        }
                
        // <editor-fold defaultstate="collapsed" desc="Sets y Gets">
 
        public function setIdMarca($idMarca) {
            $this->idMarca = $idMarca;
        }
        
        public function getIdMarca() {
            return $this->idMarca;
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
             
        public function setNroModelos($nroModelos) {
            $this->nroModelos = $nroModelos;
        }
        
        public function getNroModelos() {
            return $this->nroModelos;
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