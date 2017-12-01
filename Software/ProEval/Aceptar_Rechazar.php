<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="estiloUsuarioLogin.css">
	</head>
	<body>	
		<?php
		$modid=$_GET['idProymod'];
		echo "idpro $modid";
$listadesv=$_GET["desvs"];
		if ($listadesv!=null){
			
			$longitud = count($listadesv);
			echo "lista: $longitud";
			$listaidTareas=$_GET["idTareasA"]; 
			
			$listapesosN=$_GET["idPesosN"];
			$tempo=0;
			$tempo1=0;
		 	;
			for($i=0; $i<$longitud; $i++)
      		{
	 			 if(($listadesv[$i] >=0)&&($listadesv[$i] <=1.5)){
					$tempo++;
				}else{
					$tempo1++;
				}
      		}
      	echo "en el rango $tempo y "."<br/>";
       	echo " no estan en el rango $tempo1"."<br/>";
       	$conexion=mysqli_connect("localhost","root","","delphi");
       	if($longitud==$tempo){
       		/*
       		$a=0;
			foreach ($listaidTareas as $id) {
				$consulta=mysqli_query($conexion,"UPDATE tareas SET Peso='$listapesosN[$a]' WHERE idTareas = 'listaidTareas[$a]';")or die(mysqli_error($conexion));
				$a++;
			}*/
			for ($m = 0; $m < count($_GET["idTareasA"]); $m++) 
				{
    		$update = mysqli_query ($conexion,"UPDATE tareas  SET Peso='{$_GET['idPesosN'][$m]}' 
                                                 WHERE idTareas='{$_GET['idTareasA'][$m]}'") 
                                                 or die ('Problemas con el query'.mysqli_error($conexion));

				}
				//poner una variable para idproyecto que sea global
			$modProyecto = mysqli_query ($conexion,"UPDATE proyecto SET Estado= 1 WHERE idProyecto='$modid';" )or die ('Problemas con el query'.mysqli_error($conexion));
       		?>


       		<script type="text/javascript">
				alert("El proyecto fue aceptado de acuerdo al método DELPHI");
				window.location.href="Consultar_Proyectos_Terminados.php.php";
			</script>
			<?php
       	}else if ($tempo>=1){
       		$modProyecto = mysqli_query ($conexion,"UPDATE proyecto SET Estado= 2 WHERE idProyecto='$modid';" )or die ('Problemas con el query'.mysqli_error($conexion));
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
		?>

	</body>
</html>