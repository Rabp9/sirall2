<!-- File: /DAO/ModeloDAO.php -->

<?php
    require_once './DAO/AppDAO.php';
    require_once './models/Modelo.php';
    require_once './models/VwModelo.php';
    require_once './Libs/BaseDatos.php';
    
    class ModeloDAO implements appDAO {

        public static function getAll() {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Modelo");
            $result->execute();
            while ($rs = $result->fetch()) {
                $modelo = new Modelo();
                $modelo->setIdModelo($rs['idModelo']);
                $modelo->setIdMarca($rs['idMarca']);
                $modelo->setIdTipoEquipo($rs['idTipoEquipo']);
                $modelo->setDescripcion($rs['descripcion']);
                $modelo->setIndicacion($rs['indicacion']);
                $modelos[] = $modelo; 
            }
            return isset($modelos) ? $modelos : false;
        }
        
        public static function getBy($campo, $valor) {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Modelo where $campo = :$campo");
            $result->bindParam(":$campo", $valor);
            $result->execute();
            while ($rs = $result->fetch()) {
                $modelo = new Modelo();
                $modelo->setIdModelo($rs['idModelo']);
                $modelo->setIdMarca($rs['idMarca']);
                $modelo->setIdTipoEquipo($rs['idTipoEquipo']);
                $modelo->setDescripcion($rs['descripcion']);
                $modelo->setIndicacion($rs['indicacion']);
                $modelos[] = $modelo; 
            }
            return isset($modelos) ? $modelos : false;
        }
        
        public static function crear($modelo) {
            $result = BaseDatos::getDbh()->prepare("INSERT INTO Modelo(idModelo, idTipoEquipo, idMarca, descripcion, indicacion, estado) values(:idModelo, :idTipoEquipo, :idMarca, :descripcion, :indicacion, :estado)");
            $result->bindParam(':idModelo', $modelo->getIdModelo());
            $result->bindParam(':idTipoEquipo', $modelo->getIdTipoEquipo());
            $result->bindParam(':idMarca', $modelo->getIdMarca());
            $result->bindParam(':descripcion', $modelo->getDescripcion());
            $result->bindParam(':indicacion', $modelo->getIndicacion());
            $result->bindParam(':estado', $modelo->getEstado());
            return $result->execute();
        }
        
        public static function editar($modelo) {
            $result = BaseDatos::getDbh()->prepare("UPDATE Modelo SET idTipoEquipo = :idTipoEquipo, idMarca = :idMarca, descripcion = :descripcion, indicacion = :indicacion, estado = :estado WHERE idModelo = :idModelo");
            $result->bindParam(':idTipoEquipo', $modelo->getIdTipoEquipo());
            $result->bindParam(':idMarca', $modelo->getIdMarca());
            $result->bindParam(':descripcion', $modelo->getDescripcion());
            $result->bindParam(':indicacion', $modelo->getIndicacion());
            $result->bindParam(':idModelo', $modelo->getIdModelo());
            $result->bindParam(':estado', $modelo->getEstado());
            return $result->execute();
        }
        
        public static function eliminar($modelo) {
            $result = BaseDatos::getDbh()->prepare("UPDATE Modelo SET estado = 2 WHERE idModelo = :idModelo");
            $result->bindParam(':idModelo', $modelo->getIdModelo());
            return $result->execute();
        }
        
        public static function getNextID() {
            $result = BaseDatos::getDbh()->prepare("call usp_GetNextIdModelo");
            $result->execute();
            $rs = $result->fetch();
            return $rs['nextID'];
        }
    
        public static function getModeloByIdMarca_IdTipoEquipo($idMarca, $idTipoEquipo) {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Modelo where idMarca = :idMarca AND idTipoEquipo = :idTipoEquipo AND estado = 1");
            $result->bindParam(':idMarca', $idMarca);
            $result->bindParam(':idTipoEquipo', $idTipoEquipo);
            $result->execute();
            while ($rs = $result->fetch()) {
                $modelo = new Modelo();
                $modelo->setIdModelo($rs['idModelo']);
                $modelo->setIdMarca($rs['idMarca']);
                $modelo->setIdTipoEquipo($rs['idTipoEquipo']);
                $modelo->setDescripcion($rs['descripcion']);
                $modelo->setIndicacion($rs['indicacion']);
                $modelo->setIndicacion($rs['estado']);
                $modelos[] = $modelo; 
            }
            return isset($modelos) ? $modelos : false;
        }
        
        public static function getVwModelo() {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM vw_Modelo");
            $result->execute();
            while ($rs = $result->fetch()) {
                $vwModelo = new VwModelo();
                $vwModelo->setIdModelo($rs['idModelo']);
                $vwModelo->setMarca($rs['marca']);
                $vwModelo->setTipoEquipo($rs['tipoEquipo']);
                $vwModelo->setDescripcion($rs['descripcion']);
                $vwModelo->setIndicacion($rs['indicacion']);
                $vwModelo->setNroEquipos($rs['nroEquipos']);
                $vwModelos[] = $vwModelo;
            }
            return isset($vwModelos) ? $vwModelos : false;
        }      
        
        public static function getVwModeloLimit($limite) {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM vw_Modelo LIMIT 0, :limite");
            $result->bindValue(':limite', (int) trim($limite), PDO::PARAM_INT);
            $result->execute();
            while ($rs = $result->fetch()) {
                $vwModelo = new VwModelo();
                $vwModelo->setIdModelo($rs['idModelo']);
                $vwModelo->setMarca($rs['marca']);
                $vwModelo->setTipoEquipo($rs['tipoEquipo']);
                $vwModelo->setDescripcion($rs['descripcion']);
                $vwModelo->setIndicacion($rs['indicacion']);
                $vwModelo->setNroEquipos($rs['nroEquipos']);
                $vwModelos[] = $vwModelo;
            }
            return isset($vwModelos) ? $vwModelos : false;
        }
        
        public static function toXML($modelos) {
            $xml = '<?xml version="1.0" encoding="UTF-8"?>';
            $xml .= "\n<Modelos>\n";
            if(is_array($modelos))
                foreach($modelos as $modelo)
                    $xml .= $modelo->toXML() . "\n";
            $xml .= "</Modelos>\n";
            return $xml;
        }
    }
?>
