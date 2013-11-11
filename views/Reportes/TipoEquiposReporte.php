<?php
    require_once '/models/Reporte.php';
    
    $reporte = new Reporte();
    $reporte->setFecha(date('d/m/Y'));
    $reporte->setTitulo('Lista de Tipo de Equipos');
    $header = array('Código', 'Descripción', 'Nro. Modelos', 'Nro. Equipos');
    $cols = array('idTipoEquipo', 'descripcion', 'Nro Modelos', 'Nro Equipos');
    $w = array(20, 80, 30, 30);
    $reporte->AddPage(); 
    $reporte->Table($header, $cols, $tipoEquipos, $w);
    $reporte->Output();
?>