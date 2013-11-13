<?php
    require_once '/DAO/RedDAO.php';
    require_once '/DAO/DependenciaDAO.php';
    require_once '/DAO/EquipoDAO.php';

    class RealizarMantenimientoController {
        public static function RealizarMantenimientoAction() {
            $equipos = EquipoDAO::getVwEquipoMantenimiento();
            require_once '/views/Realizar Mantenimiento/Index.php';
        }        
        
        public static function RealizarMantenimientoByEquipoAction() {
            if(isset($_GET['codigoPatrimonial'])) {
                $codigoPatrimonial = $_GET['codigoPatrimonial'];
                $equipo = EquipoDAO::getEquipoByCodigoPatrimonial($codigoPatrimonial);
                $equipo->setEstado(3); // En mantenimiento
                EquipoDAO::editar($equipo);
                $equipo = EquipoDAO::getVwEquipoMantenimientoByCodigoPatrimonial($codigoPatrimonial);
                require_once '/views/Realizar Mantenimiento/RealizarMantenimiento.php';
            }
        }
        
        public static function InformeMantenimientoAction() {
            if(isset($_GET['codigoPatrimonial'])) {
                $codigoPatrimonial = $_GET['codigoPatrimonial'];
                $equipo = EquipoDAO::getVwEquipoMantenimientoByCodigoPatrimonial($codigoPatrimonial);
                require_once '/views/Realizar Mantenimiento/InformeMantenimiento.php';
            }
        }
    }
?>
