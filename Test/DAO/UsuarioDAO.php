<?php
    require_once '/models/Usuario.php';
    require_once '/Libs/BaseDatos.php';
    
    class UsuarioDAO {
        public static function getAllUsuario() {
            //
        }
        
        public static function getNextID() {
            $result = BaseDatos::getDbh()->prepare("call sp_GetNextIdUsuario");
            $result->execute();
            $rs = $result->fetch();
            return $rs['nextID'];
        }
    }
?>
