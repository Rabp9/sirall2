<!-- File: /controllers/HomeController.php -->

<?php
    require_once './controllers/AppController.php';
    require_once './DAO/UsuarioDAO.php';
    
    class HomeController implements AppController {
        
        public static function HomeAction() {
            if(!isset($_SESSION["usuarioActual"])) {
                HomeController::LoginAction();
                return;
            }
            require_once './views/Home/index.php';
        }
        
        public static function LoginAction() {
            if(isset($_GET["mensaje"])) {
                $mensaje = $_GET["mensaje"];
            }
            require_once './views/Home/Login.php';
        }
        
        public static function LoginPOSTAction() {
            if(isset($_POST)) {
                $usuario = new Usuario();
                $usuario->setUsername($_POST["username"]);
                $usuario->setPassword($_POST["password"]);
                if($usuario = UsuarioDAO::loguear($usuario)) {
                    $_SESSION["usuarioActual"] = $usuario;
                    $mensaje = "Usuario: " . $_SESSION["usuarioActual"]->getUsername() . " logueado correctamente";
                    require_once './views/Home/index.php';
                }
                else {
                    $mensaje = "El usuario no existe o la clave ingresada no es la correcta";
                    require_once './views/Home/Login.php';
                }
            }
        }
        
        public static function CerrarSesionAction() {
            if(isset($_SESSION["usuarioActual"])) {
                session_unset();
                session_destroy ();
                $mensaje = "Se cerró correctamente la sesión";
                header("Location: index.php?mensaje=$mensaje");
            }
        }
        
    }
?>
