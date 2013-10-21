<?php
    require_once '/models/Modelo.php';
    require_once '/Libs/BaseDatos.php';
    
    class ModeloDAO {

        public static function getAllModelo() {
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
            if(isset($modelos))
                return $modelos;
            else
                return false;
        }
        
        public static function getNextID() {
            $result = BaseDatos::getDbh()->prepare("call usp_GetNextIdModelo");
            $result->execute();
            $rs = $result->fetch();
            $n = $rs['nextID'] + 1;
            if($n < 10) 
                return 'C000' . $n;
            elseif ($n < 100)
                return 'C00' . $n;
            elseif ($n < 1000)
                return 'C0' . $n;
            else
                return 'C' . $n;
        }
        
        public static function crear(Modelo $modelo) {
            $result = BaseDatos::getDbh()->prepare("INSERT INTO Modelo(idTipoEquipo, idMarca, descripcion, indicacion) values(:idTipoEquipo, :idMarca, :descripcion, :indicacion)");
            $result->bindParam(':idTipoEquipo', $modelo->getIdTipoEquipo());
            $result->bindParam(':idMarca', $modelo->getIdMarca());
            $result->bindParam(':descripcion', $modelo->getDescripcion());
            $result->bindParam(':indicacion', $modelo->getIndicacion());
            return $result->execute();
        }
        
        public static function editar(Modelo $modelo) {
            $result = BaseDatos::getDbh()->prepare("UPDATE Modelo SET idTipoEquipo = :idTipoEquipo, idMarca = :idMarca, descripcion = :descripcion, indicacion = :indicacion WHERE idModelo = :idModelo");
            $result->bindParam(':idTipoEquipo', $modelo->getIdTipoEquipo());
            $result->bindParam(':idMarca', $modelo->getIdMarca());
            $result->bindParam(':descripcion', $modelo->getDescripcion());
            $result->bindParam(':indicacion', $modelo->getIndicacion());
            $result->bindParam(':idModelo', $modelo->getIdModelo());
            return $result->execute();
        }
        
        public static function eliminar(Modelo $modelo) {
            $result = BaseDatos::getDbh()->prepare("DELETE FROM Modelo WHERE idModelo = :idModelo");
            $result->bindParam(':idModelo', $modelo->getIdModelo());
            return $result->execute();
        }
        
        public static function getModeloByIdModelo($idModelo) {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Modelo where idModelo = :idModelo");
            $result->bindParam(':idModelo', $idModelo);
            $result->execute();
            $rs = $result->fetch();
            $modelo = new Modelo();
            $modelo->setIdModelo($rs['idModelo']);
            $modelo->setIdTipoEquipo($rs['idTipoEquipo']);
            $modelo->setIdMarca($rs['idMarca']);
            $modelo->setDescripcion($rs['descripcion']);
            $modelo->setIndicacion($rs['indicacion']);
            return $modelo;
        }
        
        public static function getModeloByIdMarca($idMarca) {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Modelo where idMarca = :idMarca");
            $result->bindParam(':idMarca', $idMarca);
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
            if(isset($modelos))
                return $modelos;
            else
                return false;
        }
        
        public static function getModeloByIdMarca_IdTipoEquipo($idMarca, $idTipoEquipo) {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Modelo where idMarca = :idMarca AND idTipoEquipo = :idTipoEquipo");
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
                $modelos[] = $modelo; 
            }
            if(isset($modelos))
                return $modelos;
            else
                return false;
        }
        
        public static function getVwModelo() {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM vw_Modelo");
            $result->execute();
            return $result;
        }
    }
?>
