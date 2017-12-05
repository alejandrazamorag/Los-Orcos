<!DOCTYPE html>
<html>
	<head>
		<title>Login </title>
		<meta charset="utf-8">
	</head>
	<body>
	<?php

		$nombre=$_GET["txtnombre"];
		$contrasena=$_GET["txtcontrasena"];
		$conexion=mysqli_connect("localhost","root","","delphi");
		$consulta=mysqli_query($conexion,"select * from usuarios where Nombre='$nombre' and contrasena='$contrasena' and Tipo=2;");
		$RESULTADO=mysqli_num_rows($consulta);
		if(mysqli_num_rows($consulta)>0){

				
			?>
			<script type="text/javascript">
			
				window.location.href="Inicio_Usuario0.php?txtnombre=<?php echo $nombre; ?>";



				
			</script>
			<?php
		}
		else{
			?>
			<script type="text/javascript">
				alert("No se puede iniciar, los datos ingresados son incorrectos, intenta de nuevo");
				window.location.href="Login_Usuario.html";
			</script>
			<?php
		}
		 	mysqli_close($conexion);
		?>

	</body>
</html>