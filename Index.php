<?php

    include '../Librerias/fpdf17/fpdf.php';
    //Primero algunas variables de configuracion
    //require './Libs/conexion.php';
    
    //La carpeta donde buscaremos los controladores
    $carpetaControllers = "controllers/";

    //Si no se indica un controlador, este es el controlador que se usará
    $controllerPredefinido = "Home";    

    //Si no se indica una accion, esta accion es la que se usará
    
    if(isset($_GET['controller']))
          $controller = $_GET['controller'];
    else
          $controller = $controllerPredefinido;
    
    $actionPredefinida = $controller . 'Action';
    
    if(isset($_GET['action']))
          $action = $_GET['action'] . 'Action';
    else
          $action = $actionPredefinida;

    //un poco de limpieza
    $controller = preg_replace('/[^a-zA-Z0-9]/', '', $controller);
    $action = preg_replace('/[^a-zA-Z0-9]/', '', $action);

    //Ya tenemos el controlador y la accion

    //Formamos el nombre del fichero que contiene nuestro controlador
    $controller = $controller . 'Controller';
  
    //Incluimos el controlador o detenemos todo si no existe
    if(is_file($carpetaControllers . $controller . '.php'))
          require_once $carpetaControllers . $controller . '.php';
    else
          die('El controlador no existe - 404 not found');
    
    //Llamamos la accion o detenemos todo si no existe
    if(is_callable(array($controller, $action))) {
        return call_user_func(array($controller, $action));
    }
    else
        die('La accion no existe - 404 not found');
?>