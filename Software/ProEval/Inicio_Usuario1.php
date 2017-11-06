<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Inicio</title>
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
    <a id="touch-menu" class="mobile-menu" href="#"><i class="icon-user"></i>Menu</a>
    <nav>
    <ul class="menu">
   <li><a href="#"><i class="icon-adm.png""></i><?php session_start(); echo $_SESSION['nombre']; ?></a>

   <ul class="sub-menu">
   <li><a href="Principal.html">Salir</a></li>
   <!--<li><a href="cotizaciones_incompletasAdmn.php">AGREGAR USUARIOS A PROYECTOS</a></li>-->
   </ul>
   </li>
   <li><a  href="#"><i class="icon-user"></i>PROYECTOS</a>
   <ul class="sub-menu">
   <li><a href="Inicio_Usuario.php">Proyectos por estimar</a></li>
   <ul>
   </ul>
   </li>

   </ul>
   </li>
    <li><a  href="#"><i class="icon-user"></i>Contraseña</a>
   <ul class="sub-menu">
   <li><a href="Modificar_Usuario.php">Modificar Contraseña</a></li>
   <ul>
  </ul>
  </nav>
    <title>  </title>
    <meta charset="utf-8">
  </div><!--end mainWrap-->
<form>
<br>



<?php 
$idu= $_SESSION['nombre']; 
?>

<h1> Bienvenido a ProEval "<?php echo$idu ?>" </h1>

<!--<h2>ProEval en un sistema que te permite</h2>-->
</body>
</html>