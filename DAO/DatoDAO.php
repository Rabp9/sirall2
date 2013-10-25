<?php
    require_once '/models/Dato.php';
    require_once '/Libs/BaseDatos.php';
    
    class DatoDAO {
        public static function crear(Dato $dato) {
            $result = BaseDatos::getDbh()->prepare("INSERT INTO Dato(codigoPatrimonial, serie, clave, valor) values(:codigoPatrimonial, :serie, :clave, :valor)");
            $result->bindParam(':codigoPatrimonial', $dato->getCodigoPatrimonial());
            $result->bindParam(':serie', $dato->getSerie());
            $result->bindParam(':clave', $dato->getClave());
            $result->bindParam(':valor', $dato->getValor());
            return $result->execute();
        }
    }
?>
