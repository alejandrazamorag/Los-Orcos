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

date_default_timezone_set("America/Guatemala");
	$fechaactual=date("Y-m-d");
	//echo $fechaactual;
$tabla="";
$query="SELECT * FROM proyecto where Fecha_Limite>='$fechaactual' and Estado=0; ";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['proyectosPro']))
{
	$q=$conexion->real_escape_string($_POST['proyectosPro']);
	$query="SELECT * FROM proyecto WHERE Fecha_Limite>='$fechaactual' and Estado=0 and
		Nombre LIKE '%".$q."%'";
}

$buscarProyectos=$conexion->query($query);
if ($buscarProyectos->num_rows > 0)
{
	$tabla.= 
	'<table class="table">
		<tr class="bg-primary">
			<td>ID_PROY</td>
			<td>NOMBRE</td>
			<td>DESCRIPCION</td>
			<td>FECHA DE CREACIÓN</td>
			<td>FECHA LÍMITE</td>
			<td>HORA DE TERMINO</td>
		</tr>';

	while($filaProyectos= $buscarProyectos->fetch_assoc())
	{
		$tabla.=
		'<tr>
			<td>'.$filaProyectos['idProyecto'].'</td>
			<td>'.$filaProyectos['Nombre'].'</td>
			<td>'.$filaProyectos['Descripcion'].'</td>
			<td>'.$filaProyectos['Fecha_Creacion'].'</td>
			<td>'.$filaProyectos['Fecha_Limite'].'</td>
			<td>'.$filaProyectos['Hora_Limite'].'</td>
			<td> <a href="Proyecto_Proceso_Ver.php?txtnc='.$filaProyectos['idProyecto'].' && txtNom='.$filaProyectos['Nombre'].' && txtdes='.$filaProyectos['Descripcion'].' && txtfc='.$filaProyectos['Fecha_Creacion'].' && txtfl='.$filaProyectos['Fecha_Limite'].'">Ver</a> </td>
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
