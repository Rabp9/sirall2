<!-- File: /DAO/MantenimientoDAO.php -->

<?php
    require_once '/DAO/AppDAO.php';
    require_once '/models/Mantenimiento.php';
    require_once '/Libs/BaseDatos.php';
    
    class MantenimientoDAO implements appDAO {

        public static function getAll() {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Mantenimiento WHERE estado = 1");
            $result->execute();
            while ($rs = $result->fetch()) {
                $mantenimiento = new Mantenimiento();
                $mantenimiento->setIdMantenimiento($rs['idMantenimiento']);
                $mantenimiento->setCodigoPatrimonial($rs['codigoPatrimonial']);
                $mantenimiento->setSerie($rs['serie']);
                $mantenimiento->setIdTecnico($rs['idTecnico']);
                $mantenimiento->setMotivo($rs['motivo']);
                $mantenimiento->setDiagnostico($rs['diagnostico']);
                $mantenimiento->setInforme($rs['informe']);
                $mantenimiento->setFechaInicio($rs['fechaInicio']);
                $mantenimiento->setFechaFin($rs['fechaFin']);
                $mantenimiento->setUsuario($rs['usuario']);
                $mantenimientos[] = $mantenimiento; 
            }
            return isset($mantenimientos) ? $mantenimientos : false;
        }
        
        public static function getBy($campo, $valor) {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Mantenimiento where $campo = :$campo");
            $result->bindParam(":$campo", $valor);
            $result->execute();
            while ($rs = $result->fetch()) {
                $mantenimiento = new Mantenimiento();
                $mantenimiento->setIdMantenimiento($rs['idMantenimiento']);
                $mantenimiento->setCodigoPatrimonial($rs['codigoPatrimonial']);
                $mantenimiento->setSerie($rs['serie']);
                $mantenimiento->setIdTecnico($rs['idTecnico']);
                $mantenimiento->setMotivo($rs['motivo']);
                $mantenimiento->setDiagnostico($rs['diagnostico']);
                $mantenimiento->setInforme($rs['informe']);
                $mantenimiento->setFechaInicio($rs['fechaInicio']);
                $mantenimiento->setFechaFin($rs['fechaFin']);
                $mantenimiento->setUsuario($rs['usuario']);
                $mantenimientos[] = $mantenimiento; 
            }
            return isset($mantenimientos) ? $mantenimientos : false;
        }
               
        public static function crear($mantenimiento) {
            $result = BaseDatos::getDbh()->prepare("INSERT INTO Mantenimiento(codigoPatrimonial, serie, idTecnico, motivo, diagnostico, informe, fechaInicio, fechaFin, usuario) values(:codigoPatrimonial, :serie, :idTecnico, :motivo, :diagnostico, :informe, :fechaInicio, :fechaFin, :usuario)");
            $result->bindParam(':codigoPatrimonial', $mantenimiento->getCodigoPatrimonial());
            $result->bindParam(':serie', $mantenimiento->getSerie());
            $result->bindParam(':idTecnico', $mantenimiento->getIdTecnico());
            $result->bindParam(':motivo', $mantenimiento->getMotivo());
            $result->bindParam(':diagnostico', $mantenimiento->getDiagnostico());
            $result->bindParam(':informe', $mantenimiento->getInforme());
            $result->bindParam(':fechaInicio', $mantenimiento->getFechaInicio());
            $result->bindParam(':fechaFin', $mantenimiento->getFechaFin());
            $result->bindParam(':usuario', $mantenimiento->getUsuario());
            return $result->execute();
        }
               
        public static function editar($mantenimiento) {
            $result = BaseDatos::getDbh()->prepare("UPDATE Mantenimiento SET codigoPatrimonial = :codigoPatrimonial, serie = :serie, idTecnico = :idTecnico, motivo = :motivo, diagnostico = :diagnostico, informe = :informe, fechaInicio = :fechaInicio, fechaFin = :fechaFin, usuario = :usuario WHERE idMantenimiento = :idMantenimiento");
            $result->bindParam(':codigoPatrimonial', $mantenimiento->getCodigoPatrimonial());
            $result->bindParam(':serie', $mantenimiento->getSerie());
            $result->bindParam(':idTecnico', $mantenimiento->getIdTecnico());
            $result->bindParam(':motivo', $mantenimiento->getMotivo());
            $result->bindParam(':diagnostico', $mantenimiento->getDiagnostico());
            $result->bindParam(':informe', $mantenimiento->getInforme());
            $result->bindParam(':fechaInicio', $mantenimiento->getFechaInicio());
            $result->bindParam(':fechaFin', $mantenimiento->getFechaFin());
            $result->bindParam(':usuario', $mantenimiento->getUsuario());        
            $result->bindParam(':idMantenimiento', $mantenimiento->getIdMantenimiento());
            return $result->execute();
        }
        
        public static function eliminar($mantenimiento) {
            $result = BaseDatos::getDbh()->prepare("DELETE FROM Mantenimiento WHERE idMantenimiento = :idMantenimiento");
            $result->bindParam(':idMantenimiento', $mantenimiento->getIdMantenimiento());
            return $result->execute();
        }
            
        public static function toXML($mantenimientos) {
            $xml = '<?xml version="1.0" encoding="UTF-8"?>';
            $xml .= "\n<Mantenimientos>\n";
            if(is_array($mantenimientos))
                foreach($mantenimientos as $mantenimiento)
                    $xml .= $mantenimiento->toXML() . "\n";
            $xml .= "</Mantenimientos>\n";
            return $xml;
        }
        
    }
?>
