<!DOCTYPE html>
<html>
	<head>
		<title>Registro usuario</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="estiloUsuarioLogin.css">
	</head>
	<body>
		<?php
		session_start();
			$idProyecto=$_GET['var']; 
			$id=$_SESSION['idUsuarioAdmin'];  
			
			//$idUbica=$_GET['idUbicacion']; 
			//echo $idProyecto;
			//echo $id;
 		$conexion=mysqli_connect("localhost","root","","delphi");


$sql = mysqli_query($conexion,"select count(1) from proyecto_usuarios where trim(Proyecto_idProyecto) = '$idProyecto' and trim(Usuarios_idUsuarios) = '$id'")or die (mysqli_error($conexion));
		list($existe) = mysqli_fetch_row($sql);
if ($existe > 0)
{
    ?>
			<script type="text/javascript">
				alert("Error al guardar...el usuario ya tiene este proyecto");
				window.location.href="Crear_Proyecto.php";
			</script>
			<?php
}else{
		$consulta=mysqli_query($conexion,"insert into proyecto_usuarios (Proyecto_idProyecto, Usuarios_idUsuarios,estado_est)  values ('$idProyecto', '$id', 0);")or die(mysqli_error($conexion));
if($consulta!=null){
		?>

			<script type="text/javascript">
				alert(" <?php echo "Usuario Agregado al Proyecto"?> ");
				window.location.href="Consultar_Usuarios.php";

			</script>
			<?php
		
		}
			mysqli_close($conexion);
		}
?>

	</body>
</html>