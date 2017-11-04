<!DOCTYPE html>
<html>
	<head>
		<title>Modificación de alumno</title>
		<meta charset="utf-8"> <!--Poner los acentos automaticamente.-->
	</head>
	<body>
<?php
		$idUsuarios = $_GET["txtidUsuarios"];
		$Nombre = $_GET["txtNombre"];
		$Contrasena = $_GET["txtContrasena"];
		

		$conexion = mysqli_connect("localhost","root","","delphi");
		$consulta = mysqli_query($conexion, " update usuarios set Nombre = '$Nombre',Contrasena = '$Contrasena',Tipo = '2' where idUsuarios ='$idUsuarios';")or die(mysqli_error($conexion));
		mysqli_close($conexion);
		header("Location: Login_Usuario.html");
?>
	</body>
</html>
	

