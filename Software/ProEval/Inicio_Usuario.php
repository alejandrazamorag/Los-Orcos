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
</form>


<?php
//session_start();
 $nombre =$_SESSION['nombre'];
 $idusuario=$_SESSION['idusuario'];

 //echo $nombre;
// echo $idusuario;
      $conexion = mysqli_connect("localhost","root","","delphi");
     $consulta = mysqli_query($conexion, "select proyecto.idProyecto , proyecto.Nombre, proyecto.Descripcion, proyecto.Fecha_Creacion, proyecto.Fecha_Limite from proyecto inner join proyecto_usuarios on proyecto_usuarios.Proyecto_idProyecto=proyecto.idProyecto inner join usuarios on usuarios.Nombre='$nombre' where proyecto_usuarios.Usuarios_idUsuarios=usuarios.idUsuarios;") or die(mysqli_error($conexion));

        if(mysqli_num_rows($consulta)>0){

?>



<div style="width:800px; height:100px;  position: absolute; top: 100px; left: 0px;">
      <table cellspacing="0" cellpadding="1" border="1" width="600">   
      <h1>Proyectos a Estimar</h1>     
          <tr style="color:white;background-color:grey"r>
            <th>id_PROYECTO</th>
            <th>INSCRITO A PROYECTO</th>
           <!-- <th>DESCRIPCION</th>
            <th>FECHA DE CREACIÓN</th>
            <th>FECHA LÍMITE</th>-->
            <th>ACCIONES</th>
            </tr>
        <?php
            while($registro=mysqli_fetch_array($consulta)){
               echo "<tr>";
               echo "<td> ".$registro['idProyecto']."</td>";
               echo "<td> ".$registro['Nombre']."</td>";
              // echo "<td> ".$registro['Descripcion']."</td>";
              // echo "<td> ".$registro['Fecha_Creacion']."</td>";
               //echo "<td> ".$registro['Fecha_Limite']."</td>";
            

             echo "<td>";
        ?>

       <a href="Visualizar_Proyecto_Usuario.php?txtnc=<?php echo $registro['idProyecto']; ?> && txtNombre=<?php echo $registro['Nombre'];?> && txtdescripcion=<?php echo $registro['Descripcion'];?> && txtfechaC=<?php echo $registro['Fecha_Creacion'];?> && txtfechaL=<?php echo $registro['Fecha_Limite'];?> && txtNombreUsuario=<?php echo $nombre;?>"> Visualizar</a>
<?php
              echo "</td>";
              echo "</tr>";
    }
             
?>

</table>
<?php

}else{
    echo "No existen proyectos por estimar";
  }
  mysqli_close($conexion);  

?>  

</div>

</body>
</html>