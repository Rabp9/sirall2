<?php
    require_once '/models/Reporte.php';
    
    ob_start();
    $reporte = new Reporte();
    $reporte->setFecha(date('d/m/Y'));
    $reporte->setTitulo('Lista de Marcas');
    $header = array(utf8_decode("Código") , utf8_decode('Descripción'), utf8_decode('Nro. Modelos'), utf8_decode('Nro. Equipos'));
    $cols = array('idMarca', 'descripcion', 'nroModelos', 'nroEquipos');
    $w = array(20, 60, 30, 30);
    $reporte->AddPage(); 
    $reporte->Table($header, $cols, $marcas, $w);
    $reporte->Output();
?>