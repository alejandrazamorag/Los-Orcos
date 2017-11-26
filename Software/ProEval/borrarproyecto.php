<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="estiloUsuarioLogin.css">
	</head>
	<body>	
		<?php
			$proyect=$_GET['t'];
			echo "$proyect";
			$conexion=mysqli_connect("localhost","root","","delphi");
			$consulta=mysqli_query($conexion,"DELETE FROM proyecto WHERE idProyecto ='$proyect' and Estado =1; ")or die(mysqli_error($conexion));
			?>
			<script type="text/javascript">
				alert("Se elimino_correctamente");
				window.location.href="Consultar_Proyectos_Terminados.php";
			</script>
			<?php

		 	mysqli_close($conexion);
		?>

	</body>
</html>