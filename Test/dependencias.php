<?php 
    require 'DAO/DependenciaDAO.php';
    
    $dependencias = DependenciaDAO::getDependenciaBySuperIdDependencia(null);
    var_dump($dependencias);
?>