<?php
    require_once './Marca.php';
    require_once './TipoEquipo.php';
    
    class Modelo {
        private $idModelo;
        private $marca;
        private $tipoEquipo;
        private $descripcion;
        private $indicacion;
        
        public function __construct() {
            $this->idModelo = 0;
            $this->marca = new Marca();
            $this->tipoEquipo = new TipoEquipo();
            $this->descripcion = "";
            $this->indicacion = "";
        }
        
        //Sets
        public function setIdModelo($idModelo) {
            $this->idModelo = $idModelo;
        }
        
        public function setMarca(Marca $marca) {
            $this->marca = $marca;
        }
        
        public function setTipoEquipó(TipoEquipo $tipoEquipo) {
            $this->tipoEquipo = $tipoEquipo;
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
        
        public function getMarca() {
            return $this->marca;
        }
        
        public function getTipoEquipo() {
            return $this->tipoEquipo;
        }
        
        public function getDescripcion() {
            return $this->descripcion;
        }
        
        public function getIndicacion() {
            return $this->indicacion;
        }
    }
?>
