<?php
    require_once '/models/Reporte.php';
    
    $reporte = new Reporte();
    $reporte->setFecha(date('d/m/Y'));
    $reporte->setTitulo('Lista de Marcas');
    $header = array('Código', 'Descripción', 'Nro. Modelos', 'Nro. Equipos');
    $cols = array('idMarca', 'descripcion', 'Nro Modelos', 'Nro Equipos');
    $w = array(20, 60, 30, 30);
    $reporte->AddPage(); 
    $reporte->Table($header, $cols, $marcas, $w);
    $reporte->Output();
?>