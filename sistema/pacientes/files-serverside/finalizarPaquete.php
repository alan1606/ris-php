<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

include_once '../../recursos/session.php';
include_once '../../Connections/database.php';
include_once '../../recursos/utilities.php';

 $id_user = $_SESSION['id']; $acceso_user = $_SESSION['MM_UserGroup'];

 $id_pq = sqlValue($_POST["id_pq"], "int", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);

 if($acceso_user==1){
	 $sql4 = "UPDATE paquetes set fecha_fin_pq = $now, activo_pq = 0 where id_pq = $id_pq limit 1";
	 mysqli_select_db($horizonte, $database_horizonte);
	 $insertar4 = mysqli_query($horizonte, $sql4) or die (mysqli_error($horizonte));

	 if (!$insertar4) {echo $sql4;} else{echo 1;}
 }else{echo 1;}

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);

?>