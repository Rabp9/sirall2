<!-- File: /controllers/NuevoLoteController.php -->

<?php
    require_once '/controllers/AppController.php';
    require_once '/DAO/TipoEquipoDAO.php';
    require_once '/DAO/MarcaDAO.php';
    require_once '/DAO/ModeloDAO.php';
    require_once '/DAO/EquipoDAO.php';
    
    class NuevoLoteController implements AppController {
        
        public static function NuevoLoteAction() {
            if(!PermisoDAO::hasPermiso($_SESSION["usuarioActual"], "mdf4")) {
                require_once "views/Home/Error_Permisos.php";
                return;
            }
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
                $mensaje = "Registro enviado correctamente";
                // Información de Confirmación
                $modelo = current(ModeloDAO::getBy("idModelo", $_POST['idModelo']));
                $marca = current(MarcaDAO::getBy("idMarca", $modelo->getIdMarca()));
                $tipoEquipo = current(TipoEquipoDAO::getBy("idTipoEquipo", $modelo->getIdTipoEquipo()));
                $indicacion = $_POST['indicacion'];
            }
            require_once '/views/Nuevo Lote/Confirmacion.php';
        }
    }
?>
