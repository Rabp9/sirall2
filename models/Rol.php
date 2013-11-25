<!-- File: /models/Rol.php -->

<?php
    require_once '/models/AppModel.php';
    /*
     * Clase Rol
     */
    class Rol implements AppModel {
        private $idRol;
        private $descripcion;
        
        public function __construct($idRol = 0, $descripcion = "") {
            $this->idRed = $idRol;
            $this->descripcion = $descripcion;
        }
     
        // <editor-fold defaultstate="collapsed" desc="Sets y Gets">
   
        public function setIdRol($idRol) {
            $this->idRol = $idRol;
        }
        
        public function getIdRol() {
            return $this->idRol;
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
