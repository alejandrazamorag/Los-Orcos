<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
<<<<<<< HEAD
    <title>Consultar Usuarios</title>
=======
    <title>Consultar Proyectos</title>
>>>>>>> 4c83fa942b924997eda313f387d3842e9d56290d
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
  <link rel="stylesheet" href="style3.css" type="text/css" media="screen">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css" >
     <link rel="stylesheet" href="estiloUsuario.css" type="text/css" media="screen">
  
     <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <script src="http://css3-mediaqueries-js.googlecode.com/files/css3-mediaqueries.js"></script>
    <![endif]-->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript" ></script>
    <script src="js/menu.js" type="text/javascript"></script> 

</head>
  
 <body>
 
 <div class="mainWrap">
 <a id="touch-menu" class="mobile-menu" href="#"><i class="icon-reorder"></i>Menú</a>
    <nav>
    <ul class="menu">
<<<<<<< HEAD
   <li><a href="#"><i class="icon-adm.png""></i>ADMIN</a>

   <ul class="sub-menu">
      <li><a href="Inicio_Administrador.php">Inicio</a></li>
   <li><a href="Login_Administrador.html">Salir</a></li>
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

=======
   <li><a href="#"><i class="icon-adm.png""></i>ADMINISTRADOR</a>

   <ul class="sub-menu">
   <li><a href="Login_Administrador.html"> Salir</a></li>
   </ul>
   </li>
   <li><a  href="#"><i class="icon-user"></i>PROYECTOS</a>
  <ul class="sub-menu">
   <li><a href="Crear_Proyecto.php">Crear Nuevo Proyecto</a></li>
      <li><a href="Consultar_Proyectos_Terminados.php">Proyectos Terminados</a></li>
         <li><a href="Consultar_Proyectos_Proceso.php">Proyectos En Proceso</a></li>
            <li><a href="Consultar_Usuarios.php">Consultar Usuarios</a></li>
    <ul>
    </ul>
   </li>
   </ul>
  </li>

  
  </ul>
>>>>>>> 4c83fa942b924997eda313f387d3842e9d56290d
  </nav>
  
        
 </div><!--end mainWrap-->


<?php
      $conexion = mysqli_connect("localhost","root","","delphi");
<<<<<<< HEAD
      $consulta = mysqli_query($conexion, "select idUsuarios ,Nombre ,Contrasena from usuarios where Tipo=2;") or die(mysqli_error($conexion));
=======
      $consulta = mysqli_query($conexion, "select * from usuarios") or die(mysqli_error($conexion));
>>>>>>> 4c83fa942b924997eda313f387d3842e9d56290d
        if(mysqli_num_rows($consulta)>0){

?>



<div style="width:800px; height:100px;  position: absolute; top: 100px; left: 200px;">
      <h2>  Usuarios </h2>
      <table cellspacing="0" cellpadding="1" border="1" width="800">        
          <tr style="color:white;background-color:grey"r>
<<<<<<< HEAD
            <th>ID_Usuario</th>
            <th>NOMBRE</th>
            <th>Contraseña</th>
=======
            <th>ID_USUARIO</th>
            <th>NOMBRE</th>
            <th>CONTRASEÑA</th>
            <th>OPCIONES</th>
>>>>>>> 4c83fa942b924997eda313f387d3842e9d56290d
            </tr>
        <?php
            while($registro=mysqli_fetch_array($consulta)){
               echo "<tr>";
               echo "<td>".$registro['idUsuarios']."</td>";
               echo "<td> ".$registro['Nombre']."</td>";
               echo "<td> ".$registro['Contrasena']."</td>";
<<<<<<< HEAD
 
               echo "<td>";
          
            
        ?>
  <a href="Visualizar_Usuario.php?txtnc=<?php echo $registro['idUsuarios']; ?> && txtNombre=<?php echo $registro['Nombre'];?> && txtcontrasena=<?php echo $registro['Contrasena'];?>"> Ver</a>
=======
               echo "<td>";
        ?>
  <a href="AgregarUsuarios_Proyectos.php?txtNombreUsuario=<?php echo $registro['Nombre']; ?>">Agregar a proyecto </a>
>>>>>>> 4c83fa942b924997eda313f387d3842e9d56290d
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
<<<<<<< HEAD

=======
<br>
  <form name="frmregresar" action="Inicio_Administrador.php">
    <input type="submit" name="btnregresar" value="Regresar">
  </form> 
>>>>>>> 4c83fa942b924997eda313f387d3842e9d56290d
   
  </body>
</html>