<?php
    class Reporte extends FPDF {
        
        private $titulo;
        private $fecha;
                
        function Header() {
            // Logo
            // 1. Imagen
            // 2. left
            // 3. Top
            // 4. Size
            $this->Image('resources/images/Logo.png', 10, 10, 50);
            // Arial bold 15
            $this->SetFont('helvetica','B',15);
            // Movernos a la derecha
            $this->Cell(80);
            // Título
            $this->Cell(30, 30,'Reporte de ' . $this->getTitulo(), 0 , 0, 'C');
            // Salto de línea
            $this->SetFont('helvetica','',11);
            $this->Cell(80, 20,'Fecha: ' . $this->getFecha(), 0 , 0, 'R');
            $this->Ln(20);
        }
        
        function Footer() {
            $this->SetY(-15);
            $this->SetFont('helvetica','I',11);      
            $this->Cell(0, 10,'Pagina ' . $this->PageNo(), 0 , 0, 'C');
        }
        function Table($header, $cols, $data, $w) {
            // Colores, ancho de línea y fuente en negrita
            $this->SetFillColor(124, 169, 206);
            $this->SetTextColor(255);
            $this->SetDrawColor(67, 128, 175);
            $this->SetLineWidth(.3);
            $this->SetFont('helvetica','B',12);
            // Cabecera
            for($i = 0; $i < count($header); $i++)
                $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', true);
            $this->Ln();
            // Restauración de colores y fuentes
            $this->SetFillColor(124, 169, 206);
            $this->SetTextColor(0);
            $this->SetFont('');
            // Datos
            $fill = false;
            while ($row = $data->fetch()) {
                for($i = 0; $i < count($cols); $i++) {
                    $this->Cell($w[$i], 6, $row[$cols[$i]],1);
                }
                $this->Ln();
                $fill = !$fill;
            }
            // Línea de cierre
            $this->Cell(array_sum($w),0,'','T');
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
?>
