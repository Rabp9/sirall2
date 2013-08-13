<?php
    require_once './TipoEquipo.php';

    class Equipo {
        private $codigoPatrimonial;
        private $modelo;
        private $marca;
        private $tipoEquipo;
        private $usuario;
        private $dependencia;
        private $serie;
        
        public function __construct() {
            $this->codigoPatrimonial = "";
            $this->modelo = new Modelo();
            $this->marca = new Marca();
            $this->tipoEquipo = new TipoEquipo();
            $this->usuario = new Usuario();
            $this->dependencia = new Dependencia();
            $this->serie = "";
        }
    }
?>
