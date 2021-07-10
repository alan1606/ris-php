<?php
require_once('../../../Connections/horizonte.php');
require("../../../funciones/php/values.php");

// Values received via ajax
$title = mb_strtoupper(sqlValue($_POST['title'], "text", $horizonte));
$start = sqlValue(date('Y-m-d H:i:s', strtotime($_POST["start"])), "date", $horizonte);
$end = sqlValue(date('Y-m-d H:i:s', strtotime($_POST["end"])), "date", $horizonte);
$a = sqlValue($_POST["que"], "int", $horizonte);
$quien = sqlValue($_POST["quien"], "int", $horizonte);
$description = sqlValue($_POST["descripcion"], "text", $horizonte);
$id_user = sqlValue($_POST["id_user_r"], "int", $horizonte);
$now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte);
 $sql1 = "INSERT INTO events (title, start, end, a_quien, id_quien, description, id_usuario_reg, fecha_reg)";
 $sql1.= "VALUES ($title, $start, $end, $a, $quien, $description, $id_user, $now)";

 $update1 = mysqli_query($horizonte, $sql1);

 if (!$update1) {
	echo $sql1;
 }else{echo 1;}

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);

?>