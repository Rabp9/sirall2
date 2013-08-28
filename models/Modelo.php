<?php

    class Modelo {
        private $idModelo;
        private $idMarca;
        private $idTipoEquipo;
        private $descripcion;
        private $indicacion;
        
        public function __construct() {
            $this->idModelo = 0;
            $this->idMarca = 0;
            $this->idTipoEquipo = 0;
            $this->descripcion = "";
            $this->indicacion = "";
        }
        
        //Sets
        public function setIdModelo($idModelo) {
            $this->idModelo = $idModelo;
        }
        
        public function setIdMarca($idMarca) {
            $this->idMarca = $idMarca;
        }
        
        public function setIdTipoEquipo($idTipoEquipo) {
            $this->idTipoEquipo = $idTipoEquipo;
        }
        
        public function setDescripcion($descripcion) {
            $this->descripcion = $descripcion;
        }
        
        public function setIndicacion($indicacion) {
            $this->indicacion = $indicacion;
        }
        
        //Gets
        public function getIdModelo() {
            return $this->idModelo;
        }
        
        public function getIdMarca() {
            return $this->idMarca;
        }
        
        public function getIdTipoEquipo() {
            return $this->idTipoEquipo;
        }
        
        public function getDescripcion() {
            return $this->descripcion;
        }
        
        public function getIndicacion() {
            return $this->indicacion;
        }
    }
?>
