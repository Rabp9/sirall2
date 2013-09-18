<?php
    require_once '/models/Marca.php';
    require_once '/Libs/BaseDatos.php';
    
    class MarcaDAO {

        public static function getAllMarca() {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Marca");
            $result->execute();
            while ($rs = $result->fetch()) {
                $marca = new Marca();
                $marca->setIdMarca($rs['idMarca']);
                $marca->setDescripcion($rs['descripcion']);
                $marca->setIndicacion($rs['indicacion']);
                $marcas[] = $marca; 
            }
            if(isset($marcas))
                return $marcas;
            else
                return false;
        }
        
        public static function crear(Marca $marca) {
            $result = BaseDatos::getDbh()->prepare("INSERT INTO Marca(descripcion, indicacion) values(:descripcion, :indicacion)");
            $result->bindParam(':descripcion', $marca->getDescripcion());
            $result->bindParam(':indicacion', $marca->getIndicacion());
            return $result->execute();
        }
        
        public static function editar(Marca $marca) {
            $result = BaseDatos::getDbh()->prepare("UPDATE Marca SET descripcion = :descripcion, indicacion = :indicacion WHERE idMarca = :idMarca");
            $result->bindParam(':descripcion', $marca->getDescripcion());
            $result->bindParam(':indicacion', $marca->getIndicacion());
            $result->bindParam(':idMarca', $marca->getIdMarca());
            return $result->execute();
        }
        
        public static function eliminar(Marca $marca) {
            $result = BaseDatos::getDbh()->prepare("DELETE FROM Marca WHERE idMarca = :idMarca");
            $result->bindParam(':idMarca', $marca->getIdMarca());
            return $result->execute();
        }
        
        public static function getMarcaByIdMarca($idMarca) {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Marca where idMarca = :idMarca");
            $result->bindParam(':idMarca', $idMarca);
            $result->execute();
            $rs = $result->fetch();
            $marca = new Marca();
            $marca->setIdMarca($rs['idMarca']);
            $marca->setDescripcion($rs['descripcion']);
            $marca->setIndicacion($rs['indicacion']);
            return $marca;
        }
        
        public static function getNextID() {
            $result = BaseDatos::getDbh()->prepare("call usp_GetNextIdMarca");
            $result->execute();
            $rs = $result->fetch();
            return $rs['nextID'];
        }
        
        public static function getVwMarca() {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM vw_Marca");
            $result->execute();
            return $result;
        }
    }
?>
