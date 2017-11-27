<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="estiloUsuarioLogin.css">
	</head>
	<body>	
		<?php
			$id=$_GET["id"];
			$nombreProyecto=$_GET["txtNombreProyecto"];
			$descripcion=$_GET["txtDescripcion"]; 
			$fechalim=$_GET["fechalimite"];
			$horalim=$_GET["horalimite"];
			$fechaCreacion=date("Y-m-d");
		$horaactual= date("H:i:s");
if ($fechalim >= $fechaCreacion) {
			$conexion=mysqli_connect("localhost","root","","delphi");
			$consulta=mysqli_query($conexion,"update proyecto set Nombre='$nombreProyecto', Descripcion='$descripcion', Fecha_Limite='$fechalim', Hora_Limite='$horalim' where idProyecto='$id';") or die(mysqli_error($conexion));

			if($consulta!=null){
		?>
			<script type="text/javascript">
				alert(" <?php echo "Modifico datos basicos del proyecto"?> ");
				window.location.href="Consultar_Proyectos.php";
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
		}else{

			?>

			<script type="text/javascript">
				alert(" <?php echo "menor la fecha"?> ");
				window.location.href="Consultar_Proyectos.php";
			</script>
			<?php
			mysqli_close($conexion);
			}

		

		
		?>
		?>

	</body>
</html>