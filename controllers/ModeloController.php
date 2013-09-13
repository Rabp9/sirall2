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
                ModeloDAO::crear($modelo) ?
                    $mensaje = "Modelo guardado correctamente" :
                    $mensaje = "El Modelo no fue guardado correctamente";
            }
            $modelos = ModeloDAO::getVwModelo();
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
                $modelo->setIdTipoEquipo($_POST['idTipoEquipo']);
                $modelo->setIdMarca($_POST['idMarca']);
                $modelo->setDescripcion($_POST['descripcion']);
                $modelo->setIndicacion($_POST['indicacion']);
                ModeloDAO::editar($modelo) ?
                    $mensaje = "Modelo modificado correctamente" :
                    $mensaje = "El Modelo no fue modificado correctamente";
                        
            }
            $modelos = ModeloDAO::getVwModelo();
            require_once '/views/Mantenimiento/Modelo/Lista.php';
        }
        
        public static function EliminarAction() {
            if(isset($_GET['idModelo'])) {
                $modelo = ModeloDAO::getModeloByIdModelo($_GET['idModelo']);
                $tipoEquipo = TipoEquipoDAO::getTipoEquipoByIdTipoEquipo($modelo->getIdTipoEquipo());
                $marca = MarcaDAO::getMarcaByIdMarca($modelo->getIdMarca());
                require_once '/views/Mantenimiento/Modelo/Eliminar.php';
            }
        }
        
        public static function EliminarPOSTAction() {
            if(isset($_POST)) {
                $modelo = new Modelo();
                $modelo->setIdModelo($_POST['idModelo']);
                ModeloDAO::eliminar($modelo) ?
                    $mensaje = "Modelo eliminado correctamente" :
                    $mensaje = "El Modelo no fue eliminado correctamente";
            }
            $modelos = ModeloDAO::getVwModelo();
            require_once '/views/Mantenimiento/Modelo/Lista.php';
        }
    }
?>
