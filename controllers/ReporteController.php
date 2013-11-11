<?php
    require_once '/DAO/MarcaDAO.php';
    require_once '/DAO/TipoEquipoDAO.php';
    
    class ReporteController {
        public static function ReporteMarcasAction() {
            $marcas = MarcaDAO::getVwMarca();
            $max = count($marcas->fetchAll());
            require_once '/views/Reportes/Marcas.php';
        }               
        
        public static function ReporteMarcasPOSTAction() {
            $marcas = MarcaDAO::getVwMarcaLimit($_POST['numRegistros']);
            require_once '/views/Reportes/MarcasReporte.php';
        }         
        
        public static function ReporteTipoEquiposAction() {
            $tipoEquipos = TipoEquipoDAO::getVwTipoEquipo();
            $max = count($tipoEquipos->fetchAll());
            require_once '/views/Reportes/TipoEquipos.php';
        }               
        
        public static function ReporteTipoEquiposPOSTAction() {
            $tipoEquipos = TipoEquipoDAO::getVwTipoEquipoLimit($_POST['numRegistros']);
            require_once '/views/Reportes/TipoEquiposReporte.php';
        }     
    }
?>