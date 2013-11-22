<!-- File: /DAO/TecnicoAO.php -->

<?php
    require_once '/DAO/AppDAO.php';
    require_once '/models/Tecnico.php';
    require_once '/Libs/BaseDatos.php';
    
    class TecnicoDAO implements appDAO {
        
        public static function getAll() {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Tecnico WHERE estado = 1");
            $result->execute();
            while ($rs = $result->fetch()) {
                $tecnico = new Tecnico();
                $tecnico->setIdTecnico($rs['idTecnico']);
                $tecnico->setNombres($rs['nombres']);
                $tecnico->setApellidoPaterno($rs['apellidoPaterno']);
                $tecnico->setApellidoMaterno($rs['apellidoMaterno']);
                $tecnico->setRpm($rs['rpm']);
                $tecnico->setEstado($rs['estado']);
                $tecnicos[] = $tecnico; 
            }
            return isset($tecnicos) ? $tecnicos : false;
        }
                
        public static function getBy($campo, $valor) {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Tecnico where $campo = :$campo");
            $result->bindParam(":$campo", $valor);
            $result->execute();
            $rs = $result->fetch();
            $tecnico = new Tecnico();
            $tecnico->setIdTecnico($rs['idTecnico']);
            $tecnico->setNombres($rs['nombres']);
            $tecnico->setApellidoPaterno($rs['apellidoPaterno']);
            $tecnico->setApellidoMaterno($rs['apellidoMaterno']);
            $tecnico->setRpm($rs['rpm']);
            $tecnico->setEstado($rs['estado']);
            return $tecnico;
        }
        
        public static function crear($tecnico) {
            $result = BaseDatos::getDbh()->prepare("INSERT INTO Tecnico(idTecnico, nombres, apellidoPaterno, apellidoMaterno, rpm, estado) values(:idTecnico, :nombres, :apellidoPaterno, :apellidoMaterno, :rpm, :estado)");
            $result->bindParam(':idTecnico', $tecnico->getIdTecnico());
            $result->bindParam(':nombres', $tecnico->getNombres());
            $result->bindParam(':apellidoPaterno', $tecnico->getApellidoPaterno());
            $result->bindParam(':apellidoMaterno', $tecnico->getApellidoMaterno());
            $result->bindParam(':rpm', $tecnico->getRpm());
            $result->bindParam(':estado', $tecnico->getEstado());
            return $result->execute();
        }

        public static function editar($tecnico) {
            $result = BaseDatos::getDbh()->prepare("UPDATE Tecnico SET nombres = :nombres, apellidoPaterno = :apellidoPaterno, apellidoMaterno = :apellidoMaterno, rpm = :rpm, estado = :estado WHERE idTecnico = :idTecnico");
            $result->bindParam(':nombres', $tecnico->getNombres());
            $result->bindParam(':apellidoPaterno', $tecnico->getApellidoPaterno());
            $result->bindParam(':apellidoMaterno', $tecnico->getApellidoMaterno());
            $result->bindParam(':rpm', $tecnico->getRpm());
            $result->bindParam(':estado', $tecnico->getEstado());
            $result->bindParam(':idTecnico', $tecnico->getIdTecnico());
            return $result->execute();
        }

        public static function eliminar($tecnico) {
            $result = BaseDatos::getDbh()->prepare("UPDATE Tecnico SET estado = 2 WHERE idTecnico = :idTecnico");
            $result->bindParam(':idTecnico', $tecnico->getIdTecnico());
            return $result->execute();
        }
        
        public static function getNextID() {
            $result = BaseDatos::getDbh()->prepare("call usp_GetNextIdTecnico");
            $result->execute();
            $rs = $result->fetch();
            return $rs['nextID'];
        }
        
    }
?>