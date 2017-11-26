<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Consultar usuarios</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/estil.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
       
  <link rel="stylesheet" href="style30.css" type="text/css" media="screen">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css" >
     <link rel="stylesheet" href="estiloUsuario.css" type="text/css" media="screen">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript" ></script>
    <script src="js/menu.js" type="text/javascript"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="peticion3.js"></script>

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
   <li><a href="Proyectos_estimados_usuarios.php">Proyectos Estimados</a></li>


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
</form>


<?php
//session_start();
 $nombre =$_SESSION['nombre'];
 $idusuario=$_SESSION['idusuario'];

?>

</div>
<form form name="frmdatos" action="Visualizar_Proyecto_Usuario.php.php" " method="get">
	<header>
    <h1><?php echo $nombre;?> tus proyectos por estimar son los siguientes</h1>
      <div class="alert alert-info">
      <h4>Buscar por nombre de usuario: </h4>
      </div>
    </header>
      <h6>
    <section>
      <input type="text" name="busqueda" id="busqueda" placeholder="Buscar..." cols="100" rows="10">
    </section>

    <section id="tabla_resultado">
    <!-- AQUI SE DESPLEGARA NUESTRA TABLA DE CONSULTA -->
    </section>
    </h6>
</form>

</body>
</html>