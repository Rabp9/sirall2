<!-- File: /controllers/DependenciaController.php -->

<?php
    require_once './controllers/AppController.php';
    require_once './DAO/EstablecimientoDAO.php';
    require_once './DAO/DependenciaDAO.php';
    
    class DependenciaController implements AppController {
        
        public static function DependenciaAction() {
            DependenciaController::ListaAction();
        }
        
        public static function ListaAction() {
            if(!PermisoDAO::hasPermiso($_SESSION["usuarioActual"], "mst7")) {
                require_once "views/Home/Error_Permisos.php";
                return;
            }
            $vwDependencias = DependenciaDAO::getVwDependencia();
            require_once './views/Mantenimiento/Dependencia/Lista.php';
        }
        
        public static function CrearAction() {
            if(!PermisoDAO::hasPermiso($_SESSION["usuarioActual"], "mdf7")) {
                require_once "views/Home/Error_Permisos.php";
                return;
            }
            $nextID = DependenciaDAO::getNextID();
            $establecimientos = EstablecimientoDAO::getAll();
            $dependencias = DependenciaDAO::getAll();
            require_once './views/Mantenimiento/Dependencia/Crear.php';
        }
        
        public static function CrearPOSTAction() {
            if(isset($_POST)) {
                $dependencia = new Dependencia();
                $dependencia->setIdDependencia($_POST['idDependencia']);
                $dependencia->setIdEstablecimiento($_POST['idEstablecimiento']);
                $dependencia->setDescripcion($_POST['descripcion']);
                if(!isset($_POST["direccionDiferente"])) {
                    $establecimiento = current(EstablecimientoDAO::getBy("idEstablecimiento", $_POST["idEstablecimiento"]));
                    $dependencia->setDireccion($establecimiento->getDireccion());
                }
                else 
                    $dependencia->setDireccion($_POST['direccion']);
                $dependencia->setSuperIdDependencia($_POST['superIdDependencia']);
                DependenciaDAO::crear($dependencia) ?
                    $mensaje = "Dependencia guardada correctamente" :
                    $mensaje = "La Dependencia no fue guardada correctamente";
            }
            $vwDependencias = DependenciaDAO::getVwDependencia();
            require_once './views/Mantenimiento/Dependencia/Lista.php';
        }
        
        public static function DetalleAction() {
            if(!PermisoDAO::hasPermiso($_SESSION["usuarioActual"], "mst7")) {
                require_once "views/Home/Error_Permisos.php";
                return;
            }
            if(isset($_GET['idDependencia'])) {
                $dependencia = current(DependenciaDAO::getBy("idDependencia", $_GET['idDependencia']));
                $establecimiento = current(EstablecimientoDAO::getBy("idEstablecimiento", $dependencia->getIdEstablecimiento()));
                if(DependenciaDAO::getBy("idDependencia", $dependencia->getSuperIdDependencia())) {
                    $superDependencia = current(DependenciaDAO::getBy("idDependencia", $dependencia->getSuperIdDependencia()));
                }
                else {
                    $superDependencia = new Dependencia();
                }
                require_once './views/Mantenimiento/Dependencia/Detalle.php';
            }
        }
        
        public static function EditarAction() {
            if(!PermisoDAO::hasPermiso($_SESSION["usuarioActual"], "mdf7")) {
                require_once "views/Home/Error_Permisos.php";
                return;
            }
            if(isset($_GET['idDependencia'])) {
                $dependencia = current(DependenciaDAO::getBy("idDependencia", $_GET['idDependencia']));
                $establecimientos = EstablecimientoDAO::getAll();
                $dependencias = DependenciaDAO::getAll();
                require_once './views/Mantenimiento/Dependencia/Editar.php';
            }
        }
        
        public static function EditarPOSTAction() {
            if(isset($_POST)) {
                $dependencia = new Dependencia();
                $dependencia->setIdDependencia($_POST['idDependencia']);
                $dependencia->setIdEstablecimiento($_POST['idEstablecimiento']);
                $dependencia->setDescripcion($_POST['descripcion']);
                $dependencia->setDireccion($_POST['direccion']);
                $dependencia->setSuperIdDependencia($_POST['superIdDependencia']);
                DependenciaDAO::editar($dependencia) ?
                    $mensaje = "Dependencia modificada correctamente" :
                    $mensaje = "La Dependencia no fue modificada correctamente";
            }
            $vwDependencias = DependenciaDAO::getVwDependencia();
            require_once './views/Mantenimiento/Dependencia/Lista.php';
        }
        
        public static function EliminarAction() {
            if(!PermisoDAO::hasPermiso($_SESSION["usuarioActual"], "elm7")) {
                require_once "views/Home/Error_Permisos.php";
                return;
            }
            if(isset($_GET['idDependencia'])) {
                $dependencia = current(DependenciaDAO::getBy("idDependencia", $_GET['idDependencia']));
                $establecimiento = EstablecimientoDAO::getBy("idEstablecimiento", $dependencia->getIdEstablecimiento());
                $superDependencia = DependenciaDAO::getBy("idDependencia", $dependencia->getSuperIdDependencia());
                require_once './views/Mantenimiento/Dependencia/Eliminar.php';
            }
        }
        
        public static function EliminarPOSTAction() {
            if(isset($_POST)) {
                $dependencia = new Dependencia();
                $dependencia->setIdDependencia($_POST['idDependencia']);
                DependenciaDAO::eliminar($dependencia) ?
                    $mensaje = "Dependencia eliminada correctamente" :
                    $mensaje = "La Dependencia no fue eliminada correctamente" ;
            }
            $vwDependencias = DependenciaDAO::getVwDependencia();
            require_once './views/Mantenimiento/Dependencia/Lista.php';
        }
        
        public static function DependenciasByEstablecimientoAction() {
            if(isset($_GET['idEstablecimiento'])) {
                $dependencias = DependenciaDAO::getBy("idEstablecimiento", $_GET["idEstablecimiento"]);
                foreach ($dependencias as $dependencia) {
                    if($dependencia->getSuperIdDependencia() == null) {
                        $filtroDependencias[] = $dependencia;
                    }
                }
                echo DependenciaDAO::toXml($filtroDependencias);
            }
        }

        public static function SubDependenciasAction() {
            if(isset($_GET['superIdDependencia'])) {
                if($_GET['superIdDependencia'] != 0)
                    $dependencias = DependenciaDAO::getDependenciaBySuperIdDependencia($_GET['superIdDependencia']);
                else
                    $dependencias = DependenciaDAO::getBy("idEstablecimiento", $_GET['idEstablecimiento']);
                echo DependenciaDAO::toXml($dependencias);
            }
        }
    }
?>
