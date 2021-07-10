<?php
	if(isset($_SESSION['id'])){
		$id_u = $_SESSION['id'];
		
		mysqli_select_db($horizonte, $database_horizonte);
		$result = mysqli_query($horizonte, "SELECT t.abreviacion_ti, concat(u.nombre_u, ' ', u.apaterno_u), u.usuario_u, u.acceso_u, cp.nombre_cp, u.sexo_u, u.amaterno_u, idSucursal_u, multisucursal_u from usuarios u left join catalogo_puestos cp on cp.id_cp = u.idPuesto_u left join titulos t on t.id_ti = u.id_titulo_u where u.id_u = '$id_u' ") or die (mysql_error($horizonte));
		$row = mysqli_fetch_row($result);
		
		mysqli_select_db($horizonte, $database_horizonte);
		$resultw = mysqli_query($horizonte, "SELECT nombre_sistema_cf from configuracion order by id_cf desc limit 1 ") or die (mysql_error($horizonte));
		$roww = mysqli_fetch_row($resultw);
		
		$nombre_usuario = ucwords(strtolower($row[0].' '.$row[1]));
		$puesto_usuario = ucwords(strtolower($row[4]));
		$usuario_usuario = ucwords(strtolower($row[2]));
		$id_sucursal_u = $row[7]; $multisucu_u = $row[8];
		$nombre_system = $roww[0]; $acceso_usuario = $row[3];
		
		if($row[5]==1){$usuario_bienvenida = 'Bienvenida '.ucwords(strtolower($row[1])).' '.ucwords(strtolower($row[6]));}
		else{$usuario_bienvenida = 'Bienvenido '.ucwords(strtolower($row[1])).' '.ucwords(strtolower($row[6]));}
	}else{
		mysqli_select_db($horizonte, $database_horizonte);
		$resultw = mysqli_query($horizonte, "SELECT nombre_sistema_cf from configuracion order by id_cf desc limit 1 ") or die (mysql_error($horizonte));
		$roww = mysqli_fetch_row($resultw); $nombre_system = $roww[0];
		
		header("Location: /".$nombre_system.'/logout.php' );
	}