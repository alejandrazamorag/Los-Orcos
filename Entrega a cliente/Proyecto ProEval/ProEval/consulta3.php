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
$query="select idProyecto, Nombre, Descripcion, Fecha_Creacion, Fecha_Limite, Hora_Limite from proyecto";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['proyectost']))
{
	$q=$conexion->real_escape_string($_POST['proyectost']);
	$query="SELECT * FROM proyecto WHERE 
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
			<td> <a href="Visualizar_Proyecto.php?txtnc='.$filaProyectos['idProyecto'].' && txtNombre='.$filaProyectos['Nombre'].' && txtdescripcion='.$filaProyectos['Descripcion'].' && txtfechaC='.$filaProyectos['Fecha_Creacion'].' && txtfechaL='.$filaProyectos['Fecha_Limite'].'"> ver</a> </td>
			<td> <a href="Opciones_Modificar_Proyecto.php?txtnc='.$filaProyectos['idProyecto'].' && txtNombre='.$filaProyectos['Nombre'].'">Modificar</a> </td>
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
