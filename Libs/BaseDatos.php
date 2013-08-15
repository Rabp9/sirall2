<?php
    class BaseDatos {
        private static $sistema = 'mysql';
        private static $servidor = 'localhost';
        private static $usuario = 'root';
        private static $clave = '';
        private static $baseDatos = 'lazarteservices';
        
        //Sets
        public static function setSistema($sistema) {
            self::$sistema = $sistema;
        }
        
        public static function setServidor($servidor) {
            self::$servidor = $servidor;
        }
        
        public static function setUsuario($usuario) {
            self::$usuario = $usuario;
        }
        
        public static function setClave($clave) {
            self::$clave = $clave;
        }
        
        public static function setBaseDatos($baseDatos) {
            self::$baseDatos = $baseDatos;
        }
        
        //Gets
        public static function getSistema() {
            return self::$sistema;
        }
        
        public static function getServidor() {
            return self::$servidor;
        }
        
        public static function getUsuario() {
            return self::$usuario;
        }
        
        public static function getClave() {
            return self::$clave;
        }
        
        public static function getBaseDatos() {
            return self::$baseDatos;
        }
        
        public static function getDbh() {
            $dsn = self::$sistema . ':dbname=' .self::$baseDatos . ';host=' . self::$servidor;
            try {
                $dbh = new PDO($dsn, self::$usuario, self::$clave);
                return $dbh;
            } catch (PDOException $e) {
                return; $e->getMessage();
            }
        }
    }
?>