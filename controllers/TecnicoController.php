<?php
    require_once './AppController.php';
    
    class TecnicoController extends AppController {
        
        public static function TecnicoAction() {
            $this->ListaAction();
        }
        
        public static function ListaAction() {
            $tecnicos = 
            require_once '/views/Mantenimiento/Tecnico/Lista.php';
        }

    }
?>
