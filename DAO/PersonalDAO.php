<!-- File: /DAO/PersonalDAO.php -->
    
<?php
    require_once './DAO/AppDAO.php';
    require_once './models/Personal.php';
    require_once './models/VwPersonal.php';
    require_once './Libs/BaseDatos.php';
    
    class PersonalDAO implements appDAO {
        
        public static function getAll() {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Personal WHERE estado = 1");
            $result->execute();
            while ($rs = $result->fetch()) {
                $personal = new Personal();
                $personal->setIdPersonal($rs['idPersonal']);
                $personal->setNombres($rs['idDependencia']);
                $personal->setApellidoPaterno($rs['nombres']);
                $personal->setApellidoMaterno($rs['apellidoPaterno']);
                $personal->setCorreo($rs['correo']);
                $personal->setRpm($rs['rpm']);
                $personal->setAnexo($rs['anexo']);
                $personal->setEstado($rs['estado']);
                $personales[] = $personal;
            }
            return isset($personales) ? $personales : false;
        }
               
        public static function getBy($campo, $valor) {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Personal where $campo = :$campo");
            $result->bindParam(":$campo", $valor);
            $result->execute();
            while ($rs = $result->fetch()) {
                $personal = new Personal();
                $personal->setIdPersonal($rs['idPersonal']);
                $personal->setNombres($rs['nombres']);
                $personal->setApellidoPaterno($rs['apellidoPaterno']);
                $personal->setApellidoMaterno($rs['apellidoMaterno']);
                $personal->setCorreo($rs['correo']);
                $personal->setRpm($rs['rpm']);
                $personal->setAnexo($rs['anexo']);
                $personal->setEstado($rs['estado']);
                $personales[] = $personal; 
            }
            return isset($personales) ? $personales : false;
        }
        
        public static function crear($personal) {
            $result = BaseDatos::getDbh()->prepare("INSERT INTO Personal(idPersonal, nombres, apellidoPaterno, apellidoMaterno, correo, rpm, anexo, estado) values(:idPersonal, :nombres, :apellidoPaterno, :apellidoMaterno, :correo, :rpm, :anexo, :estado)");
            $result->bindParam(':idPersonal', $personal->getIdPersonal());
            $result->bindParam(':nombres', $personal->getNombres());
            $result->bindParam(':apellidoPaterno', $personal->getApellidoPaterno());
            $result->bindParam(':apellidoMaterno', $personal->getApellidoMaterno());
            $result->bindParam(':correo', $personal->getCorreo());
            $result->bindParam(':rpm', $personal->getRpm());
            $result->bindParam(':anexo', $personal->getAnexo());
            $result->bindParam(':estado', $personal->getEstado());
            return $result->execute();
        }
           
        public static function editar($usuario) {
            $result = BaseDatos::getDbh()->prepare("UPDATE Usuario SET idDependencia = :idDependencia, nombres = :nombres, apellidoPaterno = :apellidoPaterno, apellidoMaterno = :apellidoMaterno, correo = :correo, rpm = :rpm, anexo = :anexo, estado = :estado WHERE idUsuario = :idUsuario");
            $result->bindParam(':idDependencia', $usuario->getIdDependencia());
            $result->bindParam(':nombres', $usuario->getNombres());
            $result->bindParam(':apellidoPaterno', $usuario->getApellidoPaterno());
            $result->bindParam(':apellidoMaterno', $usuario->getApellidoMaterno());
            $result->bindParam(':correo', $usuario->getCorreo());
            $result->bindParam(':rpm', $usuario->getRpm());
            $result->bindParam(':anexo', $usuario->getAnexo());
            $result->bindParam(':estado', $usuario->getEstado());
            $result->bindParam(':idUsuario', $usuario->getIdUsuario());
            return $result->execute();
        }
        
        public static function eliminar($usuario) {
            $result = BaseDatos::getDbh()->prepare("UPDATE Usuario SET estado = 2 WHERE idUsuario = :idUsuario");
            $result->bindParam(':idUsuario', $usuario->getIdUsuario());
            return $result->execute();
        }
        
        public static function getNextID() {
            $result = BaseDatos::getDbh()->prepare("call usp_GetNextIdUsuario");
            $result->execute();
            $rs = $result->fetch();
            return $rs['nextID'];
        }
        
        public static function getVwPersonal() {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM vw_Personal");
            $result->execute();
            while ($rs = $result->fetch()) {
                $vwPersonal = new VwPersonal();
                $vwPersonal->setIdPersonal($rs['idPersonal']);
                $vwPersonal->setArea($rs['area']);
                $vwPersonal->setAreaGeneral($rs['areaGeneral']);
                $vwPersonal->setEstablecimiento($rs['establecimiento']);
                $vwPersonal->setNombreCompleto($rs['nombreCompleto']);
                $vwPersonal->setCorreo($rs['correo']);
                $vwPersonal->setRpm($rs['rpm']);
                $vwPersonal->setAnexo($rs['anexo']);
                $vwPersonales[] = $vwPersonal; 
            }
            return isset($vwPersonales) ? $vwPersonales : false;
        }
        
        public static function getVwUsuarioLimit($limite) {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM vw_Usuario LIMIT 0, :limite");
            $result->bindValue(':limite', (int) trim($limite), PDO::PARAM_INT);
            $result->execute();
            while ($rs = $result->fetch()) {
                $vwUsuario = new VwUsuario();
                $vwUsuario->setIdUsuario($rs['idUsuario']);
                $vwUsuario->setDependencia($rs['dependencia']);
                $vwUsuario->setEstablecimiento($rs['establecimiento']);
                $vwUsuario->setNombreCompleto($rs['nombreCompleto']);
                $vwUsuario->setCorreo($rs['correo']);
                $vwUsuarios[] = $vwUsuario; 
            }
            return isset($vwUsuarios) ? $vwUsuarios : false;
        }
        
        public static function crearUSP($idPersonal, $nombres, $apellidoPaterno, $apellidoMaterno, $correo, $rpm, $anexo, $idArea) {
            $result = BaseDatos::getDbh()->prepare("call usp_crearPersonal(:idPersonal, :nombres, :apellidoPaterno, :apellidoMaterno, :correo, :rpm, :anexo, :idArea)");
            $result->bindParam(':idPersonal', $idPersonal);
            $result->bindParam(':nombres', $nombres);
            $result->bindParam(':apellidoPaterno', $apellidoPaterno);
            $result->bindParam(':apellidoMaterno', $apellidoMaterno);
            $result->bindParam(':correo', $correo);
            $result->bindParam(':rpm', $rpm);
            $result->bindParam(':anexo', $anexo);
            $result->bindParam(':idArea', $idArea);
            return $result->execute();
        }
        
        public static function editarUSP($idPersonal, $nombres, $apellidoPaterno, $apellidoMaterno, $correo, $rpm, $anexo, $idArea) {
            $result = BaseDatos::getDbh()->prepare("call usp_editarPersonal(:idPersonal, :nombres, :apellidoPaterno, :apellidoMaterno, :correo, :rpm, :anexo, :idArea)");
            $result->bindParam(':idPersonal', $idPersonal);
            $result->bindParam(':nombres', $nombres);
            $result->bindParam(':apellidoPaterno', $apellidoPaterno);
            $result->bindParam(':apellidoMaterno', $apellidoMaterno);
            $result->bindParam(':correo', $correo);
            $result->bindParam(':rpm', $rpm);
            $result->bindParam(':anexo', $anexo);
            $result->bindParam(':idArea', $idArea);
            return $result->execute();
        }
           
        public static function eliminarUSP($idPersonal) {
            $result = BaseDatos::getDbh()->prepare("call usp_eliminarPersonal(:idPersonal)");
            $result->bindParam(':idPersonal', $idPersonal);
            return $result->execute();
        }
        
        public static function getVwBy($campo, $valor) {
            $result = BaseDatos::getDbh()->prepare("SELECT * FROM Vw_Personal where $campo = :$campo");
            $result->bindParam(":$campo", $valor);
            $result->execute();
            while ($rs = $result->fetch()) {
                $vwPersonal = new VwPersonal();
                $vwPersonal->setIdPersonal($rs['idPersonal']);
                $vwPersonal->setArea($rs['area']);
                $vwPersonal->setAreaGeneral ($rs['areaGeneral']);
                $vwPersonal->setEstablecimiento($rs['establecimiento']);
                $vwPersonal->setNombreCompleto($rs['nombreCompleto']);
                $vwPersonal->setCorreo($rs['correo']);
                $vwPersonal->setRpm($rs['rpm']);
                $vwPersonal->setAnexo($rs['anexo']);
                $vwPersonales[] = $vwPersonal; 
            }
            return isset($vwPersonales) ? $vwPersonales : false;
        }
        
    }
?>
