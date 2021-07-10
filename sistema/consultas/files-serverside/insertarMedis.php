<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 	$idC = sqlValue($_POST["idC"], "int", $horizonte); $lista = "<table width='100%'>"; $i = 0;
	
	mysqli_select_db($horizonte, $database_horizonte);
	$result = mysqli_query($horizonte, "SELECT m.id_med_mr, m.id_med_mr, m.id_med_mr from medicamentos_receta m left join conceptos c on c.id_to = m.id_med_mr where m.id_co_mr = $idC and c.id_area_to = 61 and c.id_departamento_to = 3 and c.id_tipo_concepto_to = 5") or die (mysqli_error($horizonte)); 
	while ( $row = mysqli_fetch_row($result) ){
		$i++;
		mysqli_select_db($horizonte, $database_horizonte); 
 		$resultEP = mysqli_query($horizonte, "SELECT c.concepto_to, m.nombre_generico_med, m.cantidad_med, m.descripcion_med, c.descripcion_to from medicamentos m left join conceptos c on c.id_medicamento_g = m.id_med where c.id_to = $row[0]") or die (mysqli_error($horizonte));
 		$rowEP = mysqli_fetch_row($resultEP);
		
		$nameC = $row[0].$i; //$idC = $row[2].$i;
		$lista = $lista.'<tr><td align="left" style="font-size:10pt;">'.$i.'.- <span style="text-decoration:underline;">'.ucfirst(strtolower($rowEP[0])).'</span> ('.ucfirst(strtolower($rowEP[1])).') '.ucfirst(strtolower($rowEP[2])).' '.ucfirst(strtolower($rowEP[3])).'</td></tr>';
		$lista = $lista.'<tr><td align="left" style="font-size:10pt;">&nbsp;&nbsp;'.ucfirst(strtolower($rowEP[4])).' </td></tr>';
	} 
	$lista = $lista.'</table><br>';

 mysqli_select_db($horizonte, $database_horizonte); 
 $resultC = mysqli_query($horizonte, "SELECT count(id_mr) from medicamentos_receta where id_co_mr = $idC") or die (mysqli_error($horizonte));
 $rowC = mysqli_fetch_row($resultC);
 
 echo $rowC[0].';}{;'.$lista;

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>