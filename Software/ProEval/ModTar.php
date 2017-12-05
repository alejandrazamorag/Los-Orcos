<!DOCTYPE html>
<html>
	<head>
		<title>Modificación de alumno</title>
		<meta charset="utf-8"> <!--Poner los acentos automaticamente.-->
	</head>
	<body>
<?php
		$ip = $_GET["txtidproy"];
		$it = $_GET["txtidtar"];
		$des = $_GET["txtDescripcionT"];


		

		$conexion = mysqli_connect("localhost","root","","delphi");
		$consulta = mysqli_query($conexion, " UPDATE tareas SET Descripcion_Tareas = '$des' WHERE idTareas = '$it';")or die(mysqli_error($conexion));
			
			?>
			<script type="text/javascript">
				alert("Modificación de Tarea guardada correctamente");
				window.location.href="Consultar_Proyectos.php";
			</script>
			<?php
		 	mysqli_close($conexion);
		

?>
	</body>
</html>
	

