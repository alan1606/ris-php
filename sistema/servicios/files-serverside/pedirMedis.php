<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 	$idC = sqlValue($_POST["aleatorioM"], "int", $horizonte);
	$lista = "<table width='100%' height='' align='left' border='0' cellspacing='0' cellpadding='3'>"; $i = 0;
	
	mysqli_select_db($horizonte, $database_horizonte);
	$result = mysqli_query($horizonte, "SELECT id_med_mr, indicacion_mr, id_mr from medicamentos_receta where id_co_mr = $idC") or die (mysqli_error($horizonte)); 
	
	while ( $row = mysqli_fetch_row($result) ){
		$i++;
		mysqli_select_db($horizonte, $database_horizonte); 
 		$resultEP = mysqli_query($horizonte, "SELECT nombre_generico_med, cantidad_med, presentaciones_med, via_administracion_dosis_med from medicamentos where id_med = $row[0]") or die (mysqli_error($horizonte));
 		$rowEP = mysqli_fetch_row($resultEP);
		
		$nameC = $row[0].$i; $idC = $row[2].$i;
		$lista = $lista."<tr><td align='left'>$i.- <span style='text-decoration:underline;'>$rowEP[0]</span> $rowEP[1] $rowEP[2]</td></tr><tr><td><textarea onKeyUp='conMayusculas(this); nuevo(this.value, this.name);' name ='$nameC' class='miMedi' id='$nameC' lang = '$row[2]' cols='2' rows='2' style='resize:none; width:99%'>$row[1]</textarea></td></tr>";

	} 
	
	echo $lista."</table>";
 	//Cerrar conexión a la Base de Datos
 	mysqli_close($horizonte);
?>