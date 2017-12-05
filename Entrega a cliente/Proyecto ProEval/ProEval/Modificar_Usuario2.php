<!DOCTYPE html>
<html>
	<head>
		<title>Modificación de alumno</title>
		<meta charset="utf-8"> <!--Poner los acentos automaticamente.-->
	</head>
	<body>
<?php
		session_start();
		$idUsuarios = $_SESSION['idusuario'];
		$Nom = $_GET["txtNombre"];
		$Contrasena = $_GET["txtContrasena"];
		$_SESSION['temp']=$Nom;
		$_SESSION['nombre']= $_SESSION['temp'];
		

		$conexion = mysqli_connect("localhost","root","","delphi");
		$consulta = mysqli_query($conexion, " update usuarios set Nombre = '$Nom',Contrasena = '$Contrasena',Tipo = '2' where idUsuarios ='$idUsuarios';")or die(mysqli_error($conexion));
			

		mysqli_close($conexion);

		//header("Location: Inicio_Usuario0.php");
		
			?>
			<script type="text/javascript">
				alert("Guardado Correctamente");
				window.location.href="Inicio_Usuario1.php";
			</script>
			<?php
		 	mysqli_close($conexion);
		

?>
	</body>
</html>
	

