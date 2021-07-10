<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

include_once '../../recursos/session.php';
include_once '../../Connections/database.php';
include_once '../../recursos/utilities.php';

 $id_user = $_SESSION['id']; $acceso_user = $_SESSION['MM_UserGroup'];

 $id = sqlValue($_POST["id"], "int", $horizonte);
 $estatus = sqlValue($_POST["estatus"], "int", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte);

 if($_POST["estatus"]==1){
	 $sql = "UPDATE catalogo_antecedentes set activo_ca = 0, id_usuario_inactiva_ca = $id_user, fecha_inactiva_ca = $now where id_ca = $id limit 1";
 }else{
	 $sql = "UPDATE catalogo_antecedentes set activo_ca = 1, id_usuario_activa_ca = $id_user, fecha_activa_ca = $now where id_ca = $id limit 1";
 }
  
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) { echo $sql; }else{ echo 1; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>