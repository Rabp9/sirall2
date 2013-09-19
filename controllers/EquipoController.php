<?php
    require_once '/DAO/EquipoDAO.php';
    require_once '/DAO/MarcaDAO.php';
    require_once '/DAO/TipoEquipoDAO.php';
    require_once '/DAO/ModeloDAO.php';
    require_once '/DAO/RedDAO.php';
    require_once '/DAO/DependenciaDAO.php';
    
    class EquipoController {
        public static function EquipoAction() {
            $equipos = EquipoDAO::getVwEquipo();
            require_once '/views/Mantenimiento/Equipo/Lista.php';
        }

        public static function CrearAction() {
            $nextID = EquipoDAO::getNextID();
            $tipoEquipos = TipoEquipoDAO::getAllTipoEquipo();
            $marcas = MarcaDAO::getAllMarca();
            $modelos = ModeloDAO::getAllModelo();
            $redes = RedDAO::getAllRed();
            $dependencias = DependenciaDAO::getAllDependencia();
            require_once '/views/Mantenimiento/Equipo/Crear.php';
        }
                
        public static function CrearPOSTAction() {
            if(isset($_POST)) {
                $equipo = new Equipo();
                $equipo->setIdEquipo($_POST['idEquipo']);
                $equipo->setIdTipoEquipo($_POST['idTipoEquipo']);
                $equipo->setIdMarca($_POST['idMarca']);
                $equipo->setDescripcion($_POST['descripcion']);
                $equipo->setIndicacion($_POST['indicacion']);
                EquipoDAO::crear($equipo);
            }
            $equipos = EquipoDAO::getVwEquipo();
            $mensaje = "Equipo guardada correctamente";
            require_once '/views/Mantenimiento/Equipo/Lista.php';
        }
        
        public static function DetalleAction() {
            if(isset($_GET['idEquipo'])) {
                $equipo = EquipoDAO::getEquipoByIdEquipo($_GET['idEquipo']);
                $tipoEquipo = TipoEquipoDAO::getTipoEquipoByIdTipoEquipo($equipo->getIdTipoEquipo());
                $marca = MarcaDAO::getMarcaByIdMarca($equipo->getIdMarca());
                require_once '/views/Mantenimiento/Equipo/Detalle.php';
            }
        }
        
        public static function EditarAction() {
            if(isset($_GET['idEquipo'])) {
                $equipo = EquipoDAO::getEquipoByIdEquipo($_GET['idEquipo']);
                $tipoEquipos = TipoEquipoDAO::getAllTipoEquipo();
                $marcas = MarcaDAO::getAllMarca();
                require_once '/views/Mantenimiento/Equipo/Editar.php';
            }
        }
        
        public static function EditarPOSTAction() {
            if(isset($_POST)) {
                $equipo = new Equipo();
                $equipo->setIdEquipo($_POST['idEquipo']);
                $equipo->setIdTipoEquipo($_POST['idTipoEquipo']);
                $equipo->setIdMarca($_POST['idMarca']);
                $equipo->setDescripcion($_POST['descripcion']);
                $equipo->setIndicacion($_POST['indicacion']);
                EquipoDAO::editar($equipo);
            }
            $equipos = EquipoDAO::getVwEquipo();
            $mensaje = "Equipo modificado correctamente";
            require_once '/views/Mantenimiento/Equipo/Lista.php';
        }
        
        public static function EliminarAction() {
            if(isset($_GET['idEquipo'])) {
                $equipo = EquipoDAO::getEquipoByIdEquipo($_GET['idEquipo']);
                $tipoEquipo = TipoEquipoDAO::getTipoEquipoByIdTipoEquipo($equipo->getIdTipoEquipo());
                $marca = MarcaDAO::getMarcaByIdMarca($equipo->getIdMarca());
                require_once '/views/Mantenimiento/Equipo/Eliminar.php';
            }
        }
        
        public static function EliminarPOSTAction() {
            if(isset($_POST)) {
                $equipo = new Equipo();
                $equipo->setIdEquipo($_POST['idEquipo']);
                EquipoDAO::eliminar($equipo);
            }
            $equipos = EquipoDAO::getVwEquipo();
            $mensaje = "Equipo eliminada correctamente";
            require_once '/views/Mantenimiento/Equipo/Lista.php';
        }
    }
?>
