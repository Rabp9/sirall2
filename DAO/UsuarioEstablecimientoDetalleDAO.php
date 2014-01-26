<!-- File: /DAO/UsuarioEstablecimientoetalleDAO.php -->

<?php
    require_once './DAO/AppDAO.php';
    require_once './models/UsuarioEstablecimientoDetalle.php';
    require_once './Libs/BaseDatos.php';
    
    class UsuarioEstablecimientoDetalleDAO implements appDAO {

        public static function getAll() {
        }
             
        public static function getBy($campo, $valor) {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM UsuarioEstablecimientoDetalle WHERE $campo = :$campo");
            $result->bindParam(":$campo", $valor);
            $result->execute();        
            while ($rs = $result->fetch()) {
                $usuarioEstablecimientoDetalle = new UsuarioEstablecimientoDetalle();
                $usuarioEstablecimientoDetalle->setIdUsuarioEstablecimientoDetalle($rs['idUsuarioEstablecimientoDetalle']);
                $usuarioEstablecimientoDetalle->setIdEstablecimiento($rs['idEstablecimiento']);
                $usuarioEstablecimientoDetalle->setUsername($rs['username']);
                $usuarioEstablecimientoDetalles[] = $usuarioEstablecimientoDetalle;
            }
            return isset($usuarioEstablecimientoDetalles) ? $usuarioEstablecimientoDetalles : false;
        }
        
        public static function crear($usuarioEstableciemtoDetalle) {
            $result = BaseDatos::getDbh()->prepare("INSERT INTO UsuarioEstablecimientoDetalle(idUsuarioEstablecimientoDetalle, idEstablecimiento, username) values(:idUsuarioEstablecimientoDetalle, :idEstablecimiento, :username)");
            $result->bindParam(':idUsuarioEstablecimientoDetalle', $usuarioEstableciemtoDetalle->getIdUsuarioEstablecimientoDetalle());
            $result->bindParam(':username', $usuarioEstableciemtoDetalle->getUsername());
            $result->bindParam(':idEstablecimiento', $usuarioEstableciemtoDetalle->getIdEstablecimiento());
            return $result->execute();
        }
        
        public static function editar($equipo) {
        }
        
        public static function eliminar($equipo) {
        }
        
        public static function getNextID() {
        }
        
        public static function eliminarByUsername($username) {
            $result = BaseDatos::getDbh()->prepare("DELETE FROM UsuarioEstablecimientoDetalle WHERE username = :username");
            $result->bindParam(":username", $username);
            return $result->execute();
        }
        
    }
?>
