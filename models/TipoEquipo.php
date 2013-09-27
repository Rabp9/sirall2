<?php
    class TipoEquipo {
        private $idTipoEquipo;
        private $descripcion;
        
        public function __construct() {
            $this->idTipoEquipo = 0;
            $this->descripcion = "";
        }
        
        //Sets
        public function setIdTipoEquipo($idTipoEquipo) {
            $this->idTipoEquipo = $idTipoEquipo;
        }
        
        public function setDescripcion($descripcion) {
            $this->descripcion = $descripcion;
        }
        
        //Gets
        public function getIdTipoEquipo() {
            return $this->idTipoEquipo;
        }
        
        public function getDescripcion() {
            return $this->descripcion;
        }
    }
?>
