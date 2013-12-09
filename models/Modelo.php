<!-- File: /models/Modelo.php -->

<?php
    require_once './models/AppModel.php';
    /*
     * Clase Modelo
     */
    class Modelo implements AppModel {
        private $idModelo;
        private $idMarca;
        private $idTipoEquipo;
        private $descripcion;
        private $indicacion;
        private $estado;

        public function __construct($idModelo = "", $idMarca = "", $idTipoEquipo = "", $descripcion = "", $indicacion = "", $estado = 1) {
            $this->idModelo = $idModelo;
            $this->idMarca = $idMarca;
            $this->idTipoEquipo = $idTipoEquipo;
            $this->descripcion = $descripcion;
            $this->indicacion = $indicacion;
            $this->estado = $estado;
        }
       
        // <editor-fold defaultstate="collapsed" desc="Sets y Gets">
   
        public function setIdModelo($idModelo) {
            $this->idModelo = $idModelo;
        }
               
        public function getIdModelo() {
            return $this->idModelo;
        }
        
        public function setIdMarca($idMarca) {
            $this->idMarca = $idMarca;
        }
                
        public function getIdMarca() {
            return $this->idMarca;
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
         * Activa a un Modelo
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
         * Desactiva a un Modelo
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
