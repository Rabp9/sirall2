<?php
    class Equipo {
        private $codigoPatrimonial;
        private $serie;
        private $idMarca;
        private $idModelo;
        private $idTipoEquipo;
        private $idUsuario;
        private $indicacion;
        private $estado;
        
        public function __construct() {
            $this->codigoPatrimonial = "";
            $this->serie = "";
            $this->idModelo = 0;
            $this->idMarca = 0;
            $this->idTipoEquipo= 0;
            $this->idUsuario = 0;
            $this->indicacion = "";
            $this->estado = "activo";
        }
        
        // <editor-fold defaultstate="collapsed" desc="Sets y Gets">
        
        //Sets
        public function setCodigoPatrimonial($codigoPatrimonial) {
            $this->codigoPatrimonial = $codigoPatrimonial;
        }
        
        public function setSerie($serie) {
            $this->serie = $serie;
        }
        
        public function setIdModelo($idModelo) {
            $this->idModelo = $idModelo;
        }

        public function setIdMarca($idMarca) {
            $this->idMarca = $idMarca;
        }
  
        public function setIdTipoEquipo($idTipoEquipo) {
            $this->idTipoEquipo = $idTipoEquipo;
        }

        public function setIdUsuario($idUsuario) {
            $this->idUsuario = $idUsuario;
        }
              
        public function setIndicacion($indicacion) {
            $this->indicacion = $indicacion;
        }
        
        public function setEstado($estado) {
            $this->estado = $estado;
        }
        
        //Gets
        public function getCodigoPatrimonial() {
            return $this->codigoPatrimonial;
        }
        
        public function getSerie() {
            return $this->serie;
        }
        
        public function getIdModelo() {
            return $this->idModelo;
        }
        
        public function getIdMarca() {
            return $this->idMarca;
        }
               
        public function getIdTipoEquipo() {
            return $this->idTipoEquipo;
        }
                
        public function getIdUsuario() {
            return $this->idUsuario;
        }        
        
        public function getIndicacion() {
            return $this->indicacion;
        }        
        
        public function getEstado() {
            return $this->estado;
        }
        // </editor-fold>
         
        public function toArray(){
            return get_object_vars($this);
        }
        
        public function toXML() {
            $xml = "<Equipo>\n";
            $xml .= "\t<codigoPatrimonial>" . $this->getCodigoPatrimonial() . "</codigoPatrimonial>\n";
            $xml .= "\t<serie>" . $this->getSerie() . "</serie>\n";
            $xml .= "\t<idModelo>" . $this->getIdModelo() . "</idModelo>\n";
            $xml .= "\t<idMarca>" . $this->getIdMarca() . "</idMarca>\n";
            $xml .= "\t<idTipoEquipo>" . $this->getidTipoEquipo() . "</idTipoEquipo>\n";
            $xml .= "\t<idUsuario>" . $this->getIdUsuario() . "</idUsuario>\n";
            $xml .= "\t<indicacion>" . $this->getIndicacion() . "</indicacion>\n";
            $xml .= "\t<estado>" . $this->getEstado() . "</estado>\n";
            $xml = $xml . "</Equipo>";
            return $xml;
        }
    }
?>
