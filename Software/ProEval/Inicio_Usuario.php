<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Responsive Multi-level Flat Menu</title>
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
    <ul class="sub-menu">
    </ul>
    </li>
    <li><a  href="#"><i class="icon-user"></i><?php $nombre=$_GET["txtnombre"];  echo$nombre?></a>
    <ul class="sub-menu">
  
    <li><a href="principal.html">SALIR</a></li>
    </li>
    </ul>
    </li>
    </ul>
    </nav>

 
   <?php


		$conexion = mysqli_connect("localhost","root","","delphi");
		$consulta = mysqli_query($conexion, "select  * from usuarios where nombre = '$nombre';") or die(mysqli_error($conexion));

		
		?>
		<table border="1">
			<tr>
				<th>idUsuarios</th>
				<th>Nombre</th>
				<th>Contraseña</th>
				
			</tr>
		<?php
			while ($registro = mysqli_fetch_array($consulta)) {
				echo "<tr>";
				echo "<td>".$registro['idUsuarios']."</td>";
				echo "<td>".$registro['Nombre']."</td>";
				echo "<td>".$registro['Contrasena']."</td>";
				echo "<td>";
				
		?>
				

				&nbsp;------>&nbsp;
				<a href="05_Modificar1.php?txtidUsuarios=<?php echo $registro['idUsuarios'];?>">Modificar</a>
				
		<?php
				echo "</td>";
				echo "</tr>";
			}
		?>
		</table>
		<?php
		
		
		mysqli_close($conexion)
		?>
		<br>
		<br>
		<br>
		<form name="frmregresar" action="Inicio_Usuario.php">
			<input type="submit" name="btnregresar" value="Regresar">
		</form>


</body>
</html>