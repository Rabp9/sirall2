<!-- File: /models/Permiso.php -->

<?php
    require_once '/models/AppModel.php';
    /*
     * Clase Permiso de roles
     */
    class Permiso implements AppModel {
        private $idPermiso;
        private $idRol;
        private $descripcion;
        
        public function __construct($idPermiso = 0, $idRol = 0, $descripcion = "") {
            $this->idPermiso = $idPermiso;
            $this->idRol = $idRol;
            $this->descripcion  =$descripcion;
        }
      
        // <editor-fold defaultstate="collapsed" desc="Sets y Gets">
        
        public function setIdPermiso($idPermiso) {
            $this->idPermiso = $idPermiso;
        }
        
        public function getIdPermiso() {
            return $this->idPermiso;
        }
        
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
