<?php 
require_once('../../Connections/horizonte.php');
require("../../funciones/php/values.php");


mysqli_select_db($horizonte, $database_horizonte);
$consulta = "SELECT concat(t.abreviacion_ti, ' ', u.nombre_u, ' ', u.apaterno_u) as name, u.amaterno_u as materno, e.nombre_especialidad as especialidad, u.id_u as id from conceptos c left join usuarios u on u.temporal_u = c.aleatorio_c left join especialidades e on e.id_es = u.especialidad_u left join titulos t on t.id_ti = u.id_titulo_u WHERE u.id_u != '' group by u.id_u order by u.apaterno_u asc ";
$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
echo '<option value="">'.'-SELECCIONE UN MÉDICO PARA LA CONSULTA-'.'</option>';
while ($fila = mysqli_fetch_array($query)) {
	echo '<option value="'.$fila['id'].'">'.$fila['name'].' '.$fila['materno'].' - '.$fila['especialidad'].'</option>';
};

?>