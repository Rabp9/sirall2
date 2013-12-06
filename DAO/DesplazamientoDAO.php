<!-- File: /DAO/DesplazamientoDAO.php -->
    
<?php
    require_once '/DAO/AppDAO.php';
    require_once '/models/Desplazamiento.php';
    require_once '/Libs/BaseDatos.php';
    
    class DesplazamientoDAO implements appDAO {
        public static function realizarDesplazamiento(Desplazamiento $desplazamiento) {
            $result = BaseDatos::getDbh()->prepare("INSERT INTO Desplazamiento(codigoPatrimonial, serie, idOrigen, idDestino, fecha, observacion, usuario) values(:codigoPatrimonial, :serie, :idOrigen, :idDestino, :fecha, :observacion, :usuario)");
            $result->bindParam(':codigoPatrimonial', $desplazamiento->getIdCodigoPatrimonial());
            $result->bindParam(':serie', $desplazamiento->getSerie());
            $result->bindParam(':idOrigen', $desplazamiento->getIdOrigen());
            $result->bindParam(':idDestino', $desplazamiento->getIdDestino());
            $result->bindParam(':fecha', $desplazamiento->getFecha());
            $result->bindParam(':observacion', $desplazamiento->getObservacion());
            $result->bindParam(':usuario', $desplazamiento->getUsuario());
            return $result->execute();
        }

    public static function crear($object) {
        
    }

    public static function editar($object) {
        
    }

    public static function eliminar($object) {
        
    }

    public static function getAll() {
        
    }

    public static function getBy($campo, $valor) {
        
    }
    }
?>
