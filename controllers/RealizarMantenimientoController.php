<!-- File: /controllers/RealizarMantenimientoController.php -->

<?php
    require_once '/controllers/AppController.php';
    require_once '/DAO/EstablecimientoDAO.php';
    require_once '/DAO/DependenciaDAO.php';
    require_once '/DAO/EquipoDAO.php';

    class RealizarMantenimientoController implements AppController {
        public static function RealizarMantenimientoAction() {    
            if(!PermisoDAO::hasPermiso($_SESSION["usuarioActual"], "mdf4")) {
                require_once "views/Home/Error_Permisos.php";
                return;
            }
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
