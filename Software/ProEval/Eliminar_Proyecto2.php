<!DOCTYPE html>
<html>
	<head>
		<title>Eliminar</title>
		<meta charset="utf-8">
	</head>
	<body>
<?php

	$idproy = $_GET['txtID'];
	$nomb = $_GET['txtNombre'];

	$conexion = mysqli_connect("localhost","root","","delphi");

	$consulta = mysqli_query($conexion, "delete from proyecto where idProyecto = '$idproy';") or die(mysqli_error($conexion));
	mysqli_close($conexion);
	header("Location: Consultar_Proyectos.php");
?>
	</body>
</html>