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

     <script >
      function validar(e){
        key=e.keyCode || e.which;

        teclado=String.fromCharCode(key);
      
      especiales="8-37-38-46";
      letras="ABCDEFGHIJKLMNÑOPRRSTUVWXYZabcdefghijklmnñopqrstuvwxyz0123456789";
      teclado_especial=false;

      for ( var i in especiales){
          if(key==especiales[i]){
            teclado_especial=true;
          }
      }

      if(letras.indexOf(teclado)==-1 && !teclado_especial){
        return false;
      }
    }

        
      
    </script>


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
   <li><a href="Principal.html">Salir</a></li>
   </ul>
   </li>
   
   <li><a  href="#"><i class="icon-user"></i>PROYECTOS</a>
  <ul class="sub-menu">
  <li><a href="Crear_Proyecto.php">Crear Nuevo Proyecto</a></li>
   <li><a href="Consultar_Proyectos.php"> Todos los Proyectos</a></li>
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
  
        
 </div><!--end mainWrap-->
</form>
	<body>
	<?php
      $idproy=$_GET['txtip'];
      $idtar=$_GET['txtidT'];
      $tardesc=$_GET['txtdescripcion_t'];

     // echo $idproy;
      //echo $idtar;
      //echo $tardesc;
			$conexion = mysqli_connect("localhost", "root","","delphi");
			$consulta = mysqli_query($conexion,"select Nombre from proyecto where idProyecto = '$idproy';") or die (mysqli_error($conexion));
			$fila = mysqli_fetch_row($consulta);

			$nombreproy= $fila[0];
     // echo $nombreproy;





?>

			
			<form name="frmalta" method="get" action="ModTar.php">
			<table border="1">
			<tr>
				<h1>Modificación Tareas</h1>
          <h1>Proyecto "<?php  echo $nombreproy; ?>"</h1>
				<td>idTarea:</td>
				<td>
				<?php
					echo $idtar;
					mysqli_close($conexion);
					?>
					<input type="hidden" name="txtidproy" value="<?php echo $idproy; ?>"></td>
          <input type="hidden" name="txtidtar" value="<?php echo $idtar ?>"></td>
					</tr>
					<tr>
						<td>Descripcion_Tarea:</td>
						<td><input type="text" name="txtDescripcionT" required="required" value="<?php echo $tardesc; ?>" ></td>
					</tr>
					</td>
				</tr>
				<tr>
				<!--rowspan-->
					<td colspan="2",>
						<input type="submit" name="btnenviar" value="Guardar">
					</td>
				</tr>
			</table>
			</form>
	</body>
</html>