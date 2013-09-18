<?php
    require_once '/DAO/UsuarioDAO.php';
    require_once '/DAO/RedDAO.php';
    require_once '/DAO/DependenciaDAO.php';
    require_once '/DAO/RolDAO.php';
    
    class UsuarioController {
        public static function UsuarioAction() {
            $usuarios = UsuarioDAO::getVwUsuario();
            require_once '/views/Mantenimiento/Usuario/Lista.php';
        }
        
        public static function CrearAction() {
            $nextID = UsuarioDAO::getNextID();
            $redes = RedDAO::getAllRed();
            $dependencias = DependenciaDAO::getAllDependencia();
            $roles = RolDAO::getAllRol();
            require_once '/views/Mantenimiento/Usuario/Crear.php';
        }
        
        public static function CrearPOSTAction() {
            if(isset($_POST)) {
                $usuario = new Usuario();
                $usuario->setIdUsuario($_POST['idUsuario']);
                $usuario->setIdDependencia($_POST['idDependencia']);
                $usuario->setIdRed($_POST['idRed']);
                $usuario->setIdRol($_POST['idRol']);
                $usuario->setNombres($_POST['nombres']);
                $usuario->setApellidoPaterno($_POST['apellidoPaterno']);
                $usuario->setApellidoMaterno($_POST['apellidoMaterno']);
                $usuario->setCorreo($_POST['correo']);
                $usuario->setRpn($_POST['rpm']);
                $usuario->setAnexo($_POST['anexo']);
                $usuario->setUsername($_POST['username']);
                UsuarioDAO::crear($usuario) ?
                    $mensaje = "Usuario guardado correctamente" :
                    $mensaje = "El Usuario no fue guardado correctamente";
                    
            }
            $usuarios = UsuarioDAO::getVwUsuario();
            require_once '/views/Mantenimiento/Usuario/Lista.php';
        }
        
        public static function DetalleAction() {
            if(isset($_GET['idUsuario'])) {
                $usuario = UsuarioDAO::getUsuarioByIdUsuario($_GET['idUsuario']);
                $dependencia = DependenciaDAO::getDependenciaByIdDependencia($usuario->getIdDependencia());
                $red = RedDAO::getRedByIdRed($usuario->getIdRed());
                $rol = RolDAO::getRolByIdRol($usuario->getIdRol());
                require_once '/views/Mantenimiento/Usuario/Detalle.php';
            }
        }
        
        public static function EditarAction() {
            if(isset($_GET['idUsuario'])) {
                $usuario = UsuarioDAO::getUsuarioByIdUsuario($_GET['idUsuario']);
                $redes = RedDAO::getAllRed();
                $dependencias = DependenciaDAO::getAllDependencia();
                $roles = RolDAO::getAllRol();
                require_once '/views/Mantenimiento/Usuario/Editar.php';
            }
        }
        
        public static function EditarPOSTAction() {
            if(isset($_POST)) {
                $usuario = new Usuario();
                $usuario->setIdUsuario($_POST['idUsuario']);
                $usuario->setIdDependencia($_POST['idDependencia']);
                $usuario->setIdRed($_POST['idRed']);
                $usuario->setIdRol($_POST['idRol']);
                $usuario->setNombres($_POST['nombres']);
                $usuario->setApellidoPaterno($_POST['apellidoPaterno']);
                $usuario->setApellidoMaterno($_POST['apellidoMaterno']);
                $usuario->setCorreo($_POST['correo']);
                $usuario->setRpn($_POST['rpm']);
                $usuario->setAnexo($_POST['anexo']);
                $usuario->setUsername($_POST['username']);
                UsuarioDAO::editar($usuario) ?
                    $mensaje = "Usuario modificado correctamente" :
                    $mensaje = "El Usuario no fue modificado correctamente";
            }
            $usuarios = UsuarioDAO::getVwUsuario();
            require_once '/views/Mantenimiento/Usuario/Lista.php';
        }
        
        public static function EliminarAction() {
            if(isset($_GET['idUsuario'])) {
                $usuario = UsuarioDAO::getUsuarioByIdUsuario($_GET['idUsuario']);
                $dependencia = DependenciaDAO::getDependenciaByIdDependencia($usuario->getIdDependencia());
                $red = RedDAO::getRedByIdRed($usuario->getIdRed());
                $rol = RolDAO::getRolByIdRol($usuario->getIdRol());
                require_once '/views/Mantenimiento/Usuario/Eliminar.php';
            }
        }
        
        public static function EliminarPOSTAction() {
            if(isset($_POST)) {
                $usuario = new Usuario();
                $usuario->setIdUsuario($_POST['idUsuario']);
                UsuarioDAO::eliminar($usuario) ?
                    $mensaje = "Usuario eliminado correctamente" :
                    $mensaje = "El Usuario no fue eliminado correctamente";
            }
            $usuarios = UsuarioDAO::getVwUsuario();
            require_once '/views/Mantenimiento/Usuario/Lista.php';
        }
    }
?>
