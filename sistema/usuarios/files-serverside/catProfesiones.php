<?php
header('content-type: text/html; charset: utf-8');
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $profesion = $_GET['profesion'];
  
 mysqli_select_db($horizonte, $database_horizonte);
 $query_catalogoSexos = "SELECT id_profesion, nombre_profesion FROM profesiones where nombre_profesion like '%$profesion%' ";
 $catalogoSexos = mysqli_query($horizonte, $query_catalogoSexos) or die(mysqli_error($horizonte));
 $row_catalogoSexos = mysqli_fetch_assoc($catalogoSexos);
 $totalRows_catalogoSexos = mysqli_num_rows($catalogoSexos);
 $b = array();
 do{
	 //echo $row_catalogoSexos['nombre_profesion'];
	 $b[] = utf8_encode($row_catalogoSexos['nombre_profesion']);
}
 while ($row_catalogoSexos = mysqli_fetch_assoc($catalogoSexos));
  $rows = mysqli_num_rows($catalogoSexos);
  if($rows > 0) {
      mysqli_data_seek($catalogoSexos, 0);
	  $row_catalogoSexos = mysqli_fetch_assoc($catalogoSexos);
  }
 
 echo json_encode($b);
 //echo json_decode(json_encode($arr));
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>