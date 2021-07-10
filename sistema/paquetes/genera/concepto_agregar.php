<?php 
require_once('../../Connections/horizonte.php');
require("../../funciones/php/values.php");

$tipo_concepto = sqlValue($_GET['t'], "int", $horizonte);
$aleatorio = sqlValue($_GET['aleat'], "text", $horizonte);

mysqli_select_db($horizonte, $database_horizonte);
$consulta = "SELECT c.concepto_to as name, concat(ti.abreviacion_ti, ' ',m.nombre_u, ' ', m.apaterno_u) as medico, c.id_to as id, a.nombre_a as area from conceptos c left join usuarios m on m.temporal_u = c.aleatorio_c left join titulos ti on ti.id_ti = m.id_titulo_u left join areas a on a.id_a = c.id_area_to WHERE (c.id_to not in (select id_to from conceptos where descripcion_to = 'paquete_h' or descripcion_to = 'membresia_h' or concepto_to like '%iva%' or concepto_to like '%cargo adicional%' or concepto_to like '%membresia%') or c.id_to not in(select id_concepto_ac from asigna_conceptos_paquetes where aleatorio_ac = $aleatorio)) and c.id_tipo_concepto_to = $tipo_concepto order by name asc ";
$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));

echo '<option value="">'.'-Selecciona el concepto para agregar al paquete-'.'</option>';

while ($fila = mysqli_fetch_array($query)) {
	echo '<option value="'.$fila['id'].'">'.$fila['name'].' | '.$fila['area'].' | '.$fila['medico'].'</option>';
};

?>