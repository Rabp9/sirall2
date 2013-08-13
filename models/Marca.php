<?php
    class Marca {
        private $idMarca;
        private $descripcion;
        private $indicacion;
        
        public function __construct() {
            $this->idMarca = 0;
            $this->descripcion = "";
            $this->indicacion = "";
        }
        
        //Sets
        public function setIdMarca($idMarca) {
            $this->idMarca = $idMarca;
        }
        
        public function setDescripcion($descripcion) {
            $this->descripcion = $descripcion;
        }
        
        public function setIndicacion($Indicacion) {
            $this->indicacion = $Indicacion;
        }
        
        //Gets
        public function getIdMarca() {
            return $this->idMarca;
        }
        
        public function getDescripcion() {
            return $this->descripcion;
        }
        
        public function getIndicacion() {
            return $this->indicacion;
        }
    }
?>
