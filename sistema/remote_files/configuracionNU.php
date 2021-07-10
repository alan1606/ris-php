<?php
require("../Connections/horizonte.php");
require("../funciones/php/values.php");
include_once '../funciones/php/send-email.php';

$usuario = sqlValue($_POST["usuarioN"], "text", $horizonte);
$contrasena = sqlValue(password_hash($_POST["contrasenaNU"], PASSWORD_DEFAULT), "text", $horizonte);
$email = sqlValue($_POST["emailNU"], "text", $horizonte); //$titulo = sqlValue($_POST["tituloU"], "text", $horizonte);

mysqli_select_db($horizonte, $database_horizonte);
$result0 = mysqli_query($horizonte, "SELECT id_u from usuarios where usuario_u = $usuario") or die (mysqli_error($horizonte));
$row0 = mysqli_fetch_row($result0);

$encode_id = base64_encode("encodeuserid$row0[0]");

mysqli_select_db($horizonte, $database_horizonte); //, titulo_u = $titulo
$sql1 = "UPDATE usuarios set usuarioNuevo_u = 0, email_u = $email, contrasena_u = $contrasena where usuario_u = $usuario limit 1 ";
$update1 = mysqli_query($horizonte, $sql1) or die (mysqli_error($horizonte));

mysqli_select_db($horizonte, $database_horizonte);
$result2 = mysqli_query($horizonte, "SELECT nombre_sistema_cf, link_sistema_local, link_pacs_local, link_sistema_externo, link_pacs_externo from configuracion order by id_cf asc limit 1 ") or die (mysqli_error($horizonte));
$row2 = mysqli_fetch_row($result2);

$year = sqlValue(date('Y'), "date", $horizonte);

if (!$update1) { echo $sql1; }else{
	//preparar el email body
	$mail_body = '<html>
	<body style="background-color:#DDDDDD; color:#000; font-family: Arial, Helvetica, sans-serif;
						line-height:1.8em;">
	<h2>Activacion de su cuenta en '.$row2[0].'</h2>
	<p>Estimad@ '.$_POST["usuarioN"].'<br><br>Gracias por configurar su password y correo electronico, el siguiente paso es activar su cuenta siguiendo el siguiente link. Una vez activada su cuenta podra iniciar sesion en el sistema.</p>
	<p><a href="'.$row2[1].''.$row2[0].'/activar.php?id='.$encode_id.'">ACTIVAR CUENTA (Link local)</a></p>
	<p><a href="'.$row2[3].''.$row2[0].'/activar.php?id='.$encode_id.'">ACTIVAR CUENTA (Link externo)</a></p>
	<p><strong>&copy;'.$year.' '.$row2[0].'</strong></p>
	</body>
	</html>';
	
	//$mail->addAddress($email, $username);
	$mail->addAddress($_POST["emailNU"], $_POST["usuarioN"]);
	$mail->Subject = "Active su cuenta ".$row2[0];
	$mail->Body = $mail_body;
	
	//Error Handling for PHPMailer
	if(!$mail->Send()){
		$result = "<script type=\"text/javascript\">
		swal(\"Error\",\" Email sending failed: $mail->ErrorInfo \",\"error\");</script>";
		echo 1;
	}
	else{ echo 1; }
}
	
mysqli_close($horizonte);
?>