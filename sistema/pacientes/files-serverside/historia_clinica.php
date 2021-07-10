<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

 $id_p = sqlValue($_POST["id_p"], "int", $horizonte);

 mysqli_select_db($horizonte, $database_horizonte);
 $result = mysqli_query($horizonte, "SELECT count(id_paciente_hc) from historia_clinica_n where id_paciente_hc = $id_p") or die (mysqli_error($horizonte));
 $row = mysqli_fetch_row($result);

 if($row[0]<1){
	 //Primero vemos que tenga guardados antecedentes desde enfermería, sino tiene entonces le decimos que primero los llene
	 mysqli_select_db($horizonte, $database_horizonte);
 	 $resultA = mysqli_query($horizonte, "SELECT count(id_an) from antecedentes where id_paciente_an = $id_p") or die (mysqli_error($horizonte));
 	 $rowA = mysqli_fetch_row($resultA);
	 
	 if($rowA[0]<1){
		 echo 2;
	 }else{
	 	//Creamos los valores por default de la historia clínica, tomar en cuenta el sexo del paciente
		 mysqli_select_db($horizonte, $database_horizonte);
		 $result1 = mysqli_query($horizonte, "SELECT sexo_p, alergias_p from pacientes where id_p = $id_p") or die (mysqli_error($horizonte));
		 $row1 = mysqli_fetch_row($result1); $alergias = sqlValue($row1[1], "text", $horizonte);
		 
		 mysqli_select_db($horizonte, $database_horizonte);
		 $resultsv = mysqli_query($horizonte, "SELECT peso_sv, talla_sv, imc_sv, concat(t_sv, '/', a_sv), fc_sv, temperatura_sv from signos_vitales where id_paciente_sv = $id_p order by id_sv desc limit 1") or die (mysqli_error($horizonte));
		 $rowsv = mysqli_fetch_row($resultsv);
		 
		 if($row1[0]==1){$gpac = "";}else{$gpac = "";}

		 //Para diabetes
		 mysqli_select_db($horizonte, $database_horizonte);
		 $resultD = mysqli_query($horizonte, "SELECT personal_an, nota_personal_an, familiar_an, nota_familiar_an from antecedentes where id_paciente_an = $id_p and antecedente_an = 'DIABETES' order by id_an desc limit 1") or die (mysqli_error($horizonte));
		 $rowD = mysqli_fetch_row($resultD); $diabetes = "";
		 
		 if($rowD[0]==0 and $rowD[2]==0){ $diabetes = ""; }
		 if($rowD[0]==0 and $rowD[2]==1){ $diabetes = "Familiar: ".$rowD[3]; }
		 if($rowD[0]==1 and $rowD[2]==0){ $diabetes = "Personal: ".$rowD[1]; }
		 if($rowD[0]==1 and $rowD[2]==1){ $diabetes = "Personal: ".$rowD[1].". Familiar: ".$rowD[3]; }
		 
		 $diabetes = sqlValue($diabetes, "text", $horizonte);
		 
		 //Para CANCER/LEUCEMIA
		 mysqli_select_db($horizonte, $database_horizonte);
		 $resultC = mysqli_query($horizonte, "SELECT personal_an, nota_personal_an, familiar_an, nota_familiar_an from antecedentes where id_paciente_an = $id_p and antecedente_an = 'CANCER/LEUCEMIA' order by id_an desc limit 1") or die (mysqli_error($horizonte));
		 $rowC = mysqli_fetch_row($resultC); $cancer = "";
		 
		 if($rowC[0]==0 and $rowC[2]==0){ $cancer = ""; }
		 if($rowC[0]==0 and $rowC[2]==1){ $cancer = "Familiar: ".$rowC[3]; }
		 if($rowC[0]==1 and $rowC[2]==0){ $cancer = "Personal: ".$rowC[1]; }
		 if($rowC[0]==1 and $rowC[2]==1){ $cancer = "Personal: ".$rowC[1].". Familiar: ".$rowC[3]; }
		 
		 $cancer = sqlValue($cancer, "text", $horizonte);
		 
		 //Para CARDIOPATIAS
		 mysqli_select_db($horizonte, $database_horizonte);
		 $resultCa = mysqli_query($horizonte, "SELECT personal_an, nota_personal_an, familiar_an, nota_familiar_an from antecedentes where id_paciente_an = $id_p and antecedente_an = 'CANCER/LEUCEMIA' order by id_an desc limit 1") or die (mysqli_error($horizonte));
		 $rowCa = mysqli_fetch_row($resultCa); $cardiopatias = "";
		 
		 if($rowCa[0]==0 and $rowCa[2]==0){ $cardiopatias = ""; }
		 if($rowCa[0]==0 and $rowCa[2]==1){ $cardiopatias = "Familiar: ".$rowCa[3]; }
		 if($rowCa[0]==1 and $rowCa[2]==0){ $cardiopatias = "Personal: ".$rowCa[1]; }
		 if($rowCa[0]==1 and $rowCa[2]==1){ $cardiopatias = "Personal: ".$rowCa[1].". Familiar: ".$rowCa[3]; }
		 
		 $cardiopatias = sqlValue($cardiopatias, "text", $horizonte);
		 
		 //Para TABAQUISMO
		 mysqli_select_db($horizonte, $database_horizonte);
		 $resultTa = mysqli_query($horizonte, "SELECT personal_an, nota_personal_an, familiar_an, nota_familiar_an from antecedentes where id_paciente_an = $id_p and antecedente_an = 'TABAQUISMO' order by id_an desc limit 1") or die (mysqli_error($horizonte));
		 $rowTa = mysqli_fetch_row($resultTa); $tabaquismo = "";
		 
		 if($rowTa[0]==0 and $rowTa[2]==0){ $tabaquismo = ""; }
		 if($rowTa[0]==0 and $rowTa[2]==1){ $tabaquismo = "Familiar: ".$rowTa[3]; }
		 if($rowTa[0]==1 and $rowTa[2]==0){ $tabaquismo = "Personal: ".$rowTa[1]; }
		 if($rowTa[0]==1 and $rowTa[2]==1){ $tabaquismo = "Personal: ".$rowTa[1].". Familiar: ".$rowTa[3]; }
		 
		 $tabaquismo = sqlValue($tabaquismo, "text", $horizonte);
		 
		 //Para ALCOHOLISMO
		 mysqli_select_db($horizonte, $database_horizonte);
		 $resultAl = mysqli_query($horizonte, "SELECT personal_an, nota_personal_an, familiar_an, nota_familiar_an from antecedentes where id_paciente_an = $id_p and antecedente_an = 'ALCOHOLISMO' order by id_an desc limit 1") or die (mysqli_error($horizonte));
		 $rowAl = mysqli_fetch_row($resultAl); $alcoholismo = "";
		 
		 if($rowAl[0]==0 and $rowAl[2]==0){ $alcoholismo = ""; }
		 if($rowAl[0]==0 and $rowAl[2]==1){ $alcoholismo = "Familiar: ".$rowAl[3]; }
		 if($rowAl[0]==1 and $rowAl[2]==0){ $alcoholismo = "Personal: ".$rowAl[1]; }
		 if($rowAl[0]==1 and $rowAl[2]==1){ $alcoholismo = "Personal: ".$rowAl[1].". Familiar: ".$rowAl[3]; }
		 
		 $alcoholismo = sqlValue($alcoholismo, "text", $horizonte);
		 
		 //Para DROGADICCIÓN
		 mysqli_select_db($horizonte, $database_horizonte);
		 $resultDr = mysqli_query($horizonte, "SELECT personal_an, nota_personal_an, familiar_an, nota_familiar_an from antecedentes where id_paciente_an = $id_p and antecedente_an = 'DROGAS' order by id_an desc limit 1") or die (mysqli_error($horizonte));
		 $rowDr = mysqli_fetch_row($resultDr); $drogadiccion = "";
		 
		 if($rowDr[0]==0 and $rowDr[2]==0){ $drogadiccion = ""; }
		 if($rowDr[0]==0 and $rowDr[2]==1){ $drogadiccion = "Familiar: ".$rowDr[3]; }
		 if($rowDr[0]==1 and $rowDr[2]==0){ $drogadiccion = "Personal: ".$rowDr[1]; }
		 if($rowDr[0]==1 and $rowDr[2]==1){ $drogadiccion = "Personal: ".$rowDr[1].". Familiar: ".$rowDr[3]; }
		 
		 $drogadiccion = sqlValue($drogadiccion, "text", $horizonte);
		 
		 //Para HOSPITALIZACIONES
		 mysqli_select_db($horizonte, $database_horizonte);
		 $resultHo = mysqli_query($horizonte, "SELECT personal_an, nota_personal_an, familiar_an, nota_familiar_an from antecedentes where id_paciente_an = $id_p and antecedente_an = 'HOSPITALIZACIONES' order by id_an desc limit 1") or die (mysqli_error($horizonte));
		 $rowHo = mysqli_fetch_row($resultHo); $hospitalizaciones = "";
		 
		 if($rowHo[0]==0 and $rowHo[2]==0){ $hospitalizaciones = ""; }
		 if($rowHo[0]==0 and $rowHo[2]==1){ $hospitalizaciones = "Familiar: ".$rowHo[3]; }
		 if($rowHo[0]==1 and $rowHo[2]==0){ $hospitalizaciones = "Personal: ".$rowHo[1]; }
		 if($rowHo[0]==1 and $rowHo[2]==1){ $hospitalizaciones = "Personal: ".$rowHo[1].". Familiar: ".$rowHo[3]; }
		 
		 $hospitalizaciones = sqlValue($hospitalizaciones, "text", $horizonte);
		 
		 //Para CIRUGIAS
		 mysqli_select_db($horizonte, $database_horizonte);
		 $resultCi = mysqli_query($horizonte, "SELECT personal_an, nota_personal_an, familiar_an, nota_familiar_an from antecedentes where id_paciente_an = $id_p and antecedente_an = 'DEFECTOS POSTQUIRURGICO' order by id_an desc limit 1") or die (mysqli_error($horizonte));
		 $rowCi = mysqli_fetch_row($resultCi); $cirugias = "";
		 
		 if($rowCi[0]==0 and $rowCi[2]==0){ $cirugias = ""; }
		 if($rowCi[0]==0 and $rowCi[2]==1){ $cirugias = "Familiar: ".$rowCi[3]; }
		 if($rowCi[0]==1 and $rowCi[2]==0){ $cirugias = "Personal: ".$rowCi[1]; }
		 if($rowCi[0]==1 and $rowCi[2]==1){ $cirugias = "Personal: ".$rowCi[1].". Familiar: ".$rowCi[3]; }
		 
		 $cirugias = sqlValue($cirugias, "text", $horizonte);
		 
		 //Para TRANSFUSIONES
		 mysqli_select_db($horizonte, $database_horizonte);
		 $resultTr = mysqli_query($horizonte, "SELECT personal_an, nota_personal_an, familiar_an, nota_familiar_an from antecedentes where id_paciente_an = $id_p and antecedente_an = 'TRANSFUSIONES' order by id_an desc limit 1") or die (mysqli_error($horizonte));
		 $rowTr = mysqli_fetch_row($resultTr); $transfusiones = "";
		 
		 if($rowTr[0]==0 and $rowTr[2]==0){ $transfusiones = ""; }
		 if($rowTr[0]==0 and $rowTr[2]==1){ $transfusiones = "Familiar: ".$rowTr[3]; }
		 if($rowTr[0]==1 and $rowTr[2]==0){ $transfusiones = "Personal: ".$rowTr[1]; }
		 if($rowTr[0]==1 and $rowTr[2]==1){ $transfusiones = "Personal: ".$rowTr[1].". Familiar: ".$rowTr[3]; }
		 
		 $transfusiones = sqlValue($transfusiones, "text", $horizonte);
		 
		 //Para FRACTURAS
		 mysqli_select_db($horizonte, $database_horizonte);
		 $resultFr = mysqli_query($horizonte, "SELECT personal_an, nota_personal_an, familiar_an, nota_familiar_an from antecedentes where id_paciente_an = $id_p and antecedente_an = 'FRACTURAS' order by id_an desc limit 1") or die (mysqli_error($horizonte));
		 $rowFr = mysqli_fetch_row($resultFr); $fracturas = "";
		 
		 if($rowFr[0]==0 and $rowFr[2]==0){ $fracturas = ""; }
		 if($rowFr[0]==0 and $rowFr[2]==1){ $fracturas = "Familiar: ".$rowFr[3]; }
		 if($rowFr[0]==1 and $rowFr[2]==0){ $fracturas = "Personal: ".$rowFr[1]; }
		 if($rowFr[0]==1 and $rowFr[2]==1){ $fracturas = "Personal: ".$rowFr[1].". Familiar: ".$rowFr[3]; }
		 
		 $fracturas = sqlValue($fracturas, "text", $horizonte);
		 
		 //Para OTRAS ENFERMEDADES
		 mysqli_select_db($horizonte, $database_horizonte);
		 $resultOE = mysqli_query($horizonte, "SELECT personal_an, nota_personal_an, familiar_an, nota_familiar_an from antecedentes where id_paciente_an = $id_p and antecedente_an = 'OTRAS ENFERMEDADES' order by id_an desc limit 1") or die (mysqli_error($horizonte));
		 $rowOE = mysqli_fetch_row($resultOE); $otras_enfermedades = "";
		 
		 if($rowOE[0]==0 and $rowOE[2]==0){ $otras_enfermedades = ""; }
		 if($rowOE[0]==0 and $rowOE[2]==1){ $otras_enfermedades = "Familiar: ".$rowOE[3]; }
		 if($rowOE[0]==1 and $rowOE[2]==0){ $otras_enfermedades = "Personal: ".$rowOE[1]; }
		 if($rowOE[0]==1 and $rowOE[2]==1){ $otras_enfermedades = "Personal: ".$rowOE[1].". Familiar: ".$rowOE[3]; }
		 
		 $otras_enfermedades = sqlValue($otras_enfermedades, "text", $horizonte);
		 
		 //Para MEDICACIONES ACTUALES
		 mysqli_select_db($horizonte, $database_horizonte);
		 $resultMA = mysqli_query($horizonte, "SELECT personal_an, nota_personal_an, familiar_an, nota_familiar_an from antecedentes where id_paciente_an = $id_p and antecedente_an = 'MEDICACIONES ACTUALES' order by id_an desc limit 1") or die (mysqli_error($horizonte));
		 $rowMA = mysqli_fetch_row($resultMA); $medicaciones = "";
		 
		 if($rowMA[0]==0 and $rowMA[2]==0){ $medicaciones = ""; }
		 if($rowMA[0]==0 and $rowMA[2]==1){ $medicaciones = "Familiar: ".$rowMA[3]; }
		 if($rowMA[0]==1 and $rowMA[2]==0){ $medicaciones = "Personal: ".$rowMA[1]; }
		 if($rowMA[0]==1 and $rowMA[2]==1){ $medicaciones = "Personal: ".$rowMA[1].". Familiar: ".$rowMA[3]; }
		 
		 $medicaciones = sqlValue($medicaciones, "text", $horizonte);
		 
		 $interrogacion_pas = "<table border='0' width='100%' cellspacing='0' cellpadding='0'><tbody>
			<tr><td>RESPIRATORIO/CARDIOVASCULAR</td></tr>
			<tr><td><br /><br /><br /></td></tr>
			<tr><td>DIGESTIVO</td></tr>
			<tr><td><br /><br /><br /></td></tr>
			<tr><td>ENDOCRINO</td></tr>
			<tr><td><br /><br /><br /></td></tr>
			<tr><td>MÚSCULO - ESQUELÉTICO</td></tr>
			<tr><td><br /><br /><br /></td></tr>
			<tr><td>GENITOURINARIO</td></tr>
			<tr><td><br /><br /><br /></td></tr>
			<tr><td>HEMATOPOYÉTICO - LINFÁTICO</td></tr>
			<tr><td><br /><br /><br /></td></tr>
			<tr><td>PIEL Y ANEXOS</td></tr>
			<tr><td><br /><br /><br /></td></tr>
			<tr><td>NEUROLÓGICO Y PSIQUIÁTRICO</td></tr>
			<tr><td><br /><br /><br /></td></tr>
			</tbody></table>"; $interrogacion_pas = sqlValue($interrogacion_pas, "text", $horizonte);
		 
		 $exploracion_fisica = "<table border='0' width='100%' cellspacing='0' cellpadding='0'><tbody>
			<tr>
			<td>PESO</td><td>".$rowsv[0]." Kg.</td><td>TALLA</td><td>".$rowsv[1]." Mts.</td><td>IMC</td><td>".$rowsv[2]."</td><td>TA</td>
			<td>".$rowsv[3]." mmHg</td><td>FC/PULSO</td><td>".$rowsv[4]." x min.</td><td>TEMP.</td><td>".$rowsv[5]." ºC.</td>
			</tr>
			<tr><td colspan='12'>&nbsp;</td></tr>
			<tr><td colspan='12'>HABITUS EXTERIOR</td></tr>
			<tr><td colspan='12'><br /><br /><br /></td></tr>
			<tr><td colspan='12'>PIEL Y ANEXOS</td></tr>
			<tr><td colspan='12'><br /><br /><br /></td></tr>
			<tr><td colspan='12'>CABEZA Y CUELLO</td></tr>
			<tr><td colspan='12'><br /><br /><br /></td></tr>
			<tr><td colspan='12'>TORAX</td></tr>
			<tr><td colspan='12'><br /><br /><br /></td></tr>
			<tr><td colspan='12'>ABDOMEN</td></tr>
			<tr><td colspan='12'><br /><br /><br /></td></tr>
			<tr><td colspan='12'>GENITALES</td></tr>
			<tr><td colspan='12'><br /><br /><br /></td></tr>
			<tr><td colspan='12'>EXTREMIDADES</td></tr>
			<tr><td colspan='12'><br /><br /><br /></td></tr>
			<tr><td colspan='12'>SISTEMA NERVIOSO</td></tr>
			<tr><td colspan='12'><br /><br /><br /></td></tr>
			</tbody></table>"; $exploracion_fisica = sqlValue($exploracion_fisica, "text", $horizonte);
		 
		 $interrogacion_dx = "<table border='0' width='100%' cellspacing='0' cellpadding='0'><tbody>
			<tr><td>DIAGNÓSTICOS</td></tr><tr><td><br /><br /><br /></td></tr>
			<tr><td>PLAN DE ESTUDIO</td></tr><tr><td><br /><br /><br /></td></tr>
			<tr><td>PLAN DE MANEJO</td></tr><tr><td><br /><br /><br /></td></tr>
			<tr><td>PRONÓSTICO</td></tr><tr><td><br /><br /><br /></td></tr>
			<tr><td align='center'>NOMBRE,FIRMA Y CLAVE DEL MÉDICO QUE ELABORÓ LA HISTORIA CLÍNICA</td></tr>
			<tr><td><br /><br /><br /></td></tr>
			<tr><td align='center'>NOMBRE,FIRMA Y CLAVE DEL MÉDICO RESIDENTE O ADSCRITO QUE AVALA LA HISTORIA CLÍNICA</td></tr>
			<tr><td><br /><br /><br /></td></tr>
			</tbody></table>"; $interrogacion_dx = sqlValue($interrogacion_dx, "text", $horizonte);

		 mysqli_select_db($horizonte, $database_horizonte);
		 $sql = "INSERT INTO historia_clinica_n (id_paciente_hc, diabetes_hc, cancer_hc, cardiopatias_hc, tabaquismo_hc, alcoholismo_hc, drogadiccion_hc, hospitalizaciones_hc, cirugias_hc, transfusiones_hc, fracturas_hc, otras_enfermedades_hc, medicaciones_hc, gpac_hc, interrogacion_pas_hc, exploracion_fisica_hc, interrogacion_dx_hc)";
		 $sql.= "VALUES ($id_p, $diabetes, $cancer, $cardiopatias, $tabaquismo, $alcoholismo, $drogadiccion, $hospitalizaciones, $cirugias, $transfusiones, $fracturas, $otras_enfermedades, $medicaciones, 0, $interrogacion_pas, $exploracion_fisica, $interrogacion_dx)";
		 
		 //echo $sql;

		 $update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));

		 if (!$update) {echo $sql;}else{ echo 1; }	 
	 }
 }else{ echo 1; }

 //Cerrar conexión a la Base de Datos
 mysqli_close($horizonte);

?>