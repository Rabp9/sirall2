<!-- File: /controllers/RegistrarUsuarioController.php -->

<?php
    require_once './controllers/AppController.php';
    require_once './DAO/UsuarioDAO.php';
    require_once './DAO/RolDAO.php';
    require_once './DAO/EstablecimientoDAO.php';
    require_once './DAO/UsuarioEstablecimientoDetalleDAO.php';
    
    class RegistrarUsuarioController implements AppController {
        
        public static function RegistrarUsuarioAction() {
            if(!PermisoDAO::hasPermiso($_SESSION["usuarioActual"], "mdf6")) {
                require_once "views/Home/Error_Permisos.php";
                return;
            }
            $roles = RolDAO::getAll();
            $establecimientos = EstablecimientoDAO::getAll();
            require_once './views/Registrar Usuario/index.php';
        }
        
        public static function RegistrarUsuarioPOSTAction() {
            if(isset($_POST)) {
                $usuario = new Usuario();
                $usuario->setUsername($_POST["username"]);
                $usuario->setIdRol($_POST["idRol"]);
                $usuario->setPassword($_POST["password"]);
                $usuario->activar();
                if(UsuarioDAO::crear($usuario)) {
                    if(isset($_POST["establecimientos"]))
                        foreach($_POST["establecimientos"] as $establecimiento) {
                            $usuarioEstablecimientoDetalle = new UsuarioEstablecimientoDetalle();
                            $usuarioEstablecimientoDetalle->setUsername($usuario->getUsername());
                            $usuarioEstablecimientoDetalle->setIdEstablecimiento($establecimiento);
                            UsuarioEstablecimientoDetalleDAO::crear($usuarioEstablecimientoDetalle);    
                        }
                    $mensaje = "Usuario registrado correctamente";
                }
                else
                    $mensaje = "El Usuario no fue registrado correctamente";
            }
            $rol = current(RolDAO::getBy("idRol", $usuario->getIdRol()));
            $vwUsuario = UsuarioDAO::getVwUsuario();
            require_once './views/Registrar Usuario/Respuesta.php';
        }
        
        public static function ListarAction() {
            $vwUsuario = UsuarioDAO::getVwUsuario();
            require_once './views/Registrar Usuario/Lista.php';
        }
        
        public static function EditarAction() {
            if(isset($_GET["username"])) {
                $roles = RolDAO::getAll();
                $establecimientos = EstablecimientoDAO::getAll();
                $usuario = current(UsuarioDAO::getBy("username", $_GET["username"]));
                $usuarioEstablecimientoDetalles = UsuarioEstablecimientoDetalleDAO::getBy("username", $_GET["username"]);
                require_once './views/Registrar Usuario/Editar.php';
            }
        }
        
        public static function EditarPOSTAction() {
            if(isset($_POST)) {
                $usuario = new Usuario();
                $usuario->setUsername($_POST["username"]);
                $usuario->setIdRol($_POST["idRol"]);
                $usuario->setPassword($_POST["password"]);
                $usuario->activar();
                if(UsuarioDAO::editar($usuario)) {
                    UsuarioEstablecimientoDetalleDAO::eliminarByUsername($usuario->getUsername());
                    foreach($_POST["establecimientos"] as $establecimiento) {
                        $usuarioEstablecimientoDetalle = new UsuarioEstablecimientoDetalle();
                        $usuarioEstablecimientoDetalle->setUsername($usuario->getUsername());
                        $usuarioEstablecimientoDetalle->setIdEstablecimiento($establecimiento);
                        UsuarioEstablecimientoDetalleDAO::crear($usuarioEstablecimientoDetalle);    
                    }
                    $mensaje = "Usuario modificado correctamente";
                }
                else
                    $mensaje = "El Usuario no fue modificado correctamente";
            }
            $rol = current(RolDAO::getBy("idRol", $usuario->getIdRol()));
            $vwUsuario = UsuarioDAO::getVwUsuario();
            require_once './views/Registrar Usuario/Respuesta.php';
        }
        
        public static function EliminarAction() {
            if(isset($_GET["username"])) {
                $usuarioSistema = current(UsuarioSistemaDAO::getBy("username", $_GET["username"]));
                $usuarioSistema->desactivar();
                UsuarioSistemaDAO::editar($usuarioSistema) ?
                    $mensaje = "Usuario del Sistema eliminado correctamente" :
                    $mensaje = "El Usuario del Sistema no fue eliminado correctamente";
            }
            $vwUsuarioSistemas = UsuarioSistemaDAO::getVwUsuarioSistema();
            require_once './views/Registrar Usuario Sistema/Lista.php';
        }
        
    }
?>