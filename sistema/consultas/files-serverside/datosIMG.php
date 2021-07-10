<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 	$idP = sqlValue($_POST["idP"], "int", $horizonte);
	$idC = sqlValue($_POST["idC"], "int", $horizonte);//'$_GET[aleatorio]'

	mysqli_select_db($horizonte, $database_horizonte);
	$result = mysqli_query($horizonte, "SELECT v.estatus_vc from venta_conceptos v left join conceptos c on c.id_to = v.id_concepto_es where v.id_vc = $idC limit 1 ") or die (mysqli_error($horizonte));
 	$row = mysqli_fetch_row($result);
				
	echo $row[0];
 	//Cerrar conexión a la Base de Datos
 	mysqli_close($horizonte);
?>