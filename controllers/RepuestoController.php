<?php
    require_once '/DAO/RepuestoDAO.php';
    
    class RepuestoController {
        public static function RepuestoAction() {
            $repuestos = RepuestoDAO::getAllRepuesto();
            require_once '/views/Mantenimiento/Repuesto/Lista.php';
        }

        public static function CrearAction() {
            $nextID = RepuestoDAO::getNextID();
            require_once '/views/Mantenimiento/Repuesto/Crear.php';
        }
                
        public static function CrearPOSTAction() {
            if(isset($_POST)) {
                $repuesto = new Repuesto();
                $repuesto->setIdRepuesto($_POST['idRepuesto']);
                $repuesto->setDescripcion($_POST['descripcion']);
                $repuesto->setUnidadMedida($_POST['unidadMedida']);
                RepuestoDAO::crear($repuesto) ?
                    $mensaje = "Repuesto guardado correctamente" :
                    $mensaje = "El Repuesto no fue guardada correctamente";
            }
            $repuestos = RepuestoDAO::getAllRepuesto();
            $mensaje = "Repuesto guardada correctamente";
            require_once '/views/Mantenimiento/Repuesto/Lista.php';
        }
        
        public static function DetalleAction() {
            if(isset($_GET['idRepuesto'])) {
                $repuesto = RepuestoDAO::getRepuestoByIdRepuesto($_GET['idRepuesto']);
                require_once '/views/Mantenimiento/Repuesto/Detalle.php';
            }
        }
        
        public static function EditarAction() {
            if(isset($_GET['idRepuesto'])) {
                $repuesto = RepuestoDAO::getRepuestoByIdRepuesto($_GET['idRepuesto']);
                require_once '/views/Mantenimiento/Repuesto/Editar.php';
            }
        }
        
        public static function EditarPOSTAction() {
            if(isset($_POST)) {
                $repuesto = new Repuesto();
                $repuesto->setIdRepuesto($_POST['idRepuesto']);
                $repuesto->setDescripcion($_POST['descripcion']);
                $repuesto->setUnidadMedida($_POST['unidadMedida']);
                RepuestoDAO::editar($repuesto) ?
                    $mensaje = "Repuesto modificado correctamente" :
                    $mensaje = "Erootl Repuesto no fue modificado correctamente";
            }
            $repuestos = RepuestoDAO::getAllRepuesto();
            require_once '/views/Mantenimiento/Repuesto/Lista.php';
        }
        
        public static function EliminarAction() {
            if(isset($_GET['idRepuesto'])) {
                $repuesto = RepuestoDAO::getRepuestoByIdRepuesto($_GET['idRepuesto']);
                require_once '/views/Mantenimiento/Repuesto/Eliminar.php';
            }
        }
        
        public static function EliminarPOSTAction() {
            if(isset($_POST)) {
                $repuesto = new Repuesto();
                $repuesto->setIdRepuesto($_POST['idRepuesto']);
                RepuestoDAO::eliminar($repuesto) ?
                    $mensaje = "Repuesto eliminado correctamente" :
                    $mensaje = "El Repuesto no fue eliminado correctamente";
            }
            $repuestos = RepuestoDAO::getAllRepuesto();
            require_once '/views/Mantenimiento/Repuesto/Lista.php';
        }
        
        private static function repuestoesToXML($repuestos) {
            $xml = '<?xml version="1.0" encoding="UTF-8"?>';
            $xml .= "\n<Repuestos>\n";
            if(is_array($repuestos))
                foreach($repuestos as $repuesto)
                    $xml .= $repuesto->toXML() . "\n";
            $xml .= "</Repuestos>\n";
            return $xml;
        }    
    }
?>
