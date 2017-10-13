<!DOCTYPE html>
<html lang="en"> 
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Consultar Proyectos</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
  <link rel="stylesheet" href="style3.css" type="text/css" media="screen">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css" >
     <link rel="stylesheet" href="estiloUsuario.css" type="text/css" media="screen">
  
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
  
        
 </div>

    <title>Visualizar Usuario</title>
    <meta charset="utf-8">
    <style type="text/css">
      form,h1{
        text-align: center;
      }
    </style>
  </div><!--end mainWrap-->
<form name="frmdatos" action="Agregar_Usuarios_Proyectos.php" " method="get">
 <br>
 <big><i>      Asignar Proyecto  </big></i>
     <br>
     <br>
     <br>
  <?php
    $conexion=mysqli_connect("localhost","root","","delphi");
    $idusuario = $_GET['txtnc'];
    $NombreUsuario = $_GET['txtNombre'];
    $Contrasena = $_GET['txtcontrasena'];
  ?>

  ID Usuario:
<?php
        echo $idusuario;
?>
        <input type="hidden" name="id" value="<?php echo $idusuario; ?>">
      <br>
  Nombre Usuario:
<?php
        echo $NombreUsuario;
?>
<br>
      Contraseña:
<?php
        echo $Contrasena;
?>

     <?php
  $consulta=mysqli_query($conexion,"select * from proyecto;");

  if(mysqli_num_rows($consulta) > 0) {
 ?> 
 <br>
 <br>
 Proyectos: <?php echo "<select name='idProyecto'>"; 
    while($rows=mysqli_fetch_array($consulta)){
      //echo $rows['idPaquete'].">>>>>".$rows['Nombre_Paquete'];
      echo "<option value=".$rows['idProyecto'].">".$rows['Nombre'].",       Descripcion : ".$rows['Descripcion']."</option>";
    }
    echo "</select>";
  }

    mysqli_close($conexion); 
    


?>
<br>
<br>
 <input type="submit" name="btnguardacot" value="Agregar Proyecto">




<?php
      $conexion = mysqli_connect("localhost","root","","delphi");
      $consulta = mysqli_query($conexion, "select proyecto.idProyecto ,proyecto.Nombre from proyecto inner join proyecto_usuarios on proyecto_usuarios.Proyecto_idProyecto=proyecto.idProyecto where proyecto_usuarios.Usuarios_idUsuarios='$idusuario'") or die(mysqli_error($conexion));

        if(mysqli_num_rows($consulta)>0){

?>



<div style="width:800px; height:100px;  position: absolute; top: 100px; left: 0px;">
      <table cellspacing="0" cellpadding="1" border="1" width="600">        
          <tr style="color:white;background-color:grey"r>
            <th>#P</th>
            <th>Proyectos a los que esta Inscrito</th>
            </tr>
        <?php
            while($registro=mysqli_fetch_array($consulta)){
               echo "<tr>";
               echo "<td> ".$registro['idProyecto']."</td>";
                echo "<td> ".$registro['Nombre']."</td>";
            
        ?>
  <a href="Visualizar_Usuario.php?txtid=<?php echo $registro['idProyecto'];?> && txtNombre=<?php echo $registro['Nombre'];?>"></a>
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

</form>
    
  </body>
</html>