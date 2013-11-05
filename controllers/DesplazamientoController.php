<?php
    require_once '/DAO/RedDAO.php';
    require_once '/DAO/MarcaDAO.php';
    require_once '/DAO/TipoEquipoDAO.php';
    require_once '/DAO/ModeloDAO.php';
    require_once '/DAO/UsuarioDAO.php';
    require_once '/DAO/DependenciaDAO.php';
    require_once '/DAO/DesplazamientoDAO.php';
    require_once '/DAO/EquipoDAO.php';
  
    class DesplazamientoController {
        public static function DesplazamientoAction() {
            $redes = RedDAO::getAllRed();
            $dependencias = DependenciaDAO::getAllDependencia();
            $equipos = EquipoDAO::getVwEquipo();
            require_once '/views/Desplazamiento/Index.php';
        }        
        
        public static function DesplazamientoByEquipoAction() {      
            if(isset($_GET['codigoPatrimonial'])) {
                $equipo = EquipoDAO::getEquipoByCodigoPatrimonial($_GET['codigoPatrimonial']);
                $modelo = ModeloDAO::getModeloByIdModelo($equipo->getIdModelo());
                $marca = MarcaDAO::getMarcaByIdMarca($modelo->getIdMarca());
                $tipoEquipo = TipoEquipoDAO::getTipoEquipoByIdTipoEquipo($modelo->getIdTipoEquipo());
                $usuario = UsuarioDAO::getUsuarioByIdUsuario($equipo->getIdUsuario());
                $dependencia = DependenciaDAO::getDependenciaByIdDependencia($usuario->getIdDependencia());
                $red = RedDAO::getRedByIdRed($dependencia->getIdRed());
                $redes = RedDAO::getAllRed();
                $dependencias = DependenciaDAO::getAllDependencia();
                $usuarios = UsuarioDAO::getAllUsuario();
                $redes2 = RedDAO::getAllRed();
                $dependencias2 = DependenciaDAO::getAllDependencia();
                $usuarios2 = UsuarioDAO::getAllUsuario();
                require_once '/views/Desplazamiento/Desplazamiento.php';
            }
        }
        
        public static function DesplazamientoPOSTAction() {   
            if(isset($_POST['codigoPatrimonial'])) {
                $equipo = EquipoDAO::getEquipoByCodigoPatrimonial($_POST['codigoPatrimonial']);
                $desplazamiento = new Desplazamiento();
                $desplazamiento->setCodigoPatrimonial($equipo->getCodigoPatrimonial());
                $desplazamiento->setSerie($equipo->getSerie());
                $desplazamiento->setIdOrigen($equipo->getIdUsuario());
                $desplazamiento->setIdDestino($_POST['idUsuario2']);
                $fecha = new DateTime();
                $fecha->createFromFormat('d-m-Y', $_POST['fecha']);
                $desplazamiento->setFecha($fecha->format('Y-m-d'));
                $desplazamiento->setObservacion($_POST['observacion']);
                if(DesplazamientoDAO::realizarDesplazamiento($desplazamiento)) {
                    $modelo = ModeloDAO::getModeloByIdModelo($equipo->getIdModelo());
                    $marca = MarcaDAO::getMarcaByIdMarca($modelo->getIdMarca());
                    $tipoEquipo = TipoEquipoDAO::getTipoEquipoByIdTipoEquipo($modelo->getIdTipoEquipo());
                    $usuarioOrigen = UsuarioDAO::getUsuarioByIdUsuario($equipo->getIdUsuario());
                    $dependenciaOrigen = DependenciaDAO::getDependenciaByIdDependencia($usuarioOrigen->getIdDependencia());
                    $redOrigen = RedDAO::getRedByIdRed($dependenciaOrigen->getIdRed());
                    $usuarioDestino = UsuarioDAO::getUsuarioByIdUsuario($_POST['idUsuario2']);
                    $dependenciaDestino = DependenciaDAO::getDependenciaByIdDependencia($usuarioDestino->getIdDependencia());
                    $redDestino = RedDAO::getRedByIdRed($dependenciaDestino->getIdRed());
                    require_once '/views/Desplazamiento/Confirmacion.php';
                }
            }
        }
    }
?>
