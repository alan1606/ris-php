<?php
require 'class.phpmailer.php';
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = 'smtp';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;
$mail->Host = "smtp.gmail.com";
$mail->IsHTML(true);

$mail->SMTPAuth = true;
$mail->Username = "grupodiagnocare.contacto@gmail.com";
$mail->Password = "gdc-135-RIS-PACS";

//Sender Info
$mail->From = "grupodiagnocare.contacto@gmail.com";
$mail->FromName = "ADMINISTRACION SISTEMA";
