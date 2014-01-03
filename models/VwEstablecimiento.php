<!-- File: /models/VwEstablecimiento.php -->

<?php
    require_once './models/AppModel.php';
    /*
     * Clase de Vista VwEstablecimiento
     */
    class VwEstablecimiento implements AppModel {
        private $idEstablecimiento;
        private $descripcion;
        private $direccion;
        private $nivel;
        private $tipoCAS;
        private $situacion;
        private $provincia;
        private $distrito;
        private $telefono;
        private $rpm;
        private $numDependencia;
                
        public function __construct($idEstablecimiento = "", $descripcion = "", $direccion = "", $nivel = "", $tipoCAS = "", $situacion = "", $provincia = "", $distrito= "", $telefono = "", $rpm = "", $numDependencia = 0) {
            $this->idEstablecimiento = $idEstablecimiento;
            $this->descripcion = $descripcion;
            $this->direccion = $direccion;
            $this->nivel = $nivel;
            $this->tipoCAS = $tipoCAS;
            $this->situacion = $situacion;
            $this->provincia = $provincia;
            $this->distrito = $distrito;
            $this->telefono = $telefono;
            $this->rpm = $rpm;
            $this->numDependencia = $numDependencia;
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
                
        public function setNivel($nivel) {
            $this->nivel = $nivel;
        }
        
        public function getNivel() {
            return $this->nivel;
        }     
        
        public function setTipoCAS($tipoCAS) {
            $this->tipoCAS = $tipoCAS;
        }
        
        public function getTipoCAS() {
            return $this->tipoCAS;
        }
             
        public function setSituacion($situacion) {
            $this->situacion = $situacion;
        }
        
        public function getSituacion() {
            return $this->situacion;
        }
             
        public function setProvincia($provincia) {
            $this->provincia = $provincia;
        }
        
        public function getProvincia() {
            return $this->provincia;
        }
        
        public function setDistrito($distrito) {
            $this->distrito = $distrito;
        }
        
        public function getDistrito() {
            return $this->distrito;
        }
        
        public function setTelefono($telefono) {
            $this->telefono = $telefono;
        }
        
        public function getTelefono() {
            return $this->telefono;
        }

        public function setRpm($rpm) {
            $this->rpm = $rpm;
        }
                       
        public function getRpm() {
            return $this->rpm;
        }
        
        public function setEstado($estado) {
            $this->estado = $estado;
        }
                       
        public function getEstado() {
            return $this->estado;
        }
          
        public function setNumDependencia($numDependencia) {
            $this->numDependencia = $numDependencia;
        }
                       
        public function getNumDependencia() {
            return $this->numDependencia;
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