<!DOCTYPE html>
<html lang="en"> 
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Consultar Proyectos</title>
    
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
   <li><a href="#"><i class="icon-adm.png""></i>ADMIN</a>

   <ul class="sub-menu">
   <li><a href="Principal.html"> Salir</a></li>
   </ul>
   </li>
   <li><a  href="#"><i class="icon-user"></i>PROYECTOS</a>
  <ul class="sub-menu">
   <li><a href="Crear_Proyecto.php">Crear Nuevo Proyecto</a></li>
   <li><a href="Consultar_Proyectos.php"> Todos losProyectos</a></li>
  <li><a href="Consultar_Proyectos_Terminados.php">Proyectos Aceptados</a></li>
  <li><a href="Consultar_Proyectos_Proceso.php">Proyectos En Proceso</a></li>
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
  
        
 </div>


<?php
     $conexion = mysqli_connect("localhost","root","","delphi");
      $consulta = mysqli_query($conexion, "select * from proyecto where Estado = '1'") or die(mysqli_error($conexion));
        if(mysqli_num_rows($consulta)>0){ 
      
?>


<div style="width:800px; height:100px;  position: absolute; top: 100px; left: 200px;">
      <h2>  Proyectos Aceptados </h2>
      <table cellspacing="0" cellpadding="1" border="1" width="800">        
          <tr style="color:white;background-color:grey"r>
            <th>ID_PROYECTO</th>
            <th>NOMBRE</th>
            <th>DESCRIPCION</th>
            <th>FECHA DE CREACIÓN</th>
            <th>FECHA LÍMITE</th>
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
              
 
               echo "<td>";
          
        ?>
        <a href="Visualizar_Proyecto_Admin.php?txtnc=<?php echo $registro['idProyecto']; ?> && txtNombre=<?php echo $registro['Nombre'];?> && txtdescripcion=<?php echo $registro['Descripcion'];?> && txtfechaC=<?php echo $registro['Fecha_Creacion'];?> && txtfechaL=<?php echo $registro['Fecha_Limite'];?>">Visualizar </a>
        

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
<!--
<br>
  <form name="frmregresar" action="Inicio_Administrador.php">
    <input type="submit" name="btnregresar" value="Regresar">
  </form> 
   -->
  </body>
</html>