<!-- File: /DAO/DatoDAO.php -->
    
<?php
    require_once '/DAO/AppDAO.php';
    require_once '/models/Desplazamiento.php';
    require_once '/Libs/BaseDatos.php';
    
    class DesplazamientoDAO implements appDAO {
        public static function realizarDesplazamiento(Desplazamiento $desplazamiento) {
            $result = BaseDatos::getDbh()->prepare("INSERT INTO Desplazamiento(codigoPatrimonial, serie, idOrigen, idDestino, fecha, observacion) values(:codigoPatrimonial, :serie, :idOrigen, :idDestino, :fecha, :observacion)");
            $result->bindParam(':codigoPatrimonial', $desplazamiento->getIdCodigoPatrimonial());
            $result->bindParam(':serie', $desplazamiento->getSerie());
            $result->bindParam(':idOrigen', $desplazamiento->getIdOrigen());
            $result->bindParam(':idDestino', $desplazamiento->getIdDestino());
            $result->bindParam(':fecha', $desplazamiento->getFecha());
            $result->bindParam(':observacion', $desplazamiento->getObservacion());
            return $result->execute();
        }
    }
?>
