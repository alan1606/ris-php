<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 	$ref = sqlValue($_POST["ref"], "text", $horizonte);
 
	mysqli_select_db($horizonte, $database_horizonte);
	$result = mysqli_query($horizonte, "SELECT o.medico_c_ov, o.medico_ei_ov, o.medico_el_ov, o.personal_s_ov, o.p_desc_cta, o.desc_d_cta, o.adicionales_c_ov, o.motivo_desc_c_ov, o.motivo_c_ov, o.sub_total_c, o.t_desc_cta, (o.sub_total_c - o.t_desc_cta + o.adicionales_c_ov), o.sucursal_ov from orden_venta o where o.referencia_ov = $ref limit 1") or die (mysqli_error($horizonte));
	$row = mysqli_fetch_row($result);
	
	mysqli_select_db($horizonte, $database_horizonte);
	$result1 = mysqli_query($horizonte, "SELECT v.id_convenio_vc, v.motivo_visita_vc from venta_conceptos v left join conceptos c on c.id_to = v.id_concepto_es where v.referencia_vc = $ref and c.id_tipo_concepto_to = 1 limit 1") or die (mysqli_error($horizonte));
	$row1 = mysqli_fetch_row($result1);
		
	echo $row[0].';-{'.$row[1].';-{'.$row[2].';-{'.$row[3].';-{'.$row1[0].';-{'.$row[8].';-{'.$row[4].';-{'.$row[5].';-{'.$row[6].';-{'.$row[7].';-{'.$row[9].';-{'.$row[10].';-{'.$row[11].';-{'.$row[12];
 
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>