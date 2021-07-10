<?php
require("../Connections/horizonte.php");
require("../funciones/php/values.php");

include_once '../recursos/session.php';
include_once '../Connections/database.php';
include_once '../recursos/utilities.php';

$id_user = $_SESSION['id']; $acceso_user = $_SESSION['MM_UserGroup'];

$fila = sqlValue($_POST["fila"], "int", $horizonte);
$mesyanio = sqlValue($_POST["mesyanio"], "text", $horizonte);
$dia = sqlValue($_POST["dia"], "int", $horizonte);
$valor = sqlValue($_POST["valor"], "int", $horizonte);
$now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);

if ( $fila == 1 ) {
  $indicador = "CONSULTAS U-M";
} else if ( $fila == 2 ) {
  $indicador = "CONSULTAS U-V";
} else if ( $fila == 3 ) {
  $indicador = "CONSULTAS U-N";
} else if ( $fila == 4 ) {
  $indicador = "URGENCIAS CALIFICADAS";
} else if ( $fila == 5 ) {
  $indicador = "OTRAS URGENCIAS";
} else if ( $fila == 6 ) {
  $indicador = "HOSPITALIZADOS GENERAL";
} else if ( $fila == 7 ) {
  $indicador = "HOSPITALIZADOS PEDIATRIA";
} else if ( $fila == 8 ) {
  $indicador = "HOSPITALIZADOS NEONATOS";
} else if ( $fila == 9 ) {
  $indicador = "HOSPITALIZADOS G-O";
} else if ( $fila == 10 ) {
  $indicador = "HOSPITALIZADOS M-I";
} else if ( $fila == 11 ) {
  $indicador = "HOSPITALIZADOS CIRUGÍA";
} else if ( $fila == 12 ) {
  $indicador = "HOSPITALIZACIÓN JUNIOR S";
} else if ( $fila == 13 ) {
  $indicador = "HOSPITALIZACIÓN MASTER S";
} else if ( $fila == 14 ) {
  $indicador = "CIRUGÍAS DE URGENCIA";
} else if ( $fila == 15 ) {
  $indicador = "CIRUGÍAS PROGRAMADAS";
} else if ( $fila == 16 ) {
  $indicador = "PACIENTES EN P.B.R.";
} else if ( $fila == 17 ) {
  $indicador = "LEGRADOS";
} else if ( $fila == 18 ) {
  $indicador = "PARTOS";
} else if ( $fila == 19 ) {
  $indicador = "CESAREAS URGENCIAS";
} else if ( $fila == 20 ) {
  $indicador = "CESAREAS PROGRAMADAS";
} else if ( $fila == 21 ) {
  $indicador = "INTERNAMIENTO URGENCIA";
} else if ( $fila == 22 ) {
  $indicador = "INTERNAMIENTO REFERIDO";
} else if ( $fila == 23 ) {
  $indicador = "RX SOLICITADOS M";
} else if ( $fila == 24 ) {
  $indicador = "RX SOLICITADOS V";
} else if ( $fila == 25 ) {
  $indicador = "RX SOLICITADOS NOCTURNO";
} else if ( $fila == 26 ) {
  $indicador = "USG";
} else if ( $fila == 27 ) {
  $indicador = "MATUTINO";
} else if ( $fila == 28 ) {
  $indicador = "VESPERTINO";
} else if ( $fila == 29 ) {
  $indicador = "NOCTURNO";
} else if ( $fila == 30 ) {
  $indicador = "INGRESOS";
} else if ( $fila == 31 ) {
  $indicador = "EGRESOS";
} else if ( $fila == 32 ) {
  $indicador = "PREALTAS";
} else { $indicador = ""; }

$indicador = sqlValue($indicador, "text", $horizonte);

mysqli_select_db($horizonte, $database_horizonte);
$sqlq = mysqli_query($horizonte, "SELECT count(id_ird) from indicador_rd where mesanio_ird = $mesyanio and dia_ird = $dia and indicador_ird = $indicador") or die (mysqli_error($horizonte));
$uno = mysqli_fetch_row($sqlq);

if ( $uno[0] > 0 ) {
  // Ya hay un registro guardado con esta fecha, sólo actualizamos el registro

  mysqli_select_db($horizonte, $database_horizonte);
  $sqlq1 = mysqli_query($horizonte, "SELECT id_ird from indicador_rd where mesanio_ird = $mesyanio and dia_ird = $dia and indicador_ird = $indicador") or die (mysqli_error($horizonte));
  $uno1 = mysqli_fetch_row($sqlq1);

  $id_reg = sqlValue($uno1[0], "int", $horizonte);

  mysqli_select_db($horizonte, $database_horizonte);
  $sql = "UPDATE indicador_rd SET valor_ird = $valor, fecha_reg_ird = $now, usuario_ird = $id_user where id_ird = $id_reg";

  $insert = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));

  if(!$insert){echo $sql;}else{ echo 1;}
} else {
  // Insertamos un nuevo REGISTRO
  mysqli_select_db($horizonte, $database_horizonte);
  $sql = "INSERT INTO indicador_rd(indicador_ird, mesanio_ird, dia_ird, valor_ird, fecha_reg_ird, usuario_ird) VALUES ($indicador, $mesyanio, $dia, $valor, $now, $id_user)";

  $insert = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));

  if(!$insert){echo $sql;}else{ echo 1;}
}


mysqli_close($horizonte);
?>
