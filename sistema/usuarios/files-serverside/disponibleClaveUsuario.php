<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $claveUsuario = sqlValue($_POST['claveUsuario1'], "text", $horizonte);
 //$idU = sqlValue($_GET["idU"], "int", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte);
 $result = mysqli_query($horizonte, "SELECT count(id_u) FROM usuarios where clave_u = $claveUsuario") or die(mysqli_error($horizonte));
 $row = mysqli_fetch_row($result);
 	
if($row[0]>0){
	echo 0;
}//si nadie lo tiene
else{
	echo 1;
} //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>