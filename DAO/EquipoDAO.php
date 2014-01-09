<!-- File: /DAO/EquipoDAO.php -->

<?php
    require_once './DAO/AppDAO.php';
    require_once './models/Equipo.php';
    require_once './models/VwEquipo.php';
    require_once './Libs/BaseDatos.php';
    
    class EquipoDAO implements appDAO {

        public static function getAll() {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Equipo");
            $result->execute();
            while ($rs = $result->fetch()) {
                $equipo = new Equipo();
                $equipo->setIdEquipo($rs['idEquipo']);
                $equipo->setIdMarca($rs['idMarca']);
                $equipo->setIdTipoEquipo($rs['idTipoEquipo']);
                $equipo->setDescripcion($rs['descripcion']);
                $equipo->setIndicacion($rs['indicacion']);
                $equipo->setUsuario($rs["usuario"]);
                $equipo->setFechaRegistro($rs["fechaRegistro"]);
                $equipo->setFechaIngreso($rs["fechaIngreso"]);
                $equipo->setFechaGarantia($rs["fechaGarantia"]);
                $equipo->setEstado($rs["estado"]);
                $equipos[] = $equipo; 
            }
            return isset($equipos) ? $equipos : false;
        }
             
        public static function getBy($campo, $valor) {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Equipo where $campo = :$campo");
            $result->bindParam(":$campo", $valor);
            $result->execute();   
            while ($rs = $result->fetch()) {
                $equipo = new Equipo();
                $equipo->setCodigoPatrimonial($rs['codigoPatrimonial']);
                $equipo->setSerie($rs['serie']);
                $equipo->setIdModelo($rs['idModelo']);
                $equipo->setIdUsuario($rs['idUsuario']);
                $equipo->setIndicacion($rs['indicacion']);
                $equipo->setUsuario($rs["usuario"]);
                $equipo->setFechaRegistro($rs["fechaRegistro"]);
                $equipo->setFechaIngreso($rs["fechaIngreso"]);
                $equipo->setFechaGarantia($rs["fechaGarantia"]);
                $equipo->setEstado($rs['estado']);
                $equipos[] = $equipo; 
            }
            return isset($equipos) ? $equipos : false;
        }
        
        public static function crear($equipo) {
            $result = BaseDatos::getDbh()->prepare("INSERT INTO Equipo(codigoPatrimonial, serie, idModelo, indicacion, usuario, fechaRegistro, fechaIngreso, fechaGarantia, estado) values(:codigoPatrimonial, :serie, :idModelo, :indicacion, :usuario, :fechaRegistro, :fechaIngreso, :fechaGarantia, :estado)");
            $result->bindParam(':codigoPatrimonial', $equipo->getCodigoPatrimonial());
            $result->bindParam(':serie', $equipo->getSerie());
            $result->bindParam(':idModelo', $equipo->getIdModelo());
            $result->bindParam(':indicacion', $equipo->getIndicacion());
            $result->bindParam(':usuario', $equipo->getUsuario());
            $result->bindParam(':fechaRegistro', $equipo->getFechaRegistro());
            $result->bindParam(':fechaIngreso', $equipo->getFechaIngreso());
            $result->bindParam(':fechaGarantia', $equipo->getFechaGarantia());
            $result->bindParam(':estado', $equipo->getEstado());
            return $result->execute();
        }
        
        public static function editar($equipo) {
            $result = BaseDatos::getDbh()->prepare("UPDATE Equipo SET idModelo = :idModelo, idUsuario = :idUsuario, indicacion = :indicacion, usuario = :usuario, fechaIngreso = :fechaIngreso, fechaGarantia = :fechaGarantia, estado = :estado WHERE codigoPatrimonial = :codigoPatrimonial");
            $result->bindParam(':idModelo', $equipo->getIdModelo());
            $result->bindParam(':idUsuario', $equipo->getIdUsuario());
            $result->bindParam(':indicacion', $equipo->getIndicacion());
            $result->bindParam(':usuario', $equipo->getUsuario());
            $result->bindParam(':fechaIngreso', $equipo->getFechaIngreso());
            $result->bindParam(':fechaGarantia', $equipo->getFechaGarantia());
            $result->bindParam(':estado', $equipo->getEstado());
            $result->bindParam(':codigoPatrimonial', $equipo->getCodigoPatrimonial());
            return $result->execute();
        }
        
        public static function eliminar($equipo) {
            $result = BaseDatos::getDbh()->prepare("UPDATE Equipo SET estado = 2 WHERE codigoPatrimonial = :codigoPatrimonial");
            $result->bindParam(':codigoPatrimonial', $equipo->getCodigoPatrimonial());
            return $result->execute();
        }
        
        public static function getNextID() {
            $result = BaseDatos::getDbh()->prepare("call sp_GetNextIdEquipo");
            $result->execute();
            $rs = $result->fetch();
            return $rs['nextID'];
        }
        
        public static function getVwEquipo($idEstablecimiento = "") {
            $result = $idEstablecimiento != "" ?
                BaseDatos::getDbh()->prepare("SELECT * FROM vw_Equipo WHERE idEstablecimiento = '$idEstablecimiento'"):
                BaseDatos::getDbh()->prepare("SELECT * FROM vw_Equipo");
            $result->execute();
            while ($rs = $result->fetch()) {
                $vwEquipo = new VwEquipo();
                $vwEquipo->setCodigoPatrimonial($rs['codigoPatrimonial']);
                $vwEquipo->setSerie($rs['serie']);
                $vwEquipo->setMarca($rs['marca']);
                $vwEquipo->setTipoEquipo($rs['tipoEquipo']);
                $vwEquipo->setModelo($rs['modelo']);
                $vwEquipo->setUsuario($rs['usuario']);
                $vwEquipo->setDependencia($rs['dependencia']);
                $vwEquipo->setEstablecimiento($rs['establecimiento']);
                $vwEquipo->setIndicacion($rs['indicacion']);
                $vwEquipos[] = $vwEquipo;
            }
            return isset($vwEquipos) ? $vwEquipos : false;
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
               
        public static function getVwEquipolIMIT($limite, $idEstablecimiento = "") {
            echo $idEstablecimiento;
            $result = $idEstablecimiento != "" ?
                BaseDatos::getDbh()->prepare("SELECT * FROM vw_Equipo WHERE idEstablecimiento = '$idEstablecimiento' LIMIT 0, :limite"):
                BaseDatos::getDbh()->prepare("SELECT * FROM vw_Equipo LIMIT 0, :limite");
            $result->bindValue(':limite', (int) trim($limite), PDO::PARAM_INT);
            $result->execute();
            while ($rs = $result->fetch()) {
                $vwEquipo = new VwEquipo();
                $vwEquipo->setCodigoPatrimonial($rs['codigoPatrimonial']);
                $vwEquipo->setSerie($rs['serie']);
                $vwEquipo->setMarca($rs['marca']);
                $vwEquipo->setTipoEquipo($rs['tipoEquipo']);
                $vwEquipo->setModelo($rs['modelo']);
                $vwEquipo->setUsuario($rs['usuario']);
                $vwEquipo->setDependencia($rs['dependencia']);
                $vwEquipo->setEstablecimiento($rs['establecimiento']);
                $vwEquipo->setIndicacion($rs['indicacion']);
                $vwEquipos[] = $vwEquipo;
            }
            return isset($vwEquipos) ? $vwEquipos : false;
        }
    }
?>
