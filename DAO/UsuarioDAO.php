<!-- File: /DAO/UsuarioDAO.php -->
    
<?php
    require_once './DAO/AppDAO.php';
    require_once './models/Usuario.php';
    require_once './models/VwUsuario.php';
    require_once './Libs/BaseDatos.php';
    
    class UsuarioDAO implements appDAO {
        
        public static function getAll() {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Usuario WHERE estado = 1");
            $result->execute();
            while ($rs = $result->fetch()) {
                $usuario = new Usuario();
                $usuario->setUsername($rs['username']);
                $usuario->setIdRol($rs['idRol']);
                $usuario->setPassword($rs['password']);
                $usuario->setEstado($rs['estado']);
                $usuarios[] = $usuario; 
            }
            return isset($usuarios) ? $usuarios : false;
        }
               
        public static function getBy($campo, $valor) {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Usuario where $campo = :$campo");
            $result->bindParam(":$campo", $valor);
            $result->execute();
            while ($rs = $result->fetch()) {
                $usuario = new Usuario();
                $usuario->setUsername($rs['username']);
                $usuario->setIdRol($rs['idRol']);
                $usuario->setPassword($rs['password']);
                $usuario->setEstado($rs['estado']);
                $usuarios[] = $usuario; 
            }
            return isset($usuarios) ? $usuarios : false;
        }
        
        public static function crear($usuario) {
            $result = BaseDatos::getDbh()->prepare("INSERT INTO Usuario(username, idRol, password, estado) values(:username, :idRol, :password, :estado)");
            $result->bindParam(':username', $usuario->getUsername());
            $result->bindParam(':idRol', $usuario->getIdRol());
            $result->bindParam(':password', $usuario->getPassword());
            $result->bindParam(':estado', $usuario->getEstado());
            return $result->execute();
        }
           
        public static function editar($usuario) {
            $result = BaseDatos::getDbh()->prepare("UPDATE Usuario SET idRol = :idRol, password = :password, estado = :estado WHERE username = :username");
            $result->bindParam(':password', $usuario->getPassword());
            $result->bindParam(':idRol', $usuario->getIdRol());
            $result->bindParam(':estado', $usuario->getEstado());
            $result->bindParam(':username', $usuario->getUsername());
            return $result->execute();
        }
        
        public static function eliminar($usuario) {
        }
        
        public static function loguear(Usuario $usuario) {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Usuario WHERE username = :username AND password = :password AND estado = 1");
            $result->bindParam(':username', $usuario->getUsername());
            $result->bindParam(':password', $usuario->getPassword());
            $result->execute();
            if(!$rs = $result->fetch())
                return false;
            $usuario = new Usuario();
            $usuario->setUsername($rs['username']);
            $usuario->setIdRol($rs['idRol']);
            $usuario->setPassword($rs['password']);
            $usuario->setEstado($rs['estado']);
            return $usuario;
        }
        
        public static function getVwUsuario() {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM vw_Usuario");
            $result->execute();
            while ($rs = $result->fetch()) {
                $vwUsuario = new VwUsuario();
                $vwUsuario->setUsername($rs['username']);
                $vwUsuario->setRol($rs['rol']);
                $vwUsuario->setEstablecimientos($rs['establecimientos']);
                $vwUsuarios[] = $vwUsuario; 
            }
            return isset($vwUsuarios) ? $vwUsuarios : false;
        }
        
    }
?>
