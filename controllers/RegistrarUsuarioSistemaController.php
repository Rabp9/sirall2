<!-- File: /controllers/RegistrarUsuarioSistemaController.php -->

<?php
    require_once '/controllers/AppController.php';
    require_once '/DAO/DependenciaDAO.php';
    require_once '/DAO/UsuarioDAO.php';
    require_once '/DAO/RolDAO.php';
    
    class RegistrarUsuarioSistemaController implements AppController {
        
        public static function RegistrarUsuarioSistemaAction() {
            $roles = RolDAO::getAll();
            require_once '/views/Registrar Usuario Sistema/Index.php';
        }
            
        public static function RegistrarUsuarioSistemaPOSTAction() {  
            if(isset($_POST)) {
                $rol = new Usuario();
                $rol->setIdRol($idRol)
       
            require_once '/views/Registrar Usuario Sistema/Respuesta.php';
        }
    }
?>
