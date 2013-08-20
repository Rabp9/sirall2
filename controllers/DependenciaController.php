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
    }
?>
