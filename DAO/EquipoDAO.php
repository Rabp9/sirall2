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
            $result = BaseDatos::getDbh()->prepare("INSERT INTO Equipo(codigoPatrimonial, serie, idModelo, idUsuario, indicacion, estado) values(:codigoPatrimonial, :serie, :idModelo, :idUsuario, :indicacion, :estado)");
            $result->bindParam(':codigoPatrimonial', $equipo->getCodigoPatrimonial());
            $result->bindParam(':serie', $equipo->getSerie());
            $result->bindParam(':idModelo', $equipo->getIdModelo());
            $result->bindParam(':idUsuario', $equipo->getIdUsuario());
            $result->bindParam(':indicacion', $equipo->getIndicacion());
            $result->bindParam(':estado', $equipo->getEstado());
            return $result->execute();
        }
        
        public static function editar(Equipo $equipo) {
            $result = BaseDatos::getDbh()->prepare("UPDATE Equipo SET idModelo = :idModelo, idUsuario = :idUsuario, indicacion = :indicacion, estado = :estado WHERE codigoPatrimonial = :codigoPatrimonial");
            $result->bindParam(':idModelo', $equipo->getIdModelo());
            $result->bindParam(':idUsuario', $equipo->getIdUsuario());
            $result->bindParam(':indicacion', $equipo->getIndicacion());
            $result->bindParam(':estado', $equipo->getEstado());
            $result->bindParam(':codigoPatrimonial', $equipo->getCodigoPatrimonial());
            return $result->execute();
        }
        
        public static function eliminar(Equipo $equipo) {
            $result = BaseDatos::getDbh()->prepare("UPDATE Equipo SET estado = 2 WHERE codigoPatrimonial = :codigoPatrimonial");
            $result->bindParam(':codigoPatrimonial', $equipo->getCodigoPatrimonial());
            return $result->execute();
        }
        
        public static function getEquipoByCodigoPatrimonial($codigoPatrimonial) {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Equipo where codigoPatrimonial = :codigoPatrimonial");
            $result->bindParam(':codigoPatrimonial', $codigoPatrimonial);
            $result->execute();
            $rs = $result->fetch();
            $equipo = new Equipo();
            $equipo->setCodigoPatrimonial($rs['codigoPatrimonial']);
            $equipo->setSerie($rs['serie']);
            $equipo->setIdModelo($rs['idModelo']);
            $equipo->setIdUsuario($rs['idUsuario']);
            $equipo->setIndicacion($rs['indicacion']);
            $equipo->setEstado($rs['estado']);
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
        
        public static function getVwEquipoMantenimiento() {    
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM vw_EquipoMantenimiento");
            $result->execute();
            return $result;
        }
         
        public static function getVwEquipoMantenimientoByCodigoPatrimonial($codigoPatrimonial) {    
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM vw_EquipoMantenimiento where codigoPatrimonial = :codigoPatrimonial");
            $result->bindParam(':codigoPatrimonial', $codigoPatrimonial);
            $result->execute();
            return $result->fetch();
        }
        
        public static function getVWEquipoByCodigoPatrimonial($codigoPatrimonial) {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM vw_EquipoMantenimiento where codigoPatrimonial = :codigoPatrimonial");
            $result->bindParam(':codigoPatrimonial', $codigoPatrimonial);
            $result->execute();
            return $equipo;
        }
               
        public static function getVwEquipolIMIT($limite) {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM vw_Equipo LIMIT 0, :limite");
            $result->bindValue(':limite', (int) trim($limite), PDO::PARAM_INT);
            $result->execute();
            return $result;
        }
    }
?>
