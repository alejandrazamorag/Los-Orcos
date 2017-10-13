<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Crear Proyecto</title>
    
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
   <li><a href="#"><i class="icon-adm.png""></i>ADMINISTRADOR</a>

   <ul class="sub-menu">
   <li><a href="Login_Administrador.html"> Salir</a></li>
   </ul>
   </li>
   <li><a  href="#"><i class="icon-user"></i>PROYECTOS</a>
  <ul class="sub-menu">
   <li><a href="AgregarUsuarios_Proyectos.php">Agregar Usuario a Proyecto</a></li>
    <ul>
    </ul>
   </li>
   </ul>
  </li>

  
  </ul>
  </nav>
  
        
 </div><!--end mainWrap-->

<form name="frmdatos" action="AgregarUsuariosAProyectos.php" " method="get">
 <br>
 <big><i>      Agregar usuario a proyecto  </big></i>
 	  <?php
 	  	$conexion=mysqli_connect("localhost","root","","delphi");
  		$consulta=mysqli_query($conexion,"select * from usuarios;");
  		if(mysqli_num_rows($consulta) > 0){
 	  ?>
      <br>
      <br>
      <br>
      Nombre de usuario:
      <?php   
      echo "<select name='idUsuarios'>"; 
      while($rows=mysqli_fetch_array($consulta)){
      		echo "<option value=".$rows['idUsuarios'].">".$rows['Nombre']." Contraseña: ".$rows['Contrasena']."</option>";
    	}
    	echo "</select>";
  	}
    ?>
  <?php

  $consulta2=mysqli_query($conexion,"select * from proyecto;");
  
  if(mysqli_num_rows($consulta2) > 0) {
  ?>
  	<br>
      <br>
      <br>
      <br>
      <br>
      Nombre del proyecto:
      <?php   
      echo "<select name='idProyecto'>"; 
      while($rows=mysqli_fetch_array($consulta2)){
      		echo "<option value=".$rows['idProyecto'].">".$rows['Nombre']."</option>";
    	}
    	echo "</select>";
  	}
  	mysqli_close($conexion); 
  ?>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <!-- Botón--> 
      <input type="submit" name="btnagregarUaP" value="Agregar">

</body>
</html>