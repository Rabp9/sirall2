<?php
    require_once '/models/Reporte.php';
    
    $reporte = new Reporte();
    $reporte->setFecha(date('d/m/Y'));
    $reporte->setTitulo('Lista de Modelos');
    $header = array('Código', 'Marca', 'Tipo de Equipo', 'Descripción', 'Nro. Equipos');
    $cols = array('idModelo', 'Marca', 'Tipo de Equipo', 'descripcion', 'Nro Equipos');
    $w = array(15, 50, 50, 50, 30);
    $reporte->AddPage(); 
    $reporte->Table($header, $cols, $modelos, $w);
    $reporte->Output();
?>