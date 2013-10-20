<?php
    class TipoEquipo {
        private $idTipoEquipo;
        private $descripcion;
        private $estado;
        
        public function __construct() {
            $this->idTipoEquipo = 0;
            $this->descripcion = "";
            $this->estado = 1;
        }
        
        //Sets
        public function setIdTipoEquipo($idTipoEquipo) {
            $this->idTipoEquipo = $idTipoEquipo;
        }
        
        public function setDescripcion($descripcion) {
            $this->descripcion = $descripcion;
        }
        
        public function setEstado($estado) {
            $this->estado = $estado;
        }
        
        //Gets
        public function getIdTipoEquipo() {
            return $this->idTipoEquipo;
        }
        
        public function getDescripcion() {
            return $this->descripcion;
        }
        
        public function getEstado() {
            return $this->estado;
        }
    }
?>
