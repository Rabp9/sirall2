<!-- File: /models/VwRepuesto.php -->

<?php
    require_once '/models/AppModel.php';
    /*
     * Clase de Vista VwRepuesto
     */
    class VwRepuesto implements AppModel {
        private $idRepuesto;
        private $repuesto;
        private $unidadMedida;
        private $stock;
        
        public function __construct($idRepuesto = "", $repuesto = "", $unidadMedida = "", $stock = 0) {
            $this->idRepuesto = $idRepuesto;
            $this->repuesto = $repuesto;
            $this->unidadMedida = $unidadMedida;
            $this->stock = $stock;
        }
                       
        // <editor-fold defaultstate="collapsed" desc="Sets y Gets">
 
        public function setIdRepuesto($idRepuesto) {
            $this->idRepuesto = $idRepuesto;
        }
        
        public function getIdRepuesto() {
            return $this->idRepuesto;
        }
        
        public function setRepuesto($repuesto) {
            $this->repuesto = $repuesto;
        }
        
        public function getRepuesto() {
            return $this->repuesto;
        }
                
        public function setUnidadMedida($unidadMedida) {
            $this->unidadMedida = $unidadMedida;
        }
        
        public function getUnidadMedida() {
            return $this->unidadMedida;
        }
                        
        public function setStock($stock) {
            $this->stock = $stock;
        }
        
        public function getStock() {
            return $this->stock;
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