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
session_start();
 $nombre =$_SESSION['nombre'];
 $idusuario=$_SESSION['idusuario'];
$tabla="";
$query="select proyecto.idProyecto , proyecto.Nombre, proyecto.Descripcion, proyecto.Fecha_Creacion, proyecto.Fecha_Limite from proyecto inner join proyecto_usuarios on proyecto_usuarios.Proyecto_idProyecto=proyecto.idProyecto inner join usuarios on usuarios.Nombre='$nombre' where proyecto_usuarios.Usuarios_idUsuarios=usuarios.idUsuarios and proyecto_usuarios.estado_est=0;";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['proyectosu']))
{
	$q=$conexion->real_escape_string($_POST['proyectosu']);
	$query="SELECT * FROM proyecto WHERE 
		Nombre LIKE '%".$q."%'";
}

$buscarProyectos=$conexion->query($query);
if ($buscarProyectos->num_rows > 0)
{
	$tabla.= 
	'<table class="table">
		<tr class="bg-primary">
			<td>Id_Proy</td>
			<td>NOMBRE</td>
		</tr>';

	while($filaProyectos= $buscarProyectos->fetch_assoc())
	{
		$tabla.=
		'<tr>
			<td>'.$filaProyectos['idProyecto'].'</td>
			<td>'.$filaProyectos['Nombre'].'</td>
			<td> <a href="Visualizar_Proyecto_Usuario.php?txtnc='.$filaProyectos['idProyecto'].' && txtNombre='.$filaProyectos['Nombre'].' && txtdescripcion='.$filaProyectos['Descripcion'].' && txtfechaC='.$filaProyectos['Fecha_Creacion'].' && txtfechaL='.$filaProyectos['Fecha_Limite'].'"> Estimar </a> </td>
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
