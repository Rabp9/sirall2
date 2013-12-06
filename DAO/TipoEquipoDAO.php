<!-- File: /DAO/TipoEquipoDAO.php -->

<?php
    require_once '/DAO/AppDAO.php';
    require_once '/DAO/OpcionDAO.php';
    require_once '/models/VwTipoEquipo.php';
    require_once '/models/TipoEquipo.php';
    require_once '/Libs/BaseDatos.php';
    
    class TipoEquipoDAO implements appDAO {
        
        public static function getAll() {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM TipoEquipo WHERE estado = 1");
            $result->execute();
            while ($rs = $result->fetch()) {
                $tipoEquipo = new TipoEquipo();
                $tipoEquipo->setIdTipoEquipo($rs['idTipoEquipo']);
                $tipoEquipo->setDescripcion($rs['descripcion']);
                $tipoEquipos[] = $tipoEquipo; 
            }
            return isset($tipoEquipos) ? $tipoEquipos : false;
        }
               
        public static function getBy($campo, $valor) {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM TipoEquipo where $campo = :$campo");
            $result->bindParam(":$campo", $valor);
            $result->execute();
            while ($rs = $result->fetch()) {
                $tipoEquipo = new TipoEquipo();
                $tipoEquipo->setIdTipoEquipo($rs['idTipoEquipo']);
                $tipoEquipo->setDescripcion($rs['descripcion']);
                $tipoEquipos[] = $tipoEquipo; 
            }
            return isset($tipoEquipos) ? $tipoEquipos : false;
        }
               
        public static function crear($tipoEquipo) {
            $result = BaseDatos::getDbh()->prepare("INSERT INTO TipoEquipo(idTipoEquipo, descripcion, estado) values(:idTipoEquipo, :descripcion, :estado)");
            $result->bindParam(':idTipoEquipo', $tipoEquipo->getIdTipoEquipo());
            $result->bindParam(':descripcion', $tipoEquipo->getDescripcion());
            $result->bindParam(':estado', $tipoEquipo->getEstado());
            return $result->execute();
        }
               
        public static function editar($tipoEquipo) {
            $result = BaseDatos::getDbh()->prepare("UPDATE TipoEquipo SET descripcion = :descripcion, estado = :estado WHERE idTipoEquipo = :idTipoEquipo");
            $result->bindParam(':descripcion', $tipoEquipo->getDescripcion());
            $result->bindParam(':idTipoEquipo', $tipoEquipo->getIdTipoEquipo());
            $result->bindParam(':estado', $tipoEquipo->getEstado());
            return $result->execute();
        }
               
        public static function eliminar($tipoEquipo) {
            $result = BaseDatos::getDbh()->prepare("UPDATE TipoEquipo SET estado = 2 WHERE idTipoEquipo = :idTipoEquipo");
            $result->bindParam(':idTipoEquipo', $tipoEquipo->getIdTipoEquipo());
            return $result->execute();
        }
        
        public static function getNextID() {
            $result = BaseDatos::getDbh()->prepare("call usp_GetNextIdTipoEquipo");
            $result->execute();
            $rs = $result->fetch();
            return $rs['nextID'];
        }
        
        public static function getVwTipoEquipo() {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM vw_TipoEquipo");
            $result->execute();
            while ($rs = $result->fetch()) {
                $vwTipoEquipo = new VwTipoEquipo();
                $vwTipoEquipo->setIdTipEquipo($rs['idTipoEquipo']);
                $vwTipoEquipo->setDescripcion($rs['descripcion']);
                $vwTipoEquipo->setNroModelos($rs['nroModelos']);
                $vwTipoEquipo->setNroEquipos($rs['nroEquipos']);
                $vwTipoEquipos[] = $vwTipoEquipo; 
            }
            return isset($vwTipoEquipos) ? $vwTipoEquipos : false;
        }      
        
        public static function getVwTipoEquipoLimit($limite) {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM vw_TipoEquipo LIMIT 0, :limite");
            $result->bindValue(':limite', (int) trim($limite), PDO::PARAM_INT);
            $result->execute();
            while ($rs = $result->fetch()) {
                $vwTipoEquipo = new VwTipoEquipo();
                $vwTipoEquipo->setIdTipEquipo($rs['idTipoEquipo']);
                $vwTipoEquipo->setDescripcion($rs['descripcion']);
                $vwTipoEquipo->setNroModelos($rs['nroModelos']);
                $vwTipoEquipo->setNroEquipos($rs['nroEquipos']);
                $vwTipoEquipos[] = $vwTipoEquipo; 
            }
            return isset($vwTipoEquipos) ? $vwTipoEquipos : false;
        }
        
        public static function eliminarOpciones(TipoEquipo $tipoEquipo) {
            $opciones = OpcionDAO::getBy("idTipoEquipo", $tipoEquipo->getIdTipoEquipo());
            foreach ($opciones as $opcion) {
                SubOpcionDAO::eliminarByOpcion($opcion);
                OpcionDAO::eliminarByTipoEquipo($tipoEquipo);
            }
        }
        
    }
?>
