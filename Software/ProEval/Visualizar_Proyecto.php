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

<form name="frmdatos"  " method="get">
 <br>
 <big><i>   Datos del Proyecto  </big></i>
     <br>
     <br>
  <?php
    $conexion=mysqli_connect("localhost","root","","delphi");
    $idproyecto = $_GET['txtnc'];
    $nombre = $_GET['txtNombre'];
    $descripcion = $_GET['txtdescripcion'];
    $fechacreacion = $_GET['txtfechaC'];
    $fechaLimite = $_GET['txtfechaL'];
  ?>

  ID Proyecto:
<?php
        echo $idproyecto;
?>
      <!-- <input type="hidden" name="id" value="<?php echo $idusuario; ?>">-->
      <br>
  Nombre del proyecto:
<?php
        echo $nombre;
?>
<br>
  Descripcion del proyecto:
<?php
        echo $descripcion;
?>
<br>
  Fecha de Creación:
<?php
        echo $fechacreacion;
?>
<br>
  Fecha de Limite:
<?php
        echo $fechaLimite;
?>
<br>
<?php
      $conexion = mysqli_connect("localhost","root","","delphi");
      $consulta = mysqli_query($conexion, "select idTareas ,Descripcion_tareas from tareas where Proyecto_idProyecto='$idproyecto';") or die(mysqli_error($conexion));

        if(mysqli_num_rows($consulta)>0){

?>



<div style="width:800px; height:100px;  position: absolute; top: 100px; left: 0px;">
      <table cellspacing="0" cellpadding="1" border="1" width="500">        
          <tr style="color:white;background-color:grey"r>
            <th>#T</th>
            <th>Tareas del Proyectos</th>
            </tr>
        <?php
            while($registro=mysqli_fetch_array($consulta)){
               echo "<tr>";
               echo "<td> ".$registro['idTareas']."</td>";
                echo "<td> ".$registro['Descripcion_tareas']."</td>";
            
        ?>
 <!-- <a href="Visualizar_Usuario.php?txtid=<?php echo $registro['idProyecto'];?> && txtNombre=<?php echo $registro['Nombre'];?>"></a>-->
<?php
              echo "</td>";
              echo "</tr>";
    }
             
?>

</table>
<?php

}else{
    echo "No existen Tareas";
  }
  mysqli_close($conexion);  

?>  
</div>

<!--<form name="frmregresar" action="Consultar_Proyectos.php">
      <input type="submit" name="btnregresar" value="Regresar">
      <!-- <input type="text" name="txtnombre" value=<?php echo $nombre ?> <div style="visibility: hidden;"> </div>-->
    </form>-->
</form>

  </body>
</html>