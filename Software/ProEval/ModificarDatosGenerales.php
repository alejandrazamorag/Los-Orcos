<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Modificar Proyecto</title>
    
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
   <li><a href="#"><i class="icon-adm.png""></i>ADMIN</a>
   <ul class="sub-menu">
   <li><a href="Login_Administrador.html"> Salir</a></li>
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
    <li><a href="Visualizar_Usuario.php">Consultar Usuarios</a></li>
   <!--<li><a href="cotizaciones_incompletasAdmn.php">AGREGAR USUARIOS A PROYECTOS</a></li>-->
   </ul>
   </li>
  
  </ul>
  </nav>
  
        
 </div><!--end mainWrap-->

<?php
$id=$_GET["id"];
$conexion=mysqli_connect("localhost","root","","delphi");
$resultado = mysqli_query($conexion,"select Nombre, Descripcion, Fecha_Creacion, Fecha_Limite, Hora_Limite from proyecto where idProyecto='$id';");
$fila = mysqli_fetch_row($resultado);

$nombre= $fila[0]; 
$descripcion= $fila[1]; 
$fecha_creacion= $fila[2]; 
$fecha_limite =$fila[3]; 
$hora_limite =$fila[4]; 
?>


<form name="frmdatos" action="Modificar_Proyecto.php" " method="get">
 <br>
 <big><i>      Modificar Proyecto  </big></i>
      <br>
      <br>
      Nombre del Proyecto:
      <input type="text" name="txtNombreProyecto" required="required" value="<?php echo $nombre?>">
      <br>
      <br>
      Descripción del proyecto:
      <br>
      <textarea name="txtDescripcion" required="required" rows="5" cols="43"><?php echo $descripcion ?></textarea>
      <br>
      <br>
      <br>
      Terminó de estimación:
      <br>
      -Selecciona la fecha
      <input type="date" name="fechalimite" min="2017-10-01" max="2018-10-25" required="required" value="<?php echo $fecha_limite?>">
      <!-- Campo de entrada de hora -->
      <br>
      -Selecciona la hora
      <input type="time" name="horalimite" min="24:00" max="24:00" step="600" required="required" value="<?php echo $hora_limite?>">
      <br>
      <!-- Botón--> 
      <input type="submit" name="btnmodificarProyecto" value="Modificar Datos Generales">
      <input type=hidden value="<?php echo $id ?>" name="id">;
</body>
</html>