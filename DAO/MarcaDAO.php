<!-- File: /DAO/MarcaDAO.php -->

<?php
    require_once './DAO/AppDAO.php';
    require_once './models/Marca.php';
    require_once './models/VwMarca.php';
    require_once './Libs/BaseDatos.php';
    
    class MarcaDAO implements appDAO {

        public static function getAll() {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Marca WHERE estado = 1");
            $result->execute();
            while ($rs = $result->fetch()) {
                $marca = new Marca();
                $marca->setIdMarca($rs['idMarca']);
                $marca->setDescripcion($rs['descripcion']);
                $marca->setIndicacion($rs['indicacion']);
                $marcas[] = $marca; 
            }
            return isset($marcas) ? $marcas : false;
        }
        
        public static function getBy($campo, $valor) {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Marca where $campo = :$campo");
            $result->bindParam(":$campo", $valor);
            $result->execute();
            while ($rs = $result->fetch()) {
                $marca = new Marca();
                $marca->setIdMarca($rs['idMarca']);
                $marca->setDescripcion($rs['descripcion']);
                $marca->setIndicacion($rs['indicacion']);
                $marcas[] = $marca; 
            }
            return isset($marcas) ? $marcas : false;
        }
        
        public static function crear($marca) {
            $result = BaseDatos::getDbh()->prepare("INSERT INTO Marca(idMarca, descripcion, indicacion, estado) values(:idMarca, :descripcion, :indicacion, :estado)");
            $result->bindParam(':idMarca', $marca->getIdMarca());
            $result->bindParam(':descripcion', $marca->getDescripcion());
            $result->bindParam(':indicacion', $marca->getIndicacion());
            $result->bindParam(':estado', $marca->getEstado());
            return $result->execute();
        }
        
        public static function editar($marca) {
            $result = BaseDatos::getDbh()->prepare("UPDATE Marca SET descripcion = :descripcion, indicacion = :indicacion, estado = :estado WHERE idMarca = :idMarca");
            $result->bindParam(':descripcion', $marca->getDescripcion());
            $result->bindParam(':indicacion', $marca->getIndicacion());
            $result->bindParam(':idMarca', $marca->getIdMarca());
            $result->bindParam(':estado', $marca->getEstado());
            return $result->execute();
        }
        
        public static function eliminar($marca) {
            $result = BaseDatos::getDbh()->prepare("UPDATE Marca SET estado = 2 WHERE idMarca = :idMarca");
            $result->bindParam(':idMarca', $marca->getIdMarca());
            return $result->execute();
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
            while ($rs = $result->fetch()) {
                $vwMarca = new VwMarca();
                $vwMarca->setIdMarca($rs['idMarca']);
                $vwMarca->setDescripcion($rs['descripcion']);
                $vwMarca->setIndicacion($rs['indicacion']);
                $vwMarca->setNroModelos($rs['nroModelos']);
                $vwMarca->setNroEquipos($rs['nroEquipos']);
                $vwMarcas[] = $vwMarca;
            }
            return isset($vwMarcas) ? $vwMarcas : false;
        }
        
        public static function getVwMarcaLimit($limite) {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM vw_Marca LIMIT 0, :limite");
            $result->bindValue(':limite', (int) trim($limite), PDO::PARAM_INT);
            $result->execute();
            while ($rs = $result->fetch()) {
                $vwMarca = new VwMarca();
                $vwMarca->setIdMarca($rs['idMarca']);
                $vwMarca->setDescripcion($rs['descripcion']);
                $vwMarca->setIndicacion($rs['indicacion']);
                $vwMarca->setNroModelos($rs['nroModelos']);
                $vwMarca->setNroEquipos($rs['nroEquipos']);
                $vwMarcas[] = $vwMarca;
            }
            return isset($vwMarcas) ? $vwMarcas : false;
        }
    }
?>
