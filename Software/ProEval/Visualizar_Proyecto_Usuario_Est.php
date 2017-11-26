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

<form name="frmdatos"  " method="get" action="Crear_Estimacion_Usuario.php">
 <br>
 <big><i>   Datos del Proyecto  </big></i>
     <br>
     <br>
  <?php
   $temId=$_SESSION['idusuario'];
  // echo $temId;
    $idproyecto = $_GET['txtnc'];
    $nombre = $_GET['txtNombre'];
    $descripcion = $_GET['txtdescripcion'];
    $fechacreacion = $_GET['txtfechaC'];
    $fechaLimite = $_GET['txtfechaL'];
    $conexion=mysqli_connect("localhost","root","","delphi");
    $consulta = mysqli_query($conexion, "select idProyecto,Nombre,Descripcion,Fecha_Creacion,Fecha_Limite from proyecto where idProyecto='$idproyecto';") or die(mysqli_error($conexion));

        if(mysqli_num_rows($consulta)>0){
 
  ?>

  ID Proyecto:
<?php
        echo $idproyecto;
        $idp=$idproyecto;

?>
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

<?php

}else{
    echo "No existen registros";
  }
  mysqli_close($conexion);  

?>  





<?php
      $conexion = mysqli_connect("localhost","root","","delphi");
      $consulta = mysqli_query($conexion, "select idTareas, Descripcion_Tareas, Temporal from tareas inner join resultados on idTareas=tareas_idTareas where Usuarios_idUsuarios='$temId' and Proyecto_idProyecto='$idproyecto';") or die(mysqli_error($conexion));

        if(mysqli_num_rows($consulta)>0){

?>

<br><br>

Tus estimaciones fueron las siguientes:
<br>
<br>
<div>
      <table cellspacing="0" cellpadding="1" border="1" width="500">        
          <tr style="color:white;background-color:grey"r>
            <th>Id_Tarea</th>
            <th>Tareas del Proyectos</th>
            <th>Peso</th>
            </tr>
        <?php
            while($registro=mysqli_fetch_array($consulta)){
               echo "<tr>";
               echo "<td> ".$registro['idTareas']."</td>";
                echo "<td> ".$registro['Descripcion_Tareas']."</td>";
                echo "<td> ".$registro['Temporal']."</td>";

        ?>
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
</form>
  </body>
</html>