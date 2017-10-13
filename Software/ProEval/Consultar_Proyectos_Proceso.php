<!DOCTYPE html>
<html lang="en"> 
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Proyectos En Proceso</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
  <link rel="stylesheet" href="style3.css" type="text/css" media="screen">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css" >
     <link rel="stylesheet" href="estiloUsuario.css" type="text/css" media="screen">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript" ></script>
    <script src="js/menu.js" type="text/javascript"></script> 

</head>
  
 <body>
 
 <div class="mainWrap">
 <a id="touch-menu" class="mobile-menu" href="#"><i class="icon-reorder"></i>Menú</a>
    <nav>
    <ul class="menu">
   <li><a href="#"><i class="icon-adm.png""></i>ADMINISTRADOR</a>

   <ul class="sub-menu">
    <li><a href="Inicio_Administrador.php">Inicio</a></li>
   <li><a href="Login_Administrador.html"> Salir</a></li>
   </ul>
   </li>
   <li><a  href="#"><i class="icon-user"></i>PROYECTOS</a>
  <ul class="sub-menu">
   <li><a href="Crear_Proyecto.php">Crear Nuevo Proyecto</a></li>
   <li><a href="Consultar_Proyectos.php">Consultar Proyectos</a></li>
      <li><a href="Consultar_Proyectos_Terminados.php">Proyectos Terminados</a></li>
    <ul>
    </ul>
   </li>
   </ul>
  </li>

  
  </ul>
  </nav>
  
        
 </div>

<?php
      $conexion = mysqli_connect("localhost","root","","delphi");
      $consulta = mysqli_query($conexion, "select * from proyecto where Estado=0;") or die(mysqli_error($conexion));
        if(mysqli_num_rows($consulta)>0){

?>



<div style="width:800px; height:100px;  position: absolute; top: 100px; left: 200px;">
      <h2>  Proyectos En Proceso</h2>
      <table cellspacing="0" cellpadding="1" border="1" width="800">        
          <tr style="color:white;background-color:grey"r>
            <th>ID_PROYECTO</th>
            <th>NOMBRE</th>
            <th>DESCRIPCION</th>
            <th>FECHA DE CREACIÓN</th>
            <th>FECHA LÍMITE</th>
            <th>HORA LÍMITE</th>
            <th>ESTADO (0-En Proceso, 1-Aceptados)</th>
            <th>ACCIONES</th>
            </tr>
        <?php
            while($registro=mysqli_fetch_array($consulta)){
               echo "<tr>";
               echo "<td>".$registro['idProyecto']."</td>";
               echo "<td> ".$registro['Nombre']."</td>";
               echo "<td> ".$registro['Descripcion']."</td>";
               echo "<td> ".$registro['Fecha_Creacion']."</td>";
               echo "<td> ".$registro['Fecha_Limite']."</td>";
               echo "<td> ".$registro['Hora_Limite']."</td>";
               echo "<td> ".$registro['Estado']."</td>";
 
               echo "<td>";
          
            
        ?>
  <a href="Visualizar_Proyecto.php?txtnc=<?php echo $registro['idProyecto']; ?>">Visualizar </a>
<?php
              echo "</td>";
              echo "</tr>";
    }
             
?>

</table>
<?php

}else{
    echo "No existen registros";
  }
  mysqli_close($conexion);  

?>  
</div>

   
  </body>
</html>