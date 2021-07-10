<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 	$idP = sqlValue($_POST["idP"], "int", $horizonte);
	if(isset($_POST["idCo"])){$idCons = sqlValue($_POST["idCo"], "int", $horizonte);}else{$idCons = sqlValue(0, "int", $horizonte);}
	
	mysqli_select_db($horizonte, $database_horizonte);
	$resultDC = mysqli_query($horizonte, "SELECT id_signosv_vc, count(id_vc) from venta_conceptos where id_vc = $idCons and id_paciente_vc = $idP ") or die (mysqli_error($horizonte));
	$rowDC = mysqli_fetch_row($resultDC);
	
	if($rowDC[1]>0){
		$idSV = sqlValue($rowDC[0], "int", $horizonte);
	}else{
		mysqli_select_db($horizonte, $database_horizonte);
		$resultDC1 = mysqli_query($horizonte, "SELECT id_sv from signos_vitales where id_paciente_sv = $idP order by id_sv desc limit 1 ") or die (mysqli_error($horizonte));
		$rowDC1 = mysqli_fetch_row($resultDC1);
		$idSV = sqlValue($rowDC1[0], "int", $horizonte);
	}
		
	$listaFC = ''; $lista1 = ''; $cont = 0; $vI = ''; $vF = ''; $lista2 = ''; $vIfr = ''; $vFfr = ''; $contFC = 0; $contA = 0; $contTe = 0; $contIMC = 0;
	$listaT = ''; $listaT_ = ''; $vIt = ''; $vFt = ''; $listaA = ''; $vIa = ''; $vFa = ''; $listaTe = ''; $vIte = ''; $vFte = ''; $contPe = 0;
	$listaPe = ''; $vI_pe = ''; $vF_pe = ''; $listaTa = ''; $listaIMC = ''; $lista1_imc = ''; $cont_imc = 0; $contT = 0; $contFR = 0; $contTa = 0;
		
	mysqli_select_db($horizonte, $database_horizonte);
	$consultaIm = "SELECT imc_sv, DATE_FORMAT(fecha_sv,'%d/%c/%Y') as fecha from signos_vitales where id_paciente_sv = $idP and id_sv <= $idSV group by DATE_FORMAT(fecha_sv,'%d/%c/%Y') order by id_sv desc limit 25";
	$queryIm = mysqli_query($horizonte, $consultaIm) or die (mysqli_error($horizonte));
	while ($filaIm = mysqli_fetch_array($queryIm)) { $cont_imc++;
		if($cont_imc==1){$listaIMC = $filaIm['imc_sv'];}else{$listaIMC = $listaIMC.','.$filaIm['imc_sv'];}
		if($cont_imc==1){$lista1_imc = $filaIm['fecha'];}else{$lista1_imc = $lista1_imc.','.$filaIm['fecha'];}
	};//echo $lista;
	
	$vInFC=0; $vMaFC=0; $vInFr=0; $vMaFr=0; $vInT=0; $vMaT=0; $vInA=0; $vMaA=0; $vMinPe=0; $vMaxPe=0;

	mysqli_select_db($horizonte, $database_horizonte);
	$consultaFC = "SELECT fc_sv as fc, DATE_FORMAT(fecha_sv,'%d/%c/%Y') as fecha, DATE_FORMAT(fecha_sv,'%Y-%c-%d') as fecha1 from signos_vitales where id_paciente_sv = $idP and id_sv <= $idSV and fc_sv is not null order by id_sv desc limit 25";
	$queryFC = mysqli_query($horizonte, $consultaFC) or die (mysqli_error($horizonte));
	while ($filaFC = mysqli_fetch_array($queryFC)) { $contFC++;
		if($contFC==1){$listaFC = $filaFC['fc'];}else{$listaFC = $listaFC.','.$filaFC['fc'];}
		if($contFC==1){$lista1 = $filaFC['fecha'];}else{$lista1 = $lista1.','.$filaFC['fecha'];}
		
		$miF = $filaFC['fecha1'];
		mysqli_select_db($horizonte, $database_horizonte); 
		$resultFC = mysqli_query($horizonte, "SELECT DATEDIFF('$miF',fNac_p) from pacientes where id_p = $idP ") or die (mysqli_error($horizonte));
		$rowFC = mysqli_fetch_row($resultFC); $dias = $rowFC[0]; $edad = $dias/365;
													
		if($edad==0){
			if( $peso < 2.5 ){ $vMin = 140; $vMax = 160; }
			if( $peso >= 2.5 and $peso <= 4 ){ $vMin = 140; $vMax = 160; }
			if( $peso >= 4 and $peso <= 6 ){ $vMin = 120; $vMax = 160; }		
		}
		if($edad>=1 and $edad <=2){ $vMin = 100; $vMax = 140; } if($edad>=2 and $edad <=3){ $vMin = 90; $vMax = 140; }
		if($edad>=3 and $edad <=4){ $vMin = 85; $vMax = 125; } if($edad>=4 and $edad <=5){ $vMin = 80; $vMax = 110; }
		if($edad>=5 and $edad <=6){ $vMin = 78; $vMax = 105; } if($edad>=6 and $edad<=13){ $vMin = 75; $vMax = 100; }
		if($edad>13){ $vMin = 60; $vMax = 90; }
		
		$vInFC = $vMin; $vMaFC = $vMax;
	};

	mysqli_select_db($horizonte, $database_horizonte);
	$consultaT = "SELECT DATE_FORMAT(fecha_sv,'%Y-%c-%d') as fecha1, TRUNCATE( (t_sv), 2) as x_t from signos_vitales where id_paciente_sv = $idP and id_sv <= $idSV and t_sv is not null order by id_sv desc limit 25";
	$queryT = mysqli_query($horizonte, $consultaT) or die (mysqli_error($horizonte));
	while ($filaT = mysqli_fetch_array($queryT)) { $contT++;
		if($contT==1){$listaT = $filaT['x_t'];}else{$listaT = $listaT.','.$filaT['x_t'];}
		
		$miF = $filaT['fecha1'];
		mysqli_select_db($horizonte, $database_horizonte); 
		$resultT = mysqli_query($horizonte, "SELECT DATEDIFF('$miF',fNac_p) from pacientes where id_p = $idP ") or die (mysqli_error($horizonte));
		$rowT = mysqli_fetch_row($resultT); $dias = $rowT[0]; $edad = $dias/365;
		
		if($edad==0){
			if( $peso < 2.5 ){ $vMinT = 39; $vMaxT = 59; }
			if( $peso >= 2.5 and $peso <= 4 ){ $vMinT = 50; $vMaxT = 75; }
			if( $peso >= 4 and $peso <= 6 ){ $vMinT = 80; $vMaxT = 100; }		
		}
		if($edad>=1 and $edad <=2){ $vMinT = 80; $vMaxT = 105; }
		if($edad>=2 and $edad <=3){ $vMinT = 80; $vMaxT = 120; }
		if($edad>=3 and $edad <=4){ $vMinT = 80; $vMaxT = 120; }
		if($edad>=4 and $edad <=5){ $vMinT = 80; $vMaxT = 120; }
		if($edad>=5 and $edad <=6){ $vMinT = 80; $vMaxT = 120; }
		if($edad>=6 and $edad<=13){ if($edad<=10){ $vMinT = 85; $vMaxT = 130; } if($edad>=10){ $vMinT = 90; $vMaxT = 140; } }
		if($edad>13){ if($edad>=13 and $edad<=14){ $vMinT = 90; $vMaxT = 140; } if($edad>14){ $vMinT = 90; $vMaxT = 140; } }
		$vInT = $vMinT; $vMaT = $vMaxT;
	};

	mysqli_select_db($horizonte, $database_horizonte);
	$consultaA = "SELECT DATE_FORMAT(fecha_sv,'%Y-%c-%d') as fecha1, TRUNCATE( (a_sv), 2) as x_a from signos_vitales where id_paciente_sv = $idP and id_sv <= $idSV and a_sv is not null order by id_sv desc limit 25";
	$queryA = mysqli_query($horizonte, $consultaA) or die (mysqli_error($horizonte));
	while ($filaA = mysqli_fetch_array($queryA)) { $contA++;
		if($contA==1){$listaA = $filaA['x_a'];}else{$listaA = $listaA.','.$filaA['x_a'];}
		
		$miF = $filaA['fecha1'];
		mysqli_select_db($horizonte, $database_horizonte); 
		$resultA = mysqli_query($horizonte, "SELECT DATEDIFF('$miF',fNac_p) from pacientes where id_p = $idP ") or die (mysqli_error($horizonte));
		$rowA = mysqli_fetch_row($resultA); $dias = $rowA[0]; $edad = $dias/365;
		
		if($edad==0){
			if( $peso < 2.5 ){ $vMinA = 16; $vMaxA = 36; }
			if( $peso >= 2.5 and $peso <= 4 ){ $vMinA = 30; $vMaxA = 50; }
			if( $peso >= 4 and $peso <= 6 ){ $vMinA = 45; $vMaxA = 65; }		
		}
		if($edad>=1 and $edad <=2){ $vMinA = 45; $vMaxA = 70; }
		if($edad>=2 and $edad <=3){ $vMinA = 50; $vMaxA = 80; }
		if($edad>=3 and $edad <=4){ $vMinA = 50; $vMaxA = 80; }
		if($edad>=4 and $edad <=5){ $vMinA = 50; $vMaxA = 80; }
		if($edad>=5 and $edad <=6){ $vMinA = 50; $vMaxA = 80; }
		if($edad>=6 and $edad<=13){ if($edad<=10){ $vMinA = 55; $vMaxA = 90; } if($edad>=10){ $vMinA = 60; $vMaxA = 95; } }
		if($edad>13){ if($edad>=13 and $edad<=14){ $vMinA = 60; $vMaxA = 95; } if($edad>14){ $vMinA = 60; $vMaxA = 95; } }

		$vInA = $vMinA; $vMaA = $vMaxA;
	};

	mysqli_select_db($horizonte, $database_horizonte);
	$consultaFR = "SELECT DATE_FORMAT(fecha_sv,'%Y-%c-%d') as fecha1, fr_sv as xfr from signos_vitales where id_paciente_sv = $idP and id_sv <= $idSV and fr_sv is not null order by id_sv desc limit 25";
	$queryFR = mysqli_query($horizonte, $consultaFR) or die (mysqli_error($horizonte));
	while ($filaFR = mysqli_fetch_array($queryFR)) { $contFR++;
		if($contFR==1){$listaFR = $filaFR['xfr'];}else{$listaFR = $listaFR.','.$filaFR['xfr'];}
		
		$miF = $filaFR['fecha1'];
		mysqli_select_db($horizonte, $database_horizonte); 
		$resultFR = mysqli_query($horizonte, "SELECT DATEDIFF('$miF',fNac_p) from pacientes where id_p = $idP ") or die (mysqli_error($horizonte));
		$rowFR = mysqli_fetch_row($resultFR); $dias = $rowFR[0]; $edad = $dias/365;
		
		if($edad==0){
			if( $peso < 2.5 ){ $vMinFr = 40; $vMaxFr = 60; }
			if( $peso >= 2.5 and $peso <= 4 ){ $vMinFr = 40; $vMaxFr = 60; }
			if( $peso >= 4 and $peso <= 6 ){ $vMinFr = 30; $vMaxFr = 50; }		
		}
		if($edad>=1 and $edad <=2){ $vMinFr = 24; $vMaxFr = 40; }
		if($edad>=2 and $edad <=3){ $vMinFr = 24; $vMaxFr = 40; }
		if($edad>=3 and $edad <=4){ $vMinFr = 23; $vMaxFr = 37; }
		if($edad>=4 and $edad <=5){ $vMinFr = 22; $vMaxFr = 34; }
		if($edad>=5 and $edad <=6){ $vMinFr = 20; $vMaxFr = 31; }
		if($edad>=6 and $edad<=13){ $vMinFr = 18; $vMaxFr = 28; }
		if($edad>13){ $vMinFr = 12; $vMaxFr = 28; }
				
		$vInFr = $vMinFr; $vMaFr = $vMaxFr;
	};

	mysqli_select_db($horizonte, $database_horizonte);
	$consultaTe = "SELECT DATE_FORMAT(fecha_sv,'%Y-%c-%d') as fecha1, temperatura_sv as x_te from signos_vitales where id_paciente_sv = $idP and id_sv <= $idSV and temperatura_sv is not null order by id_sv desc limit 25";
	$queryTe = mysqli_query($horizonte, $consultaTe) or die (mysqli_error($horizonte));
	while ($filaTe = mysqli_fetch_array($queryTe)) { $contTe++;
		if($contTe==1){$listaTe = $filaTe['x_te'];}else{$listaTe = $listaTe.','.$filaTe['x_te'];}		
    };

	mysqli_select_db($horizonte, $database_horizonte);
	$consultaPe = "SELECT peso_sv, DATE_FORMAT(fecha_sv,'%Y-%c-%d') as fecha1, peso_sv as x_pe from signos_vitales where id_paciente_sv = $idP and id_sv <= $idSV and peso_sv is not null order by id_sv desc limit 25";
	$queryPe = mysqli_query($horizonte, $consultaPe) or die (mysqli_error($horizonte));
	while ($filaPe = mysqli_fetch_array($queryPe)) { $contPe++;
		if($contPe==1){$listaPe = $filaPe['x_pe'];}else{$listaPe = $listaPe.','.$filaPe['x_pe'];}
		
		$peso = $filaPe['peso_sv'];
		
		mysqli_select_db($horizonte, $database_horizonte);
		$resultAg = mysqli_query($horizonte, "SELECT max(peso_sv) from signos_vitales where id_paciente_sv = $idP and id_sv <= $idSV and peso_sv is not null ") or die (mysqli_error($horizonte));
		$rowAg = mysqli_fetch_row($resultAg);
	
		$vMinPe = 0; $vMaxPe = $rowAg[0];
	};

	mysqli_select_db($horizonte, $database_horizonte);
	$consultaTa = "SELECT DATE_FORMAT(fecha_sv,'%Y-%c-%d') as fecha1, talla_sv as x_ta from signos_vitales where id_paciente_sv = $idP and id_sv <= $idSV and talla_sv is not null order by id_sv desc limit 25";
	$queryTa = mysqli_query($horizonte, $consultaTa) or die (mysqli_error($horizonte));
	while ($filaTa = mysqli_fetch_array($queryTa)) { $contTa++;
		if($contTa==1){$listaTa = $filaTa['x_ta'];}else{$listaTa = $listaTa.','.$filaTa['x_ta'];}
	};

	mysqli_select_db($horizonte, $database_horizonte);
	$consultaIMC = "SELECT DATE_FORMAT(fecha_sv,'%Y-%c-%d') as fecha1, imc_sv as x_imc from signos_vitales where id_paciente_sv = $idP and id_sv <= $idSV and imc_sv is not null order by id_sv desc limit 25";
	$queryIMC = mysqli_query($horizonte, $consultaIMC) or die (mysqli_error($horizonte));
	while ($filaIMC = mysqli_fetch_array($queryIMC)) { $contIMC++;
		if($contIMC==1){$listaIMC = $filaIMC['x_imc'];}else{$listaIMC = $listaIMC.','.$filaIMC['x_imc'];}
	};

	//Para Temp
	$vMinTe = 36.5; $vMaxTe = 37.5;
	//Para IMC
	$vMinIMC = 18.50; $vMaxIMC = 25;

	$vI = 0; $vF = 0;
			
	echo $lista1.';*['.$listaFC.'];*'.$cont.';*'.$vI.';*'.$vF.';*'.$vInFC.';*'.$vMaFC.';*['.$listaFR.'];*'.$vInFr.';*'.$vMaFr.';*['.$listaT.'];*'.$vInT.';*'.$vMaT.';*['.$listaA.'];*'.$vInA.';*'.$vMaA.';*['.$listaTe.'];*'.$vMinTe.';*'.$vMaxTe.';*['.$listaPe.'];*'.$vMinPe.';*'.$vMaxPe.';*['.$listaTa.'];*'.'['.$listaIMC.'];*'.$vMinIMC.';*'.$vMaxIMC.';*["mmHg",'.$listaT.']'.';*["mmHg",'.$listaA.']'.';*["x min",'.$listaFR.']'.';*["x min",'.$listaFC.']'.';*["",'.$listaIMC.']'.';*["ªC",'.$listaTe.']'.';*["Kg",'.$listaPe.']'.';*["m",'.$listaTa.']';
	//   fechas       valores     cuantos  rango inicial   rango final válidos $
 	//Cerrar conexión a la Base de Datos
 	mysqli_close($horizonte);
?>