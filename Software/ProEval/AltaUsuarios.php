<!DOCTYPE html>
<html>
<head>
	<title>Alta Usuario</title>
	<meta charset="utf-8">
</head>
<body>
		<!--h1>Usuario Agregado!!</h1-->

	<?php
	
		$nombre=$_GET["txtnombre"];
		$longitud = 5;
		$id= com_create_guid();
		$passw = substr(MD5(rand(5,100)),0, $longitud);
        $conexion=mysqli_connect("localhost","root","","delphi");

        $sql = mysqli_query($conexion,"select count(1) from usuarios where trim(nombre) = '$nombre'")or die (mysqli_error($conexion));
		list($existe) = mysqli_fetch_row($sql);
if ($existe > 0)
{
    ?>
			<script type="text/javascript">
				alert("Error al guardar...el usuario ya existe");
				window.location.href="registro_usuario.html";
			</script>
			<?php
}else{
	    $consulta= mysqli_query($conexion,"insert into usuarios values(NULL,'$nombre','$passw','2');") or die (
		mysqli_error($conexion));
		
		if($consulta!=null){
			?>
			<script type="text/javascript">
				alert("Usuario Guardado con exito");
				window.location.href="registro_usuario.html";
			</script>
			<?php
		
			 //header("Location: registro_usuario.html");	
		}

		 	mysqli_close($conexion);
			
		
	}
	?>
		
</body>
</html>

