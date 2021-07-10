<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 	$idC = sqlValue($_POST["idC"], "int", $horizonte); $lista = "<table width='100%'>"; $i = 0;
	
	mysqli_select_db($horizonte, $database_horizonte);
	$result = mysqli_query($horizonte, "SELECT id_dx_dxc, nota_medica_dxc, id_dxc, primario_dxc from dx_consultas where id_c_dxc = $idC order by primario_dxc desc") or die (mysqli_error($horizonte)); 
	
	while ( $row = mysqli_fetch_array($result) ){ $i++;
		mysqli_select_db($horizonte, $database_horizonte); $id_di = $row['id_dx_dxc'];
 		$resultEP = mysqli_query($horizonte, "SELECT nombre_di from diagnosticos where id_di = $id_di") or die (mysqli_error($horizonte));
 		$rowEP = mysqli_fetch_row($resultEP);
		
		$nameC = $row['id_dx_dxc'].$i; //$idC = $row[2].$i;
		$lista = $lista."<tr><td align='left' style='font-size:10pt;'>$i.- <span style='text-decoration:underline;'>".ucfirst($rowEP[0])."</span></td></tr>";
	}

	$lista = $lista."</table>";
	
 mysqli_select_db($horizonte, $database_horizonte); 
 $resultC = mysqli_query($horizonte, "SELECT count(id_dxc) from dx_consultas where id_c_dxc = $idC") or die (mysqli_error($horizonte));
 $rowC = mysqli_fetch_row($resultC);
 
 echo $rowC[0].';}{;'.$lista;

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>