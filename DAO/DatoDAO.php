<!-- File: /DAO/DatoDAO.php -->
    
<?php
    require_once '/DAO/AppDAO.php';
    require_once '/models/Dato.php';
    require_once '/Libs/BaseDatos.php';
    
    class DatoDAO implements appDAO {
        
        public static function getAll() {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Dato");
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
            return isset($datos) ? $datos : false;
        }
             
        public static function getBy($campo, $valor) {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Dato where $campo = :$campo");
            $result->bindParam(":$campo", $valor);
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
            return isset($datos) ? $datos : false;
        }
        
        public static function crear($dato) {
            $result = BaseDatos::getDbh()->prepare("INSERT INTO Dato(codigoPatrimonial, serie, clave, valor) values(:codigoPatrimonial, :serie, :clave, :valor)");
            $result->bindParam(':codigoPatrimonial', $dato->getCodigoPatrimonial());
            $result->bindParam(':serie', $dato->getSerie());
            $result->bindParam(':clave', $dato->getClave());
            $result->bindParam(':valor', $dato->getValor());
            return $result->execute();
        }
      
        public static function editar($dependencia) {
        }
         
        public static function eliminar($dependencia) {
        }
     
        public static function eliminarByCodigoPatrimonial($codigoPatrimonial) {
            $result = BaseDatos::getDbh()->prepare("DELETE FROM Dato WHERE codigoPatrimonial = :codigoPatrimonial");
            $result->bindParam(':codigoPatrimonial', $codigoPatrimonial);
            return $result->execute();
        }
    }
?>
