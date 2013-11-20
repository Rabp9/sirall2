<?php
    require_once '/controllers/AppController.php';
    
    class TecnicoController implements AppController {
        
        public static function TecnicoAction() {
            TecnicoController::ListaAction();
        }
        
        public static function ListaAction() {
            $tecnicos =
            require_once '/views/Mantenimiento/Tecnico/Lista.php';
        }

    }
?>
