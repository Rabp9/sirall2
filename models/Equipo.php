<?php
    require_once './TipoEquipo.php';

    class Equipo {
        private $codigoPatrimonial;
        private $serie;
        private $idModelo;
        private $idMarca;
        private $idTipoEquipo;
        private $idUsuario;
        private $idDependencia;
        private $idRed;
        private $indicacion;
        private $estado;
      
        public function __construct() {
            $this->codigoPatrimonial = "";
            $this->serie = "";
            $this->idModelo = 0;
            $this->idMarca = 0;
            $this->idTipoEquipo= 0;
            $this->idUsuario = 0;
            $this->idDependencia = 0;
            $this->idRed = 0;
            $this->indicacion = "";
            $this->estado = "activo";
        }
         
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
            $xml .= "\t<idDependencia>" . $this->getIdDependencia() . "</idDependencia>\n";
            $xml .= "\t<idRed>" . $this->getIdRed() . "</idRed>\n";
            $xml .= "\t<indicacion>" . $this->getIndicacion() . "</indicacion>\n";
            $xml .= "\t<estado>" . $this->getEstado() . "</estado>\n";
            $xml = $xml . "</Equipo>";
            return $xml;
        }
    }
?>
