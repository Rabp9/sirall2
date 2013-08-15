<?php
    require_once '/DAO/DependenciaDAO.php';
    
    class RegistrarUsuarioController {
        public static function RegistrarUsuarioAction() {
            $dependencias = DependenciaDAO::getAllDependencia();
            require_once '/views/RegistrarUsuario/Index.php';
        }
        
        public static function getXMLDependenciasAction() {
            $dependencias = DependenciaDAO::getAllDependencia();
            $rs = "<?xml version=\"1.0\"?>\n<Dependencias>\n";
            foreach ($dependencias as $dependencia) {
                $rs .= "\t<Dependencia>\n";
                $rs .= "\t\t<idDependencia>" . $dependencia->getIdDependencia() . "</idDependencia>\n";
                $rs .= "\t\t<descripcion>" . $dependencia->getDescripcion() . "</descripcion>\n";
                $rs .= "\t</Dependencia>\n";
            }
            $rs .= "</Dependencias>";
            echo $rs;
        }
    }
?>
