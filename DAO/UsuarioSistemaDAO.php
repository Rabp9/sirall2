<!-- File: /DAO/UsuarioSistemaDAO.php -->
    
<?php
    require_once '/DAO/AppDAO.php';
    require_once '/models/UsuarioSistema.php';
    require_once '/models/VwUsuarioSistema.php';
    require_once '/Libs/BaseDatos.php';
    
    class UsuarioSistemaDAO implements appDAO {
        
        public static function getAll() {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM UsuarioSistema WHERE estado = 1");
            $result->execute();
            while ($rs = $result->fetch()) {
                $usuarioSistema = new UsuarioSistema();
                $usuarioSistema->setUsername($rs['username']);
                $usuarioSistema->setIdRol($rs['idRol']);
                $usuarioSistema->setIdEstablecimiento($rs['idEstablecimiento']);
                $usuarioSistema->setPassword($rs['password']);
                $usuarioSistema->setEstado($rs['estado']);
                $usuarioSistemas[] = $usuarioSistema; 
            }
            return isset($usuarioSistemas) ? $usuarioSistemas : false;
        }
               
        public static function getBy($campo, $valor) {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM UsuarioSistema where $campo = :$campo");
            $result->bindParam(":$campo", $valor);
            $result->execute();
            while ($rs = $result->fetch()) {
                $usuarioSistema = new UsuarioSistema();
                $usuarioSistema->setUsername($rs['username']);
                $usuarioSistema->setIdRol($rs['idRol']);
                $usuarioSistema->setIdEstablecimiento($rs['idEstablecimiento']);
                $usuarioSistema->setPassword($rs['password']);
                $usuarioSistema->setEstado($rs['estado']);
                $usuarioSistemas[] = $usuarioSistema; 
            }
            return isset($usuarioSistemas) ? $usuarioSistemas : false;
        }
        
        public static function crear($usuarioSistema) {
            $result = BaseDatos::getDbh()->prepare("INSERT INTO UsuarioSistema(username, idRol, idEstablecimiento, password, estado) values(:username, :idRol, :idEstablecimiento, :password, :estado)");
            $result->bindParam(':username', $usuarioSistema->getUsername());
            $result->bindParam(':idRol', $usuarioSistema->getIdRol());
            $result->bindParam(':idEstablecimiento', $usuarioSistema->getIdEstablecimiento());
            $result->bindParam(':password', $usuarioSistema->getPassword());
            $result->bindParam(':estado', $usuarioSistema->getEstado());
            return $result->execute();
        }
           
        public static function editar(UsuarioSistema $usuarioSistema) {
            $result = BaseDatos::getDbh()->prepare("UPDATE UsuarioSistema SET idRol = :idRol, idEstablecimiento = :idEstablecimiento, password = :password, estado = :estado WHERE username = :username");
            $result->bindParam(':password', $usuarioSistema->getPassword());
            $result->bindParam(':idEstablecimiento', $usuarioSistema->getIdEstablecimiento());
            $result->bindParam(':idRol', $usuarioSistema->getIdRol());
            $result->bindParam(':estado', $usuarioSistema->getEstado());
            $result->bindParam(':username', $usuarioSistema->getUsername());
            return $result->execute();
        }
        
        public static function eliminar($usuarioSistema) {
        }
        
        public static function loguear(UsuarioSistema $usuarioSistema) {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM UsuarioSistema WHERE username = :username AND password = :password AND estado = 1");
            $result->bindParam(':username', $usuarioSistema->getUsername());
            $result->bindParam(':password', $usuarioSistema->getPassword());
            $result->execute();
            if(!$rs = $result->fetch())
                return false;
            $usuarioSistema = new UsuarioSistema();
            $usuarioSistema->setUsername($rs['username']);
            $usuarioSistema->setIdRol($rs['idRol']);
            $usuarioSistema->setIdEstablecimiento($rs['idEstablecimiento']);
            $usuarioSistema->setPassword($rs['password']);
            $usuarioSistema->setEstado($rs['estado']);
            return $usuarioSistema;
        }
        
        public static function getVwUsuarioSistema() {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM vw_UsuarioSistema");
            $result->execute();
            while ($rs = $result->fetch()) {
                $vwUsuarioSistema = new VwUsuarioSistema();
                $vwUsuarioSistema->setUsername($rs['username']);
                $vwUsuarioSistema->setRol($rs['rol']);
                $vwUsuarioSistema->setEstablecimiento($rs['establecimiento']);
                $vwUsuarioSistemas[] = $vwUsuarioSistema; 
            }
            return isset($vwUsuarioSistemas) ? $vwUsuarioSistemas : false;
        }
        
    }
?>
