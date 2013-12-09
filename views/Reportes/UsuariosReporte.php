<?php
    require_once './models/Reporte.php';
    
    ob_start();
    $reporte = new Reporte();
    $reporte->setFecha(date('d/m/Y'));
    $reporte->setTitulo('Lista de Marcas');
    $header = array(utf8_decode('Código'), utf8_decode('Dependencia'), utf8_decode('Establecimiento'), utf8_decode('Nombre'));
    $cols = array('idUsuario', 'dependencia', 'establecimiento', 'nombreCompleto');
    $w = array(20, 50, 50, 60);
    $reporte->AddPage(); 
    $reporte->Table($header, $cols, $usuarios, $w);
    $reporte->Output();
?>