<?php
require("../../Connections/horizonte.php"); 
    /* Array of database columns which should be read and sent back to DataTables. Use a space where
     * you want to insert a non-database field (for example a counter or static image)
    */
	
	$aColumns = array('u.usuario_u' , 'u.id_u', 'u.id_u','u.id_u', 'u.id_u', 'u.id_u', 'u.id_u', 'u.id_u', 'u.id_u', 'u.id_u', 'u.id_u', 'u.id_u', 'u.id_u', 'u.id_u', 'u.id_u', 'u.id_u', 'u.id_u', 'u.id_u' );
     
    // DB tables to use 
    $aTables = array( 'usuarios u');
     
    // Indexed column (used for fast and accurate table cardinality) 
    $sIndexColumn = "u.id_u";
     
	 // Joins   
	$sJoin = 'left join orden_venta o on o.usuario_ov = u.id_u';
	 
    // CONDITIONS 
	$sWhere = "WHERE u.id_u in (select usuario_ov from orden_venta) or u.id_u in (select idUsuarioR_p from pacientes) ";
		
    /* Database connection information */
	mysqli_select_db($horizonte, $database_horizonte);
	
    $gaSql['user']       = $username_horizonte;
    $gaSql['password']   = $password_horizonte;
    $gaSql['db']         = $database_horizonte;
    $gaSql['server']     = $hostname_horizonte;
 
     
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
    $sOrder = "";
    if ( isset( $_GET['iSortCol_0'] ) )
    {
        $sOrder = "group by u.usuario_u ORDER BY u.usuario_u  ";
        for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ )
        {
            if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" )
            {
                $sOrder .= $aColumns[ intval( $_GET['iSortCol_'.$i] ) ]."
                    ".mysqli_real_escape_string( $gaSql['link'], $_GET['sSortDir_'.$i] ) .", ";
            }
        }
         
        $sOrder = substr_replace( $sOrder, "", -2 );
        if ( $sOrder == "ORDER BY" )
        {
            $sOrder = "";
        }
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
            if ( $sWhere == "" )
            {
                $sWhere = "WHERE ";
            }
            else
            {
                $sWhere .= " AND ";
            }
            $sWhere .= $aColumns[$i]." LIKE '%".mysqli_real_escape_string($gaSql['link'], $_GET['sSearch_'.$i])."%' ";
        }
    }
     
    /*
     * SQL queries
     * Get data to display
    */
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
     
    while ( $aRow = mysqli_fetch_array( $rResult ) )
    {
        $row = array();
        for ( $i=0 ; $i<count($aColumns) ; $i++ )
        {
            if ( $aColumns[$i] == "version" )
            {
                /* Special output formatting for 'version' column */
                $row[] = ($aRow[ $aColumns[$i] ]=="0") ? '-' : $aRow[ $aColumns[$i] ];
            }
            else if ( $aColumns[$i] != ' ' )
            {
                /* General output */
				$row[] = $aRow[$i];
            }
			
		}
		$row1 = array();
        for ( $j=0 ; $j<count($aColumns) ; $j++ )
        {
            if ( $aColumns[$j] == "version" )
            {
                /* Special output formatting for 'version' column */
                $row1[] = ($aRow[ $aColumns[$j] ]=="0") ? '-' : $aRow[ $aColumns[$j] ];
            }
            else if ( $aColumns[$j] != ' ' )
            {
                /* General output */
				$row1[] = $aRow[$j];
            }
        }
	//Fecha de inicio del usuario
	mysqli_select_db($horizonte, $database_horizonte);
	$resultMU = mysqli_query($horizonte, "SELECT date_format(fecha_venta_ov,'%d/%m/%Y'), fecha_venta_ov from orden_venta where usuario_ov = $row[1] and fecha_venta_ov != '' order by id_ov asc limit 1") or die (mysqli_error($horizonte));
	$rowMU = mysqli_fetch_row($resultMU);
	
	if($rowMU[0] == ''){
		mysqli_select_db($horizonte, $database_horizonte);
		$resultMU = mysqli_query($horizonte, "SELECT date_format(fechaR_p,'%d/%m/%Y'), fechaR_p from pacientes where idUsuarioR_p = $row[1] and fechaR_p != '' order by id_p asc limit 1") or die (mysqli_error($horizonte));
		$rowMU = mysqli_fetch_row($resultMU);
	}if($rowMU[0] == ''){
		if($rowMU[0] == ''){
			mysqli_select_db($horizonte, $database_horizonte);
			$resultMU = mysqli_query($horizonte, "SELECT date_format(fecha_venta_ov,'%d/%m/%Y'), fecha_venta_ov from orden_venta where usuario_ov = $row[1] and fecha_venta_ov != '' order by id_ov asc limit 1") or die (mysqli_error($horizonte));
			$rowMU = mysqli_fetch_row($resultMU);
		}if($rowMU[0] == ''){$rowMU[0] = '-';}	
	}

	//ultima fecha que utilizó el sistema el usuario
	mysqli_select_db($horizonte, $database_horizonte);
	$resultMUp = mysqli_query($horizonte, "SELECT date_format(fecha_venta_ov,'%d/%m/%Y'), fecha_venta_ov from orden_venta where usuario_ov = $row[1] order by id_ov desc limit 1") or die (mysqli_error($horizonte));
	$rowMUp = mysqli_fetch_row($resultMUp);
	
	if($rowMUp[0] == ''){
		mysqli_select_db($horizonte, $database_horizonte);
		$resultMUp = mysqli_query($horizonte, "SELECT date_format(fechaR_p,'%d/%m/%Y'), fechaR_p from pacientes where idUsuarioR_p = $row[1] order by id_p desc limit 1") or die (mysqli_error($horizonte));
		$rowMUp = mysqli_fetch_row($resultMUp);
	}if($rowMUp[0] == ''){$rowMUp[0] = '-';}
	
	//dias laborados del sistema por el usuario
	$dias	= (strtotime($rowMU[1])-strtotime($rowMUp[1]))/86400;
	$dias 	= abs($dias); $dias = floor($dias);
	$rowBR0 = $dias;
	if($rowMU[0] == '-' or $rowMUp[0] == '-'){$rowBR0 = 0;}else{$rowBR0++;}
	
	//Pacientes por el usuario
	mysqli_select_db($horizonte, $database_horizonte);
	$resultBR1 = mysqli_query($horizonte, "SELECT count(id_p) from pacientes where idUsuarioR_p = $row[1]") or die (mysqli_error($horizonte));
	$rowBR1 = mysqli_fetch_row($resultBR1);
	
	//Órdenes de venta capturadas por el usuario
	mysqli_select_db($horizonte, $database_horizonte);
	$resultBR2 = mysqli_query($horizonte, "SELECT count(id_ov) from orden_venta where usuario_ov = $row[1]") or die (mysqli_error($horizonte));
	$rowBR2 = mysqli_fetch_row($resultBR2);
	
	//Dinero generado por el usuario
	mysqli_select_db($horizonte, $database_horizonte);
	$resultBR3 = mysqli_query($horizonte, "SELECT sum(gran_total_ov) from orden_venta where usuario_ov = $row[1]") or die (mysqli_error($horizonte));
	$rowBR3 = mysqli_fetch_row($resultBR3);
	
	//Consultas dadas de alta por el usuario
	mysqli_select_db($horizonte, $database_horizonte);
	$resultBR3c = mysqli_query($horizonte, "SELECT count(id_vc) from venta_conceptos where tipo_concepto_vc = 1 and temporal_vc = 0 and id_usuario_vc = $row[1]") or die (mysqli_error($horizonte));
	$rowBR3c = mysqli_fetch_row($resultBR3c);
	
	//Laboratorios dadas de alta por el usuario
	mysqli_select_db($horizonte, $database_horizonte);
	$resultBR3l = mysqli_query($horizonte, "SELECT count(id_vc) from venta_conceptos where tipo_concepto_vc = 3 and temporal_vc = 0 and id_usuario_vc = $row[1]") or die (mysqli_error($horizonte));
	$rowBR3l = mysqli_fetch_row($resultBR3l);
	
	//Imagen dadas de alta por el usuario
	mysqli_select_db($horizonte, $database_horizonte);
	$resultBR3i = mysqli_query($horizonte, "SELECT count(id_vc) from venta_conceptos where tipo_concepto_vc = 4 and temporal_vc = 0 and id_usuario_vc = $row[1]") or die (mysqli_error($horizonte));
	$rowBR3i = mysqli_fetch_row($resultBR3i);
	
	//Servicios dadas de alta por el usuario
	mysqli_select_db($horizonte, $database_horizonte);
	$resultBR3s = mysqli_query($horizonte, "SELECT count(id_vc) from venta_conceptos where tipo_concepto_vc = 2 and temporal_vc = 0 and id_usuario_vc = $row[1]") or die (mysqli_error($horizonte));
	$rowBR3s = mysqli_fetch_row($resultBR3s);
	
	//Promedio de pacientes capturados por día por el usuario
	if($rowBR0 == 0){$rowBR4 = 0;}else{$rowBR4 = round($rowBR1[0]/$rowBR0,2);}
	
	//Promedio de OV capturadas por día por el usuario
	if($rowBR0 == 0){$rowBR5 = 0;}else{$rowBR5 = round($rowBR2[0]/$rowBR0,2);}
	
	//Promedio de dinero ingresado por día por el usuario
	if($rowBR0 == 0){$rowBR3m =0;}else{$rowBR3m = round($rowBR3[0]/$rowBR0,2);}
	
	//Promedio de consultas dadas por día por el usuario
	if($rowBR0 == 0){$rowBR3c1 =0;}else{$rowBR3c1 = round($rowBR3c[0]/$rowBR0,2);}
	
	//Promedio de laboratorios dadas por día por el usuario
	if($rowBR0 == 0){$rowBR3l1 =0;}else{$rowBR3l1 = round($rowBR3l[0]/$rowBR0,2);}
	
	//Promedio de laboratorios dadas por día por el usuario
	if($rowBR0 == 0){$rowBR3i1 =0;}else{$rowBR3i1 = round($rowBR3i[0]/$rowBR0,2);}
	
	//Promedio de laboratorios dadas por día por el usuario
	if($rowBR0 == 0){$rowBR3s1 =0;}else{$rowBR3s1 = round($rowBR3s[0]/$rowBR0,2);}
		
	$row[1] = $rowMU[0];
	$row[2] = $rowMUp[0];
	//if($rowMUp[0]!='-'){$rowBR0=$rowBR0+1;}
	$row[3] = $rowBR0;
	$row[4] = $rowBR1[0];
	$row[5] = $rowBR2[0];
	
	if($rowBR2[0]==0){$row[6] = 0;}else{$row[6] = $rowBR3[0];}
	$row[7] = $rowBR3c[0];//Consultas
	$row[8] = $rowBR3l[0];
	$row[9] = $rowBR3i[0];
	$row[10] = $rowBR3s[0];
	
	$row[11] = $rowBR4;
	$row[12] = $rowBR5;
	$row[13] = $rowBR3m;
	$row[14] = $rowBR3c1;
	$row[15] = $rowBR3l1;
	$row[16] = $rowBR3i1;
	$row[17] = $rowBR3s1;
		
		$output['aaData'][] = $row;
    }
     
    echo json_encode( $output );
?>