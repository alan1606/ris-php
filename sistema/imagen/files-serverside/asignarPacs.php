<?php
require("../../Connections/ipacs_postgres.php");
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $pkPacs = sqlValue($_POST["pkPacs"], "int", $horizonte);
 $idPacsVC = sqlValue($_POST["idPacsVC"], "text", $horizonte);

 $aleatorio = sqlValue(date('YmdHis'), "text", $horizonte);

 //Ponemos en xxx000 el idpacs de otros patient
 // mysqli_select_db($ipacs, $database_ipacs);
 // $sql1 = "UPDATE patient SET pat_id = '000_xxx' where pat_id = $idPacsVC";
 // $update1 = mysqli_query($ipacs, $sql1) or die (mysqli_error($ipacs));

 $sql1 = "UPDATE study SET id_pacs = $aleatorio where id_pacs = $idPacsVC";
 $update1 = pg_query($ipacsp, $sql1) or die('La consulta fallo: ' . pg_last_error());

 if (!$update1) { echo $sql1; }else {
 	// mysqli_select_db($ipacs, $database_ipacs);
 	// $sql = "UPDATE patient SET pat_id = $idPacsVC where pk = $pkPacs limit 1";
 	// $update = mysqli_query($ipacs, $sql) or die (mysqli_error($ipacs));

  $sql = "UPDATE study SET id_pacs = $idPacsVC where pk = $pkPacs";
  $update = pg_query($ipacsp, $sql) or die('La consulta fallo: ' . pg_last_error());

  // $result = pg_query($db, "UPDATE book SET book_id = $_POST[bookid_updated], name = '$_POST[book_name_updated]',price = $_POST[price_updated], date_of_publication = $_POST[dop_updated]");

	if(!$update) { echo $sql; }else { echo 1; }
 }

 //Cerrar conexión a la Base de Datos
 mysqli_close($ipacs);
?>
