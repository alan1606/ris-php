<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $id = sqlValue($_POST["id"], "int", $horizonte);
 
mysqli_select_db($horizonte, $database_horizonte); 
$sql = "delete from documentos where id_do = $id limit 1";
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) { echo $sql; }else{  
	unlink("../documentos/files/".$id.'.'.$_POST["tipo"]);
	echo 1; 
}

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>