<?php
    require_once '/DAO/DependenciaDAO.php';
    
    class DependenciaController {
        public static function DependenciaAction() {
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
        
        private static function dependenciasToXML($dependencias) {
            $xml = '<?xml version="1.0" encoding="UTF-8"?>';
            $xml .= "\n<Dependencias>\n";
            if(is_array($dependencias)) {
                foreach($dependencias as $dependencia) {
                    $xml = $xml . $dependencia->toXML() . "\n";
                }
            }
            $xml .= "</Dependencias>\n";
            return $xml;
        }
    }
?>
