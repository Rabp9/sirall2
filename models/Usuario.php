<?php
    class Usuario {
        private $idUsuario;
        private $nombres;
        private $apellidoPaterno;
        private $apellidoMaterno;
        private $email;
        private $rpm;
        private $anexo;
        
        public function __construct() {
            $this->idUsuario = 0;
            $this->nombres = "";
            $this->apellidoPaterno = "";
            $this->apellidoMaterno = "";
            $this->email = "";
            $this->rpm = "";
            $this->anexo = "";
        }

        //Sets
        public function setIdUsuario($idUsuario) {
            $this->idUsuario = $idUsuario;
        }
        
        public function setNombres($nombres) {
            $this->nombres = $nombres;
        }
        
        public function setApellidoPaterno($apellidoPaterno) {
            $this->apellidoPaterno = $apellidoPaterno;
        }
        
        public function setApellidoMaterno($apellidoMaterno) {
            $this->apellidoMaterno = $apellidoMaterno;
        }
        
        public function setEmail($email) {
            $this->email = $email;
        }
        
        public function setRpm($rpm) {
            $this->rpm = $rpm;
        }
        
        public function setAnexo($anexo) {
            $this->anexo = $anexo;
        }
        
        //Gets
        public function getIdUsuario() {
            return $this->idUsuario;
        }
        
        public function getNombres() {
            return $this->nombres;
        }
        
        public function getApellidoPaterno() {
            return $this->apellidoPaterno;
        }
        
        public function getApellidoMaterno() {
            return $this->apellidoMaterno;
        }
        
        public function getEmail() {
            return $this->email;
        }
        
        public function getRpm() {
            return $this->rpm;
        }
        
        public function getAnexo() {
            return $this->anexo;
        }
    }
?>
