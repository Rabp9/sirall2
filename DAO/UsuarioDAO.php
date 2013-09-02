<?php
    require_once '/models/Usuario.php';
    require_once '/Libs/BaseDatos.php';
    
    class UsuarioDAO {
        public static function getAllUsuario() {
            //
        }
        
        public static function getNextID() {
            $result = BaseDatos::getDbh()->prepare("call usp_GetNextIdUsuario");
            $result->execute();
            $rs = $result->fetch();
            return $rs['nextID'];
        }
        
        public static function getVwUsuario() {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM vw_Usuario");
            $result->execute();
            return $result;
        }
    }
?>
