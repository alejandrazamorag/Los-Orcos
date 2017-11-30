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
    <script src="peticion4.js"></script>

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
<form form name="frmdatos" method="get">
<header>
    <h1>Proyectos por Aceptar</h1>
      <div class="alert alert-info">
      <h4>Buscar proyecto por nombre: </h4>
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