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
         
        public static function getDatobyCodigoPatrimonial($codigoPatrimonial) {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Dato where codigoPatrimonial = :codigoPatrimonial");    
            $result->bindParam(':codigoPatrimonial', $codigoPatrimonial);
            $result->execute();
            while ($rs = $result->fetch()) {
                $dato = new Dato();
                $dato->setIdDato($rs['idDato']);
                $dato->setCodigoPatrimonial($rs['codigoPatrimonial']);
                $dato->setSerie($rs['serie']);
                $dato->setClave($rs['clave']);
                $dato->setValor($rs['valor']);
                $datos[] = $dato; 
            }
            if(isset($datos))
                return $datos;
            else
                return false;
        }
        
        public static function eliminarbyCodigoPatrimonial($codigoPatrimonial) {
            $result = BaseDatos::getDbh()->prepare("DELETE FROM Dato WHERE codigoPatrimonial = :codigoPatrimonial");
            $result->bindParam(':codigoPatrimonial', $codigoPatrimonial);
            return $result->execute();
        }
    }
?>
