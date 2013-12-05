<!-- File: /controllers/RegistrarUsuarioSistemaController.php -->

<?php
    require_once '/controllers/AppController.php';
    require_once '/DAO/UsuarioSistemaDAO.php';
    require_once '/DAO/RolDAO.php';
    require_once '/DAO/EstablecimientoDAO.php';
    
    class RegistrarUsuarioSistemaController implements AppController {
        
        public static function RegistrarUsuarioSistemaAction() {
            if(!PermisoDAO::hasPermiso($_SESSION["usuarioActual"], "mdf6")) {
                require_once "views/Home/Error_Permisos.php";
                return;
            }
            $roles = RolDAO::getAll();
            $establecimientos = EstablecimientoDAO::getAll();
            require_once '/views/Registrar Usuario Sistema/Index.php';
        }
            
        public static function RegistrarUsuarioSistemaPOSTAction() {
            if(isset($_POST)) {
                $usuarioSistema = new UsuarioSistema();
                $usuarioSistema->setUsername($_POST["username"]);
                $usuarioSistema->setIdRol($_POST["idRol"]);
                $usuarioSistema->setIdEstablecimiento($_POST["idEstablecimiento"]);
                $usuarioSistema->setPassword($_POST["password"]);
                UsuarioSistemaDAO::crear($usuarioSistema) ?
                    $mensaje = "Usuario del Sistema registrado correctamente" :
                    $mensaje = "El Usuario del Sistema no fue registrado correctamente";
            }
            $rol = current(RolDAO::getBy("idRol", $usuarioSistema->getIdRol()));
            $vwUsuarioSistemas = UsuarioSistemaDAO::getVwUsuarioSistema();
            require_once '/views/Registrar Usuario Sistema/Respuesta.php';
        }
               
        public static function ListarAction() {
            $vwUsuarioSistemas = UsuarioSistemaDAO::getVwUsuarioSistema();
            require_once '/views/Registrar Usuario Sistema/Lista.php';
        }
        
        public static function EditarAction() {
            if(isset($_GET["username"])) {
                $roles = RolDAO::getAll();
                $establecimientos = EstablecimientoDAO::getAll();
                $usuarioSistema = current(UsuarioSistemaDAO::getBy("username", $_GET["username"]));
                require_once '/views/Registrar Usuario Sistema/Editar.php';
            }
        }
        
        public static function EditarPOSTAction() {
            if(isset($_POST)) {
                $usuarioSistema = new UsuarioSistema();
                $usuarioSistema->setUsername($_POST["username"]);
                $usuarioSistema->setIdRol($_POST["idRol"]);
                $usuarioSistema->setIdEstablecimiento($_POST["idEstablecimiento"]);
                $usuarioSistema->setPassword($_POST["password"]);
                UsuarioSistemaDAO::editar($usuarioSistema) ?
                    $mensaje = "Usuario del Sistema modificado correctamente" :
                    $mensaje = "El Usuario del Sistema no fue modificado correctamente";
            }
            $rol = current(RolDAO::getBy("idRol", $usuarioSistema->getIdRol()));
            $vwUsuarioSistemas = UsuarioSistemaDAO::getVwUsuarioSistema();
            require_once '/views/Registrar Usuario Sistema/Respuesta.php';
        }
        
        public static function EliminarAction() {
            if(isset($_GET["username"])) {
                $usuarioSistema = new UsuarioSistema();
                $usuarioSistema->setUsername($_GET["username"]);
                $usuarioSistema->desactivar();
                var_dump($usuarioSistema);
                UsuarioSistemaDAO::editar($usuarioSistema) ?
                    $mensaje = "Usuario del Sistema modificado correctamente" :
                    $mensaje = "El Usuario del Sistema no fue modificado correctamente";
            }
            $vwUsuarioSistemas = UsuarioSistemaDAO::getVwUsuarioSistema();
            require_once '/views/Registrar Usuario Sistema/Lista.php';
        }
        
    }
?>