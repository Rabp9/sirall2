<?php
    require_once '/models/Reporte.php';
    
    $reporte = new Reporte();
    $reporte->setFecha(date('d/m/Y'));
    $reporte->setTitulo('Lista de Marcas');
    $header = array('Código', 'Dependencia', 'Establecimiento', 'Nombre');
    $cols = array('idUsuario', 'Dependencia', 'Establecimiento', 'Nombre Completo');
    $w = array(20, 50, 50, 60);
    $reporte->AddPage(); 
    $reporte->Table($header, $cols, $usuarios, $w);
    $reporte->Output();
?>