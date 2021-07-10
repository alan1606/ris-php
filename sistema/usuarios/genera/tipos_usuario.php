<?php
require_once('../../Connections/horizonte.php');
require("../../funciones/php/values.php");

include_once '../../recursos/session.php';
include_once '../../Connections/database.php';
include_once '../../recursos/utilities.php';

$tipo_user = $_SESSION['MM_UserGroup'];
$sucu_user = $_SESSION['MM_Usersucu'];

mysqli_select_db($horizonte, $database_horizonte);

if($tipo_user==14){
	$consulta = "SELECT id_tu, nombre_tu from tipo_usuario where id_tu = 14 ";
}else{
	if($_GET['s']==1){$consulta = "SELECT id_tu, nombre_tu from tipo_usuario order by nombre_tu asc ";}
	else{$consulta = "SELECT id_tu, nombre_tu from tipo_usuario where id_tu = $tipo_user order by nombre_tu asc ";}
}

$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
echo '<option value="">'.'-SELECCIONAR-'.'</option>';
while ($fila = mysqli_fetch_array($query)) {
	echo '<option value="'.$fila['id_tu'].'">'.$fila['nombre_tu'].'</option>';
};

?>