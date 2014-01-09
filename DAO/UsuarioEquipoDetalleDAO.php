<!-- File: /DAO/UsuarioEquipoDetalleDAO.php -->

<?php
    require_once './DAO/AppDAO.php';
    require_once './models/UsuarioEquipoDetalle.php';
    require_once './Libs/BaseDatos.php';
    
    class UsuarioEquipoDetalleDAO implements appDAO {

        public static function getAll() {
        }
             
        public static function getBy($campo, $valor) {
        }
        
        public static function crear($equipo) {
            $result = BaseDatos::getDbh()->prepare("INSERT INTO UsuarioEquipoDetalle(idUsuarioEquipoDetalle, idUsuario, codigoPatrimonial, serie, idDependencia, fechaInicio, fechaFin, estado) values(:idUsuarioEquipoDetalle, :idUsuario, :codigoPatrimonial, :serie, :idDependencia, :fechaInicio, :fechaFin, :estado)");
            $result->bindParam(':idUsuarioEquipoDetalle', $equipo->getIdUsuarioEquipoDetalle());
            $result->bindParam(':idUsuario', $equipo->getIdUsuario());
            $result->bindParam(':codigoPatrimonial', $equipo->getCodigoPatrimonial());
            $result->bindParam(':serie', $equipo->getSerie());
            $result->bindParam(':idDependencia', $equipo->getIdDependencia());
            $result->bindParam(':fechaInicio', $equipo->getFechaInicio());
            $result->bindParam(':fechaFin', $equipo->getFechaFin());
            $result->bindParam(':estado', $equipo->getEstado());
            return $result->execute();
        }
        
        public static function editar($equipo) {
        }
        
        public static function eliminar($equipo) {
        }
        
        public static function getNextID() {
        }
        
    }
?>
