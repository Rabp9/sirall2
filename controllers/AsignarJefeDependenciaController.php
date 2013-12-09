<!-- File: /controllers/AsignarJefeDependenciaController.php -->

<?php
    require_once './controllers/AppController.php';
    require_once './DAO/EstablecimientoDAO.php';
    require_once './DAO/DependenciaDAO.php';
    require_once './DAO/UsuarioDAO.php';
    
    class AsignarJefeDependenciaController implements AppController {
        
        public static function AsignarJefeDependenciaAction() {
            if(!PermisoDAO::hasPermiso($_SESSION["usuarioActual"], "mdf7")) {
                require_once "views/Home/Error_Permisos.php";
                return;
            }
            $establecimientos = EstablecimientoDAO::getAll();
            $dependencias = DependenciaDAO::getAll();
            require_once './views/Asignar Jefe Dependencia/index.php';
        }
        
        public static function AsignarJefeDependenciaPOSTAction() {
            if($_POST) {
                $dependencia = current(DependenciaDAO::getBy("idDependencia", $_POST['idDependencia']));
                $establecimiento = current(EstablecimientoDAO::getBy("idEstablecimiento", $dependencia->getIdEstablecimiento()));
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
                    require_once './views/Asignar Jefe Dependencia/Confirmacion.php';
                }
                else
                    $mensaje = "No se pudo asignar el jefe";
            }
        }
        
    }
?>
