<?php
    require_once '/DAO/DesplazamientoDAO.php';
    
    class DesplazamientoController {
        public static function DesplazamientoAction() {
            $equipos = EquipoDAO::getVwEquipo();
            require_once '/views/Desplazamiento/Index.php';
        }
    }
?>
