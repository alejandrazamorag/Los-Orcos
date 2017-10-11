
<?php
////////////////// CONEXION A LA BASE DE DATOS //////////////////

$host = 'localhost';
$basededatos = 'delphi';
$usuario = 'root';
$contraseña = '';



$conexion = new mysqli($host, $usuario,$contraseña, $basededatos);
if ($conexion -> connect_errno) {
die( "Fallo la conexión : (" . $conexion -> mysqli_connect_errno() 
. ") " . $conexion -> mysqli_connect_error());
}
  ///////////////////CONSULTA DE LOS ALUMNOS///////////////////////
$id = $_GET["id"];
$nombrep =$_GET["nombrep"];
echo $id; 
echo $nombrep;
$alumnos="SELECT * FROM tareas where Proyecto_idProyecto='$id';";
$queryAlumnos= $conexion->query($alumnos);


?>

<html lang="es">

	<head>
		<title></title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

		<link rel="stylesheet" href="css/estilos.css" rel="stylesheet">
		
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script>

		<script>
			
    		$(function(){
				// Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
				$("#adicional").on('click', function(){
					$("#tabla tbody tr:eq(0)").clone().removeClass('fila-fija').appendTo("#tabla");
				});
			 
				// Evento que selecciona la fila y la elimina 
				$(document).on("click",".eliminar",function(){
					var parent = $(this).parents().get(0);
					$(parent).remove();
				});
			});
		</script>



	</head>

	<body>
		<header>
			<div class="alert alert-info">
			<h2>Insertar Tareas al Proyecto "<?php echo $nombrep ?>" </h2>
			</div>
		</header>

		<section>

				<table class="table">


					<tr class="info">
						<th>Proyecto</th>
						<th>Descripción</th>

				    </tr>

				  <?php

				  while($registroAlumno  = $queryAlumnos->fetch_array( MYSQLI_BOTH)) 
				  {


				  echo '<tr>
				    	<td>'.$registroAlumno['Proyecto_idProyecto'].'</td>
				    	<td>'.$registroAlumno['Descripcion_Tareas'].'</td>
				    </tr>';
				   }

				  ?>


				</table>

			<form method="post">
				<h3 class="bg-primary text-center pad-basic no-btm">Agregar Nueva Tarea </h3>
				<table class="table bg-info"  id="tabla">
					<tr class="fila-fija">
						<td><input required name="nombre[]" placeholder="Descripción de la tareas"   size="100" /></td>
						<td><input required style="visibility:hidden" name="idalumno[]" value="<?php echo $id ?>" /></td>
					</tr>
				</table>

				<div class="btn-der">
					<input type="submit" name="insertar" value="Insertar Tarea" class="btn btn-info"/>
				</div>

			</form>

			<?php

				//////////////////////// PRESIONAR EL BOTÓN //////////////////////////
				if(isset($_POST['insertar']))

				{


				$items1 = ($_POST['idalumno']);
				$items2 = ($_POST['nombre']);
				 
				///////////// SEPARAR VALORES DE ARRAYS, EN ESTE CASO SON 4 ARRAYS UNO POR CADA INPUT (ID, NOMBRE, CARRERA Y GRUPO////////////////////)
				while(true) {

				    //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
				    $item1 = current($items1);
				    $item2 = current($items2);
				    
				    ////// ASIGNARLOS A VARIABLES ///////////////////
				    $id=(( $item1 !== false) ? $item1 : ", &nbsp;");
				    $nom=(( $item2 !== false) ? $item2 : ", &nbsp;");

				    //// CONCATENAR LOS VALORES EN ORDEN PARA SU FUTURA INSERCIÓN ////////
				    $valores='('.$id.',"'.$nom.'"),';

				    //////// YA QUE TERMINA CON COMA CADA FILA, SE RESTA CON LA FUNCIÓN SUBSTR EN LA ULTIMA FILA /////////////////////
				    $valoresQ= substr($valores, 0, -1);
				    
				    ///////// QUERY DE INSERCIÓN ////////////////////////////
				    $sql = "INSERT INTO tareas (Proyecto_idProyecto ,Descripcion_Tareas) 
					VALUES $valoresQ";

					
					$sqlRes=$conexion->query($sql) or mysql_error();

				    
				    // Up! Next Value
				    $item1 = next( $items1 );
				    $item2 = next( $items2 );
				    
				    // Check terminator
				    if($item1 === false && $item2 === false) break;
    
				}
		
				}

			?>



		</section>

		<footer>
		</footer>

		<div class="btn-der">
				<form name="frmragregart" action="Inicio_Administrador.php" method="get">
					<input type="submit" name="btnregresar" value="Hecho">
				</form>
		</div>
	</body>

</html>


