<!-- File: /controllers/HomeController.php -->

<?php
    require_once '/controllers/AppController.php';
    require_once '/DAO/UsuarioSistemaDAO.php';
    
    class HomeController implements AppController {
        
        public static function HomeAction() {
            if(!isset($_SESSION["usuarioActual"])) {
                HomeController::LoginAction();
                return;
            }
            require_once '/views/Home/Index.php';
        }
        
        public static function LoginAction() {
            require_once '/views/Home/Login.php';
        }
        
        public static function LoginPOSTAction() {
            if(isset($_POST)) {
                $usuarioSistema = new UsuarioSistema();
                $usuarioSistema->setUsername($_POST["username"]);
                $usuarioSistema->setPassword($_POST["password"]);
                if($usuarioSistema = UsuarioSistemaDAO::loguear($usuarioSistema)) {
                    $_SESSION["usuarioActual"] = $usuarioSistema;
                    $mensaje = "Usuario: " . $_SESSION["usuarioActual"]->getUsername() . " logueado correctamente";
                    require_once '/views/Home/Index.php';
                }
                else {
                    $mensaje = "El usuario no existe o la clave ingresada no es la correcta";
                    require_once '/views/Home/Login.php';
                }
            }
        }
        
        public static function CerrarSesionAction() {
            if(isset($_SESSION["usuarioActual"])) {
                session_unset();
                session_destroy ();
                $mensaje = "Se cerró correctamente la sesión";
                require_once '/views/Home/Login.php';
            }
        }
        
    }
?>
