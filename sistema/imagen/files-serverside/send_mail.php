<?php
require("../../Connections/ipacs_postgres.php");
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");
require("../../phpmailer/PHPMailerAutoload.php");

//Create a new PHPMailer instance
$mail = new PHPMailer();
$mail->IsSMTP();

//Configuracion servidor mail
$mail->From = "diagnocons@gmail.com"; //remitente
$mail->isHTML(true);
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls'; //seguridad
$mail->Host = "smtp.gmail.com"; // servidor smtp
$mail->Port = 587; //puerto
$mail->Username ='grupodiagnocare.contacto@gmail.com'; //nombre usuario
$mail->Password = 'gdc-135-RIS-PACS'; //contraseña

 $emails = sqlValue($_POST["emailPaciente"], "text", $horizonte);
 $emails1 = sqlValue($_POST["emailMedReferente"], "text", $horizonte);
 $link = sqlValue($_POST["link"], "text", $horizonte);
 $paciente = sqlValue($_POST["paciente"], "text", $horizonte);
 $estudio = sqlValue($_POST["estudio"], "text", $horizonte);
 $body = sqlValue($_POST["body"], "text", $horizonte);
 $medicoRadiologo=$_POST["medicoRadiologo"];
 $tecnicoEstudio=$_POST["tecnicoEstudio"];
$urlZip = $_POST["link"];
 $lastSegment = basename(parse_url($urlZip, PHP_URL_PATH));
 $linkZip = 'https://ns1.diagnocons.com:8443/dcm4chee-arc/aets/DCM4CHEE/rs/studies/'.$lastSegment.'?accept=application/zip;transfer-syntax=*';
 //$linkWeasis = 'weasis://$dicom:rs%20--url%20"http://ns1.diagnocons.com:8080/dcm4chee-arc/aets/DCM4CHEE/rs"%20-r%20"studyUID='.$lastSegment.'"%20--query-ext%20"&includedefaults=false"';
 $linkWeasis = 'https://ns1.diagnocons.com:8443/weasis-pacs-connector/weasis?studyUID='.$lastSegment.'';

//$puOsx = 'https://ns1.diagnocons.com:8443/wado?requestType=PATIENT&studyUID='.$lastSegment.'';
 $puOsx = 'https://ns1.diagnocons.com:8443/dcm4chee-arc/aets/DCM4CHEE/rs/studies/'.$lastSegment.'';
$linkOsirix = 'osirix://?methodName=DownloadURL&Display=YES&URL='.$puOsx.'';
 //Agregar destinatario
 $mail->AddAddress($_POST['emailPaciente']);

 if( isset($_POST["emailMedReferente"]) and $_POST["emailMedReferente"] != '' ){ $mail->AddAddress($_POST['emailMedReferente']); }
 $mail->Subject = 'DIAGNOCONS ha enviado un estudio';
 $mail->Body = '<div style="font-size: 16px;">'.$_POST['body'].'<br><br>Para ir al estudio, haz click en el siguiente enlace:<br><br>'.$_POST['link'].' <br>Si lo quieres <b>descargar en ZIP</b> click a este enlace: <a href="'.$linkZip.'" target="_blanck">Descargar Zip</a><br> Visualizar con WEASIS: <a href="'.$linkWeasis.'" target="_blanck">Descargar</a><br>Descargar instalador WEASIS:<br><a href="https://github.com/nroduit/Weasis/releases/download/v3.7.0/Weasis-3.7.0-x86-64.msi">Windows</a><br><a href="https://github.com/nroduit/Weasis/releases/download/v3.7.0/Weasis-3.7.0.pkg">Mac</a></div>';

 //Avisar si fue enviado o no y dirigir al index
 if ($mail->Send()) {
    echo 1;
 } else {
    echo 2;
 }

 //Cerrar conexión a la Base de Datos
 mysqli_close($ipacs);
?>
