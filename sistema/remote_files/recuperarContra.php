<?php
require("../Connections/horizonte.php");
require("../funciones/php/values.php");
include_once '../funciones/php/send-email.php';

$usuario = sqlValue($_POST["usuarioRC"], "text", $horizonte);
$email = sqlValue($_POST["emailRC"], "text", $horizonte);

mysqli_select_db($horizonte, $database_horizonte);
$result1 = mysqli_query($horizonte, "SELECT id_u from usuarios where usuario_u = $usuario ") or die (mysqli_error($horizonte));
$row1 = mysqli_fetch_row($result1);

$user_id = $row1[0];
$encode_id = base64_encode("encodeuserid$user_id");

mysqli_select_db($horizonte, $database_horizonte);
$result2 = mysqli_query($horizonte, "SELECT nombre_sistema_cf, link_sistema_local, link_pacs_local, link_sistema_externo, link_pacs_externo from configuracion order by id_cf asc limit 1 ") or die (mysqli_error($horizonte));
$row2 = mysqli_fetch_row($result2);

$year = sqlValue(date('Y'), "date", $horizonte);

	$mail_body = '<html>
	<body style="background-color:#DDDDDD; color:#000; font-family: Arial, Helvetica, sans-serif;
						line-height:1.8em;">
	<h2>Recuperar la contrasena de su cuenta</h2>
	<p>Estimad@ '.$_POST["usuarioRC"].'<br><br>Para configurar una nueva contrasena y poder ingresar con ella al sistema, es necesario que visite el siguiente link. Una vez restablecida su contrasena  podra iniciar sesion en el sistema.</p>
	<p><a href="'.$row2[1].''.$row2[0].'/reset.php?id='.$encode_id.'">REINICIAR PASSWORD (link local)</a></p>
	<p><a href="'.$row2[3].''.$row2[0].'/reset.php?id='.$encode_id.'">REINICIAR PASSWORD (link externo)</a></p>
	<p><strong>&copy;'.$year.' '.$row2[0].'</strong></p>
	</body>
	</html>';
	
	//$mail->addAddress($email, $username);
	$mail->addAddress($_POST["emailRC"], $_POST["usuarioRC"]);
	$mail->Subject = "Recupere su password ".$row2[0];
	$mail->Body = $mail_body;
	
	//Error Handling for PHPMailer
	if(!$mail->Send()){
		$result = "<script type=\"text/javascript\">
	swal(\"Error\",\" Email sending failed: $mail->ErrorInfo \",\"error\");</script>";
		echo $result;
	}
	else{ echo 1; }

mysqli_close($horizonte);
?>