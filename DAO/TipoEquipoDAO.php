<?php
    require_once '/models/TipoEquipo.php';
    require_once '/Libs/BaseDatos.php';
    
    class TipoEquipoDAO {

        public static function getAllTipoEquipo() {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM TipoEquipo");
            $result->execute();
            while ($rs = $result->fetch()) {
                $tipoEquipo = new TipoEquipo();
                $tipoEquipo->setIdTipoEquipo($rs['idTipoEquipo']);
                $tipoEquipo->setDescripcion($rs['descripcion']);
                $tipoEquipos[] = $tipoEquipo; 
            }
            if(isset($tipoEquipos))
                return $tipoEquipos;
            else
                return false;
        }
        
        public static function getNextID() {
            $result = BaseDatos::getDbh()->prepare("call usp_GetNextIdTipoEquipo");
            $result->execute();
            $rs = $result->fetch();
            $n = $rs['nextID'] + 1;
            if($n < 10) 
                return 'T00' . $n;
            elseif ($n < 100)
                return 'T0' . $n;
            else
                return 'T' . $n;
        }
        
        public static function crear(TipoEquipo $tipoEquipo) {
            $result = BaseDatos::getDbh()->prepare("INSERT INTO TipoEquipo(idTipoEquipo, descripcion, estado) values(:idTipoEquipo, :descripcion, :estado)");
            $result->bindParam(':idTipoEquipo', $tipoEquipo->getIdTipoEquipo());
            $result->bindParam(':descripcion', $tipoEquipo->getDescripcion());
            $result->bindParam(':estado', $tipoEquipo->getEstado());
            return $result->execute();
        }
        
        public static function editar(TipoEquipo $tipoEquipo) {
            $result = BaseDatos::getDbh()->prepare("UPDATE TipoEquipo SET descripcion = :descripcion, estado = :estado WHERE idTipoEquipo = :idTipoEquipo");
            $result->bindParam(':descripcion', $tipoEquipo->getDescripcion());
            $result->bindParam(':idTipoEquipo', $tipoEquipo->getIdTipoEquipo());
            $result->bindParam(':estado', $tipoEquipo->getEstado());
            return $result->execute();
        }
        
        public static function eliminar(TipoEquipo $tipoEquipo) {
            $result = BaseDatos::getDbh()->prepare("UPDATE TipoEquipo SET estado = 2 WHERE idTipoEquipo = :idTipoEquipo");
            $result->bindParam(':idTipoEquipo', $tipoEquipo->getIdTipoEquipo());
            return $result->execute();
        }
        
        public static function getTipoEquipoByIdTipoEquipo($idTipoEquipo) {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM TipoEquipo where idTipoEquipo = :idTipoEquipo");
            $result->bindParam(':idTipoEquipo', $idTipoEquipo);
            $result->execute();
            $rs = $result->fetch();
            $tipoEquipo = new TipoEquipo();
            $tipoEquipo->setIdTipoEquipo($rs['idTipoEquipo']);
            $tipoEquipo->setDescripcion($rs['descripcion']);
            return $tipoEquipo;
        }        
        
        public static function getVwTipoEquipo() {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM vw_TipoEquipo");
            $result->execute();
            return $result;
        }
    }
?>
