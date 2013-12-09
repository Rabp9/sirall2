<?php
    require_once './models/Reporte.php';
    
    ob_start();
    $reporte = new Reporte();
    $reporte->setFecha(date('d/m/Y'));
    $reporte->setTitulo('Lista de Tipo de Equipos');
    $header = array(utf8_decode('Código'), utf8_decode('Descripción'), utf8_decode('Nro. Modelos'), utf8_decode('Nro. Equipos'));
    $cols = array('idTipoEquipo', 'descripcion', 'nroModelos', 'nroEquipos');
    $w = array(20, 80, 30, 30);
    $reporte->AddPage(); 
    $reporte->Table($header, $cols, $tipoEquipos, $w);
    $reporte->Output();
?>