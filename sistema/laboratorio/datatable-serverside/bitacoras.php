<?php
require("../../Connections/horizonte.php"); 
    /* Array of database columns which should be read and sent back to DataTables. Use a space where * you want to insert a non-database field (for example a counter or static image) */
	
	$aColumns = array('v.id_vc', 'p.nombre_completo_p', 'concat(v.referencia_vc,"/",v.contador_vc)', 'v.id_vc', 'v.id_vc', 'v.id_vc', 'v.id_vc', 'v.id_vc', 'v.id_vc', 'v.id_vc', 'v.id_vc', 'v.id_vc', 'v.id_vc', 'v.id_vc', 'v.id_vc', 'v.id_vc', 'v.id_vc', 'v.id_vc', 'v.id_vc', 'v.id_vc', 'v.id_vc', 'v.id_vc', 'v.id_vc', 'v.id_vc', 'v.id_vc', 'v.id_vc', 'v.id_vc', 's.nombre_su', 'a.nombre_a', 'v.area_vc', 's.clave_su', 'a.nombre_a', 'es.estatus_est', 'e.concepto_to' );
     
    // DB tables to use 
    $aTables = array( 'venta_conceptos v');
     
    // Indexed column (used for fast and accurate table cardinality) 
    $sIndexColumn = "v.id_vc";
     
	 // Joins   
	$sJoin = 'left JOIN pacientes p ON p.id_p = v.id_paciente_vc left join conceptos e on e.id_to = v.id_concepto_es left join estatus es on es.id_est = v.estatus_vc left join areas a on a.id_a = v.area_vc left join sucursales s on s.id_su = v.id_sucursal_vc';
	
	if($_GET['acceso']!=1){
		if(isset($_GET['min']) && isset($_GET['max']) && $_GET['min'] != '' && $_GET['max'] != ''){
		 $sWhere="WHERE v.fecha_venta_vc BETWEEN '$_GET[min]' AND '$_GET[max]' and p.id_p = v.id_paciente_vc and v.tipo_concepto_vc = 3 and v.temporal_vc = 0 and v.id_sucursal_vc = '$_GET[sucu]' and e.id_area_to = 7 ";
		}else{
		 $sWhere = "WHERE p.id_p = v.id_paciente_vc and v.tipo_concepto_vc = 3 and v.temporal_vc = 0 and v.id_sucursal_vc = '$_GET[sucu]' and e.id_area_to = 7 ";
		}
	}else{
		if(isset($_GET['min']) && isset($_GET['max']) && $_GET['min'] != '' && $_GET['max'] != ''){
		 $sWhere="WHERE v.fecha_venta_vc BETWEEN '$_GET[min]' AND '$_GET[max]' and p.id_p = v.id_paciente_vc and v.tipo_concepto_vc = 3 and v.temporal_vc = 0 and e.id_area_to = 7 ";
		}else{
		 $sWhere = "WHERE p.id_p = v.id_paciente_vc and v.tipo_concepto_vc = 3 and v.temporal_vc = 0 and e.id_area_to = 7 ";
		}
	}
	
    /* Database connection information */
    $gaSql['user']       = $username_horizonte; $gaSql['password']   = $password_horizonte; $gaSql['db']         = $database_horizonte; $gaSql['server']     = $hostname_horizonte;
 
     
    $gaSql['link'] =  mysqli_connect( $gaSql['server'], $gaSql['user'], $gaSql['password'], $gaSql['db'] );
     
    mysqli_select_db( $gaSql['link'], $gaSql['db'] );
     
    /*  * Paging */
    $sLimit = "";
    if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
    {
        $sLimit = "LIMIT ".mysqli_real_escape_string( $gaSql['link'], $_GET['iDisplayStart'] ).", ".
            mysqli_real_escape_string( $gaSql['link'], $_GET['iDisplayLength'] );
    }
     
     
    /* * Ordering */
    $sOrder = "ORDER BY v.id_vc desc";
    if ( isset( $_GET['iSortCol_0'] ) )
    {
        $sOrder = "ORDER BY ";
        for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ )
        {
            if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" )
            {
                $sOrder .= $aColumns[ intval( $_GET['iSortCol_'.$i] ) ]."
                    ".mysqli_real_escape_string( $gaSql['link'], $_GET['sSortDir_'.$i] ) .", ";
            }
        }
         
        $sOrder = substr_replace( $sOrder, "", -2 );
        if ( $sOrder == "ORDER BY" ) { $sOrder = ""; }
    }
     
    /* 
     * Filtering
     * NOTE this does not match the built-in DataTables filtering which does it
     * word by word on any field. It's possible to do here, but concerned about efficiency
     * on very large tables, and MySQL's regex functionality is very limited
    */
 
    if ( isset($_GET['sSearch']) && $_GET['sSearch'] != "" )
    {
        $sWhere .= "AND (";
        for ( $i=0 ; $i<count($aColumns) ; $i++ )
        {
            $sWhere .= $aColumns[$i]." LIKE '%".mysqli_real_escape_string( $gaSql['link'], $_GET['sSearch'] )."%' OR ";
        }
        $sWhere = substr_replace( $sWhere, "", -3 );
        $sWhere .= ')';
    }
     
    /* Individual column filtering */
    for ( $i=0 ; $i<count($aColumns) ; $i++ )
    {
        if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' )
        {
            if ( $sWhere == "" ) { $sWhere = "WHERE "; }
            else { $sWhere .= " AND "; }
            $sWhere .= $aColumns[$i]." LIKE '%".mysqli_real_escape_string($gaSql['link'], $_GET['sSearch_'.$i])."%' ";
        }
    }
     
    /* * SQL queries * Get data to display */
    $sQuery = "
        SELECT SQL_CALC_FOUND_ROWS ".str_replace(" , ", " ", implode(", ", $aColumns))."
        FROM   ".str_replace(" , ", " ", implode(", ", $aTables))."
		$sJoin
        $sWhere
        $sOrder
        $sLimit";
      
    $rResult = mysqli_query( $gaSql['link'], $sQuery ) or die(mysqli_error($gaSql['link']));
     
    /* Data set length after filtering */
    $sQuery = "
        SELECT FOUND_ROWS()
    ";
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
     
    /* * Output */
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
        {
            if ( $aColumns[$i] == "version" ) { $row[] = ($aRow[ $aColumns[$i] ]=="0") ? '-' : $aRow[ $aColumns[$i] ]; }
            else if ( $aColumns[$i] != ' ' ) { $row[] = $aRow[$i]; }
			
		}
		$row1 = array();
        for ( $j=0 ; $j<count($aColumns) ; $j++ )
        {
            if ( $aColumns[$j] == "version" ) { $row1[] = ($aRow[ $aColumns[$j] ]=="0") ? '-' : $aRow[ $aColumns[$j] ]; }
            else if ( $aColumns[$j] != ' ' ) { $row1[] = $aRow[$j]; }
        }
		$row[0]=$hh;
		
		mysqli_select_db($horizonte, $database_horizonte);
		$consulta = "SELECT r.id_rl from resultados_laboratorio r left join bases b on b.id_b = r.id_base_rl where r.id_estudio_vc_rl = $row[3] and b.base_b like '%GLUCOSA%' ";
		$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
		while ($fila = mysqli_fetch_array($query)) {
			//$lista = $lista.','.$fila['id_rl'];
			$gluc = $fila['id_rl']; 
			mysqli_select_db($horizonte, $database_horizonte);
			$resultGL = mysqli_query($horizonte, "SELECT r_rango_rl from resultados_laboratorio where id_rl = $gluc ") or die (mysqli_error($horizonte));
			$rowGL = mysqli_fetch_row($resultGL); $row[3]=$rowGL[0];
		};
		
		//Para la Urea
		if($fila['base_b']=='UREA'){
			mysqli_select_db($horizonte, $database_horizonte);
			$resultU = mysqli_query($horizonte, "SELECT r_rango_rl from resultados_laboratorio where id_rl = $gluc ") or die (mysqli_error($horizonte));
			$rowU = mysqli_fetch_row($resultU); $row[4]=$rowU[0];
		}else{$row[4]='';}
		if($fila['base_b']=='CREATININA'){
			mysqli_select_db($horizonte, $database_horizonte);
			$resultCR = mysqli_query($horizonte, "SELECT r_rango_rl from resultados_laboratorio where id_rl = $gluc ") or die (mysqli_error($horizonte));
			$rowCR = mysqli_fetch_row($resultCR); $row[5]=$rowCR[0];
		}else{$row[5]='';}
		if($fila['base_b']=='CREATININA'){
			mysqli_select_db($horizonte, $database_horizonte);
			$resultCR = mysqli_query($horizonte, "SELECT r_rango_rl from resultados_laboratorio where id_rl = $gluc ") or die (mysqli_error($horizonte));
			$rowCR = mysqli_fetch_row($resultCR); $row[5]=$rowCR[0];
		}else{$row[5]='';}
			
		//Para la AU
		mysqli_select_db($horizonte, $database_horizonte);
 		$resultAU = mysqli_query($horizonte, "SELECT r_rango_rl from resultados_laboratorio where id_rl = $row[6] ") or die (mysqli_error($horizonte));
 		$rowAU = mysqli_fetch_row($resultAU); $row[6]=$rowAU[0];
		
		//Para la COL
		mysqli_select_db($horizonte, $database_horizonte);
 		$resultCOL = mysqli_query($horizonte, "SELECT r_valor_nma_rl from resultados_laboratorio where id_rl = $row[7] ") or die (mysqli_error($horizonte));
 		$rowCOL = mysqli_fetch_row($resultCOL); $row[7]=$rowCOL[0];
		
		//Para la TG
		mysqli_select_db($horizonte, $database_horizonte);
 		$resultTG = mysqli_query($horizonte, "SELECT r_rango_rl from resultados_laboratorio where id_rl = $row[8] ") or die (mysqli_error($horizonte));
 		$rowTG = mysqli_fetch_row($resultTG); $row[8]=$rowTG[0];
		
		//Para la HDL
		mysqli_select_db($horizonte, $database_horizonte);
 		$resultHDL = mysqli_query($horizonte, "SELECT r_valor_nma_i_rl from resultados_laboratorio where id_rl = $row[9] ") or die (mysqli_error($horizonte));
 		$rowHDL = mysqli_fetch_row($resultHDL); $row[9]=$rowHDL[0];
		
		//Para la LDL
		mysqli_select_db($horizonte, $database_horizonte);
 		$resultLDL = mysqli_query($horizonte, "SELECT r_valor_nma_rl from resultados_laboratorio where id_rl = $row[10] ") or die (mysqli_error($horizonte));
 		$rowLDL = mysqli_fetch_row($resultLDL); $row[10]=$rowLDL[0];
		
		//Para la VLDL
		mysqli_select_db($horizonte, $database_horizonte);
 		$resultVLDL = mysqli_query($horizonte, "SELECT r_rango_rl from resultados_laboratorio where id_rl = $row[11] ") or die (mysqli_error($horizonte));
 		$rowVLDL = mysqli_fetch_row($resultVLDL); $row[11]=$rowVLDL[0];
		
		//Para la TGO
		mysqli_select_db($horizonte, $database_horizonte);
 		$resultTGO = mysqli_query($horizonte, "SELECT r_rango_rl from resultados_laboratorio where id_rl = $row[12] ") or die (mysqli_error($horizonte));
 		$rowTGO = mysqli_fetch_row($resultTGO); $row[12]=$rowTGO[0];
		
		//Para la TGP
		mysqli_select_db($horizonte, $database_horizonte);
 		$resultTGP = mysqli_query($horizonte, "SELECT r_rango_rl from resultados_laboratorio where id_rl = $row[13] ") or die (mysqli_error($horizonte));
 		$rowTGP = mysqli_fetch_row($resultTGP); $row[13]=$rowTGP[0];
		
		//Para la FAL
		mysqli_select_db($horizonte, $database_horizonte);
 		$resultFAL = mysqli_query($horizonte, "SELECT r_rango_rl from resultados_laboratorio where id_rl = $row[14] ") or die (mysqli_error($horizonte));
 		$rowFAL = mysqli_fetch_row($resultFAL); $row[14]=$rowFAL[0];
		
		//Para la BT
		mysqli_select_db($horizonte, $database_horizonte);
 		$resultBT = mysqli_query($horizonte, "SELECT r_rango_rl from resultados_laboratorio where id_rl = $row[15] ") or die (mysqli_error($horizonte));
 		$rowBT = mysqli_fetch_row($resultBT); $row[15]=$rowBT[0];
		
		//Para la BD
		mysqli_select_db($horizonte, $database_horizonte);
 		$resultBD = mysqli_query($horizonte, "SELECT r_rango_rl from resultados_laboratorio where id_rl = $row[16] ") or die (mysqli_error($horizonte));
 		$rowBD = mysqli_fetch_row($resultBD); $row[16]=$rowBD[0];
		
		//Para la BI
		mysqli_select_db($horizonte, $database_horizonte);
 		$resultBI = mysqli_query($horizonte, "SELECT r_rango_rl from resultados_laboratorio where id_rl = $row[17] ") or die (mysqli_error($horizonte));
 		$rowBI = mysqli_fetch_row($resultBI); $row[17]=$rowBI[0];
		
		//Para la Na
		mysqli_select_db($horizonte, $database_horizonte);
 		$resultNa = mysqli_query($horizonte, "SELECT r_rango_rl from resultados_laboratorio where id_rl = $row[18] ") or die (mysqli_error($horizonte));
 		$rowNa = mysqli_fetch_row($resultNa); $row[18]=$rowNa[0];
		
		//Para la K
		mysqli_select_db($horizonte, $database_horizonte);
 		$resultK = mysqli_query($horizonte, "SELECT r_rango_rl from resultados_laboratorio where id_rl = $row[19] ") or die (mysqli_error($horizonte));
 		$rowK = mysqli_fetch_row($resultK); $row[19]=$rowK[0];
		
		//Para la CL
		mysqli_select_db($horizonte, $database_horizonte);
 		$resultCL = mysqli_query($horizonte, "SELECT r_rango_rl from resultados_laboratorio where id_rl = $row[20] ") or die (mysqli_error($horizonte));
 		$rowCL = mysqli_fetch_row($resultCL); $row[20]=$rowCL[0];
		
		//Para la CK
		mysqli_select_db($horizonte, $database_horizonte);
 		$resultCK = mysqli_query($horizonte, "SELECT r_rango_rl from resultados_laboratorio where id_rl = $row[21] ") or die (mysqli_error($horizonte));
 		$rowCK = mysqli_fetch_row($resultCK); $row[21]=$rowCK[0];
		
		//Para la CK-MB
		mysqli_select_db($horizonte, $database_horizonte);
 		$resultCKMB = mysqli_query($horizonte, "SELECT r_vmaximo_rl from resultados_laboratorio where id_rl = $row[22] ") or die (mysqli_error($horizonte));
 		$rowCKMB = mysqli_fetch_row($resultCKMB); $row[22]=$rowCKMB[0];
		
		$output['aaData'][] = $row;
    }
     
    echo json_encode( $output );
?>