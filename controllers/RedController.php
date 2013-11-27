<!-- File: /controllers/RedController.php -->
    
<?php
    require_once '/controllers/AppController.php';
    require_once '/DAO/RedDAO.php';
    
    class RedController implements AppController {
        
        public static function RedAction() {
            RedController::ListaAction();
        }
        
        public static function ListaAction() {
            $redes = RedDAO::getAll();
            require_once '/views/Mantenimiento/Red/Lista.php';
        }
        
        public static function CrearAction() {
            $nextID = RedDAO::getNextID();
            require_once '/views/Mantenimiento/Red/Crear.php';
        }
                
        public static function CrearPOSTAction() {
            if(isset($_POST)) {
                $red = new Red($_POST['idRed'], $_POST['descripcion'], $_POST['direccion'], $_POST['telefono']);
                RedDAO::crear($red) ?
                    $mensaje = "Red guardada correctamente" :
                    $mensaje = "La Red no fue guardada correctamente";
            }
            $redes = RedDAO::getAll();
            $mensaje = "Red guardada correctamente";
            require_once '/views/Mantenimiento/Red/Lista.php';
        }
        
        public static function DetalleAction() {
            if(isset($_GET['idRed'])) {
                $red = current(RedDAO::getBy("idRed", $_GET['idRed']));
                require_once '/views/Mantenimiento/Red/Detalle.php';
            }
        }
        
        public static function EditarAction() {
            if(isset($_GET['idRed'])) {
                $red = current(RedDAO::getBy("idRed", $_GET['idRed']));
                require_once '/views/Mantenimiento/Red/Editar.php';
            }
        }
        
        public static function EditarPOSTAction() {
            if(isset($_POST)) {
                $red = new Red();
                $red->setIdRed($_POST['idRed']);
                $red->setDescripcion($_POST['descripcion']);
                $red->setDireccion($_POST['direccion']);
                $red->setEstado(1);
                RedDAO::editar($red) ?
                    $mensaje = "Red modificada correctamente" :
                    $mensaje = "La Red no fue modificada correctamente";
            }
            $redes = RedDAO::getAll();
            require_once '/views/Mantenimiento/Red/Lista.php';
        }
        
        public static function EliminarAction() {
            if(isset($_GET['idRed'])) {
                $red = current(RedDAO::getBy("idRed", $_GET['idRed']));
                require_once '/views/Mantenimiento/Red/Eliminar.php';
            }
        }
        
        public static function EliminarPOSTAction() {
            if(isset($_POST)) {
                $red = new Red();
                $red->setIdRed($_POST['idRed']);
                RedDAO::eliminar($red) ?
                    $mensaje = "Red eliminada correctamente" :
                    $mensaje = "La Red no fue eliminada correctamente";
            }
            $redes = RedDAO::getAll();
            require_once '/views/Mantenimiento/Red/Lista.php';
        }
        
        private static function redesToXML($redes) {
            $xml = '<?xml version="1.0" encoding="UTF-8"?>';
            $xml .= "\n<Redes>\n";
            if(is_array($redes))
                foreach($redes as $red)
                    $xml .= $red->toXML() . "\n";
            $xml .= "</Redes>\n";
            return $xml;
        }
    }
?>
