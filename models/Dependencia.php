<!-- File: /models/Dependencia.php -->

<?php   
    require_once '/models/AppModel.php';
    /*
     * Clase Dependencia
     */
    class Dependencia implements AppModel {
        private $idDependencia;
        private $idEstablecimiento;
        private $descripcion;
        private $superIdDependencia;
        private $idUsuarioJefe;
        private $estado;
        
        public function __construct($idDependencia = "", $idEstablecimiento = "", $descripcion = "", $superIdDependencia = "", $idUsuarioJefe = "", $estado = 1) {
            $this->idDependencia = $idDependencia;
            $this->idEstablecimiento = $idEstablecimiento;
            $this->descripcion = $descripcion;
            $this->idUsuarioJefe = $idUsuarioJefe;
            $this->estado = $estado;
        }
        
        // <editor-fold defaultstate="collapsed" desc="Sets y Gets">
        
        public function setIdDependencia($idDependencia) {
            $this->idDependencia = $idDependencia;
        }
                
        public function getIdDependencia() {
            return $this->idDependencia;
        }
        
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
        
        public function setSuperIdDependencia($superIdDependencia) {
            $this->superIdDependencia = $superIdDependencia;
        }
        
        public function getSuperIdDependencia() {
            return $this->superIdDependencia;
        }
        
        public function setIdUsuarioJefe($idUsuarioJefe) {
            $this->idUsuarioJefe = $idUsuarioJefe;
        }
            
        public function getIdUsuariojefe() {
            return $this->idUsuarioJefe;
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
         * Activa a una Dependencia
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
         * Desactiva a una Dependencia
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