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

 
  <?php
    $conexion = mysqli_connect("localhost","root","","delphi");
    $idproy = $_GET['txtid'];
    $nomb = $_GET['txtNombre'];

    $consulta = mysqli_query($conexion,"select idProyecto, Nombre, Descripcion, Fecha_Creacion, Fecha_Limite, Estado from proyecto where
    Nombre='$nomb' and idProyecto='$idproy';") or die (mysqli_error($conexion));
    $registro = mysqli_fetch_array($consulta);
  ?>
    
    <form name="frmbaja" method="get" action="Eliminar_Proyecto2.php">
      <h1> Datos Generales del Proyecto</h1>
          ID:
<?php
        echo $registro['idProyecto'];
?>
      <input type="hidden" name="txtID" value="<?php echo $registro['idProyecto']?>">
      <br>
      Nombre:
<?php
        echo $registro['Nombre'];
?>
      <input type="hidden" name="txtNombre" value="<?php echo $registro['Nombre']?>">
      <br>
      Descripcion:
<?php
        echo $registro['Descripcion'];
?>
      <input type="hidden" name="txtDescripcion" value="<?php echo $registro['Descripcion']?>">
      <br>
      Fecha Inicio:
<?php
        echo $registro['Fecha_Creacion'];
?>
      <input type="hidden" name="txtFechaC" value="<?php echo $registro['Fecha_Creacion']?>">
      <br>
      Fecha Límite:
<?php
        echo $registro['Fecha_Limite'];
?>
      <input type="hidden" name="txtFechaL" value="<?php echo $registro['Fecha_Limite']?>">
      <br>
      <input name="btneliminar" value="Eliminar" <?php if($registro['Estado']=='1'){
                                                                ?>
                                                                type="submit"
                                                                <?php
                                                                }else{
                                                                  ?>
                                                                  type="hidden"
                                                                  <?php
                                                                } ?>>
    </form>
        
<?php
      $conexion = mysqli_connect("localhost","root","","delphi");
      $consulta = mysqli_query($conexion, "select idTareas ,Descripcion_tareas from tareas where Proyecto_idProyecto='$idproy';") or die(mysqli_error($conexion));

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


  </body>
</html>