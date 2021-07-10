<?php
require("../Connections/horizonte.php");
require("../funciones/php/values.php");

include_once '../recursos/session.php';
include_once '../Connections/database.php';
include_once '../recursos/utilities.php';

$id_user = $_SESSION['id']; $acceso_user = $_SESSION['MM_UserGroup'];

$indicador = sqlValue($_POST["id"], "text", $horizonte);
$mesyanio = sqlValue($_POST["fecha"], "text", $horizonte);

$now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
$cont = 0;

mysqli_select_db($horizonte, $database_horizonte);
$consulta = "SELECT valor_ird, dia_ird from indicador_rd where indicador_ird = $indicador and mesanio_ird = $mesyanio order by dia_ird asc ";
$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));

$array = array($_POST["id"],0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);

while ($fila = mysqli_fetch_array($query)) {

  $array[$fila['dia_ird']+1] = $fila['valor_ird'];

  if($cont==0){$lista = $fila['valor_ird'];}
  else{$lista = $lista.','.$fila['valor_ird'];}
  $cont++;

};

for ($i = 1; $i <= 31; $i++){
  if($i==1){$lista1 = $array[$i - 1];}
  else{
    $lista1 = $lista1.','.$array[$i - 1];
  }
}

// echo '"'.$_POST["id"].'", '.$lista1;
echo json_encode($array);

mysqli_close($horizonte);
?>
