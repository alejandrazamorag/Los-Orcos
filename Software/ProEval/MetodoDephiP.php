<?php
//SELECT * FROM proyecto where Fecha_Limite>=2017-11-16  para proyectos vencidos
//$conexion = mysqli_connect("localhost","root","","delphi");	
	
/*date_default_timezone_set("America/Guatemala");
	$fechaactual=date("Y-m-d");

	echo "$fechaactual";
echo "-----------";
	$horaactual=date("H:i:s");
	echo $horaactual;

/////saco los proyectos de esa fecha
	
	$consulta = mysqli_query($conexion, " SELECT idProyecto from proyecto WHERE Fecha_Limite='2017-11-14';")or die(mysqli_error($conexion));

		$datos= array();
		while ($row = mysqli_fetch_array($consulta)){
			$datos[]=$row;
		}
		
	var_dump($datos);*/
////////saco las tareas de ese proyecto
/*
	$consulta2 = mysqli_query($conexion, " SELECT idtareas from tareas WHERE Proyecto_idProyecto=1;")or die(mysqli_error($conexion));

	$datos2= array();
		while ($row = mysqli_fetch_array($consulta2)){
			$datos2[]=$row;
		}
$string_array = json_encode($datos2);
		$i=0;
		if(is_array($string_array)){
		foreach ($string_array as $idtareas) {
				$consulta=mysqli_query($conexion,"update resultados  Final=0 where Tareas_idTareas='$string_array[$i]';")or die(mysqli_error($conexion));
				$i++;


				}
			}
*/
/*
	var_dump($datos2);
///////saco los resultados de esa tarea
		$consulta3 = mysqli_query($conexion, " SELECT Temporal from resultados WHERE Tareas_idTareas=1;")or die(mysqli_error($conexion));

	$datos3= array();
		while ($row = mysqli_fetch_array($consulta3)){
			$datos3[]=$row;
		}
		var_dump($datos3);


		$consulta=mysqli_query($conexion,"SELECT STD(Temporal) from resultados WHERE Tareas_idTareas=1");
		$r=mysqli_fetch_row($consulta);
		echo $r[0]; //Esta esla variable que contiene el id del proyecto creado
		$id = $r[0]; 
*//*

		$consulta2 = mysqli_query($conexion, " SELECT idtareas from tareas WHERE Proyecto_idProyecto='1';")or die(mysqli_error($conexion));
  $arregloT= array();
    while ($row = mysqli_fetch_array($consulta2)){
      $arregloT[]=$row["idtareas"];
    }
    var_dump($arregloT);*/



    // Variables de conexión 
    $user="root"; 
    $password=""; 
    $database="delphi"; 
    $server="localhost"; 

    //Conexión al servidor 

    $conexion = mysqli_connect($server,$user,$password,$database); 
    if (!$conexion) { 
        echo('No pudo conectarse al servidor<br><br>'); 
    } 


    // Enviar consulta para las preguntas 
    $instruccion_preguntas = "SELECT idTareas FROM tareas where Proyecto_idProyecto=1"; 
    $consulta_preguntas = mysqli_query ($conexion, $instruccion_preguntas) 
        or die ("Fallo en la consulta a tabla preguntas"); 
    // Nº de filas de preguntas 
    $npreg= mysqli_num_rows($consulta_preguntas); 

    for($i=0;$i<$npreg;$i++){ 

        //consulta que devuelve la desviacion tipica de la pregunta que corresponde 
        $instruccion_desv = "select STDDEV(Temporal) from resultados where Tareas_idTareas = $i"; 
        $consulta_desv = mysqli_query ($conexion,$instruccion_desv) 
            or die ("Fallo en la consulta desviacion"); 
        $desviacion[$i] = mysqli_fetch_array ($consulta_desv); 
    } 
?> 

    <div id="title"> 
        <h1><span class="Estilo1"> Informe Estudio de Satisfacción de la Biblioteca</span></h1> 
    </div> 

    <div id="formulario"> 
            <?php 
            if($npreg){ 
                print ("<TABLE>\n"); 
                print ("<TR>\n"); 
                print ("<TH>Pregunta</TH>\n"); 
                print ("<TH>Desviaci&oacute; T&iacute;pica</TH>\n");  
                print ("</TR>\n"); 
                $r=0; 
                while($res_preg = mysqli_fetch_array($consulta_preguntas)){     
                    print("<TR>"); 
                        print '<TD>'. $res_preg['Descripcion_Tareas']. '</TD>'; 
                        print '<TD>'. $desviacion[$r]. '</TD>'; 
                    print("</TR>"); 
                    $r++; 
                } 
                echo'</table>'; 
            }else{ 
                print ("No hay preguntas disponibles"); 
            } 
            ?> 
    </div> 

<?php 
    // Cerrar conexión 
    mysqli_close ($conexion); 
?> 


?>

$consulta2 = mysqli_query($conexion, " SELECT idtareas from tareas WHERE Proyecto_idProyecto='$idProyectoAceptar';")or die(mysqli_error($conexion));
  $arregloT= array();
    while ($row = mysqli_fetch_array($consulta2)){
      $arregloT[]=$row["idtareas"];
    }

$i=0;
foreach ($arregloT as $id) {
  $consulta=mysqli_query($conexion,"select Descripcion_Tareas, (SELECT STD(Temporal) from resultados WHERE Tareas_idTareas='".$arregloT[$i]."') as desviacion from tareas where Proyecto_idProyecto=$idProyectoAceptar;")
     or die(mysqli_error($conexion));
     $i++;
}
     

      if(mysqli_num_rows($consulta)>0){
?>
    <div style="width:800px; height:100px;  position: absolute; top: 100px; left: 200px;">
      <h2>  Resultado de las tareas</h2>
      <table cellspacing="0" cellpadding="1" border="1" width="800">        
          <tr style="color:white;background-color:grey"r>
            <th>Descripcion de la tarea</th>
            <th>Desviación Estandar</th>
            </tr>
<?php
        while($registro=mysqli_fetch_array($consulta)){
          echo "<tr>";
          echo "<td>".$registro['Descripcion_Tareas']."</td>";
           echo "<td>".$registro['desviacion']."</td>";
          echo "</tr>";
          
        }
        ?>
        </table>
<?php
      }else{
           ?>
          <h1><?php echo "No existen tareas"; ?> </h1>
          <?php
      }
      mysqli_close($conexion);

    ?>
</div>