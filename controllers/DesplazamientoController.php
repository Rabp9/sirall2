<!-- File: /controllers/DesplazamientoController.php -->

<?php
    require_once './controllers/AppController.php';
    require_once './DAO/EstablecimientoDAO.php';
    require_once './DAO/MarcaDAO.php';
    require_once './DAO/TipoEquipoDAO.php';
    require_once './DAO/ModeloDAO.php';
    require_once './DAO/UsuarioDAO.php';
    require_once './DAO/DependenciaDAO.php';
    require_once './DAO/DesplazamientoDAO.php';
    require_once './DAO/EquipoDAO.php';
  
    class DesplazamientoController implements AppController {
        public static function DesplazamientoAction() {        
            if(!PermisoDAO::hasPermiso($_SESSION["usuarioActual"], "mdf4")) {
                require_once "views/Home/Error_Permisos.php";
                return;
            }
            $establecimientos = EstablecimientoDAO::getAll();
            $dependencias = DependenciaDAO::getAll();       
            $vwEquipos = PermisoDAO::hasPermiso($_SESSION["usuarioActual"], "restEstablecimiento") ?
                EquipoDAO::getVwEquipo($_SESSION["usuarioActual"]->getIdEstablecimiento()):
                EquipoDAO::getVwEquipo();
            require_once './views/Desplazamiento/index.php';
        }        
        
        public static function DesplazamientoByEquipoAction() {      
            if(isset($_GET['codigoPatrimonial'])) {
                $equipo = current(EquipoDAO::getBy("codigoPatrimonial", $_GET['codigoPatrimonial']));
                $modelo = current(ModeloDAO::getBy("idModelo", $equipo->getIdModelo()));
                $marca = current(MarcaDAO::getBy("idMarca", $modelo->getIdMarca()));
                $tipoEquipo = current(TipoEquipoDAO::getBy("idTipoEquipo", $modelo->getIdTipoEquipo()));
                $usuario = current(UsuarioDAO::getBy("idUsuario", $equipo->getIdUsuario()));
                $dependencia = current(DependenciaDAO::getBy("idDependencia", $usuario->getIdDependencia()));
                $establecimiento = current(EstablecimientoDAO::getBy("idEstablecimiento", $dependencia->getIdEstablecimiento()));
                $establecimientos = EstablecimientoDAO::getAll();
                $dependencias = DependenciaDAO::getAll();
                $usuarios = UsuarioDAO::getAll();
                $establecimientos2 = EstablecimientoDAO::getAll();
                $dependencias2 = DependenciaDAO::getAll();
                $usuarios2 = UsuarioDAO::getAll();
                require_once './views/Desplazamiento/Desplazamiento.php';
            }
        }
        
        public static function DesplazamientoPOSTAction() {   
            if(isset($_POST['codigoPatrimonial'])) {
                $equipo = current(EquipoDAO::getBy("codigoPatrimonial", $_POST['codigoPatrimonial']));
                $desplazamiento = new Desplazamiento();
                $desplazamiento->setCodigoPatrimonial($equipo->getCodigoPatrimonial());
                $desplazamiento->setSerie($equipo->getSerie());
                $desplazamiento->setIdOrigen($equipo->getIdUsuario());
                $desplazamiento->setIdDestino($_POST['idUsuario2']);
                $fecha = new DateTime();
                $fecha->createFromFormat('d-m-Y', $_POST['fecha']);
                $desplazamiento->setFecha($fecha->format('Y-m-d'));
                $desplazamiento->setObservacion($_POST['observacion']);
                $desplazamiento->setUsuario($_SESSION["usuarioActual"]->getUsername());
                if(DesplazamientoDAO::realizarDesplazamiento($desplazamiento)) {
                    $modelo = current(ModeloDAO::getBy("idModelo", $equipo->getIdModelo()));
                    $marca = current(MarcaDAO::getBy("idMarca", $modelo->getIdMarca()));
                    $tipoEquipo = current(TipoEquipoDAO::getBy("idTipoEquipo", $modelo->getIdTipoEquipo()));
                    $usuarioOrigen = current(UsuarioDAO::getBy("idUsuario", $equipo->getIdUsuario()));
                    $dependenciaOrigen = current(DependenciaDAO::getBy("idDependencia", $usuarioOrigen->getIdDependencia()));
                    $establecimientoOrigen = current(EstablecimientoDAO::getBy("idEstablecimiento", $dependenciaOrigen->getIdEstablecimiento()));
                    $usuarioDestino = current(UsuarioDAO::getBy("idUsuario", $_POST['idUsuario2']));
                    $dependenciaDestino = current(DependenciaDAO::getBy("idDependencia", $usuarioDestino->getIdDependencia()));
                    $establecimientoDestino = current(EstablecimientoDAO::getBy("idEstablecimiento", $dependenciaDestino->getIdEstablecimiento()));
                    $mensaje = "Desplazamiento realizado correctamente";
                    require_once './views/Desplazamiento/Confirmacion.php';
                }
            }
        }
    }
?>
