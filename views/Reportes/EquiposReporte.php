<?php
    require_once '/models/Reporte.php';
    
    $reporte = new Reporte();
    $reporte->setFecha(date('d/m/Y'));
    $reporte->setTitulo('Lista de Equipos');
    $header = array('Código', 'Serie', 'Marca', 'Tipo de Equipo', 'Modelo');
    $cols = array('codigoPatrimonial', 'serie', 'Marca', 'TipoEquipo', 'Modelo');
    $w = array(30, 30, 45, 45, 40);
    $reporte->AddPage(); 
    $reporte->Table($header, $cols, $equipos, $w);
    $reporte->Output();
?>