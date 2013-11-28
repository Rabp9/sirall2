<!-- File: /DAO/PermisoDAO.php -->

<?php
    require_once '/DAO/AppDAO.php';
    require_once '/models/Permiso.php';
    require_once '/Libs/BaseDatos.php';
    
    class PermisoDAO implements appDAO {

        public static function getAll() {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Permiso");
            $result->execute();
            while ($rs = $result->fetch()) {
                $permiso = new Permiso();
                $permiso->setIdPermiso($rs['idPermiso']);
                $permiso->setIdRol($rs['idRol']);
                $permiso->setDescripcion($rs['descripcion']);
                $permisos[] = $permiso; 
            }
            return isset($permisos) ? $permisos : false;
        }
               
        public static function getBy($campo, $valor) {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Permiso where $campo = :$campo");
            $result->bindParam(":$campo", $valor);
            $result->execute();
            while ($rs = $result->fetch()) {
                $permiso = new Permiso();
                $permiso->setIdPermiso($rs['idPermiso']);
                $permiso->setIdRol($rs['idRol']);
                $permiso->setDescripcion($rs['descripcion']);
                $permisos[] = $permiso; 
            }
            return isset($permisos) ? $permisos : false;
        }
        
        public static function crear($permiso) {
            $result = BaseDatos::getDbh()->prepare("INSERT INTO Permiso(idRol, descripcion) values(:idRol, :descripcion)");
            $result->bindParam(':idRol', $permiso->getIdRol());
            $result->bindParam(':descripcion', $permiso->getDescripcion());
            return $result->execute();
        }        
         
        public static function editar($permiso) {
        }
        
        public static function eliminar($permiso) {
        }
        
        public static function getUspPermisos($idRol) {
            $result = BaseDatos::getDbh()->prepare("call usp_Permisos(:idRol)");
            $result->bindParam(':idRol', $idRol);
            $result->execute();
            $rs = $result->fetchAll();
            return $rs;
        }       
        
        public static function eliminarbyIdRol($idRol) {
            $result = BaseDatos::getDbh()->prepare("DELETE FROM Permiso WHERE idRol = :idRol");
            $result->bindParam(':idRol', $idRol);
            return$result->execute();
        }
    }
?>