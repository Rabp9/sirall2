<!-- File: /models/UsuarioEquipoDetalle.php -->

<?php
    require_once './models/AppModel.php';
    /*
     * Clase UsuarioEquipoDetalle
     */
    class UsuarioEquipoDetalle implements AppModel {
        private $idUsuarioEquipoDetalle;
        private $idUsuario;
        private $codigoPatrimonial;
        private $serie;
        private $idDependencia;
        private $fechaInicio;
        private $fechaFin;
        private $estado;

        public function __construct($idUsuarioEquipoDetalle = "", $idUsuario = "", $codigoPatrimonial = "", $serie = "", $idDependencia = "", $fechaInicio = "", $fechaFin = "", $estado = 1) {
            $this->idUsuarioEquipoDetalle = $idUsuarioEquipoDetalle;
            $this->idUsuario = $idUsuario;
            $this->codigoPatrimonial = $codigoPatrimonial;
            $this->serie = $serie;
            $this->idDependencia = $idDependencia;
            $this->fechaInicio = $fechaInicio;
            $this->fechaFin = $fechaFin;
            $this->estado = $estado;
        }
        
        // <editor-fold defaultstate="collapsed" desc="Sets y Gets">
    
        public function setIdUsuarioEquipoDetalle($idUsuarioEquipoDetalle) {
            $this->idUsuarioEquipoDetalle = $idUsuarioEquipoDetalle;
        }       
        
        public function getIdUsuarioEquipoDetalle() {
            return $this->idUsuarioEquipoDetalle;
        }
           
        public function setIdUsuario($idUsuario) {
            $this->idUsuario = $idUsuario;
        }
        
        public function getIdUsuario() {
            return $this->idUsuario;
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
        
        public function setIdDependencia($idDependencia) {
            $this->idDependencia = $idDependencia;
        }
         
        public function getIdDependencia() {
            return $this->idDependencia;
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
         * Activa a un Usuario
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
         * Desactiva a un Usuario
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