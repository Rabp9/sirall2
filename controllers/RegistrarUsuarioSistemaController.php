<!-- File: /controllers/RegistrarUsuarioSistemaController.php -->

<?php
    require_once '/controllers/AppController.php';
    require_once '/DAO/UsuarioSistemaDAO.php';
    require_once '/DAO/RolDAO.php';
    
    class RegistrarUsuarioSistemaController implements AppController {
        
        public static function RegistrarUsuarioSistemaAction() {
            if(!PermisoDAO::hasPermiso($_SESSION["usuarioActual"], "mdf6")) {
                require_once "views/Home/Error_Permisos.php";
                return;
            }
            $roles = RolDAO::getAll();
            require_once '/views/Registrar Usuario Sistema/Index.php';
        }
            
        public static function RegistrarUsuarioSistemaPOSTAction() {
            if(isset($_POST)) {
                $usuarioSistema = new UsuarioSistema();
                $usuarioSistema->setUsername($_POST["username"]);
                $usuarioSistema->setIdRol($_POST["idRol"]);
                $usuarioSistema->setPassword($_POST["password"]);
                UsuarioSistemaDAO::crear($usuarioSistema) ?
                    $mensaje = "Usuario del Sistema registrado correctamente" :
                    $mensaje = "El Usuario del Sistema no fue registrado correctamente";
            }
            $rol = current(RolDAO::getBy("idRol", $usuarioSistema->getIdRol()));
            $vwUsuarioSistemas = UsuarioSistemaDAO::getVwUsuarioSistema();
            require_once '/views/Registrar Usuario Sistema/Respuesta.php';
        }
               
        public static function RegistrarUsuarioSistemaPOSTAction() {
            if(isset($_POST)) {
                $usuarioSistema = new UsuarioSistema();
                $usuarioSistema->setUsername($_POST["username"]);
                $usuarioSistema->setIdRol($_POST["idRol"]);
                $usuarioSistema->setPassword($_POST["password"]);
                UsuarioSistemaDAO::crear($usuarioSistema) ?
                    $mensaje = "Usuario del Sistema registrado correctamente" :
                    $mensaje = "El Usuario del Sistema no fue registrado correctamente";
            }
            $rol = current(RolDAO::getBy("idRol", $usuarioSistema->getIdRol()));
            $vwUsuarioSistemas = UsuarioSistemaDAO::getVwUsuarioSistema();
            require_once '/views/Registrar Usuario Sistema/Respuesta.php';
        }
    }
?>