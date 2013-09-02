<?php
    require_once '/models/Equipo.php';
    require_once '/Libs/BaseDatos.php';
    
    class EquipoDAO {

        public static function getAllEquipo() {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Equipo");
            $result->execute();
            while ($rs = $result->fetch()) {
                $equipo = new Equipo();
                $equipo->setIdEquipo($rs['idEquipo']);
                $equipo->setIdMarca($rs['idMarca']);
                $equipo->setIdTipoEquipo($rs['idTipoEquipo']);
                $equipo->setDescripcion($rs['descripcion']);
                $equipo->setIndicacion($rs['indicacion']);
                $equipos[] = $equipo; 
            }
            if(isset($equipos))
                return $equipos;
            else
                return false;
        }
        
        public static function getNextID() {
            $result = BaseDatos::getDbh()->prepare("call sp_GetNextIdEquipo");
            $result->execute();
            $rs = $result->fetch();
            return $rs['nextID'];
        }
        
        
        public static function crear(Equipo $equipo) {
            $result = BaseDatos::getDbh()->prepare("INSERT INTO Equipo(idTipoEquipo, idMarca, descripcion, indicacion) values(:idTipoEquipo, :idMarca, :descripcion, :indicacion)");
            $result->bindParam(':idTipoEquipo', $equipo->getIdTipoEquipo());
            $result->bindParam(':idMarca', $equipo->getIdMarca());
            $result->bindParam(':descripcion', $equipo->getDescripcion());
            $result->bindParam(':indicacion', $equipo->getIndicacion());
            return $result->execute();
        }
        
        public static function editar(Equipo $equipo) {
            $result = BaseDatos::getDbh()->prepare("UPDATE Equipo SET idTipoEquipo = :idTipoEquipo, idMarca = :idMarca, descripcion = :descripcion, indicacion = :indicacion WHERE idEquipo = :idEquipo");
            $result->bindParam(':idTipoEquipo', $equipo->getIdTipoEquipo());
            $result->bindParam(':idMarca', $equipo->getIdMarca());
            $result->bindParam(':descripcion', $equipo->getDescripcion());
            $result->bindParam(':indicacion', $equipo->getIndicacion());
            $result->bindParam(':idEquipo', $equipo->getIdEquipo());
            return $result->execute();
        }
        
        public static function eliminar(Equipo $equipo) {
            $result = BaseDatos::getDbh()->prepare("DELETE FROM Equipo WHERE idEquipo = :idEquipo");
            $result->bindParam(':idEquipo', $equipo->getIdEquipo());
            return $result->execute();
        }
        
        public static function getEquipoByIdEquipo($idEquipo) {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Equipo where idEquipo = :idEquipo");
            $result->bindParam(':idEquipo', $idEquipo);
            $result->execute();
            $rs = $result->fetch();
            $equipo = new Equipo();
            $equipo->setIdEquipo($rs['idEquipo']);
            $equipo->setIdTipoEquipo($rs['idTipoEquipo']);
            $equipo->setIdMarca($rs['idMarca']);
            $equipo->setDescripcion($rs['descripcion']);
            $equipo->setIndicacion($rs['indicacion']);
            return $equipo;
        }
        
        public static function getEquipoByIdMarca($idMarca) {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Equipo where idMarca = :idMarca");
            $result->bindParam(':idMarca', $idMarca);
            $result->execute();
            while ($rs = $result->fetch()) {
                $equipo = new Equipo();
                $equipo->setIdEquipo($rs['idEquipo']);
                $equipo->setIdMarca($rs['idMarca']);
                $equipo->setIdTipoEquipo($rs['idTipoEquipo']);
                $equipo->setDescripcion($rs['descripcion']);
                $equipo->setIndicacion($rs['indicacion']);
                $equipos[] = $equipo; 
            }
            if(isset($equipos))
                return $equipos;
            else
                return false;
        }
        
        public static function getVwEquipo() {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM vw_Equipo");
            $result->execute();
            return $result;
        }
    }
?>
