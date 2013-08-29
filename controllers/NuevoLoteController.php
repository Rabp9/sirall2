<?php
    require_once '/DAO/MarcaDAO.php';
    
    class NuevoLoteController {
        public static function NuevoLoteAction() {
            $marcas = MarcaDAO::getAllMarca();
            require_once '/views/Nuevo Lote/Index.php';
        }
    }
?>
