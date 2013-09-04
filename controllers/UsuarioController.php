<?php
    require_once '/DAO/UsuarioDAO.php';
    
    class UsuarioController {
        public static function UsuarioAction() {
            $usuarios = UsuarioDAO::getVwUsuario();
            require_once '/views/Mantenimiento/Usuario/Lista.php';
        }
        
        public static function CrearAction() {
            $nextID = UsuarioDAO::getNextID();
            require_once '/views/Mantenimiento/Usuario/Crear.php';
        }
    }

?>
