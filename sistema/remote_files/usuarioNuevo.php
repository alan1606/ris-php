<?php
require("../Connections/horizonte.php");
require("../funciones/php/values.php");

$usuario = sqlValue($_POST["usuario"], "text", $horizonte);

mysqli_select_db($horizonte, $database_horizonte);
$result1=mysqli_query($horizonte, "SELECT u.usuarioNuevo_u, u.email_u, s.nombre_su, u.titulo_u from usuarios u left join sucursales s on s.id_su = u.idSucursal_u where u.usuario_u = $usuario ") or die (mysqli_error($horizonte));
$row1 = mysqli_fetch_row($result1);

//si el usuario es nuevo y nunca se ha logueado lanza un 1
if($row1[0]==1){ echo '1[;}'.$row1[1].'[;}'.$row1[2].'[;}'.$row1[3].'[;}'.ucwords(strtolower($_POST["usuario"])); }//si ya se logueó lanza un 0
else{ echo 0; }
mysqli_close($horizonte);
?>