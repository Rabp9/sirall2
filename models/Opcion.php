<!-- File: /models/Modelo.php -->

<?php
    require_once '/models/AppModel.php';
    /*
     * Clase Opción de Tipo de Equipo
     */
    class Opcion implements AppModel {
       
        private $idOpcion;
        private $idTipoEquipo;
        private $descripcion;
        
        public function  __construct($idOpcion = 0, $idTipoEquipo = "", $descripcion = "") {
            $idOpcion = $idOpcion;
            $idTipoEquipo = $idTipoEquipo;
            $descripcion = $descripcion;
        }
            
        // <editor-fold defaultstate="collapsed" desc="Sets y Gets">
   
        public function setIdOpcion($idOpcion) {
            $this->idOpcion = $idOpcion;
        }
               
        public function getIdOpcion() {
            return $this->idOpcion;
        }
        
        public function setIdTipoEquipo($idTipoEquipo) {
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
