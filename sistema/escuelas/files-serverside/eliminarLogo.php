<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $id = sqlValue($_POST["id"], "int", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte);
 $resulP = mysqli_query($horizonte, "SELECT nombre_do from documentos where id_do = $id ") or die (mysqli_error($horizonte));
 $rowP = mysqli_fetch_row($resulP);
 
 $carpeta = $_POST["carpeta"].'/files/'.$id.'.'.$_POST["tipo"];
 $carpeta1 = $_POST["carpeta"].'/files/thumbnail/'.$id.'.'.$_POST["tipo"];
 
mysqli_select_db($horizonte, $database_horizonte); 
$sql = "delete from documentos where id_do = $id limit 1";
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) { echo $sql; }else{ unlink($carpeta); unlink($carpeta1); echo 1; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>