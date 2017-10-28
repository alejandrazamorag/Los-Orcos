<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="estiloUsuarioLogin.css">
	</head>
	<body>	
		<?php
			$nombreProyecto=$_GET["txtNombreProyecto"];
			$nombreProyecto2=$_GET["txtNombreProyecto2"];
			$descripcion=$_GET["txtDescripcion"]; 
			$fechalim=$_GET["fechalimite"];
			$horalim=$_GET["horalimite"];

			$conexion=mysqli_connect("localhost","root","","delphi");
			$fechaCreacion=date("Y-m-d");

			$consulta=mysqli_query($conexion,"update proyecto set Nombre='$nombreProyecto2', Descripcion='$descripcion', Fecha_Creacion='$fechaCreacion', Fecha_Limite='$fechalim', Hora_Limite='$horalim' where Nombre='$nombreProyecto';") or die(mysqli_error($conexion));

			if($consulta!=null){
		?>
			<script type="text/javascript">
				alert(" <?php echo "Modifico datos basicos del proyecto"?> ");
			</script>
		<?php
			}else{
		?>
			<script type="text/javascript">
				alert(" <?php echo "Fallo"?> ");
			</script>
		<?php
			mysqli_close($conexion);
			}
		?>
<?php
		$consulta=mysqli_query($conexion,"select idProyecto from proyecto where Nombre='$nombreProyecto';");
		$r=mysqli_fetch_row($consulta);
		//echo $r[0]; //Esta esla variable que contiene el id del proyecto creado
		$id = $r[0];
		$nombrep=$nombreProyecto;
		//echo $nombrep;
?>

		<form name="frmragregart" action="insertar_tareas.php" method="get">
			<h1> ProEval</h1>
			<h2>Da clic al boton de abajo para modificar las tareas</h2>
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<input type="hidden" name="nombrep" value="<?php echo $nombreProyecto; ?>">
			<input type="submit" name="btnregresar" value="Modificar Tareas">
		</form>

	</body>
</html>