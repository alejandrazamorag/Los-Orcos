<?php

	include 'plantilla.php';
	require 'conexion.php';
	$idProyectoR=$_GET['idP'];




	$query = "select idTareas ,Descripcion_tareas, Peso from tareas where Proyecto_idProyecto='$idProyectoR';";
	$resultado = $mysqli->query($query);

	$query1 = "select distinct idUsuarios, Nombre from tareas inner join resultados on idtareas=Tareas_idtareas inner join usuarios on resultados.Usuarios_idUsuarios=usuarios.idUsuarios where proyecto_idproyecto='$idProyectoR';";
	$resultado1 = $mysqli->query($query1);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	
	$pdf->ImprimirTexto('textoFijo.txt'); //Texto fijo 
	$pdf->MultiCell(180,8,'');
	$pdf->MultiCell(180,8,'		DATOS DEL PROYECTO');
	$pdf->MultiCell(180,8,'1) Nombre del proyecto: '.utf8_decode($_GET['nomP']));
	$pdf->MultiCell(180,8,utf8_decode('2) Descripción: ').$_GET['des']);
	$pdf->MultiCell(180,8,utf8_decode('3) Fecha de creación: ').$_GET['fecC']);
	$pdf->MultiCell(180,8,'4) Fecha Limite: '.$_GET['fecL']);
	$pdf->MultiCell(180,8,'');

	$pdf->MultiCell(180,8,utf8_decode('El resultados de los pesos de tareas con el Método delphi fueron los siguientes:'));
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(20,6,'idTareas',1,0,'C',1);
	$pdf->Cell(100,6,utf8_decode('Descripción_tareas'),1,0,'C',1);
	$pdf->Cell(20,6,'Peso',1,1,'C',1);
	
	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(20,6,utf8_decode($row['idTareas']),1,0,'C');
		$pdf->Cell(100,6,utf8_decode($row['Descripcion_tareas']),1,0,'C');
		$pdf->Cell(20,6,utf8_decode($row['Peso']),1,1,'C');
	}

	$pdf->MultiCell(180,8,'');

	$pdf->MultiCell(180,8,utf8_decode('Los usuarios que estimarón fueron los siguientes:'));
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(20,6,'idUsuario',1,0,'C',1);
	$pdf->Cell(100,6,'Nombre Usuario',1,1,'C',1);
	
	$pdf->SetFont('Arial','',10);
	
	while($row1 = $resultado1->fetch_assoc())
	{
		$pdf->Cell(20,6,utf8_decode($row1['idUsuarios']),1,0,'C');
		$pdf->Cell(100,6,utf8_decode($row1['Nombre']),1,1,'C');
	}



	$pdf->Output();
?>