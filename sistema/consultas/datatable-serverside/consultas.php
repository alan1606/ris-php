<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");
    /* Array of database columns which should be read and sent back to DataTables. Use a space where  * you want to insert a non-database field (for example a counter or static image) */
	
	$aColumns = array('v.id_vc','v.referencia_vc', 'concat(p.nombre_p," ", p.apaterno_p)', 'concat(m.nombre_u," ", m.apaterno_u)', 'replace(e.concepto_to,"CONSULTA DE ","")', 'v.fecha_venta_vc', 's.clave_su', 'es.estatus_est', 'v.urgente_vc', 'p.id_p', 'm.id_u', 'v.fecha_venta_vc','p.amaterno_p', 'm.amaterno_u', 'v.id_vc', 'DATE_FORMAT(v.fecha_venta_vc,"%d/%c/%Y")', 'v.fechaEdo3_e', 'v.fecha_venta_vc', 'v.nota_interpretacion', 'es.estatus_est', 's.nombre_su', 'v.id_vc' );
     
    // DB tables to use 
    $aTables = array( 'venta_conceptos v');
     
    // Indexed column (used for fast and accurate table cardinality) 
    $sIndexColumn = "v.id_vc";
     
	 // Joins   
	$sJoin = 'left JOIN pacientes p ON p.id_p = v.id_paciente_vc left join usuarios m on m.id_u = v.id_personal_medico_vc left join estatus es on es.id_est = v.estatus_vc left join conceptos e on e.id_to = v.id_concepto_es left join orden_venta o on o.referencia_ov = v.referencia_vc left join sucursales s on s.id_su = o.sucursal_ov';
	
	mysqli_select_db($horizonte, $database_horizonte); 
	$resultAU = mysqli_query($horizonte, "SELECT multisucursal_u, idSucursal_u from usuarios where id_u = '$_GET[idU]'") or die (mysqli_error($horizonte));
	$rowAU = mysqli_fetch_row($resultAU); $id_suc = sqlValue($rowAU[1], "int", $horizonte);
	
	switch($rowAU[0]){
		case 0://Solo vé lo suyo
			if(isset($_GET['min']) && isset($_GET['max']) && $_GET['min'] != '' && $_GET['max'] != ''){
			  $sWhere="WHERE v.fecha_venta_vc BETWEEN '$_GET[min]' AND '$_GET[max]' and  e.id_tipo_concepto_to = 1 and v.temporal_vc=0 and v.id_radiologo_externo = '$_GET[idU]' ";
			}else{
			  $sWhere = "WHERE e.id_tipo_concepto_to = 1 and v.temporal_vc = 0 and v.id_radiologo_externo = '$_GET[idU]' ";
			}
		break;
		case 2://Ve todo lo de su sucursal y lo suyo
			if(isset($_GET['min']) && isset($_GET['max']) && $_GET['min'] != '' && $_GET['max'] != ''){
			  $sWhere="WHERE v.fecha_venta_vc BETWEEN '$_GET[min]' AND '$_GET[max]' and  e.id_tipo_concepto_to = 1 and v.temporal_vc=0 and (o.sucursal_ov = $id_suc or v.id_radiologo_externo = '$_GET[idU]') ";
			}else{
			  $sWhere = "WHERE e.id_tipo_concepto_to = 1 and v.temporal_vc = 0 and (o.sucursal_ov = $id_suc or v.id_radiologo_externo = '$_GET[idU]') ";
			}
		break;
		case 1://Ve todo de todas las sucursales
			if(isset($_GET['min']) && isset($_GET['max']) && $_GET['min'] != '' && $_GET['max'] != ''){
			  $sWhere="WHERE v.fecha_venta_vc BETWEEN '$_GET[min]' AND '$_GET[max]' and  e.id_tipo_concepto_to = 1 and v.temporal_vc=0 ";
			}else{
			  $sWhere = "WHERE e.id_tipo_concepto_to = 1 and v.temporal_vc = 0 ";
			}
		break;
		default:
			echo 'Ha ocurrido un error';
	}
	
    /* Database connection information */
    $gaSql['user']       = $username_horizonte;
    $gaSql['password']   = $password_horizonte;
    $gaSql['db']         = $database_horizonte;
    $gaSql['server']     = $hostname_horizonte;
 
    $gaSql['link'] =  mysqli_connect( $gaSql['server'], $gaSql['user'], $gaSql['password'], $gaSql['db'] );
     
    mysqli_select_db( $gaSql['link'], $gaSql['db'] );
     
    /*  * Paging */
    $sLimit = "";
    if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' ) { $sLimit = "LIMIT ".mysqli_real_escape_string( $gaSql['link'], $_GET['iDisplayStart'] ).", ". mysqli_real_escape_string( $gaSql['link'], $_GET['iDisplayLength'] ); }
     
    /* * Ordering */
    $sOrder = "";
    if ( isset( $_GET['iSortCol_0'] ) )
    {
        $sOrder = "ORDER BY v.id_vc desc  ";
        for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ ) { if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" ) { $sOrder .= $aColumns[ intval( $_GET['iSortCol_'.$i] ) ]." ".mysqli_real_escape_string( $gaSql['link'], $_GET['sSortDir_'.$i] ) .", "; } }
         
        $sOrder = substr_replace( $sOrder, "", -2 );
        if ( $sOrder == "ORDER BY" ) { $sOrder = ""; }
    }
     
    /*  * Filtering * NOTE this does not match the built-in DataTables filtering which does it * word by word on any field. It's possible to do here, but concerned about efficiency * on very large tables, and MySQL's regex functionality is very limited */
 
    if ( isset($_GET['sSearch']) && $_GET['sSearch'] != "" )
    {
        $sWhere .= "AND (";
        for ( $i=0 ; $i<count($aColumns) ; $i++ ) { $sWhere .= $aColumns[$i]." LIKE '%".mysqli_real_escape_string( $gaSql['link'], $_GET['sSearch'] )."%' OR "; }
        $sWhere = substr_replace( $sWhere, "", -3 );
        $sWhere .= ')';
    }
     
    /* Individual column filtering */
    for ( $i=0 ; $i<count($aColumns) ; $i++ )
    {
        if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' )
        {
            if ( $sWhere == "" ) { $sWhere = "WHERE "; } else { $sWhere .= " AND "; }
            $sWhere .= $aColumns[$i]." LIKE '%".mysqli_real_escape_string($gaSql['link'], $_GET['sSearch_'.$i])."%' ";
        }
    }
     
    /*  * SQL queries  * Get data to display */
    $sQuery = "
        SELECT SQL_CALC_FOUND_ROWS ".str_replace(" , ", " ", implode(", ", $aColumns))."
        FROM   ".str_replace(" , ", " ", implode(", ", $aTables))."
		$sJoin
        $sWhere
        $sOrder
        $sLimit";

    $rResult = mysqli_query( $gaSql['link'], $sQuery ) or die(mysqli_error($gaSql['link']));
     
    /* Data set length after filtering */
    $sQuery = " SELECT FOUND_ROWS() ";
    $rResultFilterTotal = mysqli_query( $gaSql['link'], $sQuery ) or die(mysqli_error($gaSql['link']));
    $aResultFilterTotal = mysqli_fetch_array($rResultFilterTotal);
    $iFilteredTotal = $aResultFilterTotal[0];
     
    /* Total data set length */
    $sQuery = "
        SELECT COUNT(".$sIndexColumn.")
        FROM   ".$aTables[0];
     
    $rResultTotal = mysqli_query( $gaSql['link'], $sQuery ) or die(mysqli_error($gaSql['link']));
    $aResultTotal = mysqli_fetch_array($rResultTotal);
    $iTotal = $aResultTotal[0];
     
    /*  * Output */
    $output = array(
        "sEcho" => intval($_GET['sEcho']),
        "iTotalRecords" => $iTotal,
        "iTotalDisplayRecords" => $iFilteredTotal,
        "aaData" => array()
    );
	$hh=0;
     
    while ( $aRow = mysqli_fetch_array( $rResult ) )
    {
		$hh++;
        $row = array();
        for ( $i=0 ; $i<count($aColumns) ; $i++ )
        { if ( $aColumns[$i] == "version" ) { /* Special output formatting for 'version' column */ $row[] = ($aRow[ $aColumns[$i] ]=="0") ? '-' : $aRow[ $aColumns[$i] ]; } else if ( $aColumns[$i] != ' ' ) { /* General output */ $row[] = $aRow[$i]; } }
		$row1 = array();
        for ( $j=0 ; $j<count($aColumns) ; $j++ ) { if ( $aColumns[$j] == "version" ) { $row1[] = ($aRow[ $aColumns[$j] ]=="0") ? '-' : $aRow[ $aColumns[$j] ]; } else if ( $aColumns[$j] != ' ' ) { $row1[] = $aRow[$j]; } }
		
		//para el contador de tiempo
		$fecha1 = new DateTime($row[5]); $fecha2 = new DateTime(date("Y-m-d H:i:s")); $fecha = $fecha1->diff($fecha2);
		$anos=$fecha->y; $meses=$fecha->m; $dias=$fecha->d; $horas=$fecha->h; $minutos=$fecha->i; $segundos=$fecha->s;
		$row[5] = sprintf("%02d", $dias)."D/".sprintf("%02d", $horas).":".sprintf("%02d", $minutos).":".sprintf("%02d", $segundos); 
		$row[5] = "<div align='center'><span id='$row[14]' lang='$row[11]' class='miConta'>$row[5]</span></div>";
		
		$row[2] = $row[2]." ".$row[12];//Nombre completo del paciente
		$row[3] = $row[3]." ".$row[13];//Nombre completo del médico $row[1] = "$row[1]</span>";
		
		//Si el paciente no tiene signos vitales enconces el ícono de SV sera un ? en caso de que si tenga el ícono será un info o alerta si tiene signos anormales
		mysqli_select_db($horizonte, $database_horizonte); $resultS = mysqli_query($horizonte, "SELECT count(id_sv) from signos_vitales where id_paciente_sv = $row[9] ") or die (mysqli_error($horizonte)); $rowS = mysqli_fetch_row($resultS);
		mysqli_select_db($horizonte, $database_horizonte); $resultS1 = mysqli_query($horizonte, "SELECT DATE_FORMAT(fecha_sv,'%d/%c/%Y') from signos_vitales where id_paciente_sv = $row[9] order by id_sv desc") or die (mysqli_error($horizonte)); $rowS1 = mysqli_fetch_row($resultS1);
		
		mysqli_select_db($horizonte, $database_horizonte); $resultH1 = mysqli_query($horizonte, "SELECT count(id_hc) from historia_clinica where id_paciente_hc = $row[9] ") or die (mysqli_error($horizonte)); $rowH1 = mysqli_fetch_row($resultH1);
		if($rowH1[0]<1){
			mysqli_select_db($horizonte, $database_horizonte);
		    $sqlH2="INSERT INTO historia_clinica(id_paciente_hc,id_usuario_hc,fecha_registro_hc) VALUES ($row[9],'$_GET[idU]',now())";
			$insertH2 = mysqli_query($horizonte, $sqlH2) or die (mysqli_error($horizonte));
		}
		
		mysqli_select_db($horizonte, $database_horizonte); 
		$resultH = mysqli_query($horizonte, "SELECT temporal_hc from historia_clinica where id_paciente_hc = $row[9] ") or die (mysqli_error($horizonte)); $rowH = mysqli_fetch_row($resultH);
		
		if ($row[19] == "PENDIENTE"){ 
			$row[7] = "<span id='$row[14]' lang='$row[9]' onClick='atenderC(this.lang, this.id,1,$row[21],$row[21])' style='cursor:pointer; text-decoration:underline;'>$row[7]</span>";
			$row[8] = "<div align='center'>-</div>"; $row[9] = "<div align='center'>-</div>";
		}
		else if($row[19] == "PROCESO"){
			$row[7] = "<span id='$row[14]' lang='$row[9]' onClick='atenderC(this.lang, this.id,2,$row[21],$row[21])' style='cursor:pointer; text-decoration:underline;'>$row[7]</span>";
			$row[8] = "<div align='center'>-</div>"; $row[9] = "<div align='center'>-</div>";
		}
		else if($row[19] == "FINALIZADA"){
			//para el contador de tiempo
			$fecha1 = new DateTime($row[17]); $fecha2 = new DateTime($row[16]); $fecha = $fecha1->diff($fecha2);
			$anos=$fecha->y; $meses=$fecha->m; $dias=$fecha->d; $horas=$fecha->h; $minutos=$fecha->i; $segundos=$fecha->s;
			$row[5]=sprintf("%02d",$dias)."D/".sprintf("%02d",$horas).":".sprintf("%02d", $minutos).":".sprintf("%02d", $segundos);
		
			$row[7] = "<span id='$row[14]' lang='$row[9]' onClick='atenderC(this.lang,this.id,3,$row[21],$row[21])' style='cursor:pointer; text-decoration:underline;'>$row[7]</span>";
						
			$row[5] = "<div align='center'><span id='$row[14]' lang='$row[11]' class='miContaX'>$row[5]</span></div>";
			
			//Checamos si tiene nota de evo
			if($row[18]==''){ $row[7] = "*$row[7]"; }else{ }
			
			$row[8] = "<button id='$row[14]' lang='$row[9]' class='btn btn-xs btn-primary' onClick='imprimirNM(this.lang,this.id)'>Imprimir</button>";
			$row[9] = "<button id='$row[14]' lang='$row[9]' class='btn btn-xs btn-primary' onClick='imprimirRM(this.lang,this.id)'>Imprimir</button>";
			
		}else{$row[8] = "<div align='center'>-</div>"; $row[9] = "<div align='center'>-</div>";}
		
		if ($row[8] == 1){ $row[7] = "<span style='color:red;'>$row[7]</span>"; }//Para las consultas urgentes
		
		$row[6] = "<span title='$row[20]'>$row[6]</span>";
		
		$row[0] = "<span>$hh</span>";
		
		$output['aaData'][] = $row;
    }
    echo json_encode( $output );
?>