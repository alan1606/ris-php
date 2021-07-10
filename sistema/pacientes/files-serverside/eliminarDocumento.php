<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $id = sqlValue($_POST["id"], "int", $horizonte);
 
 $carpeta = '../documentos/files/'.$id.'.'.$_POST["extension"];
 $carpeta1 = '../documentos/files/thumbnail/'.$id.'.'.$_POST["extension"];
 
mysqli_select_db($horizonte, $database_horizonte); 
$sql = "delete from documentos where id_do = $id limit 1";
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) { echo $sql; }else{ unlink($carpeta); unlink($carpeta1); echo 1; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>