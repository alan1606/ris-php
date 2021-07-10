<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idMedH = sqlValue($_POST["idMedH"], "int", $horizonte);
 $idU = sqlValue($_POST["idU"], "int", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte); 
 $sql="INSERT INTO medicamentos_aplicados_hospi(id_medicamento_hospital_mah,id_usuario_mah,fecha_mah) VALUES($idMedH, $idU, $now)";
  
 $update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
	
 if(!$update){ echo $sql; }else{ echo 1; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>