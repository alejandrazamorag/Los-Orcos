<?php
	require 'fpdf/fpdf.php';
	
	class PDF extends FPDF
	{
		function Header()
		{

			  $this->SetFont('Arial','B',14);
        $this->Line(10,10,206,10);
        $this->Line(10,35.5,206,35.5);
        $this->Cell(30,25,'',0,0,'C',$this->Image('images/k.jpg', 152,15, 19));
        $this->Cell(111,25,'Resultado del Proyecto',0,0,'C', $this->Image('images/k.jpg',20,15,20));
        $this->Cell(40,25,'',0,0,'C',$this->Image('images/k.jpg', 175, 15, 19));
        //Se da un salto de línea de 25
        $this->Ln(25);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10,utf8_decode('Pagina ').$this->PageNo().'/{nb}',0,0,'C' );
		}		

		function ImprimirTexto($file){
        	//Se lee el archivo
        	$txt = file_get_contents($file);
       		 $this->SetFont('Arial','',12);
        	//Se imprime
        	$this->MultiCell(0,5,$txt);
    	}
	}
?>