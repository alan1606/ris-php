<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

include_once '../../recursos/session.php';
include_once '../../Connections/database.php';
include_once '../../recursos/utilities.php';

$id_p = sqlValue($_POST["id_p"], "int", $horizonte);

mysqli_select_db($horizonte, $database_horizonte);
$resultMe = mysqli_query($horizonte, "SELECT v.nota_interpretacion from venta_conceptos v left join conceptos c on c.id_to = v.id_concepto_es where c.id_tipo_concepto_to = 1 and v.estatus_vc = 6 and v.id_paciente_vc = $id_p order by v.id_vc desc limit 1") or die(mysqli_error($horizonte));
$rowMe = mysqli_fetch_row($resultMe);

echo $rowMe[0];
	
//Cerrar conexión a la Base de Datos
mysqli_close($horizonte);
?>