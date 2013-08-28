<?php
    require_once '/DAO/ModeloDAO.php';
    require_once '/DAO/TipoEquipoDAO.php';
    require_once '/DAO/MarcaDAO.php';
    
    class ModeloController {
        public static function ModeloAction() {
            $modelos = ModeloDAO::getVwModelo();
            require_once '/views/Mantenimiento/Modelo/Lista.php';
        }

        public static function CrearAction() {
            $nextID = ModeloDAO::getNextID();
            $tipoEquipos = TipoEquipoDAO::getAllTipoEquipo();
            $marcas = MarcaDAO::getAllMarca();
            require_once '/views/Mantenimiento/Modelo/Crear.php';
        }
                
        public static function CrearPOSTAction() {
            if(isset($_POST)) {
                $modelo = new Modelo();
                $modelo->setIdModelo($_POST['idModelo']);
                $modelo->setIdTipoEquipo($_POST['idTipoEquipo']);
                $modelo->setIdMarca($_POST['idMarca']);
                $modelo->setDescripcion($_POST['descripcion']);
                $modelo->setIndicacion($_POST['indicacion']);
                ModeloDAO::crear($modelo);
            }
            $modelos = ModeloDAO::getVwModelo();
            $mensaje = "Modelo guardada correctamente";
            require_once '/views/Mantenimiento/Modelo/Lista.php';
        }
        
        public static function DetalleAction() {
            if(isset($_GET['idModelo'])) {
                $modelo = ModeloDAO::getModeloByIdModelo($_GET['idModelo']);
                $tipoEquipo = TipoEquipoDAO::getTipoEquipoByIdTipoEquipo($modelo->getIdTipoEquipo());
                $marca = MarcaDAO::getMarcaByIdMarca($modelo->getIdMarca());
                require_once '/views/Mantenimiento/Modelo/Detalle.php';
            }
        }
        
        public static function EditarAction() {
            if(isset($_GET['idModelo'])) {
                $modelo = ModeloDAO::getModeloByIdModelo($_GET['idModelo']);
                $tipoEquipos = TipoEquipoDAO::getAllTipoEquipo();
                $marcas = MarcaDAO::getAllMarca();
                require_once '/views/Mantenimiento/Modelo/Editar.php';
            }
        }
        
        public static function EditarPOSTAction() {
            if(isset($_POST)) {
                $modelo = new Modelo();
                $modelo->setIdModelo($_POST['idModelo']);
                $modelo->setDescripcion($_POST['descripcion']);
                $modelo->setIndicacion($_POST['indicacion']);
                ModeloDAO::editar($modelo);
            }
            $modelos = ModeloDAO::getAllModelo();
            $mensaje = "Modelo modificada correctamente";
            require_once '/views/Mantenimiento/Modelo/Lista.php';
        }
        
        public static function EliminarAction() {
            if(isset($_GET['idModelo'])) {
                $modelo = ModeloDAO::getModeloByIdModelo($_GET['idModelo']);
                require_once '/views/Mantenimiento/Modelo/Eliminar.php';
            }
        }
        
        public static function EliminarPOSTAction() {
            if(isset($_POST)) {
                $modelo = new Modelo();
                $modelo->setIdModelo($_POST['idModelo']);
                ModeloDAO::eliminar($modelo);
            }
            $modelos = ModeloDAO::getAllModelo();
            $mensaje = "Modelo eliminada correctamente";
            require_once '/views/Mantenimiento/Modelo/Lista.php';
        }
    }
?>
