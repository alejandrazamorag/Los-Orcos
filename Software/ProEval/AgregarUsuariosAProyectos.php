<!DOCTYPE html>
<html>
<head>
	<title>Agregar usuario a proyecto</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estiloUsuarioLogin.css">
</head>
<body>
	<?php
		$idusuario = $_GET["idUsuarios"];
		$idproyecto = $_GET["idProyecto"];
		$conexion = mysqli_connect("localhost","root","","delphi");
		$consulta = mysqli_query($conexion, "insert into proyecto_usuarios values('$idusuario', '$idproyecto');")or die(mysqli_error($conexion));
		if($consulta!=null){
	?>
			<script type="text/javascript">
				alert(" <?php echo "Guardo usuario dentro del proyecto"?> ");
			</script>
			<?php
		}else{
			?>
			<script type="text/javascript">
				alert(" <?php echo "Fallo"?> ");
			</script>
	<?php
			mysqli_close($conexion);
			}
	?>	
  <form name="frmregresar" action="Inicio_Administrador.php">
    <input type="submit" name="btnregresar" value="Regresar">
  </form> 
</body>
</html>