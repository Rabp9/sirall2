<!-- File: /controllers/DependenciaController.php -->

<?php
    require_once '/controllers/AppController.php';
    require_once '/DAO/RedDAO.php';
    require_once '/DAO/DependenciaDAO.php';
    
    class DependenciaController implements AppController {
        
        public static function DependenciaAction() {
            DependenciaController::ListaAction();
        }
        
        public static function ListaAction() {
            $vwDependencias = DependenciaDAO::getVwDependencia();
            require_once '/views/Mantenimiento/Dependencia/Lista.php';
        }
        
        public static function CrearAction() {
            $nextID = DependenciaDAO::getNextID();
            $redes = RedDAO::getAll();
            $dependencias = DependenciaDAO::getAll();
            require_once '/views/Mantenimiento/Dependencia/Crear.php';
        }
        
        public static function CrearPOSTAction() {
            if(isset($_POST)) {
                $dependencia = new Dependencia();
                $dependencia->setIdDependencia($_POST['idDependencia']);
                $dependencia->setIdRed($_POST['idRed']);
                $dependencia->setDescripcion($_POST['descripcion']);
                $dependencia->setSuperIdDependencia($_POST['superIdDependencia']);
                DependenciaDAO::crear($dependencia) ?
                    $mensaje = "Dependencia guardada correctamente" :
                    $mensaje = "La Dependencia no fue guardada correctamente";
            }
            $vwDependencias = DependenciaDAO::getVwDependencia();
            require_once '/views/Mantenimiento/Dependencia/Lista.php';
        }
        
        public static function DetalleAction() {
            if(isset($_GET['idDependencia'])) {
                $dependencia = current(DependenciaDAO::getBy("idDependencia", $_GET['idDependencia']));
                $red = current(RedDAO::getBy("idRed", $dependencia->getIdRed()));
                $superDependencia = DependenciaDAO::getBy("idDependencia", $dependencia->getSuperIdDependencia());
                require_once '/views/Mantenimiento/Dependencia/Detalle.php';
            }
        }
        
        public static function EditarAction() {
            if(isset($_GET['idDependencia'])) {
                $dependencia = current(DependenciaDAO::getBy("idDependencia", $_GET['idDependencia']));
                $redes = RedDAO::getAll();
                $dependencias = DependenciaDAO::getAll();
                require_once '/views/Mantenimiento/Dependencia/Editar.php';
            }
        }
        
        public static function EditarPOSTAction() {
            if(isset($_POST)) {
                $dependencia = new Dependencia();
                $dependencia->setIdDependencia($_POST['idDependencia']);
                $dependencia->setIdRed($_POST['idRed']);
                $dependencia->setDescripcion($_POST['descripcion']);
                $dependencia->setSuperIdDependencia($_POST['superIdDependencia']);
                DependenciaDAO::editar($dependencia) ?
                    $mensaje = "Dependencia modificada correctamente" :
                    $mensaje = "La Dependencia no fue modificada correctamente";
            }
            $vwDependencias = DependenciaDAO::getVwDependencia();
            require_once '/views/Mantenimiento/Dependencia/Lista.php';
        }
        
        public static function EliminarAction() {
            if(isset($_GET['idDependencia'])) {
                $dependencia = current(DependenciaDAO::getBy("idDependencia", $_GET['idDependencia']));
                $red = RedDAO::getBy("idRed", $dependencia->getIdRed());
                $superDependencia = DependenciaDAO::getBy("idDependencia", $dependencia->getSuperIdDependencia());
                require_once '/views/Mantenimiento/Dependencia/Eliminar.php';
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
            require_once '/views/Mantenimiento/Dependencia/Lista.php';
        }
        
        private static function dependenciasToXML($dependencias) {
            $xml = '<?xml version="1.0" encoding="UTF-8"?>';
            $xml .= "\n<Dependencias>\n";
            if(is_array($dependencias))
                foreach($dependencias as $dependencia)
                    $xml .= $dependencia->toXML() . "\n";
            $xml .= "</Dependencias>\n";
            return $xml;
        }    
        
        public static function SubDependenciasAction() {
            if(isset($_GET['superIdDependencia'])) {
                if($_GET['superIdDependencia'] != 0)
                    $dependencias = DependenciaDAO::getDependenciaBySuperIdDependencia($_GET['superIdDependencia']);
                else
                    $dependencias = DependenciaDAO::getDependenciaByIdRed($_GET['idRed']);
                echo self::dependenciasToXML($dependencias);
            }
        }
    }
?>
