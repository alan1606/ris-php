<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 	$idP = sqlValue($_POST["idP"], "int", $horizonte);
	$idC = $_POST["idC"]; //'$_GET[aleatorio]'

	mysqli_select_db($horizonte, $database_horizonte);
	$result = mysqli_query($horizonte, "SELECT id_vc, estatus_vc from venta_conceptos where id_paciente_vc = $idP and tipo_concepto_vc = 3 and estatus_vc > 6 and temporal_vc = 0 order by id_vc desc limit 1 ") or die (mysqli_error($horizonte));
 	$row = mysqli_fetch_row($result); $ultimo = sqlValue($row[0], "int", $horizonte);
			
	echo $ultimo.'{;}'.$row[1];
 	//Cerrar conexión a la Base de Datos
 	mysqli_close($horizonte);
?>