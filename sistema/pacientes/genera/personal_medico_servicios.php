<?php 
require_once('../../Connections/horizonte.php');
require("../../funciones/php/values.php");


mysqli_select_db($horizonte, $database_horizonte);
$consulta = "SELECT concat(t.abreviacion_ti, ' ', u.nombre_u, ' ', u.apaterno_u) as name, u.amaterno_u as materno, e.nombre_especialidad as especialidad, u.id_u as id from usuarios u left join especialidades e on e.id_es = u.especialidad_u left join catalogo_puestos cp on id_cp = u.idPuesto_u left join titulos t on t.id_ti = u.id_titulo_u group by u.id_u order by u.apaterno_u asc ";
$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
echo '<option value="">'.'-SELECCIONE EL PERSONAL QUE ATENDERÁ LOS ESTUDIOS-'.'</option>';
while ($fila = mysqli_fetch_array($query)) {
	echo '<option value="'.$fila['id'].'">'.$fila['name'].' '.$fila['materno'].' - '.$fila['especialidad'].'</option>';
};

?>