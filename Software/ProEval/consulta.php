<?php
/////// CONEXIÓN A LA BASE DE DATOS /////////
session_start();
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
$query="SELECT * FROM proyecto ORDER BY idProyecto";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['proyecto']))
{
	$q=$conexion->real_escape_string($_POST['proyecto']);
	$query="SELECT * FROM proyecto WHERE 
		Nombre LIKE '%".$q."%'";
}
$buscarProyectos=$conexion->query($query);
if ($buscarProyectos->num_rows > 0)
{
	$tabla.= 
	'<table class="table">
		<tr class="bg-primary">
			<td>ID Proyecto</td>
			<td>Nombre</td>
			<td>Descripción</td>
		</tr>';

	while($filaProyectos= $buscarProyectos->fetch_assoc())
	{ 
		$tabla.=
		'<tr>

			<td>'.$filaProyectos['idProyecto'].'</td>
			<td>'.$filaProyectos['Nombre'].'</td>
			<td>'.$filaProyectos['Descripcion'].'</td>
			<td> <a href="Agregar_Usuarios_Proyectos.php?var='.$filaProyectos['idProyecto'].'"> Añadir Proyecto </a> </td>
		 </tr>
		';

		
	}
//echo "<td></td>";

	$tabla.='</table>';
} else
	{
		$tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
	}


echo $tabla;
?>

