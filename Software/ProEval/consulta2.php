<?php
/////// CONEXIÓN A LA BASE DE DATOS /////////
$host = 'localhost';
$basededatos = 'delphi';
$usuario = 'root';
$contraseña = '';

$conexion = new mysqli($host, $usuario,$contraseña, $basededatos);
if ($conexion -> connect_errno)
{
	die("Fallo la conexion:(".$conexion -> mysqli_connect_errno().")".$conexion-> mysqli_connect_error());
}

//////////////// VALORES INICIALES ///////////////////////

$tabla="";
$query="SELECT * FROM usuarios where Tipo=2 ORDER BY idUsuarios";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['usuarios']))
{
	$q=$conexion->real_escape_string($_POST['usuarios']);
	$query="SELECT * FROM usuarios WHERE Tipo=2 AND
		Nombre LIKE '%".$q."%'";
}

$buscarUsuarios=$conexion->query($query);
if ($buscarUsuarios->num_rows > 0)
{
	$tabla.= 
	'<table class="table">
		<tr class="bg-primary">
			<td>ID USUARIOS</td>
			<td>NOMBRE</td>
			<td>CONTRASEÑA</td>
		</tr>';

	while($filaUsuarios= $buscarUsuarios->fetch_assoc())
	{
		$tabla.=
		'<tr>
			<td>'.$filaUsuarios['idUsuarios'].'</td>
			<td>'.$filaUsuarios['Nombre'].'</td>
			<td>'.$filaUsuarios['Contrasena'].'</td>
			<td> <a href="Visualizar_Usuario.php?var1='.$filaUsuarios['idUsuarios'].' && var2='.$filaUsuarios['Nombre'].' && var3='.$filaUsuarios['Contrasena'].'"> ver </a> </td>
		 </tr>
		';
	}

	$tabla.='</table>';
} else
	{
		$tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
	}

mysqli_close($conexion);
echo $tabla;
?>
