<?php 
require_once('../../Connections/horizonte.php');
require("../../funciones/php/values.php");
//Buscar a los titulares de membresías vigentes

mysqli_select_db($horizonte, $database_horizonte);
$consulta = "SELECT p.nombre_completo_p as paciente, c.concepto_to as name, m.id_me as id, c.dias_entrega_to as no_personas, m.id_paciente_me as paci, m.fecha_f_me as fech_f, m.folio_me as folio from membresias m left join conceptos c on c.id_to = m.id_membresia_me left join pacientes p on p.id_p = m.id_paciente_me where m.titular_me = 1 and CURDATE() between m.fecha_i_me and m.fecha_f_me order by paciente desc";
$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));

echo '<option value="">'.'-Selecciona la membresía a comprar-'.'</option>';

while ($fila = mysqli_fetch_array($query)){
	mysqli_select_db($horizonte, $database_horizonte); $folio = sqlValue($fila['folio'], "int", $horizonte);
	$consulta1 = "SELECT count(id_me) from membresias where folio_me = $folio";
	$query1 = mysqli_query($horizonte, $consulta1) or die (mysqli_error($horizonte));
	$rowR = mysqli_fetch_row($query1); $disponibles = $fila['no_personas'] - $rowR[0];
	
	echo '<option value="'.$fila['id'].'">'.$fila['paciente'].' | '.$fila['name'].' | '.$disponibles.' LUGARES DISPONIBLES</option>';
};

?>