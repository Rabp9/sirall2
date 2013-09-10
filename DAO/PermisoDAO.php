<?php
    require_once '/models/Permiso.php';
    require_once '/Libs/BaseDatos.php';
    
    class PermisoDAO {

        public static function getAllPermiso() {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Permiso");
            $result->execute();
            while ($rs = $result->fetch()) {
                $permiso = new Permiso();
                $permiso->setIdPermiso($rs['idPermiso']);
                $permiso->setIdRol($rs['idRol']);
                $permiso->setDescripcion($rs['descripcion']);
                $permisoes[] = $permiso; 
            }
            if(isset($permisoes))
                return $permisoes;
            else
                return false;
        }
        
        public static function crear(Permiso $permiso) {
            $result = BaseDatos::getDbh()->prepare("INSERT INTO Permiso(idRol, descripcion) values(:idRol, :descripcion)");
            $result->bindParam(':idRol', $permiso->getIdRol());
            $result->bindParam(':descripcion', $permiso->getDescripcion());
            return $result->execute();
        }
    }
?>