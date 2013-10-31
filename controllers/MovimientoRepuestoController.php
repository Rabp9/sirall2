<?php
    require_once '/DAO/RepuestoDAO.php';
    
    class MovimientoRepuestoController {
        public static function IngresoAction() {
            $repuestos = RepuestoDAO::getAllRepuesto();
            $vw_repuestos = RepuestoDAO::getVwRepuesto();
            require_once '/views/Movimiento Repuesto/Ingreso.php';
        }        
        
        public static function IngresoPOSTAction() {
            if(isset($_POST)) {
                $repuesto = RepuestoDAO::getRepuestoByIdRepuesto($_POST['idRepuesto']);
                $ingresoRepuesto = new IngresoRepuesto();
                $ingresoRepuesto->setIdRepuesto($repuesto->getIdRepuesto());
                $ingresoRepuesto->setCantidad($_POST['cantidad']);
                $fecha = new DateTime();
                $fecha->createFromFormat('d-m-Y', $_POST['fecha']);
                $ingresoRepuesto->setFecha($fecha->format('Y-m-d'));
                $ingresoRepuesto->setObservacion($_POST['observacion']);
                if(RepuestoDAO::ingreso($ingresoRepuesto))
                    require_once '/views/Movimiento Repuesto/ConfirmacionIngreso.php';
            }
        }
        
        public static function SalidaAction() {
            $repuestos = RepuestoDAO::getAllRepuesto();
            $vw_repuestos = RepuestoDAO::getVwRepuesto();
            require_once '/views/Movimiento Repuesto/Salida.php';
        }
        
        public static function SalidaPOSTAction() {
            if(isset($_POST)) {
                $repuesto = RepuestoDAO::getRepuestoByIdRepuesto($_POST['idRepuesto']);
                $salidaRepuesto = new SalidaRepuesto();
                $salidaRepuesto->setIdRepuesto($repuesto->getIdRepuesto());
                $salidaRepuesto->setCantidad($_POST['cantidad']);
                $fecha = new DateTime();
                $fecha->createFromFormat('d-m-Y', $_POST['fecha']);
                $salidaRepuesto->setFecha($fecha->format('Y-m-d'));
                $salidaRepuesto->setObservacion($_POST['observacion']);
                if(RepuestoDAO::salida($salidaRepuesto))
                    require_once '/views/Movimiento Repuesto/ConfirmacionSalida.php';
            }
        }
    }
?>
