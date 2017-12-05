<!DOCTYPE html>
<html>
	<head>
		<title>Login </title>
		<meta charset="utf-8">
	</head>
	<body>
	<?php
		$nombre=$_GET["txtnombre_Admin"];
		$contrasena=$_GET["txtcontrasena_Admin"];
		$conexion=mysqli_connect("localhost","root","","delphi");
		$consulta=mysqli_query($conexion,"select * from usuarios where Nombre='$nombre' and Contrasena='$contrasena' and Tipo=1;");
		$RESULTADO=mysqli_num_rows($consulta);
		
		if((mysqli_num_rows($consulta)>0) && ($nombre == "Administrador") && ($contrasena == "admin")){
			?>
			<script type="text/javascript">
				window.location.href="Inicio_Administrador.php?txtnombre_Admin=<?php echo $nombre; ?>";
			</script>

			<?php
		}else{
			?>
			<script type="text/javascript">
				alert("No se puede iniciar, los datos ingresados son incorrectos, intenta de nuevo");
				window.location.href="Login_Administrador.html";
			</script>
			<?php
		}
		 	mysqli_close($conexion);	
		?>
	</body>
</html>