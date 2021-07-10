<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

include_once '../../recursos/session.php';
include_once '../../Connections/database.php';
include_once '../../recursos/utilities.php';

$id_p = sqlValue($_POST["id_paciente_hc"], "int", $horizonte);
$dx = sqlValue($_POST["dx_p"], "text", $horizonte);
$medico_tratante = sqlValue($_POST["medico_tratante_p"], "int", $horizonte);
$servicio = sqlValue($_POST["servicio_p"], "text", $horizonte);
$fecha_servicio = sqlValue($_POST["fecha_p"], "date", $horizonte);
$ingreso = sqlValue($_POST["ingreso_p"], "text", $horizonte);
$cama = sqlValue($_POST["cama_p"], "text", $horizonte);
$registro = sqlValue($_POST["reg_p"], "text", $horizonte);
$diabetes_ahf = sqlValue($_POST["diabetes_ahf"], "text", $horizonte);
$hipertension_ahf = sqlValue($_POST["hipertension_ahf"], "text", $horizonte);
$cancer_ahf = sqlValue($_POST["cancer_ahf"], "text", $horizonte);
$obesidad_ahf = sqlValue($_POST["obesidad_ahf"], "text", $horizonte);
$cardiopatias_ahf = sqlValue($_POST["cardiopatias_ahf"], "text", $horizonte);
$nefropatas_ahf = sqlValue($_POST["nefropatas_ahf"], "text", $horizonte);
$malformaciones_ahf = sqlValue($_POST["malformaciones_ahf"], "text", $horizonte);
$tuberculosis_ahf = sqlValue($_POST["tuberculosis_ahf"], "text", $horizonte);
$problemas_vista_ahf = sqlValue($_POST["problemas_vista_ahf"], "text", $horizonte);
$deportes_ahf = sqlValue($_POST["deportes_ahf"], "text", $horizonte);
$otros_ahf = sqlValue($_POST["otros_ahf"], "text", $horizonte);
$tabaquismo = sqlValue($_POST["tabaquismo_p"], "text", $horizonte);
$alcoholismo = sqlValue($_POST["alcoholismo_p"], "text", $horizonte);
$drogadiccion = sqlValue($_POST["drogadiccion_p"], "text", $horizonte);
$alergias = sqlValue($_POST["alergias_p"], "text", $horizonte);
$tsanguineo = sqlValue($_POST["tsanguineo_p"], "int", $horizonte);
$alimentacion = sqlValue($_POST["alimentacion_p"], "text", $horizonte);
$vivienda = sqlValue($_POST["vivienda_p"], "text", $horizonte);
$otros_apnp = sqlValue($_POST["otros_apnp_p"], "text", $horizonte);
$enfermedades_infancia = sqlValue($_POST["enfermedades_in_p"], "text", $horizonte);
$hospitalizaciones = sqlValue($_POST["hospitalizaciones_p"], "text", $horizonte);
$a_quirurgicos = sqlValue($_POST["a_quirurgicos_p"], "text", $horizonte);
$transfusiones = sqlValue($_POST["transfusiones_p"], "text", $horizonte);
$fracturas = sqlValue($_POST["fracturas_p"], "text", $horizonte);
$accidentes = sqlValue($_POST["accidentes_p"], "text", $horizonte);
$enfermedades_piel = sqlValue($_POST["enfermedades_piel"], "text", $horizonte);
$desnutricion = sqlValue($_POST["desnutricion_p"], "text", $horizonte);
$posturales = sqlValue($_POST["posturales_p"], "text", $horizonte);
$defectos_postqui = sqlValue($_POST["defectos_postqui_p"], "text", $horizonte);
$vih = sqlValue($_POST["vih_p"], "text", $horizonte);
$osteoporosis = sqlValue($_POST["osteoporosis_p"], "text", $horizonte);
$sarampion = sqlValue($_POST["sarampion_p"], "text", $horizonte);
$parotivitis = sqlValue($_POST["parotivitis_p"], "text", $horizonte);
$hepatitis = sqlValue($_POST["hepatitis_p"], "text", $horizonte);
$rubeola = sqlValue($_POST["rubeola_p"], "text", $horizonte);
$organos_sentidos = sqlValue($_POST["organos_sentidos_p"], "text", $horizonte);
$exp_laboral = sqlValue($_POST["exp_laboral_p"], "text", $horizonte);
$medicaciones = sqlValue($_POST["medicaciones_p"], "text", $horizonte);
$otras_enferm = sqlValue($_POST["otras_enferm_p"], "text", $horizonte);
$menarca = sqlValue($_POST["menarca_p"], "text", $horizonte);
$ciclos = sqlValue($_POST["ciclos_p"], "text", $horizonte);
$ritmo = sqlValue($_POST["ritmo_p"], "text", $horizonte);
$fum = sqlValue($_POST["fum_p"], "text", $horizonte);
$metrorragia = sqlValue($_POST["metrorragia_p"], "text", $horizonte);
$dismenorrea = sqlValue($_POST["dismenorrea_p"], "text", $horizonte);
$ivsa = sqlValue($_POST["ivsa_p"], "text", $horizonte);
$no_parejas = sqlValue($_POST["no_parejas_p"], "int", $horizonte);
$gpac = sqlValue($_POST["gpac_p"], "text", $horizonte);
$ultima_citologia = sqlValue($_POST["ultima_cito_p"], "text", $horizonte);
$metodo_pf = sqlValue($_POST["metodo_pf_p"], "text", $horizonte);
$motivo_c = sqlValue($_POST["motivo_c"], "text", $horizonte);
$evolucion_padecimiento = sqlValue($_POST["evolucion_pa"], "text", $horizonte);
$interrogacion_as = sqlValue($_POST["interrogacion_as"], "text", $horizonte);
$exploracion_f = sqlValue($_POST["exploracion_f"], "text", $horizonte);
$examenes_prev = sqlValue($_POST["examenes_prev"], "text", $horizonte);
$comentarios_finales = sqlValue($_POST["comentarios_fin"], "text", $horizonte);
$interrogadion_dx = sqlValue($_POST["interrogadion_dx"], "text", $horizonte);
$osteoporosis = sqlValue($_POST["osteoporosis_p"], "text", $horizonte);
$now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
$id_u = sqlValue($_SESSION["id"], "int", $horizonte);

