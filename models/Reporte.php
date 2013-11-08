<?php
    include '../../Librerias/fpdf17/fpdf.php';
    
    class Reporte extends FPDF {
        
        private $titulo;
        private $fecha;
                
        function Header() {
            // Logo
            // 1. Imagen
            // 2. left
            // 3. Top
            // 4. Size
            $this->Image('../resources/images/Logo.png', 10, 10, 50);
            // Arial bold 15
            $this->SetFont('helvetica','B',15);
            // Movernos a la derecha
            $this->Cell(80);
            // Título
            $this->Cell(30, 30,'Reporte de ' . $this->getTitulo(), 0 , 0, 'C');
            // Salto de línea
            $this->Ln(30);
            $this->SetFont('helvetica','',11);
            $this->Cell(10, 10,'Fecha: ' . $this->getFecha(), 0 , 0, 'L');
        }
        
        function Footer() {
            $this->SetY(-15);
            $this->SetFont('helvetica','I',11);      
            $this->Cell(0, 10,'Pagina ' . $this->PageNo(), 0 , 0, 'C');
      
       
        }
        
        public function setTitulo($titulo) {
            $this->titulo = $titulo;
        }
        
        public function getTitulo() {
            return $this->titulo;
        }
        
        public function setFecha($fecha) {
            $this->fecha = $fecha;
        }
        
        public function getFecha() {
            return $this->fecha;
        }
    }
    
    $pdf = new Reporte();
    $pdf->setTitulo('Lista de Marcas');
    $pdf->setFecha(date('d/m/Y'));
    $pdf->Output();
?>
