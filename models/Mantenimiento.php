<!-- File: /models/Mantenimiento.php -->

<?php
    require_once '/models/AppModel.php';
    /*
     * Clase Mantenimiento
     */
    class Mantenimiento implements AppModel {
        private $idMantenimiento;
        private $codigoPatrimonial;
        private $serie;
        private $idTecnico;
        private $motivo;
        private $diagnostico;
        private $informe;
        private $fechaInicio;
        private $fechaFin;
        private $usuario;
        
        public function __construct($idMantenimiento = 0, $codigoPatrimonial = "", $serie = "", $idTecnico = "", $motivo = "", $diagnostico = "", $informe = "", $fechaInicio = "", $fechaFin = "", $usuario = "") {
            $this->idMantenimiento = $idMantenimiento;
            $this->codigoPatrimonial = $codigoPatrimonial;
            $this->serie = $serie;
            $this->idTecnico = $idTecnico;
            $this->motivo = $motivo;
            $this->diagnostico = $diagnostico;
            $this->informe = $informe;
            $this->fechaInicio = $fechaInicio;
            $this->fechaFin = $fechaFin;
            $this->usuario = $usuario;
        }
        
        // <editor-fold defaultstate="collapsed" desc="Sets y Gets">
   
        public function setIdMantenimiento($idMantenimiento) {
            $this->idMantenimiento = $idMantenimiento;
        }
                
        public function getIdMantenimiento() {
            return $this->idMantenimiento;
        }
        
        public function setCodigoPatrimonial($codigoPatrimonial) {
            $this->codigoPatrimonial = $codigoPatrimonial;
        }
               
        public function getCodigoPatrimonial() {
            return $this->codigoPatrimonial;
        }
        
        public function setSerie($serie) {
            $this->serie = $serie;
        }
        
        public function getSerie() {
            return $this->serie;
        }
        
        public function setIdTecnico($idTecnico) {
            $this->idTecnico = $idTecnico;
        }
        
        public function getIdTecnico() {
            return $this->idTecnico;
        }
        
        public function setMotivo($motivo) {
            $this->motivo = $motivo;
        }
                       
        public function getMotivo() {
            return $this->motivo;
        }      
        
        public function setDiagnostico($diagnostico) {
            $this->diagnostico = $diagnostico;
        }
                       
        public function getDiagnostico() {
            return $this->diagnostico;
        }
      
        public function setInforme($informe) {
            $this->informe = $informe;
        }
                       
        public function getInforme() {
            return $this->informe;
        }
        
        public function setFechaInicio($fechaInicio) {
            $this->fechaInicio = $fechaInicio;
        }
                       
        public function getFechaInicio() {
            return $this->fechaInicio;
        }
        
        public function setFechaFin($fechaFin) {
            $this->fechaFin = $fechaFin;
        }
                       
        public function getFechaFin() {
            return $this->fechaFin;
        } 
        public function setUsuario($usuario) {
            $this->usuario = $usuario;
        }
                       
        public function getUsuario() {
            return $this->usuario;
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
