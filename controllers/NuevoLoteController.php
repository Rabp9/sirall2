<?php
    require_once '/DAO/TipoEquipoDAO.php';
    require_once '/DAO/MarcaDAO.php';
    require_once '/DAO/ModeloDAO.php';
    require_once '/DAO/EquipoDAO.php';
    
    class NuevoLoteController {
        
        public static function NuevoLoteAction() {
            $tipoEquipos = TipoEquipoDAO::getAll();
            $marcas = MarcaDAO::getAll();
            $vwTipoEquipos = TipoEquipoDAO::getVwTipoEquipo();
            $vwMarcas = MarcaDAO::getVwMarca();
            require_once '/views/Nuevo Lote/Index.php';
        }
        
        public static function NuevoLotePOSTAction() {
            if(isset($_POST)) {
                $n_equipo = sizeof($_POST['codigoPatrimonial']);
                $n_equipos = 0;
                for($i = 0; $i < $n_equipo; $i++ ) {
                    if($_POST['codigoPatrimonial'][$i] != "") {
                        $equipo = new Equipo();
                        $equipo->setCodigoPatrimonial($_POST['codigoPatrimonial'][$i]);
                        $equipo->setSerie($_POST['serie'][$i]);
                        $equipo->setIdModelo($_POST['idModelo']);
                        $equipo->setIdUsuario('U9999'); // Sin Usuario
                        $equipo->setIndicacion($_POST['indicacion']);
                        $equipo->setEstado(1);
                        if(EquipoDAO::crear($equipo))   $n_equipos++;
                    }
                }
                
                // Información de Confirmación
                $modelo = ModeloDAO::getModeloByIdModelo($_POST['idModelo']);
                $marca = MarcaDAO::getMarcaByIdMarca($modelo->getIdMarca());
                $tipoEquipo = TipoEquipoDAO::getTipoEquipoByIdTipoEquipo($modelo->getIdTipoEquipo());
                $indicacion = $_POST['indicacion'];
            }
            require_once '/views/Nuevo Lote/Confirmacion.php';
        }
    }
?>
