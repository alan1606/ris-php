<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 	$idP = sqlValue($_POST["idP"], "int", $horizonte);

	mysqli_select_db($horizonte, $database_horizonte);
	$result = mysqli_query($horizonte, "SELECT estatus_padre_hc, ahf_padre_1, ahf_padre_2, ahf_padre_3, ahf_padre_4, estatus_madre_hc, ahf_madre_1, ahf_madre_2, ahf_madre_3, ahf_madre_4, no_hermanos, ahf_hnos_1, ahf_hnos_2, ahf_hnos_3, ahf_hnos_4, estatus_conyugue, ahf_conyugue_1, ahf_conyugue_2, ahf_conyugue_3, ahf_conyugue_4, no_hijos_hc, ahf_hijos_1, ahf_hijos_2, ahf_hijos_3, ahf_hijos_4, ahf_notas, adiccion1, adiccion2, adiccion3, inicio_adiccion1, inicio_adiccion2, inicio_adiccion3, frecuencia_adiccion1, frecuencia_adiccion2, frecuencia_adiccion3, deporte1, deporte2, frecuencia_deporte1, frecuencia_deporte2, apnp_notas, recreacion1, recreacion2, recreacion3, recreacion4, recreacion5, recreacion6, vivienda_hc, habitantes_hc, mat_vivienda1, mat_vivienda2, servicios1, servicios2, servicios3, servicios4, aseo_personal_hc, vacunas1, vacunas2, vacunas3, observaciones_app_hc, horas_dormir_hc, alimentacion_hc, mascotas1_hc, mascotas2_hc, enfermedad1, enfermedad2, enfermedad3, enfermedad4, cirugia1, cirugia2, cirugia3, transfusiones_hc, app_notas, menarca_hc, ritmo_hc, duracion_hc, fur_hc, ivsa_hc, gestas_hc, partos_hc, cesareas_hc, abortos_hc, anticonceptivo_hc, tipo_anticonceptivo_hc, tiempo_uso_hc, doc_hc, colposcopia_hc, mastografia_hc, ago_notas_hc, alergia1_hc, alergia2_hc, alergia3_hc, alergia4_hc, alergia5_hc, alergia6_hc from historia_clinica where id_paciente_hc = $idP ") or die (mysqli_error($horizonte));
 	$row = mysqli_fetch_row($result);
	
	$datos = $row[0].';*-'.$row[1].';*-'.$row[2].';*-'.$row[3].';*-'.$row[4].';*-'.$row[5].';*-'.$row[6].';*-'.$row[7].';*-'.$row[8].';*-'.$row[9].';*-'.$row[10].';*-'.$row[11].';*-'.$row[12].';*-'.$row[13].';*-'.$row[14].';*-'.$row[15].';*-'.$row[16].';*-'.$row[17].';*-'.$row[18].';*-'.$row[19].';*-'.$row[20].';*-'.$row[21].';*-'.$row[22].';*-'.$row[23].';*-'.$row[24].';*-'.$row[25].';*-'.$row[26].';*-'.$row[27].';*-'.$row[28].';*-'.$row[29].';*-'.$row[30].';*-'.$row[31].';*-'.$row[32].';*-'.$row[33].';*-'.$row[34].';*-'.$row[35].';*-'.$row[36].';*-'.$row[37].';*-'.$row[38].';*-'.$row[39].';*-'.$row[40].';*-'.$row[41].';*-'.$row[42].';*-'.$row[43].';*-'.$row[44].';*-'.$row[45].';*-'.$row[46].';*-'.$row[47].';*-'.$row[48].';*-'.$row[49].';*-'.$row[50].';*-'.$row[51].';*-'.$row[52].';*-'.$row[53].';*-'.$row[54].';*-'.$row[55].';*-'.$row[56].';*-'.$row[57].';*-'.$row[58].';*-'.$row[59].';*-'.$row[60].';*-'.$row[61].';*-'.$row[62].';*-'.$row[63].';*-'.$row[64].';*-'.$row[65].';*-'.$row[66].';*-'.$row[67].';*-'.$row[68].';*-'.$row[69].';*-'.$row[70].';*-'.$row[71].';*-'.$row[72].';*-'.$row[73].';*-'.$row[74].';*-'.$row[75].';*-'.$row[76].';*-'.$row[77].';*-'.$row[78].';*-'.$row[79].';*-'.$row[80].';*-'.$row[81].';*-'.$row[82].';*-'.$row[83].';*-'.$row[84].';*-'.$row[85].';*-'.$row[86].';*-'.$row[87].';*-'.$row[88].';*-'.$row[89].';*-'.$row[90].';*-'.$row[91].';*-'.$row[92].';*-'.$row[93];
	
	echo $datos;
 	//Cerrar conexión a la Base de Datos
 	mysqli_close($horizonte);
?>