mysqli_select_db($horizonte, $database_horizonte);
$sql = "UPDATE historia_clinica_n SET dx_hc = $dx, id_medico_t_hc = $medico_tratante, servicio_hc = $servicio, fecha_hc = $fecha_servicio, ingreso_hc = $ingreso, no_cama_hc = $cama, reg_hc = $registro, diabetes_hc = $diabetes_ahf, obesidad_hc = $obesidad_ahf, hipertension_hc = $hipertension_ahf, cancer_hc = $cancer_ahf, cardiopatias_hc = $cardiopatias_ahf, tuberculosis_hc = $tuberculosis_ahf, problemas_vista_hc = $problemas_vista_ahf, deportes_hc = $deportes_ahf, nefropatas_hc = $nefropatas_ahf, malformaciones_hc = $malformaciones_ahf, otros_ahf_hc = $otros_ahf, tabaquismo_hc = $tabaquismo, alcoholismo_hc = $alcoholismo, alimentacion_hc = $alimentacion, vivienda_sb_hc = $vivienda, drogadiccion_hc = $drogadiccion, otros_apnp_hc = $otros_apnp, enfermedades_infancia_hc = $enfermedades_infancia, hospitalizaciones_hc = $hospitalizaciones, cirugias_hc = $a_quirurgicos, transfusiones_hc = $transfusiones, fracturas_hc = $fracturas, enfermedades_piel_hc = $enfermedades_piel, desnutricion_hc = $desnutricion, posturales_hc = $posturales, postquirurgicos_hc = $defectos_postqui, vih_hc = $vih, sarampion_hc = $sarampion, parotivitis_hc = $parotivitis, hepatitis_hc = $hepatitis, rubeola_hc = $rubeola, enfermedades_organos_sentidos_hc = $organos_sentidos, exposicion_lab_hc = $exp_laboral, accidentes_hc = $accidentes, otras_enfermedades_hc = $otras_enferm, medicaciones_hc = $medicaciones, menarca_hc = $menarca, ciclos_hc = $ciclos, ritmo_hc = $ritmo, fecha_um_hc = $fum, metrorragia_hc = $metrorragia, dismenorrea_hc = $dismenorrea, ivsa_hc = $ivsa, no_parejas_s_hc = $no_parejas, gpac_hc = $gpac, ultima_citologia_hc =  $ultima_citologia, metodo_pf_hc = $metodo_pf, motivo_consulta_hc = $motivo_c, evolucion_padecimiento_hc = $evolucion_padecimiento, interrogacion_pas_hc = $interrogacion_as, exploracion_fisica_hc = $exploracion_f, examenes_lp_hc = $examenes_prev, comentarios_f_hc = $comentarios_finales, interrogacion_dx_hc = $interrogadion_dx, id_usuario_hc = $id_u, fecha1_hc = $now, osteoporosis_hc = $osteoporosis where id_paciente_hc = $id_p limit 1";
$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));

if (!$update) { echo $sql; }else {
	mysqli_select_db($horizonte, $database_horizonte);
	$sql1 = "UPDATE pacientes SET alergias_p = $alergias, tSanguineo_p = $tsanguineo where id_p = $id_p limit 1";
	$update1 = mysqli_query($horizonte, $sql1) or die (mysqli_error($horizonte));
	
	if (!$update1) { echo $sql1; }else { echo 1;}
}
	
//Cerrar conexión a la Base de Datos
mysqli_close($horizonte);
?>