<!DOCTYPE html>
<html>
	<head>
		<title>Registro usuario</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="estiloUsuarioLogin.css">
	</head>
	<body>
		<?php
			$idProyecto=$_GET['idProyecto']; 
			$id=$_GET['id'];  
			
			//$idUbica=$_GET['idUbicacion']; 
			//echo $idProyecto;
			//echo $id;
 		$conexion=mysqli_connect("localhost","root","","delphi");
		$consulta=mysqli_query($conexion,"insert into proyecto_usuarios (Proyecto_idProyecto, Usuarios_idUsuarios)  values ('$idProyecto', '$id');")or die(mysqli_error($conexion));
if($consulta!=null){
			//	echo "cotizacion realizada y costo de $total";
		?>

			<script type="text/javascript">
				alert(" <?php echo "Usuario Agregado al Proyecto"?> ");

			</script>
			<?php

		
		}else{

			?>

			<script type="text/javascript">
				alert(" <?php echo "Fallo, vuelve a intentar"?> ");

				//window.location.href="cotizacion.php";
			</script>
			<?php
			mysqli_close($conexion);
			}
?>
		<form name="frmregresar" action="Consultar_Usuarios.php">
		<h1>ProEval</h1>
			<input type="submit" name="btnregresar" value="Regresar">
			<!-- <input type="text" name="txtnombre" value=<?php echo $nombre ?> <div style="visibility: hidden;"> </div>-->
		</form>

	</body>
</html>