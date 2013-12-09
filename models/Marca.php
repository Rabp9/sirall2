<!-- File: /models/Marca.php -->

<?php  
    require_once './models/AppModel.php';
    /*
     * Clase Marca de Equipo
     */
    class Marca implements AppModel {
        private $idMarca;
        private $descripcion;
        private $indicacion;
        private $estado;
        
        public function __construct($idMarca = 0, $descripcion = "", $indicacion = "", $estado = 1) {
            $this->idMarca = $idMarca;
            $this->descripcion = $descripcion;
            $this->indicacion = $indicacion;
            $this->estado = $estado;
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
         * Activa a una Marca
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
         * Desactiva a una Marca
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
