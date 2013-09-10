<?php
    require_once '/DAO/UsuarioDAO.php';
    require_once '/DAO/RedDAO.php';
    require_once '/DAO/DependenciaDAO.php';
    
    class UsuarioController {
        public static function UsuarioAction() {
            $usuarios = UsuarioDAO::getVwUsuario();
            require_once '/views/Mantenimiento/Usuario/Lista.php';
        }
        
        public static function CrearAction() {
            $nextID = UsuarioDAO::getNextID();
            $redes = RedDAO::getAllRed();
            $dependencias = DependenciaDAO::getAllDependencia();
            require_once '/views/Mantenimiento/Usuario/Crear.php';
        }
        
        public static function CrearPOSTAction() {
            if(isset($_POST)) {
                $usuario = new Usuario();
                $usuario->setIdUsuario($_POST['idUsuario']);
                $usuario->setNombres($_POST['nombres']);
                $usuario->setApellidoPaterno($_POST['apellidoPaterno']);
                $usuario->setApellidoMaterno($_POST['apellidoMaterno']);
                $usuario->setIdRed($_POST['idRed']);
                $usuario->setIdDependencia($_POST['idDependencia']);
                $usuario->setCorreo($_POST['correo']);
                $usuario->setRpn($_POST['rpm']);
                $usuario->setAnexo($_POST['anexo']);
                $usuario->setRol($_POST['idRol']);
                $usuario->setRol($_POST['username']);
                UsuarioDAO::crear($usuario);
            }
            $usuarios = UsuarioDAO::getVwUsuario();
            $mensaje = "Modelo guardada correctamente";
            require_once '/views/Mantenimiento/Usuario/Lista.php';
        }
    }

?>
