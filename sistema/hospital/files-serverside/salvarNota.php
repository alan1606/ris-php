<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $idC = sqlValue($_POST["idC"], "int", $horizonte);
 $idU = sqlValue($_POST["idU"], "int", $horizonte);
 $notaDictamen = sqlValue($_POST["notaDictamen"], "text", $horizonte);
 $now = sqlValue(date('Y-m-d H:i:s'), "date", $horizonte);
 $idP = sqlValue($_POST["idP"], "int", $horizonte);
 $idN = sqlValue($_POST["idN"], "int", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte);
 $sql = "insert into notas_de_hospital (nota_nh, id_hospitalizacion_nh, id_nota_nh, usuario_nh, fecha_nh, tipo_nota_nh, id_sv_nh) VALUES($notaDictamen, $idC, $idN, $idU, $now,1,0)";
 $update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));

 if (!$update) { echo $sql; } else{ echo 1; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>