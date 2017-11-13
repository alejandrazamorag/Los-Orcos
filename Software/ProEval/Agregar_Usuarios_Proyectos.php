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
		$consulta=mysqli_query($conexion,"insert into proyecto_usuarios (Proyecto_idProyecto, Usuarios_idUsuarios)  values ('$idProyecto', '$id');")or die(mysqli_error($conexion));
if($consulta!=null){
		?>

			<script type="text/javascript">
				alert(" <?php echo "Usuario Agregado al Proyecto"?> ");
				window.location.href="Consultar_Usuarios.php";

			</script>
			<?php
		
		}else{

			?>

			<script type="text/javascript">
				alert(" <?php echo "Fallo, vuelve a intentar"?> ");

				
			</script>
			<?php
			mysqli_close($conexion);
			}
?>

	</body>
</html>