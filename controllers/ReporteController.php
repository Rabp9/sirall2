<?php
    require_once '/DAO/MarcaDAO.php';
    require_once '/DAO/TipoEquipoDAO.php';
    require_once '/DAO/ModeloDAO.php';
    require_once '/DAO/EquipoDAO.php';
    require_once '/DAO/RepuestoDAO.php';
    require_once '/DAO/UsuarioDAO.php';
    
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
        
        public static function ReporteModelosAction() {
            $modelos = ModeloDAO::getVwModelo();
            $max = count($modelos->fetchAll());
            require_once '/views/Reportes/Modelos.php';
        }
        
        public static function ReporteModelosPOSTAction() {
            $modelos = ModeloDAO::getVwModeloLimit($_POST['numRegistros']);
            require_once '/views/Reportes/ModelosReporte.php';
        }     
        
        public static function ReporteEquiposAction() {
            $equipos = EquipoDAO::getVwEquipo();
            $max = count($equipos->fetchAll());
            require_once '/views/Reportes/Equipos.php';
        }
        
        public static function ReporteEquiposPOSTAction() {
            $equipos = EquipoDAO::getVwEquipoLimit($_POST['numRegistros']);
            require_once '/views/Reportes/EquiposReporte.php';
        }     
                
        public static function ReporteRepuestosAction() {
            $repuestos = RepuestoDAO::getVwRepuesto();
            $max = count($repuestos->fetchAll());
            require_once '/views/Reportes/Repuestos.php';
        }
        
        public static function ReporteRepuestosPOSTAction() {
            $repuestos = RepuestoDAO::getVwRepuestoLimit($_POST['numRegistros']);
            require_once '/views/Reportes/RepuestosReporte.php';
        }
               
        public static function ReporteUsuariosAction() {
            $usuarios = UsuarioDAO::getVwUsuario();
            $max = count($usuarios->fetchAll());
            require_once '/views/Reportes/Usuarios.php';
        }
        
        public static function ReporteUsuariosPOSTAction() {
            $usuarios = UsuarioDAO::getVwUsuarioLimit($_POST['numRegistros']);
            require_once '/views/Reportes/UsuariosReporte.php';
        }     
    }
?>