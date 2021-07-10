<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $id = sqlValue($_POST["id"], "int", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte);
 $result = mysqli_query($horizonte, "SELECT nombre_nm, nota_nm from notas_medicas where id_nm = $id limit 1 ") or die (mysqli_error($horizonte));
 $row = mysqli_fetch_row($result);
	
 echo $row[0].'{];[}'.$row[1];

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>