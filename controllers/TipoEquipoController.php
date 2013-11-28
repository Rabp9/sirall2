<!-- File: /controllers/TipoEquipoController.php -->

<?php
    require_once '/controllers/AppController.php';
    require_once '/DAO/TipoEquipoDAO.php';
    require_once '/DAO/OpcionDAO.php';
    require_once '/DAO/SubOpcionDAO.php';
    
    class TipoEquipoController implements AppController {
        
        public static function TipoEquipoAction() {
            TipoEquipoController::ListaAction();
        }
        
        public static function ListaAction() {
            $vwTipoEquipos = TipoEquipoDAO::getVwTipoEquipo();
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
            $vwTipoEquipos = TipoEquipoDAO::getVwTipoEquipo();
            require_once '/views/Mantenimiento/Tipo de Equipo/Lista.php';
        }
        
        public static function DetalleAction() {
            if(isset($_GET['idTipoEquipo'])) {
                $tipoEquipo = current(TipoEquipoDAO::getBy("idTipoEquipo", $_GET['idTipoEquipo']));
                require_once '/views/Mantenimiento/Tipo de Equipo/Detalle.php';
            }
        }
        
        public static function EditarAction() {
            if(isset($_GET['idTipoEquipo'])) {
                $tipoEquipo = current(TipoEquipoDAO::getBy("idTipoEquipo", $_GET['idTipoEquipo']));
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
            $vwTipoEquipos = TipoEquipoDAO::getVwTipoEquipo();
            require_once '/views/Mantenimiento/Tipo de Equipo/Lista.php';
        }
        
        public static function EliminarAction() {
            if(isset($_GET['idTipoEquipo'])) {
                $tipoEquipo = current(TipoEquipoDAO::getBy("idTipoEquipo", $_GET['idTipoEquipo']));
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
            $vwTipoEquipos = TipoEquipoDAO::getVwTipoEquipo();
            require_once '/views/Mantenimiento/Tipo de Equipo/Lista.php';
        }
        
        public static function getOpcionesAction() {
            if(isset($_GET['idTipoEquipo'])) {
                $opciones = OpcionDAO::getBy("idTipoEquipo", $_GET['idTipoEquipo']);
                echo OpcionDAO::toXML($opciones);
            }   
        }
        
        public static function getSubOpcionesAction() {
            if(isset($_GET['idOpcion'])) {
                $subOpciones = SubOpcionDAO::getBy("idOpcion", $_GET['idOpcion']);
                echo SubOpcionDAO::toXML($subOpciones);
            }
        }
        
    }
?>
