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
			
				window.location.href="Inicio_Usuario.php?txtnombre=<?php echo $nombre; ?>";
				//window.location.href="usuario_inicio.php?txtnombre=<?php// <input type="hidden" name="txtnombre" value//="<?php echo $nombre;?>"> echo $nombre; ?>";
			</script>
			<?php
		}else{
			?>
			<script type="text/javascript">
				alert("No se puede iniciar, intenta de nuevo");
				window.location.href="Login_Usuario.html";
			</script>
			<?php
		}
		 	mysqli_close($conexion);
		?>
	</body>
</html>