<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Modificat Usuario</title>
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
	<body>
	<?php
			//session_start();
			$conexion = mysqli_connect("localhost", "root","","delphi");
			$idUsuarios = $_SESSION['idusuario'];
			//echo $idUsuarios;

			$consulta = mysqli_query($conexion,"select Nombre, Contrasena from usuarios where idUsuarios = '$idUsuarios';") or die (mysqli_error($conexion));
			$fila = mysqli_fetch_row($consulta);

			$nombreu= $fila[0];
			$contrasenau= $fila[1]; 





?>

			
			<form name="frmalta" method="get" action="Modificar_Usuario2.php">
			<table border="1">
			<tr>
				<h1>Modificación de usuario</h1>
				<td>idUsuario:</td>
				<td>
				<?php
					echo $idUsuarios;
					mysqli_close($conexion);
					?>
					<!--<input type="hidden" name="txtidUsuarios" value="<?php echo $idUsuarios; ?>"></td>-->
					</tr>
					<tr>
						<td>Nombre:</td>
						<td><input type="text" maxlength="9" name="txtNombre" required="required" value="<?php echo $nombreu; ?>" ></td>
					</tr>
				 <tr>
						<td>Contraseña:</td>
						<td><input type="text" name="txtContrasena" required="required" value="<?php echo $contrasenau; ?>" ></td>
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