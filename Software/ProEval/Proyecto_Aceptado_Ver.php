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
   <li><a href="Principal.html"> Salir</a></li>
   </ul>
   </li>
   <li><a  href="#"><i class="icon-user"></i>PROYECTOS</a>
  <ul class="sub-menu">
   <li><a href="Crear_Proyecto.php">Crear Nuevo Proyecto</a></li>
   <li><a href="Consultar_Proyectos.php"> Todos los Proyectos</a></li>
  <li><a href="Consultar_Proyectos_Terminados.php">Proyectos Aceptados</a></li>
  <li><a href="Consultar_Proyectos_Proceso.php">Proyectos En Proceso</a></li>
  <li><a href="Consultar_Proyectos_PorAceptar.php">Proyectos por Aceptar</a></li>
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

<form name="frmdatos"  " method="get" action="reporte.php">
 <br>
 <big><i>   Datos del Proyecto  </big></i>
     <br>
     <br>
  <?php
    $conexion=mysqli_connect("localhost","root","","delphi");
    $idproyecto = $_GET['txtnc'];
    $nombre = $_GET['txtNom'];
    $descripcion = $_GET['txtdes'];
    $fechacreacion = $_GET['txtfc'];
    $fechaLimite = $_GET['txtfl'];
  ?>
<input type="hidden" name="idP" value="<?php echo $idproyecto; ?>"> 
<input type="hidden" name="nomP" value="<?php echo $nombre; ?>"> 
<input type="hidden" name="des" value="<?php echo $descripcion; ?>"> 
<input type="hidden" name="fecC" value="<?php echo $fechacreacion; ?>">
<input type="hidden" name="fecL" value="<?php echo $fechaLimite; ?>">  
  ID Proyecto:
<?php
        echo $idproyecto;
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
<br>
<?php
      $conexion = mysqli_connect("localhost","root","","delphi");
      $consulta = mysqli_query($conexion, "select idTareas ,Descripcion_tareas, Peso from tareas where Proyecto_idProyecto='$idproyecto';") or die(mysqli_error($conexion));

        if(mysqli_num_rows($consulta)>0){

?>

<br><br>

El resultados de los pesos de tareas con el Método delphi fueron los siguientes:
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
                echo "<td> ".$registro['Descripcion_tareas']."</td>";
                echo "<td> ".$registro['Peso']."</td>";

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

<br>
<?php
      $conexion = mysqli_connect("localhost","root","","delphi");
      $consulta = mysqli_query($conexion, "select distinct idUsuarios, Nombre from tareas inner join resultados on idtareas=Tareas_idtareas inner join usuarios on resultados.Usuarios_idUsuarios=usuarios.idUsuarios where proyecto_idproyecto='$idproyecto';") or die(mysqli_error($conexion));

        if(mysqli_num_rows($consulta)>0){

?>

<br><br>

Los usuarios que estimarón fueron los siguientes:
<br>
<br>
<div>
      <table cellspacing="0" cellpadding="1" border="1" width="500">        
          <tr style="color:white;background-color:grey"r>
            <th>id_Usuario</th>
            <th>Nombre Usuario</th>
            </tr>
        <?php
            while($registro=mysqli_fetch_array($consulta)){
               echo "<tr>";
               echo "<td> ".$registro['idUsuarios']."</td>";
                echo "<td> ".$registro['Nombre']."</td>";

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

   <input type="submit" name="btnPDF" value="Generar PDF">

</form>

  </body>
</html>