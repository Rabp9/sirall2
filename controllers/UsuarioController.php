<?php
    require_once '/DAO/UsuarioDAO.php';
    
    class UsuarioController {
        public static function UsuarioAction() {
            $usuarios = UsuarioDAO::getVwUsuario();
            require_once '/views/Mantenimiento/Usuario/Lista.php';
        }
    }

?>
