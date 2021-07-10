<?php require_once('../../Connections/horizonte.php'); ?>
<?php
require("../../funciones/php/values.php");
mysqli_select_db($horizonte, $database_horizonte);

if(isset($_POST["idPDF"])){
	$nombre_foto=sqlValue($_POST["idPDF"], "text", $horizonte); 
	$idU=sqlValue($_POST["idU"], "int", $horizonte); 
	$idE=sqlValue($_POST["idE"], "int", $horizonte); 
	$now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);

	$consultar = mysqli_query($horizonte, "SELECT * FROM imagenes WHERE tipo_im = 'PDF_RESULTADO' and nombre_im = $nombre_foto");
	$row2 = mysqli_fetch_array($consultar);
	
	$query = mysqli_query($horizonte, "DELETE FROM imagenes WHERE tipo_im = 'PDF_RESULTADO' and nombre_im = $nombre_foto");
	unlink("pdf/".$row2['nombre_im']);
	
	mysqli_select_db($horizonte, $database_horizonte);
	$sql = "UPDATE venta_conceptos SET estatus_vc = 3, usuarioEdo4_e = $idU, fechaEdo4_e = $now where id_vc = $idE limit 1";
	  
	$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
		
	if (!$update) { echo $sql; }
	else { echo 1; }
	
	//echo 1;
}
?>