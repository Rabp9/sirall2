<?php
    class DependenciaController {
        public static function DependenciaAction() {
            require_once '/views/Mantenimiento/Dependencia/Lista.php';
        }
        
        public static function CrearAction() {
            require_once '/views/Mantenimiento/Dependencia/Crear.php';
        }
    }
?>
