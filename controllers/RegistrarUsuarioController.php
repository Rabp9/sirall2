<?php
    require_once '/DAO/DependenciaDAO.php';
    require_once '/DAO/UsuarioDAO.php';
    
    class RegistrarUsuarioController {
        public static function RegistrarUsuarioAction() {
            $dependencias = DependenciaDAO::getDependenciaByRoot();
            $nextID = UsuarioDAO::getNextID();
            require_once '/views/RegistrarUsuario/Index.php';
        }
        
        public static function getXMLDependenciasAction() {
            if(isset($_GET['idDependencia'])) {
                $idDependencia = $_GET['idDependencia'];
                $dependencia = DependenciaDAO::getDependenciaByIdDependencia($idDependencia);
                $dependencia = $dependencia[0];
                $rs = "<?xml version=\"1.0\"?>\n<Dependencias>\n";
                foreach ($dependencia->getDependencias() as $d) {
                    $rs .= "\t<Dependencia>\n";
                    $rs .= "\t\t<idDependencia>" . $d->getIdDependencia() . "</idDependencia>\n";
                    $rs .= "\t\t<descripcion>" . $d->getDescripcion() . "</descripcion>\n";
                    $rs .= "\t</Dependencia>\n";
                }
                $rs .= "</Dependencias>";
                echo $rs;
            }
        }
        
        public static function CrearUsuarioAction() {
            if(isset($_POST)) {
                $usuario = new Usuario();
                $usuario->setNombres($_POST['nombres']);
                $usuario->setApellidoPaterno($_POST['apellidoPaterno']);
                $usuario->setApellidoMaterno($_POST['apellidoMaterno']);
                $usuario->setEmail($_POST['email']);
                $usuario->setRpm($_POST['rpm']);
                $usuario->setAnexo($_POST['anexo']);
            }
            require_once 'views/RegistrarUsuario/Respuesta.php';
        }
    }
?>
