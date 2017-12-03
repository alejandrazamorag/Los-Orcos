<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Ver Proyecto rechazado</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/estil.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
       
  <link rel="stylesheet" href="style30.css" type="text/css" media="screen">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css" >
     <link rel="stylesheet" href="estiloUsuario.css" type="text/css" media="screen">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript" ></script>
    <script src="js/menu.js" type="text/javascript"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


</head>
  
 <body>
 
 <div class="mainWrap">
 <a id="touch-menu" class="mobile-menu" href="#"><i class="icon-reorder"></i>Menú</a>
    <nav>
    <ul class="menu">
   <li><a href="#"><i class="icon-adm.png""></i>ADMIN</a>

   <ul class="sub-menu">
   <li><a href="Principal.html">Salir</a></li>
   </ul>
   </li>
   
   <li><a  href="#"><i class="icon-user"></i>PROYECTOS</a>
  <ul class="sub-menu">
  <li><a href="Crear_Proyecto.php">Crear Nuevo Proyecto</a></li>
   <li><a href="Consultar_Proyectos.php"> Todos los Proyectos</a></li>
  <li><a href="Consultar_Proyectos_Terminados.php">Proyectos Aceptados</a></li>
   <li><a href="Consultar_Proyectos_Rechazados.php">Proyectos Rechazado</a></li>
  <li><a href="Consultar_Proyectos_Proceso.php">Proyectos En Proceso</a></li>
  <li><a href="Consultar_Proyectos_PorAceptar.php">Proyectos por Aceptar</a></li>
  <li><a href="Consultar_Proyectos_Aceptar_Restimar.php">Proyectos Restimados por Aceptar </a></li>


    <ul>

    </ul>

   </li>

   </ul>

  </li>

  <li><a href="#"><i class="icon-user""></i>USUARIOS</a>

   <ul class="sub-menu">
   <li><a href="registro_usuario.html">Registrar Usuario</a></li>
    <li><a href="Consultar_Usuarios.php">Consultar Usuarios</a></li>
   <!--<li><a href="cotizaciones_incompletasAdmn.php">AGREGAR USUARIOS A PROYECTOS</a></li>-->
   </ul>
  </ul>

  </nav>
  
        
 </div><!--end mainWrap-->
 
</div>
<form  name="frmdatos" method="get" action="Eliminar_Restimar.php">

    <?php
    $idProyectoAceptar=$_GET["idProA"]; 

    //echo $nombre;
    $conexion=mysqli_connect("localhost","root","","delphi");


    $consulta=mysqli_query($conexion,"select idtareas,Descripcion_tareas,STDDEV_SAMP(temporal) as desv, round(AVG(temporal),0) as prom from tareas inner join resultados on idtareas=Tareas_idtareas where proyecto_idproyecto='$idProyectoAceptar' group by idtareas ;")
     or die(mysqli_error($conexion));

      if(mysqli_num_rows($consulta)>0){
?>
<input type="hidden" name="idProymod" value="<?php echo $idProyectoAceptar; ?>"> 
<div ">
      <h2>  Resultado del proyecto </h2>
      <br>
      <table cellspacing="0" cellpadding="1" border="1" width="600">        
          <tr style="color:white;background-color:grey"r>
            <th>idTareas</th>
            <th>Descripcion_Tareas</th>
            <th>DesviacionEstandar</th>
            <th>Peso promedio</th>
            </tr>
<?php
        while($registro=mysqli_fetch_array($consulta)){
          echo "<tr>";
          echo "<input type=hidden value=".$registro['idtareas']." name=idTareasA[] >";
          echo "<td>".$registro['idtareas']."</td>";
          echo "<td> ".$registro['Descripcion_tareas']."</td>";
          echo "<input type=hidden value=".$registro['desv']." name=desvs[] >";
          echo "<td> ".$registro['desv']."</td>";
           echo "<input type=hidden value=".$registro['prom']." name=idPesosN[] >";
           echo "<td> ".$registro['prom']."</td>";
          echo "</tr>";
          
        }
        ?>
        </table>
<?php
      }else{
         ?>
    <h1><?php echo "No existen registros"; ?> </h1>
    <?php
      }
      mysqli_close($conexion);

    ?>
</div>
<br>
Al dar clic a Reestimación se borraran las estimaciónes creadas, y se podra volver a estimar.
<br>

    <input type="submit" name="btn" value="Reestimación">

</form>
   
  </body>
</html>