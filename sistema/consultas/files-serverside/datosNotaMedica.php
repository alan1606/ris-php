<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idP=sqlValue($_POST["idP"],"int", $horizonte); $idU=sqlValue($_POST["idU"],"int", $horizonte); $idE = sqlValue($_POST["idE"], "int", $horizonte);

	mysqli_select_db($horizonte, $database_horizonte);
	$result = mysqli_query($horizonte, "SELECT v.nota_interpretacion from venta_conceptos v where v.id_vc = $idE ") or die (mysqli_error($horizonte));
 	$row = mysqli_fetch_row($result);

		echo $row[0];
	
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>