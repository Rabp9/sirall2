<?php
    require_once '/models/Rol.php';
    require_once '/Libs/BaseDatos.php';
    
    class RolDAO {

        public static function getAllRol() {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Rol");
            $result->execute();
            while ($rs = $result->fetch()) {
                $rol = new Rol();
                $rol->setIdRol($rs['idRol']);
                $rol->setDescripcion($rs['descripcion']);
                $roles[] = $rol; 
            }
            if(isset($roles))
                return $roles;
            else
                return false;
        }
        
        public static function getNextID() {
            $result = BaseDatos::getDbh()->prepare("call usp_GetNextIdRol");
            $result->execute();
            $rs = $result->fetch();
            return $rs['nextID'];
        }
        
        
        public static function crear(Rol $rol) {
            $result = BaseDatos::getDbh()->prepare("INSERT INTO Rol(descripcion) values(:descripcion)");
            $result->bindParam(':descripcion', $rol->getDescripcion());
            return $result->execute();
        }
        
        public static function editar(Rol $rol) {
            $result = BaseDatos::getDbh()->prepare("UPDATE Rol SET descripcion = :descripcion WHERE idRol = :idRol");
            $result->bindParam(':descripcion', $rol->getDescripcion());
            $result->bindParam(':idRol', $rol->getIdRol());
            return $result->execute();
        }
        
        public static function eliminar(Rol $rol) {
            $result = BaseDatos::getDbh()->prepare("DELETE FROM Rol WHERE idRol = :idRol");
            $result->bindParam(':idRol', $rol->getIdRol());
            return $result->execute();
        }
        
        public static function getRolByIdRol($idRol) {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Rol where idRol = :idRol");
            $result->bindParam(':idRol', $idRol);
            $result->execute();
            $rs = $result->fetch();
            $rol = new Rol();
            $rol->setIdRol($rs['idRol']);
            $rol->setDescripcion($rs['descripcion']);
            return $rol;
        }
    }
?>