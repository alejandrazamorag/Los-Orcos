<!doctype html>
<html lang="en">
	<head>

				<script >
			function validar(e){
				key=e.keyCode || e.which;

				teclado=String.fromCharCode(key);
			
			especiales="8-37-38-46";
			letras="ABCDEFGHIJKLMNÑOPRRSTUVWXYZabcdefghijklmnñopqrstuvwxyz0123456789";
			teclado_especial=false;

			for ( var i in especiales){
					if(key==especiales[i]){
						teclado_especial=true;
					}
			}

			if(letras.indexOf(teclado)==-1 && !teclado_especial){
				return false;
			}
		}

				
			
		</script>


		<title>Ingresar Usuario</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="estiloUsuarioLogin.css">



	</head>
	<body>
	<?php
			$conexion = mysqli_connect("localhost", "root","","delphi");
			$idUsuarios = $_GET['txtidUsuarios'];
			$consulta = mysqli_query($conexion,"select * from usuarios where idUsuarios = '$idUsuarios';") or die (mysqli_error($conexion));
			$registro = mysqli_fetch_array($consulta);
?>

			<h1>Modificacion de usuario</h1>
			<form name="frmalta" method="get" action="05_Modificar2.php">
			<table border="1">
			<tr>
				<td>idUsuario:</td>
				<td>
				<?php
					echo $registro['idUsuarios'];
					
					?>
					<input type="hidden" name="txtidUsuarios" value="<?php echo $registro['idUsuarios']; ?>"></td>
					</tr>
					<tr>
						<td>Nombre:</td>
						<td><input type="text" name="txtNombre" required="required" ></td>
					</tr>
				 <tr>
						<td>Contraseña:</td>
						<td><input type="text" name="txtContrasena" required="required" ></td>
					</tr>
				
			
					</td>
				</tr>
				<tr>
				<!--rowspan-->
					<td colspan="2",>
						<input type="submit" name="btnenviar" value="Guardar">
					</td>
				</tr>
			</table>
			</form>
	</body>
</html>