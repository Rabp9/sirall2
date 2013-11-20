<?php
    require_once '/DAO/AppDAO.php';
    require_once '/models/Tecnico.php';
    require_once '/Libs/BaseDatos.php';
    
    class TecnicoDAO implements appDAO {
        public function crear(Tecnico $object) {
            $result = BaseDatos::getDbh()->prepare("INSERT INTO Tecnico(nombres, apellidoPaterno, apellidoMaterno, rpm, estado) values(:nombres, apellidoPaterno, apellidoMaterno, rpm, estado)");
            $result->bindParam(':nombres', $object->getNombres());   
            $result->bindParam(':nombres', $object->getApellidoPaterno());
            $result->bindParam(':nombres', $object->getApellidoMaterno());
            $result->bindParam(':nombres', $object->getRpm());
            $result->bindParam(':nombres', $object->getEstado());
            return $result->execute();
        }

        public function editar($object) {

        }

        public function eliminar($object) {

        }

        public function getAll() {
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

        public function getBy($campo, $valor) {
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
    }
?>