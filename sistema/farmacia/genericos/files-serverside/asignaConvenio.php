<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

//datos generales
 list( $dia, $mes, $ano ) = explode( "/", sqlValue($_POST['fechaIC'], "date") ); $raya = "-"; $fI = $ano.$raya.$mes.$raya.$dia;
 list( $dia1, $mes1, $ano1 ) = explode( "/", sqlValue($_POST['fechaFC'], "date") ); $raya1 = "-"; $fF = $ano1.$raya1.$mes1.$raya1.$dia1;

 $idU = sqlValue($_POST["idU_AC"], "int", $horizonte);
 $idP = sqlValue($_POST["idP_AC"], "int", $horizonte);
 $idC = sqlValue($_POST["idC_AC"], "int", $horizonte);
 $fI = sqlValue($fI, "date", $horizonte);
 $fF = sqlValue($fF, "date", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "INSERT INTO convenios_paciente (id_paciente_cvp, id_convenio_cvp, fecha_expedicion_cvp, fecha_expiracion_cvp, usuario_cvp, fecha_cvp)";
 $sql.= "VALUES ($idP, $idC, $fI, $fF, $idU, now() )";
  
 $update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
 if (!$update) {echo $sql;}
 else{
	mysqli_select_db($horizonte, $database_horizonte);
 	$resultX=mysqli_query($horizonte, "SELECT MAX(id_cvp) from convenios_paciente limit 1 ") or die (mysqli_error($horizonte));
 	$rowX = mysqli_fetch_row($resultX); $idConvenio_paciente = sqlValue($rowX[0], "int", $horizonte);
	
	mysqli_select_db($horizonte, $database_horizonte);
	$result = mysqli_query($horizonte, "SELECT id_ac, infinito_ac, cantidad_ac from asigna_conceptos_paquetes where id_convenio_ac = $idC") or die (mysqli_error($horizonte)); 
	
	while ( $row = mysqli_fetch_row($result) ){ 	
		if($row[1]==''){$miInfinito = 0;}else{$miInfinito = $row[1];}
		$miInfinito = sqlValue($miInfinito, "int", $horizonte);
		
		if($miInfinito==1){$i=1;}else{$i=$row[2];}
		
		mysqli_select_db($horizonte, $database_horizonte);
		$sqlZ = "INSERT INTO conceptos_beneficios (id_concepto_convenio_cb, id_convenio_paciente_cb, infinito_cb, id_paciente_cb, id_usuario_cb, fecha_cb)";
		$sqlZ.= "VALUES ($row[0], $idConvenio_paciente, $miInfinito, $idP, $idU, $now )";
		
		for($j=1;$j<=$i;$j++){ $updateZ = mysqli_query($horizonte, $sqlZ) or die (mysqli_error($horizonte)); }
			
		if (!$updateZ) {echo $sqlZ;}
		else{}
	} 
 	echo 1; 
}

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>