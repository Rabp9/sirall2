<!-- File: /DAO/RolDAO.php -->

<?php
    require_once './DAO/AppDAO.php';
    require_once './models/Rol.php';
    require_once './Libs/BaseDatos.php';
    
    class RolDAO implements appDAO {

        public static function getAll() {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Rol");
            $result->execute();
            while ($rs = $result->fetch()) {
                $rol = new Rol();
                $rol->setIdRol($rs['idRol']);
                $rol->setDescripcion($rs['descripcion']);
                $roles[] = $rol; 
            }
            return isset($roles) ? $roles : false;
        }
           
        public static function getBy($campo, $valor) {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Rol where $campo = :$campo");
            $result->bindParam(":$campo", $valor);
            $result->execute();
            while ($rs = $result->fetch()) {
                $rol = new Rol();
                $rol->setIdRol($rs['idRol']);
                $rol->setDescripcion($rs['descripcion']);
                $roles[] = $rol; 
            }
            return isset($roles) ? $roles : false;
        }
        
        public static function crear($rol) {
            $result = BaseDatos::getDbh()->prepare("INSERT INTO Rol(descripcion) values(:descripcion)");
            $result->bindParam(':descripcion', $rol->getDescripcion());
            return $result->execute();
        }
                
        public static function editar($rol) {
            $result = BaseDatos::getDbh()->prepare("UPDATE Rol SET descripcion = :descripcion WHERE idRol = :idRol");
            $result->bindParam(':descripcion', $rol->getDescripcion());
            $result->bindParam(':idRol', $rol->getIdRol());
            return $result->execute();
        }
        
        public static function eliminar($rol) {
            $result = BaseDatos::getDbh()->prepare("DELETE FROM Rol WHERE idRol = :idRol");
            $result->bindParam(':idRol', $rol->getIdRol());
            return $result->execute();
        }
        
        public static function getNextID() {
            $result = BaseDatos::getDbh()->prepare("call usp_GetNextIdRol");
            $result->execute();
            $rs = $result->fetch();
            return $rs['nextID'];
        }
        
    }
?>