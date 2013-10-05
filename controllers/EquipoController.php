<?php
    require_once '/DAO/EquipoDAO.php';
    require_once '/DAO/MarcaDAO.php';
    require_once '/DAO/TipoEquipoDAO.php';
    require_once '/DAO/ModeloDAO.php';
    require_once '/DAO/RedDAO.php';
    require_once '/DAO/DependenciaDAO.php';
    require_once '/DAO/UsuarioDAO.php';
    
    class EquipoController {
        public static function EquipoAction() {
            $equipos = EquipoDAO::getVwEquipo();
            require_once '/views/Mantenimiento/Equipo/Lista.php';
        }

        public static function CrearAction() {
            $nextID = EquipoDAO::getNextID();
            $tipoEquipos = TipoEquipoDAO::getAllTipoEquipo();
            $marcas = MarcaDAO::getAllMarca();
            $redes = RedDAO::getAllRed();
            $dependencias = DependenciaDAO::getAllDependencia();
            $usuarios = UsuarioDAO::getAllUsuario();
            require_once '/views/Mantenimiento/Equipo/Crear.php';
        }
                
        public static function CrearPOSTAction() {
            if(isset($_POST)) {
                $equipo = new Equipo();
                $equipo->setCodigoPatrimonial($_POST['codigoPatrimonial']);
                $equipo->setSerie($_POST['serie']);
                $equipo->setIdModelo($_POST['idModelo']);
                $equipo->setIdMarca($_POST['idMarca']);
                $equipo->setIdTipoEquipo($_POST['idTipoEquipo']);
                $equipo->setIdUsuario($_POST['idUsuario']);
                $equipo->setIdDependencia($_POST['idDependencia']);
                $equipo->setIdRed($_POST['idRed']);
                $equipo->setIndicacion($_POST['indicacion']);
                $equipo->setEstado('activo');
                EquipoDAO::crear($equipo) ?
                    $mensaje = "Equipo guardado correctamente" :
                    $mensaje = "El Equipo no fue guardado correctamente";
            }
            $equipos = EquipoDAO::getVwEquipo();
            require_once '/views/Mantenimiento/Equipo/Lista.php';
        }
        
        public static function DetalleAction() {
            if(isset($_GET['codigoPatrimonial'])) {
                $equipo = EquipoDAO::getEquipoByCodigoPatrimonial($_GET['codigoPatrimonial']);
                $modelo = ModeloDAO::getModeloByIdModelo($equipo->getIdModelo());
                $marca = MarcaDAO::getMarcaByIdMarca($equipo->getIdMarca());
                $tipoEquipo = TipoEquipoDAO::getTipoEquipoByIdTipoEquipo($equipo->getIdTipoEquipo());
                $usuario = UsuarioDAO::getUsuarioByIdUsuario($equipo->getIdUsuario());
                $dependencia = DependenciaDAO::getDependenciaByIdDependencia($equipo->getIdDependencia());
                $red = RedDAO::getRedByIdRed($equipo->getIdRed());
                require_once '/views/Mantenimiento/Equipo/Detalle.php';
            }
        }
        
        public static function EditarAction() {
            if(isset($_GET['codigoPatrimonial'])) {
                $equipo = EquipoDAO::getEquipoByCodigoPatrimonial($_GET['codigoPatrimonial']);
                $tipoEquipos = TipoEquipoDAO::getAllTipoEquipo();
                //$marcas = MarcaDAO::getAllMarca();
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
            if(isset($_GET['codigoPatrimonial'])) {
                $equipo = EquipoDAO::getEquipoByCodigoPatrimonial($_GET['codigoPatrimonial']);
                $modelo = ModeloDAO::getModeloByIdModelo($equipo->getIdModelo());
                $marca = MarcaDAO::getMarcaByIdMarca($equipo->getIdMarca());
                $tipoEquipo = TipoEquipoDAO::getTipoEquipoByIdTipoEquipo($equipo->getIdTipoEquipo());
                $usuario = UsuarioDAO::getUsuarioByIdUsuario($equipo->getIdUsuario());
                $dependencia = DependenciaDAO::getDependenciaByIdDependencia($equipo->getIdDependencia());
                $red = RedDAO::getRedByIdRed($equipo->getIdRed());
                require_once '/views/Mantenimiento/Equipo/Eliminar.php';
            }
        }
        
        public static function EliminarPOSTAction() {
            if(isset($_POST)) {
                $equipo = new Equipo();
                $equipo->setCodigoPatrimonial($_POST['codigoPatrimonial']);
                EquipoDAO::eliminar($equipo);
            }
            $equipos = EquipoDAO::getVwEquipo();
            $mensaje = "Equipo eliminada correctamente";
            require_once '/views/Mantenimiento/Equipo/Lista.php';
        }
    }
?>
