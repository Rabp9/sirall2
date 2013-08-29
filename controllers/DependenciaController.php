<?php
    require_once '/DAO/DependenciaDAO.php';
    
    class DependenciaController {
        public static function DependenciaAction() {
            $dependencias = DependenciaDAO::getVwDependencia();
            require_once '/views/Mantenimiento/Dependencia/Lista.php';
        }

        public static function CrearAction() {
            $nextID = DependenciaDAO::getNextID();
            $dependencias = DependenciaDAO::getDependenciaBySuperIdDependencia(null);
            require_once '/views/Mantenimiento/Dependencia/Crear.php';
        }
        
        public static function SubDependenciasAction() {
            if(isset($_GET['superIdDependencia'])) {
                $dependencias = DependenciaDAO::getDependenciaBySuperIdDependencia($_GET['superIdDependencia']);
                echo self::dependenciasToXML($dependencias);
            }
        }
                
        public static function CrearPOSTAction() {
            if(isset($_POST)) {
                $dependencia = new Dependencia();
                $dependencia->setIdDependencia($_POST['idDependencia']);
                $dependencia->setDescripcion($_POST['descripcion']);
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
                $superDependencia = DependenciaDAO::getDependenciaByIdDependencia($dependencia->getSuperIdDependencia());
                require_once '/views/Mantenimiento/Dependencia/Detalle.php';
            }
        }
        
        public static function EditarAction() {
            if(isset($_GET['idDependencia'])) {
                $dependencias = DependenciaDAO::getDependenciaBySuperIdDependencia(null);
                $dependencia = DependenciaDAO::getDependenciaByIdDependencia($_GET['idDependencia']);    
                $superDependencia = DependenciaDAO::getDependenciaByIdDependencia($dependencia->getSuperIdDependencia());
                require_once '/views/Mantenimiento/Dependencia/Editar.php';
            }
        }
        
        public static function EliminarAction() {
            if(isset($_GET['idDependencia'])) {
                $dependencias = DependenciaDAO::getDependenciaBySuperIdDependencia(null);
                $dependencia = DependenciaDAO::getDependenciaByIdDependencia($_GET['idDependencia']);    
                $superDependencia = DependenciaDAO::getDependenciaByIdDependencia($dependencia->getSuperIdDependencia());
                require_once '/views/Mantenimiento/Dependencia/Editar.php';
            }
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
    }
?>
