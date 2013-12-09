<!-- File: /models/VwTipoEquipo.php -->

<?php
    require_once './models/AppModel.php';
    /*
     * Clase de Vista VwTipoEquipo
     */
    class VwTipoEquipo implements AppModel {
        private $idTipoEquipo;
        private $descripcion;
        private $nroModelos;
        private $nroEquipos;
        
        public function __construct($idTipoEquipo = "", $descripcion = "", $nroMoedelos = 0, $nroEquipos = 0) {
            $this->idTipoEquipo = $idTipoEquipo;
            $this->descripcion = $descripcion;
            $this->nroModelos = $nroMoedelos;
            $this->nroEquipos = $nroEquipos;
        }
                       
        // <editor-fold defaultstate="collapsed" desc="Sets y Gets">
 
        public function setIdTipEquipo($idTipoEquipo) {
            $this->idTipoEquipo = $idTipoEquipo;
        }
        
        public function getIdTipoEquipo() {
            return $this->idTipoEquipo;
        }
        
        public function setDescripcion($descripcion) {
            $this->descripcion = $descripcion;
        }
        
        public function getDescripcion() {
            return $this->descripcion;
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