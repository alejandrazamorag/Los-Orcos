<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="estiloUsuarioLogin.css">
	</head>
	<body>	
		<?php
		$idproRes=$_GET['idProymod'];
		echo "idpro $idproRes";
		
		$conexion=mysqli_connect("localhost","root","","delphi");
			$Modest = mysqli_query ($conexion,"UPDATE proyecto SET Estado =3 WHERE idProyecto='$idproRes';")or die(mysqli_error($conexion));

			$update = mysqli_query ($conexion,"UPDATE proyecto_usuarios SET estado_est=0 WHERE Proyecto_idProyecto= '$idproRes';")or die(mysqli_error($conexion));

			$eliminarResul = mysqli_query ($conexion,"DELETE resultados from resultados inner join tareas WHERE Proyecto_idProyecto='$idproRes' AND resultados.Tareas_idTareas=tareas.idTareas;")or die(mysqli_error($conexion));

				?>

				<script type="text/javascript">
				alert(" <?php echo "Puedes volver a estimar el proyecto"?> ");
				window.location.href="Consultar_Proyectos_Aceptar_Restimar.php";

			</script>
			<?php

		?>

	</body>
</html>