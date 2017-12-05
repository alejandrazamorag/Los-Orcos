<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="estiloUsuarioLogin.css">
	</head>
	<body>	
		<?php
		$idPRes=$_GET['idProymod'];
		echo "idpro $idPRes";
		$listadevRes=$_GET["desvs"];
		if ($listadevRes!=null){
			
			$long = count($listadevRes);
			echo "lista: $long";
			$listaidTareasRes=$_GET["idTareasA"]; 
			
			$listapesosRes=$_GET["idPesosN"];
			$tempoRes=0;
			$tempoRes1=0;
		 	;
			for($i=0; $i<$long; $i++)
      		{
	 			 if(($listadevRes[$i] >=0)&&($listadevRes[$i] <=1.5)){
					$tempoRes++;
				}else{
					$tempoRes1++;
				}
      		}
      	echo "en el rango $tempoRes y "."<br/>";
       	echo " no estan en el rango $tempoRes1"."<br/>";
       	$conexion=mysqli_connect("localhost","root","","delphi");
       	if($long==$tempoRes){
       		/*
       		$a=0;
			foreach ($listaidTareasRes as $id) {
				$consulta=mysqli_query($conexion,"UPDATE tareas SET Peso='$listapesosRes[$a]' WHERE idTareas = 'listaidTareasRes[$a]';")or die(mysqli_error($conexion));
				$a++;
			}*/
			for ($m = 0; $m < count($_GET["idTareasA"]); $m++) 
				{
    		$update = mysqli_query ($conexion,"UPDATE tareas  SET Peso='{$_GET['idPesosN'][$m]}' 
                                                 WHERE idTareas='{$_GET['idTareasA'][$m]}'") 
                                                 or die ('Problemas con el query'.mysqli_error($conexion));

				}
				//poner una variable para idproyecto que sea global
			$modProyecto = mysqli_query ($conexion,"UPDATE proyecto SET Estado= 1 WHERE idProyecto='$idPRes';" )or die ('Problemas con el query'.mysqli_error($conexion));
       		?>


       		<script type="text/javascript">
				alert("El proyecto fue aceptado de acuerdo al método DELPHI");
				window.location.href="Consultar_Proyectos_Terminados.php.php";
			</script>
			<?php
       	}else if ($tempoRes1>=1){
       		$modProyecto = mysqli_query ($conexion,"UPDATE proyecto SET Estado= 2 WHERE idProyecto='$idPRes';" )or die ('Problemas con el query'.mysqli_error($conexion));
       		?>
       		<script type="text/javascript">
				alert("No se puede aceptar el proyecto ya que 1 o varias tareas fueron rechazadas por el método.... vuelve a estimar");
				alert("Este proyecto ahora es Rechazado");
				window.location.href="Consultar_Proyectos_PorAceptar.php";
			</script>
			<?php
       	}	
}else{
	?>
       		<script type="text/javascript">
				alert("No se puede guardar la estimación, solo 1 persona estimo");
				//window.location.href="Consultar_Proyectos.php";
			</script>
			<?php
			
}
mysqli_close($conexion);
		?>

	</body>
</html>