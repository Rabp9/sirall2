<!-- File: /DAO/UsuarioDAO.php -->
    
<?php
    require_once '/DAO/AppDAO.php';
    require_once '/models/Usuario.php';
    require_once '/models/VwUsuario.php';
    require_once '/Libs/BaseDatos.php';
    
    class UsuarioDAO implements appDAO {
        
        public static function getAll() {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Usuario WHERE estado = 1");
            $result->execute();
            while ($rs = $result->fetch()) {
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
                $usuarios[] = $usuario; 
            }
            return isset($usuarios) ? $usuarios : false;
        }
               
        public static function getBy($campo, $valor) {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Usuario where $campo = :$campo");
            $result->bindParam(":$campo", $valor);
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
        
        public static function crear($usuario) {
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
           
        public static function editar($usuario) {
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
        
        public static function eliminar($usuario) {
            $result = BaseDatos::getDbh()->prepare("UPDATE Usuario SET estado = 2 WHERE idUsuario = :idUsuario");
            $result->bindParam(':idUsuario', $usuario->getIdUsuario());
            return $result->execute();
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
            while ($rs = $result->fetch()) {
                $vwUsuario = new VwUsuario();
                $vwUsuario->setIdUsuario($rs['idUsuario']);
                $vwUsuario->setDependencia($rs['dependencia']);
                $vwUsuario->setRed($rs['red']);
                $vwUsuario->setNombreCompleto($rs['nombreCompleto']);
                $vwUsuario->setCorreo($rs['correo']);
                $vwUsuarios[] = $vwUsuario; 
            }
            return isset($vwUsuarios) ? $vwUsuarios : false;
        }
        
        public static function getVwUsuarioLimit($limite) {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM vw_Usuario LIMIT 0, :limite");
            $result->bindValue(':limite', (int) trim($limite), PDO::PARAM_INT);
            $result->execute();
            return $result;
        }
    }
?>
