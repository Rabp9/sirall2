<?php
    class Usuario {
        private $idUsuario;
        private $idDependencia;
        private $idRed;
        private $idRol;
        private $nombres;
        private $apellidoPaterno;
        private $apellidoMaterno;
        private $correo;
        private $rpm;
        private $anexo;
        private $username;
        private $password;
        private $estado;

        public function __construct() {
            $this->idUsuario = 0;
            $this->idDependencia = 0;
            $this->idRed = 0;
            $this->idRol = 0;
            $this->nombres = "";
            $this->apellidoPaterno = "";
            $this->apellidoMaterno = "";
            $this->correo = "";
            $this->rpm = "";
            $this->anexo = "";
            $this->username = "";
            $this->password = "";
            $this->estado = "";
        }
        
        // <editor-fold defaultstate="collapsed" desc="Sets y Gets">
    
        //Sets
        public function setIdUsuario($idUsuario) {
            $this->idUsuario = $idUsuario;
        }
        
        public function setIdDependencia($idDependencia) {
            $this->idDependencia = $idDependencia;
        }
        
        public function setIdRed($idRed) {
            $this->idRed = $idRed;
        }
        
        public function setIdRol($idRol) {
            $this->idRol = $idRol;
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
        
        public function setCorreo($correo) {
            $this->correo = $correo;
        }
        
        public function setRpn($rpm) {
            $this->rpm = $rpm;
        }
        
        public function setAnexo($anexo) {
            $this->anexo = $anexo;
        }
        
        public function setRol($rol) {
            $this->rol = $rol;
        }
                
        public function setUsername($username) {
            $this->username = $username;
        }        
        
        public function setPassword($password) {
            $this->password = $password;
        }       
        
        public function setEstado($estado) {
            $this->estado = $estado;
        }
        
        //Gets
        public function getIdUsuario() {
            return $this->idUsuario;
        }
        
        public function getIdDependencia() {
            return $this->idDependencia;
        }
        
        public function getIdRed() {
            return $this->idRed;
        }
        
        public function getIdRol() {
            return $this->idRol;
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
        
        public function getCorreo() {
            return $this->correo;
        }
        
        public function getRpm() {
            return $this->rpm;
        }
        
        public function getAnexo() {
            return $this->anexo;
        }
        
        public function getRol() {
            return $this->rol;
        }
        
        public function getUsername() {
            return $this->username;
        }
        
        public function getPassword() {
            return $this->password;
        }
        
        public function getEstado() {
            return $this->estado;
        }
        
        // </editor-fold>
        
        public function toArray(){
            return get_object_vars($this);
        }
        
        public function toXML() {
            $xml = "<Usuario>\n";
            $xml .= "\t<idUsuario>" . $this->getCodigoPatrimonial() . "</idUsuario>\n";
            $xml .= "\t<idDependencia>" . $this->getIdDependencia() . "</idDependencia>\n";
            $xml .= "\t<idRed>" . $this->getIdRed() . "</idRed>\n";
            $xml .= "\t<idRol>" . $this->getIdRol() . "</idRol>\n";
            $xml .= "\t<nombres>" . $this->getNombres() . "</nombres>\n";
            $xml .= "\t<apellidoPaterno>" . $this->getApellidoPaterno() . "</apellidoPaterno>\n";
            $xml .= "\t<apellidoMaterno>" . $this->getApellidoMaterno() . "</apellidoMaterno>\n";
            $xml .= "\t<correo>" . $this->getCorreo() . "</correo>\n";
            $xml .= "\t<rpm>" . $this->getRpm() . "</rpm>\n";
            $xml .= "\t<anexo>" . $this->getAnexo() . "</anexo>\n";
            $xml .= "\t<username>" . $this->getUsername() . "</username>\n";
            $xml .= "\t<password>" . $this->getPassword() . "</password>\n";
            $xml .= "\t<estado>" . $this->getEstado() . "</estado>\n";
            $xml = $xml . "</Usuario>";
            return $xml;
        }
    }
?>
