<?php
    require_once '/models/Reporte.php';
    
    $reporte = new Reporte();
    $reporte->setFecha(date('d/m/Y'));
    $reporte->setTitulo('Lista de Modelos');
    $header = array('Código', 'Repuesto', 'Unidad de Medida', 'Stock');
    $cols = array('idRepuesto', 'Repuesto', 'unidadMedida', 'stock');
    $w = array(20, 40, 40, 30);
    $reporte->AddPage(); 
    $reporte->Table($header, $cols, $repuestos, $w);
    $reporte->Output();
?>