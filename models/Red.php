<?php
    class Red {
        private $idRed;
        private $descripcion;
        private $direccion;
        
        public function __construct() {
            $this->idRed = 0;
            $this->descripcion = "";
            $this->direccion = "";
        }
        
        //Sets
        public function setIdRed($idRed) {
            $this->idRed = $idRed;
        }
        
        public function setDescripcion($descripcion) {
            $this->descripcion = $descripcion;
        }
        
        public function setDireccion($direccion) {
            $this->direccion = $direccion;
        }
        
        //Gets
        public function getIdRed() {
            return $this->idRed;
        }
        
        public function getDescripcion() {
            return $this->descripcion;
        }
        
        public function getDireccion() {
            return $this->direccion;
        }
    }
?>
