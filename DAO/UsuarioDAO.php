<?php
    require_once '/models/Usuario.php';
    require_once '/Libs/BaseDatos.php';
    
    class UsuarioDAO {
        public static function getAllUsuario() {
            //
        }
        
        public static function getNextID() {
            $result = BaseDatos::getDbh()->prepare("call usp_GetNextIdUsuario");
            $result->execute();
            $rs = $result->fetch();
            return $rs['nextID'];
        }
        
        public static function getVwUsuario() {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM vw_Usuario");
            $result->execute();
            return $result;
        }
        
        public static function crear(Usuario $usuario) {
            $result = BaseDatos::getDbh()->prepare("INSERT INTO Usuario(idDependencia, idRed, idRol, nombres, apellidoPaterno, apellidoMaterno, correo, rpm, anexo, username, password, estado) values(:idDependencia, :idRed, :idRol, :nombres, :apellidoPaterno, :apellidoMaterno, :correo, :rpm, :anexo, :username, :password, :estado)");
            $result->bindParam(':idDependencia', $usuario->getIdDependencia());
            $result->bindParam(':idRed', $usuario->getIdRed());
            $result->bindParam(':idRol', $usuario->getIdRol());
            $result->bindParam(':nombres', $usuario->getNombres());
            $result->bindParam(':apellidoPaterno', $usuario->getApellidoPaterno());
            $result->bindParam(':apellidoMaterno', $usuario->getApellidoMaterno());
            $result->bindParam(':correo', $usuario->getCorreo());
            $result->bindParam(':rpm', $usuario->getRpm());
            $result->bindParam(':anexo', $usuario->getAnexo());
            $result->bindParam(':username', $usuario->getUsername());
            $result->bindParam(':password', $usuario->getPassword());
            $result->bindParam(':estado', $usuario->getEstado());
            return $result->execute();
        }
    }
?>
