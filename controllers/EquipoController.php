<?php
    require_once '/DAO/EquipoDAO.php';
    require_once '/DAO/MarcaDAO.php';
    require_once '/DAO/TipoEquipoDAO.php';
    require_once '/DAO/ModeloDAO.php';
    require_once '/DAO/RedDAO.php';
    require_once '/DAO/DependenciaDAO.php';
    require_once '/DAO/UsuarioDAO.php';
    require_once '/DAO/DatoDAO.php';
    
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
            $vw_tipoEquipos = TipoEquipoDAO::getVwTipoEquipo();
            $vw_marcas = MarcaDAO::getVwMarca();
            require_once '/views/Mantenimiento/Equipo/Crear.php';
        }
                
        public static function CrearPOSTAction() {
            if(isset($_POST)) {
                $equipo = new Equipo();
                $equipo->setCodigoPatrimonial($_POST['codigoPatrimonial']);
                $equipo->setSerie($_POST['serie']);
                $equipo->setIdModelo($_POST['idModelo']);
                $equipo->setIdUsuario($_POST['idUsuario']);
                $equipo->setIndicacion($_POST['indicacion']);
                $equipo->setEstado(1);
                EquipoDAO::crear($equipo) ?
                    $mensaje = "Equipo guardado correctamente" :
                    $mensaje = "El Equipo no fue guardado correctamente";
                $n_dato = sizeof($_POST['clave']);
                for($i = 0; $i < $n_dato; $i++ ) {
                    if($_POST['clave'][$i] != "") {
                        $dato = new Dato();
                        $dato->setCodigoPatrimonial($equipo->getCodigoPatrimonial());
                        $dato->setSerie($equipo->getSerie());
                        $dato->setClave($_POST['clave'][$i]);
                        $dato->setValor($_POST['valor'][$i]);
                        DatoDAO::crear($dato);
                    }
                }
            }
            $equipos = EquipoDAO::getVwEquipo();
            require_once '/views/Mantenimiento/Equipo/Lista.php';
        }
        
        public static function DetalleAction() {
            if(isset($_GET['codigoPatrimonial'])) {
                $equipo = EquipoDAO::getEquipoByCodigoPatrimonial($_GET['codigoPatrimonial']);
                $modelo = ModeloDAO::getModeloByIdModelo($equipo->getIdModelo());
                $marca = MarcaDAO::getMarcaByIdMarca($modelo->getIdMarca());
                $tipoEquipo = TipoEquipoDAO::getTipoEquipoByIdTipoEquipo($modelo->getIdTipoEquipo());
                $usuario = UsuarioDAO::getUsuarioByIdUsuario($equipo->getIdUsuario());
                $dependencia = DependenciaDAO::getDependenciaByIdDependencia($usuario->getIdDependencia());
                $red = RedDAO::getRedByIdRed($dependencia->getIdRed());
                require_once '/views/Mantenimiento/Equipo/Detalle.php';
            }
        }
        
        public static function EditarAction() {
            if(isset($_GET['codigoPatrimonial'])) {
                $equipo = EquipoDAO::getEquipoByCodigoPatrimonial($_GET['codigoPatrimonial']);
                $modelo = ModeloDAO::getModeloByIdModelo($equipo->getIdModelo());
                $tipoEquipo = TipoEquipoDAO::getTipoEquipoByIdTipoEquipo($modelo->getIdTipoEquipo());
                $marca = MarcaDAO::getMarcaByIdMarca($modelo->getIdMarca());
                $usuario = UsuarioDAO::getUsuarioByIdUsuario($equipo->getIdUsuario());
                $tipoEquipos = TipoEquipoDAO::getAllTipoEquipo();
                $marcas = MarcaDAO::getAllMarca();
                $redes = RedDAO::getAllRed();      
                $dependencias = DependenciaDAO::getAllDependencia();
                $datos = DatoDAO::getDatobyCodigoPatrimonial($equipo->getCodigoPatrimonial());
                $vw_tipoEquipos = TipoEquipoDAO::getVwTipoEquipo();
                $vw_marcas = MarcaDAO::getVwMarca();
                require_once '/views/Mantenimiento/Equipo/Editar.php';
            }
        }
        
        public static function EditarPOSTAction() {
            if(isset($_POST)) {
                $equipo = new Equipo();
                $equipo->setCodigoPatrimonial($_POST['codigoPatrimonial']);
                $equipo->setSerie($_POST['serie']);
                $equipo->setIdModelo($_POST['idModelo']);
                $equipo->setIdUsuario($_POST['idUsuario']);
                $equipo->setIndicacion($_POST['indicacion']);
                $equipo->setEstado(1);
                EquipoDAO::editar($equipo) ?
                    $mensaje = "Equipo modificado correctamente" :
                    $mensaje = "El Equipo no fue modificado correctamente";
                DatoDAO::eliminarbyCodigoPatrimonial($equipo->getCodigoPatrimonial());
                $n_dato = sizeof($_POST['clave']);
                for($i = 0; $i < $n_dato; $i++ ) {
                    if($_POST['clave'][$i] != "") {
                        $dato = new Dato();
                        $dato->setCodigoPatrimonial($equipo->getCodigoPatrimonial());
                        $dato->setSerie($equipo->getSerie());
                        $dato->setClave($_POST['clave'][$i]);
                        $dato->setValor($_POST['valor'][$i]);
                        DatoDAO::crear($dato);
                    }
                }
            }
            $equipos = EquipoDAO::getVwEquipo();
            require_once '/views/Mantenimiento/Equipo/Lista.php';
        }
        
        public static function EliminarAction() {
            if(isset($_GET['codigoPatrimonial'])) {
                $equipo = EquipoDAO::getEquipoByCodigoPatrimonial($_GET['codigoPatrimonial']);
                $modelo = ModeloDAO::getModeloByIdModelo($equipo->getIdModelo());
                $marca = MarcaDAO::getMarcaByIdMarca($modelo->getIdMarca());
                $tipoEquipo = TipoEquipoDAO::getTipoEquipoByIdTipoEquipo($modelo->getIdTipoEquipo());
                $usuario = UsuarioDAO::getUsuarioByIdUsuario($equipo->getIdUsuario());
                $dependencia = DependenciaDAO::getDependenciaByIdDependencia($usuario->getIdDependencia());
                $red = RedDAO::getRedByIdRed($dependencia->getIdRed());
                require_once '/views/Mantenimiento/Equipo/Eliminar.php';
            }
        }
        
        public static function EliminarPOSTAction() {
            if(isset($_POST)) {
                $equipo = new Equipo();
                $equipo->setCodigoPatrimonial($_POST['codigoPatrimonial']);
                EquipoDAO::eliminar($equipo) ?
                    $mensaje = "Equipo eliminado correctamente" :
                    $mensaje = "El Equipo no fue eliminado correctamente";
            }
            $equipos = EquipoDAO::getVwEquipo();
            require_once '/views/Mantenimiento/Equipo/Lista.php';
        }
    }
?>
