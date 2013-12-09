<!-- File: /controllers/RealizarMantenimientoController.php -->

<?php
    require_once './controllers/AppController.php';
    require_once './DAO/EstablecimientoDAO.php';
    require_once './DAO/DependenciaDAO.php';
    require_once './DAO/EquipoDAO.php';
    require_once './DAO/MantenimientoDAO.php';

    class RealizarMantenimientoController implements AppController {
        public static function RealizarMantenimientoAction() {    
            if(!PermisoDAO::hasPermiso($_SESSION["usuarioActual"], "mdf4")) {
                require_once "views/Home/Error_Permisos.php";
                return;
            }
            $equipos = EquipoDAO::getVwEquipoMantenimiento();
            require_once './views/Realizar Mantenimiento/index.php';
        }        
        
        public static function RealizarMantenimientoByEquipoAction() {
            if(isset($_GET['codigoPatrimonial'])) {
                $codigoPatrimonial = $_GET['codigoPatrimonial'];
                $equipoM = current(EquipoDAO::getBy("codigoPatrimonial", $codigoPatrimonial));
                $equipoM->setEstado(3); // En mantenimiento
                EquipoDAO::editar($equipoM);
                $equipo = EquipoDAO::getVwEquipoMantenimientoByCodigoPatrimonial($codigoPatrimonial);
                $mantenimiento = new Mantenimiento();
                $mantenimiento->setCodigoPatrimonial($equipoM->getCodigoPatrimonial());
                $mantenimiento->setSerie($equipoM->getSerie());
                $mantenimiento->setMotivo($_GET['motivo']);
                $fecha = new DateTime();
                $fecha->createFromFormat('d-m-Y', date('d/m/Y'));
                $mantenimiento->setFechaInicio($fecha->format("Y-m-d"));
                $mantenimiento->setUsuario($_SESSION["usuarioActual"]->getUsername());
                MantenimientoDAO::crear($mantenimiento) ?
                    $mensaje = "Mantenimiento registrado correctamente" :
                    $mensaje = "El Mantenimiento no fue registrado correctamente";
                require_once './views/Realizar Mantenimiento/RealizarMantenimiento.php';
            }
        }
        
        public static function InformeMantenimientoAction() {
            if(isset($_GET['codigoPatrimonial'])) {
                $codigoPatrimonial = $_GET['codigoPatrimonial'];
                $equipo = EquipoDAO::getVwEquipoMantenimientoByCodigoPatrimonial($codigoPatrimonial);
                $tecnicos = TecnicoDAO::getAll();
                require_once './views/Realizar Mantenimiento/InformeMantenimiento.php';
            }
        }
    }
?>
