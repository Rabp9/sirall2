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
            $n = $rs['nextID'] + 1;
            if($n < 10) 
                return 'U000' . $n;
            elseif ($n < 100)
                return 'U00' . $n;
            elseif ($n < 1000)
                return 'U0' . $n;
            else
                return 'U' . $n;
        }
        
        public static function getVwUsuario() {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM vw_Usuario");
            $result->execute();
            return $result;
        }
        
        public static function crear(Usuario $usuario) {
            $result = BaseDatos::getDbh()->prepare("INSERT INTO Usuario(idUsuario, idDependencia, nombres, apellidoPaterno, apellidoMaterno, correo, rpm, anexo, estado) values(:idUsuario, :idDependencia, :nombres, :apellidoPaterno, :apellidoMaterno, :correo, :rpm, :anexo, :estado)");
            $result->bindParam(':idUsuario', $usuario->getIdUsuario());
            $result->bindParam(':idDependencia', $usuario->getIdDependencia());
            $result->bindParam(':nombres', $usuario->getNombres());
            $result->bindParam(':apellidoPaterno', $usuario->getApellidoPaterno());
            $result->bindParam(':apellidoMaterno', $usuario->getApellidoMaterno());
            $result->bindParam(':correo', $usuario->getCorreo());
            $result->bindParam(':rpm', $usuario->getRpm());
            $result->bindParam(':anexo', $usuario->getAnexo());
            $result->bindParam(':estado', $usuario->getEstado());
            return $result->execute();
        }
        
        public static function editar(Usuario $usuario) {
            $result = BaseDatos::getDbh()->prepare("UPDATE Usuario SET idDependencia = :idDependencia, nombres = :nombres, apellidoPaterno = :apellidoPaterno, apellidoMaterno = :apellidoMaterno, correo = :correo, rpm = :rpm, anexo = :anexo, estado = :estado WHERE idUsuario = :idUsuario");
            $result->bindParam(':idDependencia', $usuario->getIdDependencia());
            $result->bindParam(':nombres', $usuario->getNombres());
            $result->bindParam(':apellidoPaterno', $usuario->getApellidoPaterno());
            $result->bindParam(':apellidoMaterno', $usuario->getApellidoMaterno());
            $result->bindParam(':correo', $usuario->getCorreo());
            $result->bindParam(':rpm', $usuario->getRpm());
            $result->bindParam(':anexo', $usuario->getAnexo());
            $result->bindParam(':estado', $usuario->getEstado());
            $result->bindParam(':idUsuario', $usuario->getIdUsuario());
            return $result->execute();
        }
        
        public static function eliminar(Usuario $usuario) {
            $result = BaseDatos::getDbh()->prepare("UPDATE Usuario SET estado = 2 WHERE idUsuario = :idUsuario");
            $result->bindParam(':idUsuario', $usuario->getIdUsuario());
            return $result->execute();
        }
        
        public static function getUsuarioByIdUsuario($idUsuario) {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Usuario where idUsuario = :idUsuario");
            $result->bindParam(':idUsuario', $idUsuario);
            $result->execute();
            $rs = $result->fetch();
            $usuario = new Usuario();
            $usuario->setIdUsuario($rs['idUsuario']);
            $usuario->setIdDependencia($rs['idDependencia']);
            $usuario->setNombres($rs['nombres']);
            $usuario->setApellidoPaterno($rs['apellidoPaterno']);
            $usuario->setApellidoMaterno($rs['apellidoMaterno']);
            $usuario->setCorreo($rs['correo']);
            $usuario->setRpm($rs['rpm']);
            $usuario->setAnexo($rs['anexo']);
            $usuario->setEstado($rs['estado']);
            return $usuario;
        }
        
        public static function getUsuarioByIdDependencia($idDependencia) {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Usuario where idDependencia = :idDependencia");
            $result->bindParam(':idDependencia', $idDependencia);
            $result->execute();
            while ($rs = $result->fetch()) {
                $usuario = new Usuario();
                $usuario->setIdUsuario($rs['idUsuario']);
                $usuario->setIdDependencia($rs['idDependencia']);
                $usuario->setIdRed($rs['idRed']);
                $usuario->setIdRol($rs['idRol']);
                $usuario->setNombres($rs['nombres']);
                $usuario->setApellidoPaterno($rs['apellidoPaterno']);
                $usuario->setApellidoMaterno($rs['apellidoMaterno']);
                $usuario->setCorreo($rs['correo']);
                $usuario->setRpm($rs['rpm']);
                $usuario->setAnexo($rs['anexo']);
                $usuario->setUsername($rs['username']);
                $usuario->setPassword($rs['password']);
                $usuario->setEstado($rs['estado']);
                $usuarios[] = $usuario; 
            }
            if(isset($usuarios))
                return $usuarios;
            else
                return false;
        }
    }
?>
