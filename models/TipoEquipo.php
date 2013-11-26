<!-- File: /models/TipoEquipo.php -->

<?php
    require_once '/models/AppModel.php';
    /*
     * Clase Tipo de Equipo
     */
    class TipoEquipo implements AppModel {
        private $idTipoEquipo;
        private $descripcion;
        private $estado;
        
        public function __construct($idTipoEquipo = 0, $descripcion = "", $estado = 1) {
            $this->idTipoEquipo = $idTipoEquipo;
            $this->descripcion = $descripcion;
            $this->estado = $estado;
        }
              
        // <editor-fold defaultstate="collapsed" desc="Sets y Gets">

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
         * Activa a un Tipo de Equipo
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
         * Desactiva a un Tipo de Equipo
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
