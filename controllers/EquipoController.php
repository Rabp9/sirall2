<!-- File: /controllers/EquipoController.php -->

<?php
    require_once './controllers/AppController.php';
    require_once './DAO/EquipoDAO.php';
    require_once './DAO/UsuarioEquipoDetalleDAO.php';
    require_once './DAO/MarcaDAO.php';
    require_once './DAO/TipoEquipoDAO.php';
    require_once './DAO/ModeloDAO.php';
    require_once './DAO/EstablecimientoDAO.php';
    require_once './DAO/DependenciaDAO.php';
    require_once './DAO/UsuarioDAO.php';
    require_once './DAO/DatoDAO.php';
    
    class EquipoController implements AppController {
        
        public static function EquipoAction() {
            EquipoController::ListaAction();
        }
        
        public static function ListaAction() {
            if(!PermisoDAO::hasPermiso($_SESSION["usuarioActual"], "mst4")) {
                require_once "views/Home/Error_Permisos.php";
                return;
            }
            $vwEquipos = PermisoDAO::hasPermiso($_SESSION["usuarioActual"], "restEstablecimiento") ?
                EquipoDAO::getVwEquipo($_SESSION["usuarioActual"]->getIdEstablecimiento()):
                EquipoDAO::getVwEquipo();
            require_once './views/Mantenimiento/Equipo/Lista.php';
        }
        
        public static function CrearAction() {
            if(!PermisoDAO::hasPermiso($_SESSION["usuarioActual"], "mdf4")) {
                require_once "views/Home/Error_Permisos.php";
                return;
            }
            $nextID = EquipoDAO::getNextID();
            $tipoEquipos = TipoEquipoDAO::getAll();
            $marcas = MarcaDAO::getAll();
            $establecimientos = EstablecimientoDAO::getAll();
            $dependencias = DependenciaDAO::getAll();
            $usuarios = UsuarioDAO::getAll();
            $vwTipoEquipos = TipoEquipoDAO::getVwTipoEquipo();
            $vwMarcas = MarcaDAO::getVwMarca();
            require_once './views/Mantenimiento/Equipo/Crear.php';
        }
                
        public static function CrearPOSTAction() {
            if(isset($_POST)) {
                $equipo = new Equipo();
                $equipo->setCodigoPatrimonial($_POST['codigoPatrimonial']);
                $equipo->setSerie($_POST['serie']);
                $equipo->setIdModelo($_POST['idModelo']);
                $equipo->setIndicacion($_POST['indicacion']);
                $equipo->setUsuario($_SESSION["usuarioActual"]->getUsername());
                $fecha = new DateTime();
                $equipo->setFechaRegistro($fecha->format('Y-m-d'));
                $fecha = DateTime::createFromFormat('d/m/Y', $_POST["fechaIngreso"]);
                if($_POST["fechaIngreso"] == "")
                    $equipo->setFechaIngreso(null);
                else
                    $equipo->setFechaIngreso($fecha->format('Y-m-d'));
                $fecha = DateTime::createFromFormat('d/m/Y', $_POST["fechaGarantia"]);
                if($_POST["fechaGarantia"] == "")
                    $equipo->setFechaGarantia(null);
                else
                    $equipo->setFechaGarantia($fecha->format('Y-m-d'));
                $equipo->activar();
                if(EquipoDAO::crear($equipo)) {
                    $mensaje = "Equipo guardado correctamente"; 
                    $usuarioEquipoDetalle = new UsuarioEquipoDetalle();
                    $usuarioEquipoDetalle->setCodigoPatrimonial($equipo->getCodigoPatrimonial());
                    $usuarioEquipoDetalle->setSerie($equipo->getSerie());
                    $usuarioEquipoDetalle->setIdDependencia($_POST["idDependencia"]);
                    $fecha = new DateTime();
                    $usuarioEquipoDetalle->setFechaInicio($fecha->format('Y-m-d'));
                    $usuarioEquipoDetalle->activar();
                    if(isset($_POST['designarUsuario']))
                       $usuarioEquipoDetalle->setIdUsuario($_POST["idUsuario"]);
                    else
                       $usuarioEquipoDetalle->setIdUsuario("U9999");
                   UsuarioEquipoDetalleDAO::crear($usuarioEquipoDetalle);
                }
                else {
                    $mensaje = "El Equipo no fue guardado correctamente";
                }
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
            $vwEquipos = PermisoDAO::hasPermiso($_SESSION["usuarioActual"], "restEstablecimiento") ?
                EquipoDAO::getVwEquipo($_SESSION["usuarioActual"]->getIdEstablecimiento()):
                EquipoDAO::getVwEquipo();
            require_once './views/Mantenimiento/Equipo/Lista.php';
        }
        
        public static function DetalleAction() {
            if(!PermisoDAO::hasPermiso($_SESSION["usuarioActual"], "mst4")) {
                require_once "views/Home/Error_Permisos.php";
                return;
            }
            if(isset($_GET['codigoPatrimonial'])) {
                $equipo = current(EquipoDAO::getBy("codigoPatrimonial", $_GET['codigoPatrimonial']));
                $modelo = current(ModeloDAO::getBy("idModelo", $equipo->getIdModelo()));
                $marca = current(MarcaDAO::getBy("idMarca", $modelo->getIdMarca()));
                $tipoEquipo = current(TipoEquipoDAO::getBy("idTipoEquipo", $modelo->getIdTipoEquipo()));
                $usuario = current(UsuarioDAO::getBy("idUsuario", $equipo->getIdUsuario()));
                $dependencia = current(DependenciaDAO::getBy("idDependencia", $usuario->getIdDependencia()));
                $establecimiento = current(EstablecimientoDAO::getBy("idEstablecimiento", $dependencia->getIdEstablecimiento()));
                require_once './views/Mantenimiento/Equipo/Detalle.php';
            }
        }
        
        public static function EditarAction() {
            if(!PermisoDAO::hasPermiso($_SESSION["usuarioActual"], "mdf4")) {
                require_once "views/Home/Error_Permisos.php";
                return;
            }
            if(isset($_GET['codigoPatrimonial'])) {
                $equipo = current(EquipoDAO::getBy("codigoPatrimonial", $_GET['codigoPatrimonial']));
                $modelo = current(ModeloDAO::getBy("idModelo", $equipo->getIdModelo()));
                $marca = current(MarcaDAO::getBy("idMarca", $modelo->getIdMarca()));
                $tipoEquipo = current(TipoEquipoDAO::getBy("idTipoEquipo", $modelo->getIdTipoEquipo()));
                $usuario = current(UsuarioDAO::getBy("idUsuario", $equipo->getIdUsuario()));
                $tipoEquipos = TipoEquipoDAO::getAll();
                $marcas = MarcaDAO::getAll();
                $establecimientos = EstablecimientoDAO::getAll();      
                $dependencias = DependenciaDAO::getAll();
                $datos = DatoDAO::getBy("codigoPatrimonial", $equipo->getCodigoPatrimonial());
                $vwTipoEquipos = TipoEquipoDAO::getVwTipoEquipo();
                $vwMarcas = MarcaDAO::getVwMarca();
                require_once './views/Mantenimiento/Equipo/Editar.php';
            }
        }
        
        public static function EditarPOSTAction() {
            if(isset($_POST)) {
                $equipo = new Equipo();
                $equipo->setCodigoPatrimonial($_POST['codigoPatrimonial']);
                $equipo->setSerie($_POST['serie']);
                $equipo->setIdModelo($_POST['idModelo']);
                $equipo->setIdUsuario($_POST['idUsuario']);
                $equipo->setUsuario($_SESSION["usuarioActual"]->getUsername());
                $equipo->setIndicacion($_POST['indicacion']);
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
            $vwEquipos = PermisoDAO::hasPermiso($_SESSION["usuarioActual"], "restEstablecimiento") ?
                EquipoDAO::getVwEquipo($_SESSION["usuarioActual"]->getIdEstablecimiento()):
                EquipoDAO::getVwEquipo();
            require_once './views/Mantenimiento/Equipo/Lista.php';
        }
        
        public static function EliminarAction() {
            if(!PermisoDAO::hasPermiso($_SESSION["usuarioActual"], "elm4")) {
                require_once "views/Home/Error_Permisos.php";
                return;
            }
            if(isset($_GET['codigoPatrimonial'])) {
                $equipo = current(EquipoDAO::getBy("codigoPatrimonial", $_GET['codigoPatrimonial']));
                $modelo = current(ModeloDAO::getBy("idModelo", $equipo->getIdModelo()));
                $marca = current(MarcaDAO::getBy("idMarca", $modelo->getIdMarca()));
                $tipoEquipo = current(TipoEquipoDAO::getBy("idTipoEquipo", $modelo->getIdTipoEquipo()));
                $usuario = current(UsuarioDAO::getBy("idUsuario", $equipo->getIdUsuario()));
                $dependencia = current(DependenciaDAO::getBy("idDependencia", $usuario->getIdDependencia()));
                $establecimiento = current(EstablecimientoDAO::getBy("idEstablecimiento", $dependencia->getIdEstablecimiento()));
                require_once './views/Mantenimiento/Equipo/Eliminar.php';
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
            $vwEquipos = PermisoDAO::hasPermiso($_SESSION["usuarioActual"], "restEstablecimiento") ?
                EquipoDAO::getVwEquipo($_SESSION["usuarioActual"]->getIdEstablecimiento()):
                EquipoDAO::getVwEquipo();
            require_once './views/Mantenimiento/Equipo/Lista.php';
        }
        
    }
?>
