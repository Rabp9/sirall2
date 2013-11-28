<!-- File: /models/SubOpcion.php -->

<?php
    require_once '/models/AppModel.php';
    /*
     * Clase Subopción de Opción de Tipo de Equipo
     */
    class SubOpcion implements AppModel {
       
        private $idSubOpcion;
        private $idOpcion;
        private $descripcion;
        
        public function  __construct($idSubOpcion = 0, $idOpcion = 0, $descripcion = "") {
            $this->idSubOpcion = $idSubOpcion;
            $this->idOpcion = $idOpcion;
            $this->descripcion = $descripcion;
        }
            
        // <editor-fold defaultstate="collapsed" desc="Sets y Gets">
   
        public function setIdSubOpcion($idSubOpcion) {
            $this->idSubOpcion = $idSubOpcion;
        }
               
        public function getIdSubOpcion() {
            return $this->idSubOpcion;
        }
               
        public function setIdOpcion($idOpcion) {
            $this->idOpcion = $idOpcion;
        }
               
        public function getIdOpcion() {
            return $this->idOpcion;
        }

        public function setDescripcion($descripcion) {
            $this->descripcion = $descripcion;
        }
               
        public function getDescripcion() {
            return $this->descripcion;
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
