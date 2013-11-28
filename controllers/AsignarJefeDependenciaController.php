<!-- File: /controllers/AsignarJefeDependenciaController.php -->

<?php
    require_once '/controllers/AppController.php';
    require_once '/DAO/RedDAO.php';
    require_once '/DAO/DependenciaDAO.php';
    require_once '/DAO/UsuarioDAO.php';
    
    class AsignarJefeDependenciaController {
        public static function AsignarJefeDependenciaAction() {
            $redes = RedDAO::getAll();
            $dependencias = DependenciaDAO::getAll();
            require_once '/views/Asignar Jefe Dependencia/Index.php';
        }
        
        public static function AsignarJefeDependenciaPOSTAction() {
            if($_POST) {
                $dependencia = current(DependenciaDAO::getBy("idDependencia", $_POST['idDependencia']));
                $red = current(RedDAO::getBy("idRed", $dependencia->getIdRed()));
                try {
                   @$superDependencia = current(DependenciaDAO::getBy("idDependencia", $dependencia->getSuperIdDependencia()));
                } 
                catch (Exception $e) {
                    $superDependencia = null;
                }
                $usuario = current(UsuarioDAO::getBy("idUsuario", $_POST['idUsuario']));
                $dependencia->setIdUsuarioJefe($usuario->getIdUsuario());
                if(DependenciaDAO::asignarJefe($dependencia)) {
                    $mensaje = "Jefe asignado correctamente";
                    require_once '/views/Asignar Jefe Dependencia/Confirmacion.php';
                }
                else
                    $mensaje = "No se pudo asignar el jefe";
            }   
        }
    }
?>
