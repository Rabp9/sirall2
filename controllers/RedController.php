<?php
    require_once '/DAO/RedDAO.php';
    
    class RedController {
        public static function RedAction() {
            $redes = RedDAO::getAllRed();
            require_once '/views/Mantenimiento/Red/Lista.php';
        }

        public static function CrearAction() {
            $nextID = RedDAO::getNextID();
            require_once '/views/Mantenimiento/Red/Crear.php';
        }
                
        public static function CrearPOSTAction() {
            if(isset($_POST)) {
                $red = new Red();
                $red->setIdRed($_POST['idRed']);
                $red->setDescripcion($_POST['descripcion']);
                $red->setDireccion($_POST['direccion']);
                RedDAO::crear($red);
            }
            $redes = RedDAO::getAllRed();
            $mensaje = "Red guardada correctamente";
            require_once '/views/Mantenimiento/Red/Lista.php';
        }
        
        public static function DetalleAction() {
            if(isset($_GET['idRed'])) {
                $red = RedDAO::getRedByIdRed($_GET['idRed']);
                require_once '/views/Mantenimiento/Red/Detalle.php';
            }
        }
        
        public static function EditarAction() {
            if(isset($_GET['idRed'])) {
                $red = RedDAO::getRedByIdRed($_GET['idRed']);
                require_once '/views/Mantenimiento/Red/Editar.php';
            }
        }
        
        public static function EditarPOSTAction() {
            if(isset($_POST)) {
                $red = new Red();
                $red->setIdRed($_POST['idRed']);
                $red->setDescripcion($_POST['descripcion']);
                $red->setDireccion($_POST['direccion']);
                RedDAO::editar($red);
            }
            $redes = RedDAO::getAllRed();
            $mensaje = "Red modificada correctamente";
            require_once '/views/Mantenimiento/Red/Lista.php';
        }
        
        public static function EliminarAction() {
            if(isset($_GET['idRed'])) {
                $red = RedDAO::getRedByIdRed($_GET['idRed']);
                require_once '/views/Mantenimiento/Red/Eliminar.php';
            }
        }
        
        public static function EliminarPOSTAction() {
            if(isset($_POST)) {
                $red = new Red();
                $red->setIdRed($_POST['idRed']);
                RedDAO::eliminar($red);
            }
            $redes = RedDAO::getAllRed();
            $mensaje = "Red eliminada correctamente";
            require_once '/views/Mantenimiento/Red/Lista.php';
        }
    }
?>
