<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $id_u = sqlValue($_POST["id_u"], "int", $horizonte); $contra_actual = sqlValue($_POST["contra_actual"], "text", $horizonte);
 $contra_new = sqlValue($_POST["contra_new"], "text", $horizonte);$re_contra_new = sqlValue($_POST["re_contra_new"], "text", $horizonte);
 
 mysqli_select_db($horizonte, $database_horizonte);
 $resultS=mysqli_query($horizonte, "SELECT contrasena_u from usuarios where id_u = $id_u") or die (mysqli_error($horizonte));
 $rowS = mysqli_fetch_row($resultS); $contrasena_hashed = $rowS[0]; $password = $_POST["contra_actual"];
 if($_POST["contra_actual"]==NULL){ echo 2; }elseif($_POST["contra_new"]==NULL){echo 3;}elseif($_POST["re_contra_new"]==NULL){ echo 4;}
 else{
	 if($_POST["contra_new"]==$_POST["re_contra_new"]){
		 if(strlen($_POST["contra_new"])>5){
			if(password_verify($password, $contrasena_hashed)){
				$hashed_password = sqlValue(password_hash($_POST["contra_new"], PASSWORD_DEFAULT), "text", $horizonte);
				mysqli_select_db($horizonte, $database_horizonte); 
				$sql = "UPDATE usuarios set contrasena_u = $hashed_password where id_u = $id_u limit 1";
				$update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
				if(!$update){echo $sql; }else{ echo 1; }
			 }else{echo 0;}	
		 }else{ echo 6; }	 
	 }else{ echo 5; }
 }
 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);
?>