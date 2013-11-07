<?php
    require_once '/DAO/RedDAO.php';
    require_once '/DAO/DependenciaDAO.php';
    require_once '/DAO/EquipoDAO.php';

    class RealizarMantenimientoController {
        public static function RealizarMantenimientoAction() {
            $redes = RedDAO::getAllRed();
            $dependencias = DependenciaDAO::getAllDependencia();
            $equipos = EquipoDAO::getVwEquipoMantenimiento();
            require_once '/views/Realizar Mantenimiento/Index.php';
        }        
        
        public static function RealizarMantenimientoByEquipoAction() {
            require_once '/views/Realizar Mantenimiento/RealizarMantenimiento.php';
        }
    }
?>
