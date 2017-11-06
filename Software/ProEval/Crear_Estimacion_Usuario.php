<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Consultar Proyectos</title>
    
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
    <script >
      function validar(e){
        key=e.keyCode || e.which;

        teclado=String.fromCharCode(key);
      numero="0123456789";
      especiales="8-37-38-46";
      teclado_especial=false;

      for ( var i in especiales){
          if(key==especiales[i]){
            teclado_especial=true;
          }
      }

      if(numero.indexOf(teclado)==-1 && !teclado_especial){
        return false;
      }
    }

        
      
    </script> 

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

<form name="frmdatos"  " method="get" action="Estimacion_Crear.php">


<?php
      $idproyecto = $_GET['idpro'];
      $idusuario =$_SESSION['idusuario'];
     // echo $idproyecto;
      //echo $idusuario;
      $conexion = mysqli_connect("localhost","root","","delphi");
      $consulta = mysqli_query($conexion, "select tareas.idTareas, tareas.Descripcion_Tareas from tareas inner join proyecto_usuarios on proyecto_usuarios.Proyecto_idProyecto=tareas.Proyecto_idProyecto where proyecto_usuarios.Usuarios_idUsuarios='$idusuario' and proyecto_usuarios.Proyecto_idProyecto='$idproyecto';") or die(mysqli_error($conexion));
        if(mysqli_num_rows($consulta)>0){

?>


<input type="hidden" name="pro" value="<?php echo $idproyecto; ?>"> <!--este para enviar una variable-->
<div style="width:400px; height:90px;  position: absolute; top: 100px; left: 10px;">
      <h1>  Tarea a estimar </h1>
      <table cellspacing="0" cellpadding="1" border="1" width="700">        
          <tr style="color:white;background-color:grey"r>
            <th>id_Tareas</th>
            <th>Descripción de la tarea</th>
            <th>Peso Estimado</th>
            </tr>
        <?php
            while($registro=mysqli_fetch_array($consulta)){
               echo "<tr>";
               echo "<input type=hidden value=".$registro['idTareas']." name=idTareas[] >";
               echo "<td> ".$registro['idTareas']."</td>";
               echo "<td> ".$registro['Descripcion_Tareas']."</td>";

               echo "<td>";
          
            
        ?>
<!
<a href="Estimacion_Crear.php?txtnc=<?php echo $registro['idTareas']; ?>"><input type="text" placeholder="0" name="Peso[]" required="required" size=5 onkeypress="return validar(event)"></a>
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
  <input type="submit" name="btnregresar" value="Guardar">
</form>
  </body>
</html>