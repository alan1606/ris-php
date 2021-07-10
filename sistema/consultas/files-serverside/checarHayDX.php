<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 	$idC = sqlValue($_POST["idC"], "int", $horizonte); $lista = ""; $i = 0;
	
	mysqli_select_db($horizonte, $database_horizonte);
	$result = mysqli_query($horizonte, "SELECT id_dx_dxc, nota_medica_dxc, id_dxc, primario_dxc from dx_consultas where id_c_dxc = $idC order by primario_dxc desc") or die (mysqli_error($horizonte)); 
	
	while ( $row = mysqli_fetch_array($result) ){ $i++;
		mysqli_select_db($horizonte, $database_horizonte); $id_di = $row['id_dx_dxc'];
 		$resultEP = mysqli_query($horizonte, "SELECT nombre_di from diagnosticos where id_di = $id_di") or die (mysqli_error($horizonte));
 		$rowEP = mysqli_fetch_row($resultEP);
		
		$nameC = $row['id_dx_dxc'].$i; //$idC = $row[2].$i;
		$lista = $lista."<tr class='tableDXss'><td colspan='2' align='left' style='font-size:10pt;'>$i.- <span style='text-decoration:underline;'>".ucfirst($rowEP[0])."</span></td></tr>";
	} 
	$lista = '<tr class="misDxNE"><td valign="top" colspan="2" style="font-size:10pt;" align="justify">DIAGNÓSTICOS O PROBLEMAS CLÍNICOS:<br></td></tr>'.$lista;
	
 mysqli_select_db($horizonte, $database_horizonte); 
 $resultC = mysqli_query($horizonte, "SELECT count(id_dxc) from dx_consultas where id_c_dxc = $idC") or die (mysqli_error($horizonte));
 $rowC = mysqli_fetch_row($resultC);
 
 if($rowC[0]==0){
	 mysqli_select_db($horizonte, $database_horizonte);
	 $sql1 = "UPDATE dx_consultas SET primario_dxc = 0 where id_c_dxc = $idC";
	 $update1 = mysqli_query($horizonte, $sql1) or die (mysqli_error($horizonte));
	 if (!$update1) { echo $sql1; }else{ 
		 mysqli_select_db($horizonte, $database_horizonte);
		 $sql = "UPDATE dx_consultas SET primario_dxc = 1 where id_c_dxc = $idC limit 1";
		 $update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));	
		 if (!$update) { echo $sql; }else { echo $rowC[0].';}{;'; }
	 }
 }
 else{ echo $rowC[0].';}{;'.$lista; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>