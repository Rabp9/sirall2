<!-- File: /controllers/TecnicoController.php -->

<?php
    require_once '/controllers/AppController.php';
    require_once '/DAO/TecnicoDAO.php';
   
    class TecnicoController implements AppController {
        
        public static function TecnicoAction() {
            TecnicoController::ListaAction();
        }
        
        public static function ListaAction() {
            $tecnicos = TecnicoDAO::getAll();
            require_once '/views/Mantenimiento/Tecnico/Lista.php';
        }

        public static function CrearAction() {
            $nextID = TecnicoDAO::getNextID();
            require_once '/views/Mantenimiento/Tecnico/Crear.php';
        }
                
        public static function CrearPOSTAction() {
            if(isset($_POST)) {
                $tecnico = new Tecnico($_POST['idTecnico'], $_POST['nombres'], $_POST['apellidoPaterno'], $_POST['apellidoMaterno'], $_POST['rpm']);
                TecnicoDAO::crear($tecnico) ?
                    $mensaje = "Red guardada correctamente" :
                    $mensaje = "La Red no fue guardada correctamente";
            }
            $tecnicos = TecnicoDAO::getAll();
            $mensaje = "Técnico guardado correctamente";
            require_once '/views/Mantenimiento/Tecnico/Lista.php';
        }
        
        public static function DetalleAction() {
            if(isset($_GET['idTecnico'])) {
                $tecnico = TecnicoDAO::getBy('idTecnico', $_GET['idTecnico']);
                require_once '/views/Mantenimiento/Tecnico/Detalle.php';
            }
        }
                
        public static function EditarAction() {
            if(isset($_GET['idTecnico'])) {
                $tecnico = TecnicoDAO::getBy('idTecnico', $_GET['idTecnico']);
                require_once '/views/Mantenimiento/Tecnico/Editar.php';
            }
        }
        
        public static function EditarPOSTAction() {
            if(isset($_POST)) {  
                $tecnico = new Tecnico($_POST['idTecnico'], $_POST['nombres'], $_POST['apellidoPaterno'], $_POST['apellidoMaterno'], $_POST['rpm']);
                TecnicoDAO::editar($tecnico) ?
                    $mensaje = "Técnico modificado correctamente" :
                    $mensaje = "El Técnico no fue modificado correctamente";
            }
            $tecnicos = TecnicoDAO::getAll();
            require_once '/views/Mantenimiento/Tecnico/Lista.php';
        }
        
        public static function EliminarAction() {
            if(isset($_GET['idTecnico'])) {
                $tecnico = TecnicoDAO::getBy('idTecnico', $_GET['idTecnico']);
                require_once '/views/Mantenimiento/Tecnico/Eliminar.php';
            }
        }
                
        public static function EliminarPOSTAction() {
            if(isset($_POST)) {
                $tecnico = new Tecnico($_POST['idTecnico']);
                TecnicoDAO::eliminar($tecnico) ?
                    $mensaje = "Técnico eliminado correctamente" :
                    $mensaje = "El Tecnico no fue eliminado correctamente";
            }
            $tecnicos = TecnicoDAO::getAll();
            require_once '/views/Mantenimiento/Tecnico/Lista.php';
        }
    }
?>
