<!-- File: /models/Repuesto.php -->

<?php
    require_once '/models/AppModel.php';
    /*
     * Clase Repuesto
     */
    class Repuesto implements AppModel {
        private $idRepuesto;
        private $descripcion;
        private $unidadMedida;
        private $stock;
        private $estado;
        
        public function __construct($idRepuesto = "", $descripcion = "", $unidadMedida = "", $stock = 0, $estado = 1) {
            $this->idRepuesto = $idRepuesto;
            $this->descripcion = $descripcion;
            $this->unidadMedida = $unidadMedida;
            $this->stock = $stock;
            $this->estado = $estado;
        }
      
        // <editor-fold defaultstate="collapsed" desc="Sets y Gets">

        public function setIdRepuesto($idRepuesto) {
            $this->idRepuesto = $idRepuesto;
        }

        public function getIdRepuesto() {
            return $this->idRepuesto;
        }
        
        public function setDescripcion($descripcion) {
            $this->descripcion = $descripcion;
        }
        
        public function getDescripcion() {
            return $this->descripcion;
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
         * Activa a un Repuesto
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
         * Desactiva a un Repuesto
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
