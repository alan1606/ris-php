<?php require_once('../../Connections/horizonte.php'); ?>
<?php
include_once '../../recursos/session.php';
include_once '../../Connections/database.php';
include_once '../../recursos/utilities.php';

$tipo_user = $_SESSION['MM_UserGroup'];
$sucu_user = $_SESSION['MM_Usersucu'];

mysqli_select_db($horizonte, $database_horizonte);

if ( $tipo_user==14 || $_GET['myAss'] ){
	if( $_GET['myAss'] != 1 ){
		$consulta = "SELECT DISTINCT id_su, nombre_su from sucursales where id_su = $sucu_user";
	} else {
		$consulta = "SELECT DISTINCT id_su, nombre_su from sucursales order by nombre_su asc";	
	}
}else{
	$consulta = "SELECT DISTINCT id_su, nombre_su from sucursales order by nombre_su asc";
}

$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));

while ($fila = mysqli_fetch_array($query)) {
	echo '<option value="'.$fila['id_su'].'">'.$fila['nombre_su'].'</option>';
};

?>