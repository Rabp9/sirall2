<?php
    require_once '/DAO/MarcaDAO.php';
    
    class MarcaController {
        public static function MarcaAction() {
            $marcas = MarcaDAO::getAllMarca();
            require_once '/views/Mantenimiento/Marca/Lista.php';
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
                TipoEquipoDAO::crear($tipoEquipo);
            }
            $tipoEquipos = TipoEquipoDAO::getAllTipoEquipo();
            $mensaje = "Tipo de Equipo guardado Correctamente";
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
                TipoEquipoDAO::editar($tipoEquipo);
            }
            $tipoEquipos = TipoEquipoDAO::getAllTipoEquipo();
            $mensaje = "Tipo de Equipo modificado Correctamente";
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
                TipoEquipoDAO::eliminar($tipoEquipo);
            }
            $tipoEquipos = TipoEquipoDAO::getAllTipoEquipo();
            $mensaje = "Tipo de Equipo eliminado Correctamente";
            require_once '/views/Mantenimiento/Tipo de Equipo/Lista.php';
        }
    }
?>
