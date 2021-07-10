<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idP = sqlValue($_POST["idPaciente_hc"], "int", $horizonte);
 $idU = sqlValue($_POST["idUsuario_hc"], "int", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 $estatus_padre = sqlValue($_POST["estatus_padre"], "int", $horizonte);
 $enfermedad_padre_1 = sqlValue($_POST["ahf_padre_1"], "int", $horizonte);
 $enfermedad_padre_2 = sqlValue($_POST["ahf_padre_2"], "int", $horizonte);
 $enfermedad_padre_3 = sqlValue($_POST["ahf_padre_3"], "int", $horizonte);
 $enfermedad_padre_4 = sqlValue($_POST["ahf_padre_4"], "int", $horizonte);
 $estatus_madre = sqlValue($_POST["estatus_madre"], "int", $horizonte);
 $enfermedad_madre_1 = sqlValue($_POST["ahf_madre_1"], "int", $horizonte);
 $enfermedad_madre_2 = sqlValue($_POST["ahf_madre_2"], "int", $horizonte);
 $enfermedad_madre_3 = sqlValue($_POST["ahf_madre_3"], "int", $horizonte);
 $enfermedad_madre_4 = sqlValue($_POST["ahf_madre_4"], "int", $horizonte);
 $noHnos = sqlValue($_POST["noHnos"], "int", $horizonte);
 $enfermedad_hnos_1 = sqlValue($_POST["ahf_hnos_1"], "int", $horizonte);
 $enfermedad_hnos_2 = sqlValue($_POST["ahf_hnos_2"], "int", $horizonte);
 $enfermedad_hnos_3 = sqlValue($_POST["ahf_hnos_3"], "int", $horizonte);
 $enfermedad_hnos_4 = sqlValue($_POST["ahf_hnos_4"], "int", $horizonte);
 $estatus_conyugue = sqlValue($_POST["estatus_conyugue"], "int", $horizonte);
 $enfermedad_conyugue_1 = sqlValue($_POST["ahf_conyugue_1"], "int", $horizonte);
 $enfermedad_conyugue_2 = sqlValue($_POST["ahf_conyugue_2"], "int", $horizonte);
 $enfermedad_conyugue_3 = sqlValue($_POST["ahf_conyugue_3"], "int", $horizonte);
 $enfermedad_conyugue_4 = sqlValue($_POST["ahf_conyugue_4"], "int", $horizonte);
 $noHijos = sqlValue($_POST["noHijos"], "int", $horizonte);
 $enfermedad_hijos_1 = sqlValue($_POST["ahf_hijos_1"], "int", $horizonte);
 $enfermedad_hijos_2 = sqlValue($_POST["ahf_hijos_2"], "int", $horizonte);
 $enfermedad_hijos_3 = sqlValue($_POST["ahf_hijos_3"], "int", $horizonte);
 $enfermedad_hijos_4 = sqlValue($_POST["ahf_hijos_4"], "int", $horizonte);
 $ahf_notas = sqlValue($_POST["ahf_notas"], "text", $horizonte);
 
 $adiccion1 = sqlValue($_POST["adiccion1"], "int", $horizonte);
 $adiccion2 = sqlValue($_POST["adiccion2"], "int", $horizonte);
 $adiccion3 = sqlValue($_POST["adiccion3"], "int", $horizonte);
 $deporte1 = sqlValue($_POST["deporte1"], "int", $horizonte);
 $deporte2 = sqlValue($_POST["deporte2"], "int", $horizonte);
 $deporte3 = sqlValue($_POST["deporte3"], "int", $horizonte);
 $inicio_adiccion1 = sqlValue($_POST["inicio_adiccion1"], "int", $horizonte);
 $inicio_adiccion2 = sqlValue($_POST["inicio_adiccion2"], "int", $horizonte);
 $inicio_adiccion3 = sqlValue($_POST["inicio_adiccion3"], "int", $horizonte);
 $frecuencia_deporte1 = sqlValue($_POST["frecuencia_deporte1"], "int", $horizonte);
 $frecuencia_deporte2 = sqlValue($_POST["frecuencia_deporte2"], "int", $horizonte);
 $frecuencia_deporte3 = sqlValue($_POST["frecuencia_deporte3"], "int", $horizonte);
 $frecuencia_adiccion1 = sqlValue($_POST["frecuencia_adiccion1"], "int", $horizonte);
 $frecuencia_adiccion2 = sqlValue($_POST["frecuencia_adiccion2"], "int", $horizonte);
 $frecuencia_adiccion3 = sqlValue($_POST["frecuencia_adiccion3"], "int", $horizonte);
 $recreacion1 = sqlValue($_POST["recreacion1"], "int", $horizonte);
 $recreacion2 = sqlValue($_POST["recreacion2"], "int", $horizonte);
 $recreacion3 = sqlValue($_POST["recreacion3"], "int", $horizonte);
 $recreacion4 = sqlValue($_POST["recreacion4"], "int", $horizonte);
 $recreacion5 = sqlValue($_POST["recreacion5"], "int", $horizonte);
 $recreacion6 = sqlValue($_POST["recreacion6"], "int", $horizonte);
 $vivienda_hc = sqlValue($_POST["vivienda_hc"], "int", $horizonte);
 $mat_vivienda1 = sqlValue($_POST["mat_vivienda1"], "int", $horizonte);
 $mat_vivienda2 = sqlValue($_POST["mat_vivienda2"], "int", $horizonte);
 $habitantes = sqlValue($_POST["habitantes"], "int", $horizonte);
 $servicios1_hc = sqlValue($_POST["servicios1_hc"], "int", $horizonte);
 $servicios2_hc = sqlValue($_POST["servicios2_hc"], "int", $horizonte);
 $servicios3_hc = sqlValue($_POST["servicios3_hc"], "int", $horizonte);
 $servicios4_hc = sqlValue($_POST["servicios4_hc"], "int", $horizonte);
 $servicios5_hc = sqlValue($_POST["servicios5_hc"], "int", $horizonte);
 $aseo_personal = sqlValue($_POST["aseo_personal"], "int", $horizonte);
 $vacunas1 = sqlValue($_POST["vacunas1"], "int", $horizonte);
 $vacunas2 = sqlValue($_POST["vacunas2"], "int", $horizonte);
 $vacunas3 = sqlValue($_POST["vacunas3"], "int", $horizonte);
 $vacunas4 = sqlValue($_POST["vacunas4"], "int", $horizonte);
 $vacunas5 = sqlValue($_POST["vacunas5"], "int", $horizonte);
 $observacionesVacunas = sqlValue($_POST["observacionesVacunas"], "text", $horizonte);
 $hrs_dormir = sqlValue($_POST["hrs_dormir"], "int", $horizonte);
 $alimentacion_hc = sqlValue($_POST["alimentacion_hc"], "int", $horizonte);
 $mascota1 = sqlValue($_POST["mascota1"], "int", $horizonte);
 $mascota2 = sqlValue($_POST["mascota2"], "int", $horizonte);
 $mascota3 = sqlValue($_POST["mascota3"], "int", $horizonte);
 $mascota4 = sqlValue($_POST["mascota4"], "int", $horizonte);
 $mascota5 = sqlValue($_POST["mascota5"], "int", $horizonte);
 $enfermedad1 = sqlValue($_POST["enfermedad1"], "int", $horizonte);
 $enfermedad2 = sqlValue($_POST["enfermedad2"], "int", $horizonte);
 $enfermedad3 = sqlValue($_POST["enfermedad3"], "int", $horizonte);
 $enfermedad4 = sqlValue($_POST["enfermedad4"], "int", $horizonte);
 $enfermedad5 = sqlValue($_POST["enfermedad5"], "int", $horizonte);
 $alergia1 = sqlValue($_POST["alergia1"], "text", $horizonte);
 $alergia2 = sqlValue($_POST["alergia2"], "text", $horizonte);
 $alergia3 = sqlValue($_POST["alergia3"], "text", $horizonte);
 $alergia4 = sqlValue($_POST["alergia4"], "text", $horizonte);
 $alergia5 = sqlValue($_POST["alergia5"], "text", $horizonte);
 $alergia6 = sqlValue($_POST["alergia6"], "text", $horizonte);
 
 $cirugia1 = sqlValue($_POST["cirugia1"], "text", $horizonte);
 $cirugia2 = sqlValue($_POST["cirugia2"], "text", $horizonte);
 $cirugia3 = sqlValue($_POST["cirugia3"], "text", $horizonte);
 $transfusiones = sqlValue($_POST["transfusiones"], "int", $horizonte);
 $app_notas = sqlValue($_POST["app_notas"], "text", $horizonte);
 $menarca = sqlValue($_POST["menarca"], "int", $horizonte);
 
 $ritmo = sqlValue($_POST["ritmo"], "int", $horizonte);
 $duracionR = sqlValue($_POST["duracionR"], "int", $horizonte);
 $fur = sqlValue($_POST["fur"], "text", $horizonte);
 $ivsa = sqlValue($_POST["ivsa"], "int", $horizonte);
 $gestas = sqlValue($_POST["gestas"], "int", $horizonte);
 $partos = sqlValue($_POST["partos"], "int", $horizonte);
 $cesareas = sqlValue($_POST["cesareas"], "int", $horizonte);
 $abortos = sqlValue($_POST["abortos"], "int", $horizonte);
 $anticonceptivo = sqlValue($_POST["anticonceptivo"], "int", $horizonte);
 $tipo_anticon = sqlValue($_POST["tipo_anticon"], "int", $horizonte);
 $tiempo_uso = sqlValue($_POST["tiempo_uso"], "int", $horizonte);
 $doc = sqlValue($_POST["doc"], "text", $horizonte);
 $colposcopiaHC = sqlValue($_POST["colposcopiaHC"], "text", $horizonte);
 $mastografiaHC = sqlValue($_POST["mastografiaHC"], "text", $horizonte);
 $ago_notas = sqlValue($_POST["ago_notas"], "text", $horizonte);
 $apnp_notas = sqlValue($_POST["apnp_notas"], "text", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "INSERT into historia_clinica (estatus_padre_hc, ahf_padre_1, ahf_padre_2, ahf_padre_3, ahf_padre_4, estatus_madre_hc, ahf_madre_1, ahf_madre_2, ahf_madre_3, ahf_madre_4, no_hermanos, ahf_hnos_1, ahf_hnos_2, ahf_hnos_3, ahf_hnos_4, estatus_conyugue, ahf_conyugue_1, ahf_conyugue_2, ahf_conyugue_3, ahf_conyugue_4, no_hijos_hc, ahf_hijos_1, ahf_hijos_2, ahf_hijos_3, ahf_hijos_4, adiccion1, adiccion2, adiccion3, inicio_adiccion1, inicio_adiccion2, inicio_adiccion3, frecuencia_adiccion1, frecuencia_adiccion2, frecuencia_adiccion3, deporte1, deporte2, deporte3, frecuencia_deporte1, frecuencia_deporte2, frecuencia_deporte3, apnp_notas, recreacion1, recreacion2, recreacion3, recreacion4, recreacion5, recreacion6, vivienda_hc, habitantes_hc, mat_vivienda1, mat_vivienda2, servicios1, servicios2, servicios3, servicios4, servicios5, aseo_personal_hc, vacunas1, vacunas2, vacunas3, vacunas4, vacunas5, horas_dormir_hc, alimentacion_hc, mascotas1_hc, mascotas2_hc, mascotas3_hc, mascotas4_hc, mascotas5_hc, enfermedad1, enfermedad2, enfermedad3, enfermedad4, enfermedad5, cirugia1, cirugia2, cirugia3, transfusiones_hc, app_notas, menarca_hc, ritmo_hc, duracion_hc, fur_hc, ivsa_hc, gestas_hc, partos_hc, cesareas_hc, abortos_hc, anticonceptivo_hc, tipo_anticonceptivo_hc, tiempo_uso_hc, doc_hc, colposcopia_hc, mastografia_hc, ago_notas_hc, fecha_registro_hc, id_usuario_hc, temporal_hc, ahf_notas, alergia1_hc, alergia2_hc, alergia3_hc, alergia4_hc, alergia5_hc, alergia6_hc, id_paciente_hc) values($estatus_padre, $enfermedad_padre_1, $enfermedad_padre_2, $enfermedad_padre_3, $enfermedad_padre_4, $estatus_madre, $enfermedad_madre_1, $enfermedad_madre_2, $enfermedad_madre_3, $enfermedad_madre_4, $noHnos, $enfermedad_hnos_1, $enfermedad_hnos_2, $enfermedad_hnos_3, $enfermedad_hnos_4, $estatus_conyugue, $enfermedad_conyugue_1, $enfermedad_conyugue_2, $enfermedad_conyugue_3, $enfermedad_conyugue_4, $noHijos, $enfermedad_hijos_1, $enfermedad_hijos_2, $enfermedad_hijos_3, $enfermedad_hijos_4, $adiccion1, $adiccion2, $adiccion3, $inicio_adiccion1, $inicio_adiccion2, $inicio_adiccion3, $frecuencia_adiccion1, $frecuencia_adiccion2, $frecuencia_adiccion3, $deporte1, $deporte2, $deporte3, $frecuencia_deporte1, $frecuencia_deporte2, $frecuencia_deporte3, $apnp_notas, $recreacion1, $recreacion2, $recreacion3, $recreacion4, $recreacion5, $recreacion6, $vivienda_hc, $habitantes, $mat_vivienda1, $mat_vivienda2, $servicios1_hc, $servicios2_hc, $servicios3_hc, $servicios4_hc, $servicios5_hc, $aseo_personal, $vacunas1, $vacunas2, $vacunas3, $vacunas4, $vacunas5, $hrs_dormir, $alimentacion_hc, $mascota1, $mascota2, $mascota3, $mascota4, $mascota5, $enfermedad1, $enfermedad2, $enfermedad3, $enfermedad4, $enfermedad5, $cirugia1, $cirugia2, $cirugia3, $transfusiones, $app_notas, $menarca, $ritmo, $duracionR, $fur, $ivsa, $gestas, $partos, $cesareas, $abortos, $anticonceptivo, $tipo_anticon, $tiempo_uso, $doc, $colposcopiaHC, $mastografiaHC, $ago_notas, $now, $idU, 1, $ahf_notas, $alergia1, $alergia2, $alergia3, $alergia4, $alergia5, $alergia6, $idP)";
   
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
if (!$update) { echo $sql; }else { echo 1; }

 mysqli_close($horizonte); //Cerrar conexión a la Base de Datos
?>