<?php
    require_once '/models/Repuesto.php';
    require_once '/Libs/BaseDatos.php';
    
    class RepuestoDAO {

        public static function getAllRepuesto() {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Repuesto");
            $result->execute();
            while ($rs = $result->fetch()) {
                $repuesto = new Repuesto();
                $repuesto->setIdRepuesto($rs['idRepuesto']);
                $repuesto->setDescripcion($rs['descripcion']);
                $repuesto->setUnidadMedida($rs['unidadMedida']);
                $repuesto->setStock($rs['stock']);
                $repuestos[] = $repuesto; 
            }
            if(isset($repuestos))
                return $repuestos;
            else
                return false;
        }
        
        public static function crear(Repuesto $repuesto) {
            $result = BaseDatos::getDbh()->prepare("INSERT INTO Repuesto(descripcion, unidadmedida, stock) values(:descripcion, :unidadMedida, :stock)");
            $result->bindParam(':descripcion', $repuesto->getDescripcion());
            $result->bindParam(':unidadMedida', $repuesto->getUnidadMedida());
            $result->bindParam(':stock', $repuesto->getStock());
            return $result->execute();
        }
        
        public static function editar(Repuesto $repuesto) {
            $result = BaseDatos::getDbh()->prepare("UPDATE Repuesto SET descripcion = :descripcion, unidadmedida = :unidadMedida, stock = :stock WHERE idRepuesto = :idRepuesto");
            $result->bindParam(':descripcion', $repuesto->getDescripcion());
            $result->bindParam(':unidadMedida', $repuesto->getUnidadMedida());
            $result->bindParam(':stock', $repuesto->getStock());
            $result->bindParam(':idRepuesto', $repuesto->getIdRepuesto());
            return $result->execute();
        }
        
        public static function eliminar(Repuesto $repuesto) {
            $result = BaseDatos::getDbh()->prepare("DELETE FROM Repuesto WHERE idRepuesto = :idRepuesto");
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
            return $rs['nextID'];
        }
    }
?>
