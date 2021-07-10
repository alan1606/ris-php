<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 	$idP = sqlValue($_POST["idP"], "int", $horizonte);

	mysqli_select_db($horizonte, $database_horizonte);
	$result = mysqli_query($horizonte, "SELECT h.estatus_padre_hc, h.ahf_padre_1, h.ahf_padre_2, h.ahf_padre_3, h.ahf_padre_4, h.estatus_madre_hc, h.ahf_madre_1, h.ahf_madre_2, h.ahf_madre_3, h.ahf_madre_4, h.no_hermanos, h.ahf_hnos_1, h.ahf_hnos_2, h.ahf_hnos_3, h.ahf_hnos_4, h.estatus_conyugue, h.ahf_conyugue_1, h.ahf_conyugue_2, h.ahf_conyugue_3, h.ahf_conyugue_4, h.no_hijos_hc, h.ahf_hijos_1, h.ahf_hijos_2, h.ahf_hijos_3, h.ahf_hijos_4, h.ahf_notas, h.adiccion1, h.adiccion2, h.adiccion3, h.inicio_adiccion1, h.inicio_adiccion2, h.inicio_adiccion3, h.frecuencia_adiccion1, h.frecuencia_adiccion2, h.frecuencia_adiccion3, h.deporte1, h.deporte2, h.frecuencia_deporte1, h.frecuencia_deporte2, h.apnp_notas, h.recreacion1, h.recreacion2, h.recreacion3, h.recreacion4, h.recreacion5, h.recreacion6, h.vivienda_hc, h.habitantes_hc, h.mat_vivienda1, h.mat_vivienda2, h.servicios1, h.servicios2, h.servicios3, h.servicios4, h.aseo_personal_hc, h.vacunas1, h.vacunas2, h.vacunas3, h.observaciones_app_hc, h.horas_dormir_hc, h.alimentacion_hc, h.mascotas1_hc, h.mascotas2_hc, h.enfermedad1, h.enfermedad2, h.enfermedad3, h.enfermedad4, h.cirugia1, h.cirugia2, h.cirugia3, h.transfusiones_hc, h.app_notas, h.menarca_hc, h.ritmo_hc, h.duracion_hc, h.fur_hc, h.ivsa_hc, h.gestas_hc, h.partos_hc, h.cesareas_hc, h.abortos_hc, h.anticonceptivo_hc, h.tipo_anticonceptivo_hc, h.tiempo_uso_hc, h.doc_hc, h.colposcopia_hc, h.mastografia_hc, h.ago_notas_hc, h.alergia1_hc, h.alergia2_hc, h.alergia3_hc, h.alergia4_hc, h.alergia5_hc, h.alergia6_hc, DATE_FORMAT(h.fecha_registro_hc,'%d/%c/%Y'), u.usuario_u, h.enfermedad5, h.deporte3, h.frecuencia_deporte3, h.servicios5, h.vacunas4, h.vacunas5, h.mascotas3_hc, h.mascotas4_hc, h.mascotas5_hc from historia_clinica h left join usuarios u on u.id_u = h.id_usuario_hc where h.id_paciente_hc = $idP order by h.id_hc desc limit 1 ") or die (mysqli_error($horizonte));
 	$row = mysqli_fetch_row($result);
	
	$datos = $row[0].';*-'.$row[1].';*-'.$row[2].';*-'.$row[3].';*-'.$row[4].';*-'.$row[5].';*-'.$row[6].';*-'.$row[7].';*-'.$row[8].';*-'.$row[9].';*-'.$row[10].';*-'.$row[11].';*-'.$row[12].';*-'.$row[13].';*-'.$row[14].';*-'.$row[15].';*-'.$row[16].';*-'.$row[17].';*-'.$row[18].';*-'.$row[19].';*-'.$row[20].';*-'.$row[21].';*-'.$row[22].';*-'.$row[23].';*-'.$row[24].';*-'.$row[25].';*-'.$row[26].';*-'.$row[27].';*-'.$row[28].';*-'.$row[29].';*-'.$row[30].';*-'.$row[31].';*-'.$row[32].';*-'.$row[33].';*-'.$row[34].';*-'.$row[35].';*-'.$row[36].';*-'.$row[37].';*-'.$row[38].';*-'.$row[39].';*-'.$row[40].';*-'.$row[41].';*-'.$row[42].';*-'.$row[43].';*-'.$row[44].';*-'.$row[45].';*-'.$row[46].';*-'.$row[47].';*-'.$row[48].';*-'.$row[49].';*-'.$row[50].';*-'.$row[51].';*-'.$row[52].';*-'.$row[53].';*-'.$row[54].';*-'.$row[55].';*-'.$row[56].';*-'.$row[57].';*-'.$row[58].';*-'.$row[59].';*-'.$row[60].';*-'.$row[61].';*-'.$row[62].';*-'.$row[63].';*-'.$row[64].';*-'.$row[65].';*-'.$row[66].';*-'.$row[67].';*-'.$row[68].';*-'.$row[69].';*-'.$row[70].';*-'.$row[71].';*-'.$row[72].';*-'.$row[73].';*-'.$row[74].';*-'.$row[75].';*-'.$row[76].';*-'.$row[77].';*-'.$row[78].';*-'.$row[79].';*-'.$row[80].';*-'.$row[81].';*-'.$row[82].';*-'.$row[83].';*-'.$row[84].';*-'.$row[85].';*-'.$row[86].';*-'.$row[87].';*-'.$row[88].';*-'.$row[89].';*-'.$row[90].';*-'.$row[91].';*-'.$row[92].';*-'.$row[93].';*-'.$row[94].';*-'.$row[95].';*-'.$row[96].';*-'.$row[97].';*-'.$row[98].';*-'.$row[99].';*-'.$row[100].';*-'.$row[101].';*-'.$row[102].';*-'.$row[103].';*-'.$row[104];
	
	echo $datos;
 	//Cerrar conexión a la Base de Datos
 	mysqli_close($horizonte);
?>