<?php
    require_once './models/Reporte.php';
    
    ob_start();
    $reporte = new Reporte();
    $reporte->setFecha(date('d/m/Y'));
    $reporte->setTitulo('Lista de Modelos');
    $header = array(utf8_decode('Código'), utf8_decode('Marca'), utf8_decode('Tipo de Equipo'), utf8_decode('Descripción'), utf8_decode('Nro. Equipos'));
    $cols = array('idModelo', 'marca', 'tipoEquipo', 'descripcion', 'nroEquipos');
    $w = array(15, 50, 50, 50, 30);
    $reporte->AddPage(); 
    $reporte->Table($header, $cols, $modelos, $w);
    $reporte->Output();
?>