<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idP = sqlValue($_POST["idPac"], "int", $horizonte);
 $idE = sqlValue($_POST["idConsul"], "int", $horizonte);

	mysqli_select_db($horizonte, $database_horizonte);
	$result1 = mysqli_query($horizonte, "SELECT referencia_vc, interpretacion_vc, nota_interpretacion, date_format(fecha_venta_vc,'%d/%c/%Y'), id_paciente_vc, id_personal_medico_vc, id_concepto_es, usuarioEdo5_e, contador_vc, area_vc, nota_radiologo_vc, usuarioEdo5_e from venta_conceptos where id_vc = $idE ") or die (mysqli_error($horizonte));
 	$row1 = mysqli_fetch_row($result1);
		
	$result2 = mysqli_query($horizonte, "SELECT nombre_u, apaterno_u, amaterno_u from usuarios where id_u = $row1[5] ") or die (mysqli_error($horizonte));
 	$row2 = mysqli_fetch_row($result2);
	
	$result3 = mysqli_query($horizonte, "SELECT concepto_to from conceptos where id_to = $row1[6] ") or die (mysqli_error($horizonte));
 	$row3 = mysqli_fetch_row($result3);
	
	$idUi = sqlValue($row1[11], "int", $horizonte);
	$result4 = mysqli_query($horizonte, "SELECT nombre_u, apaterno_u, amaterno_u, cedulaProfesional_u, id_u, sexo_u from usuarios where id_u = $idUi ") or die (mysqli_error($horizonte));
 	$row4 = mysqli_fetch_row($result4);
	
	$medicoEstudio = $row2[0]." ".$row2[1]." ".$row2[2];
	$medicoInterpreta = $row4[0]." ".$row4[1]." ".$row4[2];
	if($row[9] != 55){
		$referenciaPacs = $row1[0];
	}else{$referenciaPacs = $row1[0]."-".$row1[8];}
	
	$referenciaPacs = substr($referenciaPacs, 2);
	$referenciaPacs = str_replace("-","",$referenciaPacs);
	
	$datos = $row1[0].';*-'.$row1[0].';*-'.$row1[0].';*-'.$row1[1].";*-".$row1[3].";*-".$row1[1].";*-".$row1[2].";*-".$medicoEstudio.";*-".$row3[0].";*-".$medicoInterpreta.";*-".$row4[3].";*-".$row1[7].".png".";*-".$referenciaPacs.";*-".$row1[10].";*-".$row1[4].";*-".$row4[5];
	
echo $datos;
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>