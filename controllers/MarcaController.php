<?php
    require_once '/DAO/MarcaDAO.php';
    
    class MarcaController {
        public static function MarcaAction() {
            $marcas = MarcaDAO::getAllMarca();
            require_once '/views/Mantenimiento/Marca/Lista.php';
        }

        public static function CrearAction() {
            $nextID = MarcaDAO::getNextID();
            require_once '/views/Mantenimiento/Marca/Crear.php';
        }
                
        public static function CrearPOSTAction() {
            if(isset($_POST)) {
                $marca = new Marca();
                $marca->setIdMarca($_POST['idMarca']);
                $marca->setDescripcion($_POST['descripcion']);
                $marca->setIndicacion($_POST['indicacion']);
                MarcaDAO::crear($marca);
            }
            $marcas = MarcaDAO::getAllMarca();
            $mensaje = "Marca guardada correctamente";
            require_once '/views/Mantenimiento/Marca/Lista.php';
        }
        
        public static function DetalleAction() {
            if(isset($_GET['idMarca'])) {
                $marca = MarcaDAO::getMarcaByIdMarca($_GET['idMarca']);
                require_once '/views/Mantenimiento/Marca/Detalle.php';
            }
        }
        
        public static function EditarAction() {
            if(isset($_GET['idMarca'])) {
                $marca = MarcaDAO::getMarcaByIdMarca($_GET['idMarca']);
                require_once '/views/Mantenimiento/Marca/Editar.php';
            }
        }
        
        public static function EditarPOSTAction() {
            if(isset($_POST)) {
                $marca = new Marca();
                $marca->setIdMarca($_POST['idMarca']);
                $marca->setDescripcion($_POST['descripcion']);
                $marca->setIndicacion($_POST['indicacion']);
                MarcaDAO::editar($marca);
            }
            $marcas = MarcaDAO::getAllMarca();
            $mensaje = "Marca modificada correctamente";
            require_once '/views/Mantenimiento/Marca/Lista.php';
        }
        
        public static function EliminarAction() {
            if(isset($_GET['idMarca'])) {
                $marca = MarcaDAO::getMarcaByIdMarca($_GET['idMarca']);
                require_once '/views/Mantenimiento/Marca/Eliminar.php';
            }
        }
        
        public static function EliminarPOSTAction() {
            if(isset($_POST)) {
                $marca = new Marca();
                $marca->setIdMarca($_POST['idMarca']);
                MarcaDAO::eliminar($marca);
            }
            $marcas = MarcaDAO::getAllMarca();
            $mensaje = "Marca eliminada correctamente";
            require_once '/views/Mantenimiento/Marca/Lista.php';
        }
    }
?>
