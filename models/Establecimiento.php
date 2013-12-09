<!-- File: /models/Establecimiento.php -->

<?php
    require_once './models/AppModel.php';
    /*
     * Clase Establecimiento
     */
    class Establecimiento implements AppModel {
        private $idEstablecimiento;
        private $descripcion;
        private $direccion;
        private $telefono;
        private $estado;
        
        public function __construct($idEstablecimiento = "", $descripcion = "", $direccion = "", $telefono = "", $estado = 1) {
            $this->idEstablecimiento = $idEstablecimiento;
            $this->descripcion = $descripcion;
            $this->direccion = $direccion;
            $this->telefono = $telefono;
            $this->estado = $estado;
        }
        
        // <editor-fold defaultstate="collapsed" desc="Sets y Gets">
   
        public function setIdEstablecimiento($idEstablecimiento) {
            $this->idEstablecimiento = $idEstablecimiento;
        }
                
        public function getIdEstablecimiento() {
            return $this->idEstablecimiento;
        }
        
        public function setDescripcion($descripcion) {
            $this->descripcion = $descripcion;
        }
               
        public function getDescripcion() {
            return $this->descripcion;
        }
        
        public function setDireccion($direccion) {
            $this->direccion = $direccion;
        }
        
        public function getDireccion() {
            return $this->direccion;
        }
        
        public function setTelefono($telefono) {
            $this->telefono = $telefono;
        }
        
        public function getTelefono() {
            return $this->telefono;
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
         * Activa a un Establecimiento
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
         * Desactiva a un Establecimiento
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
