<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="estiloUsuarioLogin.css">
	</head>
	<body>	
		<?php
		session_start (); 
			$listaid=$_GET["idTareas"]; 
			$listapeso=$_GET["Peso"];
			$idPro=$_GET['pro'];
			$idUsu=$_SESSION['idusuario'];
			$Nom=$_SESSION['nombre'];
			$i=0;
			$conexion=mysqli_connect("localhost","root","","delphi");

			foreach ($listaid as $id) {
				$consulta=mysqli_query($conexion,"insert into resultados (idResultados, Tareas_idTareas, Usuarios_idUsuarios, Temporal, Final) VALUES ( null, '$listaid[$i]', '$idUsu' , '$listapeso[$i]', null);")or die(mysqli_error($conexion));
				$i++;


				
			}
			//aqui poner la otra consulta para modificar el estado ya modificado

			$consulta=mysqli_query($conexion,"UPDATE proyecto_usuarios SET estado_est =1 WHERE Proyecto_idProyecto='$idPro' AND Usuarios_idUsuarios='$idUsu'; ")or die(mysqli_error($conexion));
			?>
			<script type="text/javascript">
				alert("Se guardo tu estimacion correctamente <?php echo $Nom ?>");
				window.location.href="Inicio_Usuario.php";
			</script>
			<?php

		 	mysqli_close($conexion);
		?>

	</body>
</html>