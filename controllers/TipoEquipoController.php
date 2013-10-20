<?php
    require_once '/DAO/TipoEquipoDAO.php';
    
    class TipoEquipoController {
        public static function TipoEquipoAction() {
            $tipoEquipos = TipoEquipoDAO::getVwTipoEquipo();
            require_once '/views/Mantenimiento/Tipo de Equipo/Lista.php';
        }

        public static function CrearAction() {
            $nextID = TipoEquipoDAO::getNextID();
            require_once '/views/Mantenimiento/Tipo de Equipo/Crear.php';
        }
                
        public static function CrearPOSTAction() {
            if(isset($_POST)) {
                $tipoEquipo = new TipoEquipo();
                $tipoEquipo->setIdTipoEquipo($_POST['idTipoEquipo']);
                $tipoEquipo->setDescripcion($_POST['descripcion']);
                $tipoEquipo->setEstado(1);
                TipoEquipoDAO::crear($tipoEquipo) ?
                    $mensaje = "Tipo de Equipo guardado Correctamente" :
                    $mensaje = "El Tipo de Equipo no fue guardado Correctamente";
            }
            $tipoEquipos = TipoEquipoDAO::getVwTipoEquipo();
            require_once '/views/Mantenimiento/Tipo de Equipo/Lista.php';
        }
        
        public static function DetalleAction() {
            if(isset($_GET['idTipoEquipo'])) {
                $tipoEquipo = TipoEquipoDAO::getTipoEquipoByIdTipoEquipo($_GET['idTipoEquipo']);
                require_once '/views/Mantenimiento/Tipo de Equipo/Detalle.php';
            }
        }
        
        public static function EditarAction() {
            if(isset($_GET['idTipoEquipo'])) {
                $tipoEquipo = TipoEquipoDAO::getTipoEquipoByIdTipoEquipo($_GET['idTipoEquipo']);
                require_once '/views/Mantenimiento/Tipo de Equipo/Editar.php';
            }
        }
        
        public static function EditarPOSTAction() {
            if(isset($_POST)) {
                $tipoEquipo = new TipoEquipo();
                $tipoEquipo->setIdTipoEquipo($_POST['idTipoEquipo']);
                $tipoEquipo->setDescripcion($_POST['descripcion']);
                $tipoEquipo->setEstado(1);
                TipoEquipoDAO::editar($tipoEquipo) ?
                    $mensaje = "Tipo de Equipo modificado Correctamente" :
                    $mensaje = "El Tipo de Equipo no fue modificado Correctamente";
            }
            $tipoEquipos = TipoEquipoDAO::getVwTipoEquipo();
            require_once '/views/Mantenimiento/Tipo de Equipo/Lista.php';
        }
        
        public static function EliminarAction() {
            if(isset($_GET['idTipoEquipo'])) {
                $tipoEquipo = TipoEquipoDAO::getTipoEquipoByIdTipoEquipo($_GET['idTipoEquipo']);
                require_once '/views/Mantenimiento/Tipo de Equipo/Eliminar.php';
            }
        }
        
        public static function EliminarPOSTAction() {
            if(isset($_POST)) {
                $tipoEquipo = new TipoEquipo();
                $tipoEquipo->setIdTipoEquipo($_POST['idTipoEquipo']);
                TipoEquipoDAO::eliminar($tipoEquipo) ?
                    $mensaje = "Tipo de Equipo eliminado Correctamente" :
                    $mensaje = "El Tipo de Equipo no fue eliminado Correctamente";
            }
            $tipoEquipos = TipoEquipoDAO::getVwTipoEquipo();
            require_once '/views/Mantenimiento/Tipo de Equipo/Lista.php';
        }
    }
?>
