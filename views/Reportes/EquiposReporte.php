<?php
    require_once './models/Reporte.php';
    
    ob_start();
    $reporte = new Reporte();
    $reporte->FPDF("L");
    $reporte->setFecha(date('d/m/Y'));
    $reporte->setTitulo('Lista de Equipos');
    $header = array(utf8_decode('Código'), utf8_decode('Serie'), utf8_decode('Marca'), utf8_decode('Tipo de Equipo'), utf8_decode('Modelo'), utf8_decode("Dependencia"), utf8_decode("Usuario"), utf8_decode("Fecha Ingreso"), utf8_decode("Fecha Garantia"));
    $cols = array('codigoPatrimonial', 'serie', 'marca', 'tipoEquipo', 'modelo', "dependencia", "usuario", "fechaIngreso", "fechaGarantia");
    $w = array(18, 20, 30, 30, 30, 36, 30, 22, 22);
    $reporte->AddPage(); 
    $reporte->Table($header, $cols, $equipos, $w);
    $reporte->Output();
?>