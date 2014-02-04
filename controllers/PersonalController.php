<!-- File: /controllers/PersonalController.php -->
    
<?php
    require_once './controllers/AppController.php';
    require_once './DAO/PersonalDAO.php';
    require_once './DAO/EstablecimientoDAO.php';
    require_once './DAO/PersonalAreaDetalleDAO.php';
    require_once './DAO/AreaDAO.php';
    require_once './DAO/RolDAO.php';
    
    class PersonalController implements AppController {
        
        public static function PersonalAction() {
            PersonalController::ListaAction();
        }
        
        public static function ListaAction() {
            if(!PermisoDAO::hasPermiso($_SESSION["usuarioActual"], "mst6")) {
                require_once "views/Home/Error_Permisos.php";
                return;
            }
            $vwPersonales = PersonalDAO::getVwPersonal();
            require_once './views/Mantenimiento/Personal/Lista.php';
        }
        
        public static function CrearAction() {
            if(!PermisoDAO::hasPermiso($_SESSION["usuarioActual"], "mdf6")) {
                require_once "views/Home/Error_Permisos.php";
                return;
            }
            require_once './views/Mantenimiento/Personal/Crear.php';
        }
        
        public static function CrearPOSTAction() {
            if(isset($_POST)) {
                $personal = new Personal();
                $personal->setIdPersonal($_POST['idPersonal']);
                $personal->setNombres($_POST['nombres']);
                $personal->setApellidoPaterno($_POST['apellidoPaterno']);
                $personal->setApellidoMaterno($_POST['apellidoMaterno']);
                $personal->setCorreo($_POST['correo']);
                $personal->setRpm($_POST['rpm']);
                $personal->setAnexo($_POST['anexo']);
                $personal->activar();
                PersonalDAO::crear($personal) ?
                    $mensaje = "Personal guardado correctamente" :
                    $mensaje = "El Personal no fue guardado correctamente";
            }
            $vwPersonales = PersonalDAO::getVwPersonal();
            require_once './views/Mantenimiento/Personal/Lista.php';
        }
        
        public static function DetalleAction() {
            if(!PermisoDAO::hasPermiso($_SESSION["usuarioActual"], "mst6")) {
                require_once "views/Home/Error_Permisos.php";
                return;
            }
            if(isset($_GET['idPersonal'])) {
                $vwPersonal = current(PersonalDAO::getVwBy("idPersonal", $_GET['idPersonal']));
                require_once './views/Mantenimiento/Personal/Detalle.php';
            }
        }
        
        public static function EditarAction() {
            if(!PermisoDAO::hasPermiso($_SESSION["usuarioActual"], "mdf6")) {
                require_once "views/Home/Error_Permisos.php";
                return;
            }
            if(isset($_GET['idPersonal'])) {
                $personal = current(PersonalDAO::getBy("idPersonal", $_GET['idPersonal']));
                require_once './views/Mantenimiento/Personal/Editar.php';
            }
        }
        
        public static function EditarPOSTAction() {
            if(isset($_POST)) {
               $personal = new Personal();
                $personal->setIdPersonal($_POST['idPersonal']);
                $personal->setNombres($_POST['nombres']);
                $personal->setApellidoPaterno($_POST['apellidoPaterno']);
                $personal->setApellidoMaterno($_POST['apellidoMaterno']);
                $personal->setCorreo($_POST['correo']);
                $personal->setRpm($_POST['rpm']);
                $personal->setAnexo($_POST['anexo']);
                $personal->activar();
                PersonalDAO::editar($personal) ?
                    $mensaje = "Personal modificado correctamente" :
                    $mensaje = "El Personal no fue modificado correctamente";
            }
            $vwPersonales = PersonalDAO::getVwPersonal();
            require_once './views/Mantenimiento/Personal/Lista.php';
        }
        
        public static function EliminarAction() {
            if(!PermisoDAO::hasPermiso($_SESSION["usuarioActual"], "elm6")) {
                require_once "views/Home/Error_Permisos.php";
                return;
            }
            if(isset($_GET['idPersonal'])) {
                $vwPersonal = current(PersonalDAO::getVwBy("idPersonal", $_GET['idPersonal']));
                require_once './views/Mantenimiento/Personal/Eliminar.php';
            }
        }
        
        public static function EliminarPOSTAction() {
            if(isset($_POST)) {
                $personal = new Personal();
                $personal->setIdPersonal($_POST['idPersonal']);
                PersonalDAO::eliminar($personal) ?
                    $mensaje = "Personal eliminado correctamente" :
                    $mensaje = "El Personal no fue eliminado correctamente";
            }
            $vwPersonales = PersonalDAO::getVwPersonal();
            require_once './views/Mantenimiento/Personal/Lista.php';
        }
        
        public static function usuarioAJAXAction() {
            if(isset($_GET['idDependencia'])) {
                $usuarios = UsuarioDAO::getBy("idDependencia", $_GET['idDependencia']);
                $dependencia = current(DependenciaDAO::getBy("idDependencia", $_GET["idDependencia"]));
                $usuariosDependenciaSuperior = UsuarioDAO::getBy("idDependencia", $dependencia->getSuperIdDependencia());
                echo self::usuariosToXML($usuarios);
                echo self::usuariosToXML($usuariosDependenciaSuperior);
            }   
        }
        
        private static function usuariosToXML($usuarios) {
            $xml = '<?xml version="1.0" encoding="UTF-8"?>';
            $xml .= "\n<Usuarios>\n";
            if(is_array($usuarios))
                foreach($usuarios as $usuario)
                    $xml .= $usuario->toXML() . "\n";
            $xml .= "</Usuarios>\n";
            return $xml;
        }    
    }
?>
