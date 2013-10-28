<?php
    require_once '/models/Repuesto.php';
    require_once '/models/IngresoRepuesto.php';
    require_once '/models/SalidaRepuesto.php';
    require_once '/Libs/BaseDatos.php';
    
    class RepuestoDAO {

        public static function getAllRepuesto() {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Repuesto WHERE estado = 1");
            $result->execute();
            while ($rs = $result->fetch()) {
                $repuesto = new Repuesto();
                $repuesto->setIdRepuesto($rs['idRepuesto']);
                $repuesto->setDescripcion($rs['descripcion']);
                $repuesto->setUnidadMedida($rs['unidadMedida']);
                $repuesto->setStock($rs['stock']);
                $repuesto->setEstado(1);
                $repuestos[] = $repuesto; 
            }
            if(isset($repuestos))
                return $repuestos;
            else
                return false;
        }
        
        public static function crear(Repuesto $repuesto) {
            $result = BaseDatos::getDbh()->prepare("INSERT INTO Repuesto(idRepuesto, descripcion, unidadmedida, stock, estado) values(:idRepuesto, :descripcion, :unidadMedida, :stock, :estado)");
            $result->bindParam(':idRepuesto', $repuesto->getIdRepuesto());
            $result->bindParam(':descripcion', $repuesto->getDescripcion());
            $result->bindParam(':unidadMedida', $repuesto->getUnidadMedida());
            $result->bindParam(':stock', $repuesto->getStock());
            $result->bindParam(':estado', $repuesto->getEstado());
            return $result->execute();
        }
        
        public static function editar(Repuesto $repuesto) {
            $result = BaseDatos::getDbh()->prepare("UPDATE Repuesto SET descripcion = :descripcion, unidadmedida = :unidadMedida, estado = :estado WHERE idRepuesto = :idRepuesto");
            $result->bindParam(':descripcion', $repuesto->getDescripcion());
            $result->bindParam(':unidadMedida', $repuesto->getUnidadMedida());
            // El stock no se actualiza
            $result->bindParam(':estado', $repuesto->getEstado());
            $result->bindParam(':idRepuesto', $repuesto->getIdRepuesto());
            return $result->execute();
        }
        
        public static function eliminar(Repuesto $repuesto) {
            $result = BaseDatos::getDbh()->prepare("UPDATE Repuesto SET estado = 2 WHERE idRepuesto = :idRepuesto");
            $result->bindParam(':idRepuesto', $repuesto->getIdRepuesto());
            return $result->execute();
        }
        
        public static function getRepuestoByIdRepuesto($idRepuesto) {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Repuesto where idRepuesto = :idRepuesto");
            $result->bindParam(':idRepuesto', $idRepuesto);
            $result->execute();
            $rs = $result->fetch();
            $repuesto = new Repuesto();
            $repuesto->setIdRepuesto($rs['idRepuesto']);
            $repuesto->setDescripcion($rs['descripcion']);
            $repuesto->setUnidadMedida($rs['unidadMedida']);
            $repuesto->setStock($rs['stock']);
            return $repuesto;
        }
        
        public static function getNextID() {
            $result = BaseDatos::getDbh()->prepare("call usp_GetNextIdRepuesto");
            $result->execute();
            $rs = $result->fetch();
            $n = $rs['nextID'] + 1;
            if($n < 10) 
                return 'P000' . $n;
            elseif ($n < 100)
                return 'P00' . $n;
            elseif ($n < 10)
                return 'P0' . $n;
            else
                return 'P' . $n;
        }
        
        public static function getVwRepuesto() {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM vw_Repuesto");
            $result->execute();
            return $result;
        }
        
        public static function ingreso(IngresoRepuesto $ingresoRepuesto) {
            $result = BaseDatos::getDbh()->prepare("INSERT INTO IngresoRepuesto(idRepuesto, cantidad, fecha, observacion) values(:idRepuesto, :cantidad, :fecha, :observacion)");
            $result->bindParam(':idRepuesto', $ingresoRepuesto->getIdRepuesto());
            $result->bindParam(':cantidad', $ingresoRepuesto->getCantidad());
            $result->bindParam(':fecha', $ingresoRepuesto->getFecha());
            $result->bindParam(':observacion', $ingresoRepuesto->getObservacion());
            return $result->execute();
        }
               
        public static function salida(SalidaRepuesto $salidaRepuesto) {
            $result = BaseDatos::getDbh()->prepare("INSERT INTO SalidaRepuesto(idRepuesto, cantidad, fecha, observacion) values(:idRepuesto, :cantidad, :fecha, :observacion)");
            $result->bindParam(':idRepuesto', $salidaRepuesto->getIdRepuesto());
            $result->bindParam(':cantidad', $salidaRepuesto->getCantidad());
            $result->bindParam(':fecha', $salidaRepuesto->getFecha());
            $result->bindParam(':observacion', $salidaRepuesto->getObservacion());
            return $result->execute();
        }
    }
?>
