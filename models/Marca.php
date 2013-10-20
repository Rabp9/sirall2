<?php
    class Marca {
        private $idMarca;
        private $descripcion;
        private $indicacion;
        private $estado;
        
        public function __construct() {
            $this->idMarca = 0;
            $this->descripcion = "";
            $this->indicacion = "";
            $this->estado = 1;
        }
        
        //Sets
        public function setIdMarca($idMarca) {
            $this->idMarca = $idMarca;
        }
        
        public function setDescripcion($descripcion) {
            $this->descripcion = $descripcion;
        }
        
        public function setIndicacion($indicacion) {
            $this->indicacion = $indicacion;
        }
                
        public function setEstado($estado) {
            $this->estado = $estado;
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
        
        public function getEstado() {
            return $this->estado;
        }
    }
?>
