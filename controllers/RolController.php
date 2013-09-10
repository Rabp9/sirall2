<?php
    require_once '/DAO/RolDAO.php';
    
    class RolController {
        public static function RolAction() {
            $roles = RolDAO::getAllRol();
            require_once '/views/Mantenimiento/Rol/Lista.php';
        }
        
        public static function CrearAction() {
            $nextID = RolDAO::getNextID();
            require_once '/views/Mantenimiento/Rol/Crear.php';
        }
        
        public static function CrearPOSTAction() {
            if(isset($_POST)) {
                $rol = new Rol();
                $rol->setIdRol($_POST['idRol']);
                $rol->setDescripcion($_POST['descripcion']);
                RolDAO::crear($rol);
            }
            $roles = RolDAO::getAllRol();
            $mensaje = "Rol guardada correctamente";
            require_once '/views/Mantenimiento/Rol/Lista.php';
        }
    }
?>
