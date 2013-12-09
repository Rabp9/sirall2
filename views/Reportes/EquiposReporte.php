<?php
    require_once './models/Reporte.php';
    
    ob_start();
    $reporte = new Reporte();
    $reporte->setFecha(date('d/m/Y'));
    $reporte->setTitulo('Lista de Equipos');
    $header = array(utf8_decode('Código'), utf8_decode('Serie'), utf8_decode('Marca'), utf8_decode('Tipo de Equipo'), utf8_decode('Modelo'));
    $cols = array('codigoPatrimonial', 'serie', 'marca', 'tipoEquipo', 'modelo');
    $w = array(30, 30, 45, 45, 40);
    $reporte->AddPage(); 
    $reporte->Table($header, $cols, $equipos, $w);
    $reporte->Output();
?>