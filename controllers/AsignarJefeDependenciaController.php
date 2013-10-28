<?php
    require_once '/DAO/RedDAO.php';
    require_once '/DAO/DependenciaDAO.php';
    require_once '/DAO/UsuarioDAO.php';
    
    class AsignarJefeDependenciaController {
        public static function AsignarJefeDependenciaAction() {
            $redes = RedDAO::getAllRed();
            $dependencias = DependenciaDAO::getAllDependencia();
            require_once '/views/Asignar Jefe Dependencia/Index.php';
        }
        
        public static function AsignarJefeDependenciaPOSTAction() {
            if($_POST) {
                $dependencia = DependenciaDAO::getDependenciaByIdDependencia($_POST['idDependencia']);
                $red = RedDAO::getRedByIdRed($dependencia->getIdRed());
                $superDependencia = DependenciaDAO::getDependenciaByIdDependencia($dependencia->getSuperIdDependencia());
                $usuario = UsuarioDAO::getUsuarioByIdUsuario($_POST['idUsuario']);
                $dependencia->setIdUsuarioJefe($usuario->getIdUsuario());
                if(DependenciaDAO::asignarJefe($dependencia))
                    require_once '/views/Asignar Jefe Dependencia/Confirmacion.php';
            }   
        }
    }
?>
