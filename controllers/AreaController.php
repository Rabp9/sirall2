<!-- File: /controllers/AreaController.php -->

<?php
    require_once './controllers/AppController.php';
    require_once './DAO/EstablecimientoDAO.php';
    require_once './DAO/AreaDAO.php';
    
    class AreaController implements AppController {
        
        public static function AreaAction() {
            AreaController::ListaAction();
        }
        
        public static function ListaAction() {
            if(!PermisoDAO::hasPermiso($_SESSION["usuarioActual"], "mst7")) {
                require_once "views/Home/Error_Permisos.php";
                return;
            }
            $vwAreas = AreaDAO::getVwArea();
            require_once './views/Mantenimiento/Area/Lista.php';
        }
        
        public static function CrearAction() {
            if(!PermisoDAO::hasPermiso($_SESSION["usuarioActual"], "mdf7")) {
                require_once "views/Home/Error_Permisos.php";
                return;
            }
            $establecimientos = EstablecimientoDAO::getAll();
            $areas = AreaDAO::getAll();
            require_once './views/Mantenimiento/Area/Crear.php';
        }
        
        public static function CrearPOSTAction() {
            if(isset($_POST)) {
                $area = new Area();
                $nextID = AreaDAO::getNextID();
                $area->setIdArea($nextID);
                $area->setIdEstablecimiento($_POST['idEstablecimiento']);
                $area->setDescripcion($_POST['descripcion']);
                if(!isset($_POST["direccionDiferente"])) {
                    $establecimiento = current(EstablecimientoDAO::getBy("idEstablecimiento", $_POST["idEstablecimiento"]));
                    $area->setDireccion($establecimiento->getDireccion());
                }
                else 
                    $area->setDireccion($_POST['direccion']);
                $area->setSuperIdArea($_POST['superIdArea']);
                AreaDAO::crear($area) ?
                    $mensaje = "Área guardada correctamente" :
                    $mensaje = "El Área no fue guardada correctamente";
            }
            $vwAreas = AreaDAO::getVwArea();
            require_once './views/Mantenimiento/Area/Lista.php';
        }
        
        public static function DetalleAction() {
            if(!PermisoDAO::hasPermiso($_SESSION["usuarioActual"], "mst7")) {
                require_once "views/Home/Error_Permisos.php";
                return;
            }
            if(isset($_GET['idArea'])) {
                $vwArea = current(AreaDAO::getVwBy("idArea", $_GET['idArea']));
                require_once './views/Mantenimiento/Area/Detalle.php';
            }
        }
        
        public static function EditarAction() {
            if(!PermisoDAO::hasPermiso($_SESSION["usuarioActual"], "mdf7")) {
                require_once "views/Home/Error_Permisos.php";
                return;
            }
            if(isset($_GET['idArea'])) {
                $area = current(AreaDAO::getBy("idArea", $_GET['idArea']));
                $establecimientos = EstablecimientoDAO::getAll();
                $areas = AreaDAO::getAll();
                require_once './views/Mantenimiento/Area/Editar.php';
            }
        }
        
        public static function EditarPOSTAction() {
            if(isset($_POST)) {
                $area = new Area();
                $area->setIdArea($_POST['idArea']);
                $area->setIdEstablecimiento($_POST['idEstablecimiento']);
                $area->setDescripcion($_POST['descripcion']);
                if(!isset($_POST["direccionDiferente"])) {
                    $establecimiento = current(EstablecimientoDAO::getBy("idEstablecimiento", $_POST["idEstablecimiento"]));
                    $area->setDireccion($establecimiento->getDireccion());
                }
                else 
                    $area->setDireccion($_POST['direccion']);
                $area->setSuperIdArea($_POST['superIdArea']);
                AreaDAO::editar($area) ?
                    $mensaje = "Área modificada correctamente" :
                    $mensaje = "El Área no fue modificada correctamente";
            }
            $vwAreas = AreaDAO::getVwArea();
            require_once './views/Mantenimiento/Area/Lista.php';
        }
        
        public static function EliminarAction() {
            if(!PermisoDAO::hasPermiso($_SESSION["usuarioActual"], "elm7")) {
                require_once "views/Home/Error_Permisos.php";
                return;
            }
            if(isset($_GET['idArea'])) {
                $vwArea = current(AreaDAO::getVwBy("idArea", $_GET['idArea']));
                require_once './views/Mantenimiento/Area/Eliminar.php';
            }
        }
        
        public static function EliminarPOSTAction() {
            if(isset($_POST)) {
                $area = new Area();
                $area->setIdArea($_POST['idArea']);
                AreaDAO::eliminar($area) ?
                    $mensaje = "Área eliminada correctamente" :
                    $mensaje = "El Área no fue eliminada correctamente" ;
            }
            $vwAreas = AreaDAO::getVwArea();
            require_once './views/Mantenimiento/Area/Lista.php';
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
        
        public static function AsignarPersonalAction() { 
            if(isset($_GET['idArea'])) {
                $vwArea = current(AreaDAO::getVwBy("idArea", $_GET['idArea']));
            }
            require_once './views/Mantenimiento/Area/AsignarPersonal.php';
        }
        
    }
?>
