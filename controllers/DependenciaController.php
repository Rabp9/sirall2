<?php
    require_once '/DAO/RedDAO.php';
    require_once '/DAO/DependenciaDAO.php';
    
    class DependenciaController {
        public static function DependenciaAction() {
            $dependencias = DependenciaDAO::getVwDependencia();
            require_once '/views/Mantenimiento/Dependencia/Lista.php';
        }

        public static function CrearAction() {
            $nextID = DependenciaDAO::getNextID();
            $redes = RedDAO::getAllRed();
            $dependencias = DependenciaDAO::getAllDependencia();
            require_once '/views/Mantenimiento/Dependencia/Crear.php';
        }
        
        public static function CrearPOSTAction() {
            if(isset($_POST)) {
                $dependencia = new Dependencia();
                $dependencia->setIdDependencia($_POST['idDependencia']);
                $dependencia->setDescripcion($_POST['descripcion']);
                $dependencia->setIdRed($_POST['idRed']);
                $dependencia->setSuperIdDependencia($_POST['superIdDependencia']);
                DependenciaDAO::crear($dependencia);
            }
            $dependencias = DependenciaDAO::getVwDependencia();
            $mensaje = "Modelo guardada correctamente";
            require_once '/views/Mantenimiento/Dependencia/Lista.php';
        }
        
        public static function DetalleAction() {
            if(isset($_GET['idDependencia'])) {
                $dependencia = DependenciaDAO::getDependenciaByIdDependencia($_GET['idDependencia']);
                $red = RedDAO::getRedByIdRed($dependencia->getIdRed());
                $superDependencia = DependenciaDAO::getDependenciaByIdDependencia($dependencia->getSuperIdDependencia());
                require_once '/views/Mantenimiento/Dependencia/Detalle.php';
            }
        }
        
        public static function EditarAction() {
            if(isset($_GET['idDependencia'])) {
                $dependencia = DependenciaDAO::getDependenciaByIdDependencia($_GET['idDependencia']);
                $redes = RedDAO::getAllRed();
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
                DependenciaDAO::editar($dependencia);
            }
            $dependencias = DependenciaDAO::getVwDependencia();
            $mensaje = "Dependencia guardada correctamente";
            require_once '/views/Mantenimiento/Dependencia/Lista.php';
        }
        
        public static function EliminarAction() {
            if(isset($_GET['idDependencia'])) {
                $dependencia = DependenciaDAO::getDependenciaByIdDependencia($_GET['idDependencia']);
                $red = RedDAO::getRedByIdRed($dependencia->getIdRed());
                $superDependencia = DependenciaDAO::getDependenciaByIdDependencia($dependencia->getSuperIdDependencia());
                require_once '/views/Mantenimiento/Dependencia/Eliminar.php';
            }
        }
        
        public static function EliminarPOSTAction() {
            if(isset($_POST)) {
                $dependencia = new Dependencia();
                $dependencia->setIdDependencia($_POST['idDependencia']);
                DependenciaDAO::eliminar($dependencia);
            }
            $dependencias = DependenciaDAO::getVwDependencia();
            $mensaje = "Dependencia eliminada correctamente";
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
