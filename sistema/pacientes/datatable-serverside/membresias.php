<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");
    /* Array of database columns which should be read and sent back to DataTables. Use a space where  * you want to insert a non-database field (for example a counter or static image) */
	
	$aColumns = array('m.folio_me', 'p.nombre_completo_p', 'm.fecha_i_me', 'm.fecha_f_me', 'c.concepto_to', 'c.dias_entrega_to', 'sn.valor_sino', 'concat(u.nombre_u," ", u.apaterno_u)', 'm.id_me', 'm.id_me','p.amaterno_p', 'u.amaterno_u', 'm.fecha_me', 'id_paciente_me', 'DATEDIFF(m.fecha_f_me, m.fecha_i_me)');
     
    // DB tables to use 
    $aTables = array( 'membresias m');
     
    // Indexed column (used for fast and accurate table cardinality) 
    $sIndexColumn = "m.id_me";
     
	 // Joins   
	$sJoin = 'left JOIN pacientes p ON p.id_p = m.id_paciente_me left join usuarios u on u.id_u = m.id_usuario_me left join conceptos c on c.id_to = m.id_membresia_me left join catalogo_sino sn on sn.id_sino = m.titular_me';
	
	if(isset($_GET['min']) && isset($_GET['max']) && $_GET['min'] != '' && $_GET['max'] != ''){
	  $sWhere="WHERE m.fecha_me BETWEEN '$_GET[min]' AND '$_GET[max]' ";
	}else{
	  $sWhere = "WHERE 1 = 1 ";
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
        $sOrder = "ORDER BY m.id_me desc  ";
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
    ); $hh=0;
     
    while ( $aRow = mysqli_fetch_array( $rResult ) )
    {
		$hh++;
        $row = array();
        for ( $i=0 ; $i<count($aColumns) ; $i++ )
        { if ( $aColumns[$i] == "version" ) { /* Special output formatting for 'version' column */ $row[] = ($aRow[ $aColumns[$i] ]=="0") ? '-' : $aRow[ $aColumns[$i] ]; } else if ( $aColumns[$i] != ' ' ) { /* General output */ $row[] = $aRow[$i]; } }
		$row1 = array();
        for ( $j=0 ; $j<count($aColumns) ; $j++ ) { if ( $aColumns[$j] == "version" ) { $row1[] = ($aRow[ $aColumns[$j] ]=="0") ? '-' : $aRow[ $aColumns[$j] ]; } else if ( $aColumns[$j] != ' ' ) { $row1[] = $aRow[$j]; } }
						
		$folio = $row[0];			
		$row[0] = "<div align='right'>$row[0]</div>";				
		$row[1] = "$row[1] $row[10]";
		$row[7] = "$row[7]<br>$row[12]";
		$row[9] = "<div align='center'><button type='button' class='btn btn-sm btn-danger'><i class='fa fa-trash'></i></button></div>";
		
		//Tiene membresía, checar si está normal, si está en periodo de renovación o si ya está vencida: verde, naranja y rojo
		mysqli_select_db($horizonte, $database_horizonte);
		$resultCf = mysqli_query($horizonte, "SELECT dias_avisar_membresia_cf from configuracion order by id_cf desc limit 1") or die(mysqli_error($horizonte));
		$rowCf = mysqli_fetch_row($resultCf);
		
		//Checamos cuantos pacientes hay por membresía
		mysqli_select_db($horizonte, $database_horizonte);
		$resultCf1 = mysqli_query($horizonte, "SELECT count(id_me) from membresias where folio_me = $folio") or die(mysqli_error($horizonte));
		$rowCf1 = mysqli_fetch_row($resultCf1); $dispo = $row[5] - $rowCf1[0];
		
		$id_pa = $row[13];
		$nombreP = '"'.$row[1].'"';
		$mi_fecha_i = '"'.$row[2].'"';
		$mi_fecha_f = '"'.$row[3].'"';
		$costo_m = $row[4];
		$periodo_m = 0;
		$mi_fecha_r_i = '"'.$row[2].'"';
		$mi_fecha_r_i1 = '"'.$row[2].'"';
		$mi_fecha_r_f1 = '"'.$row[3].'"';
		$mi_fecha_r_f = '"'.$row[3].'"';
		
		$row[5] = $dispo.' DE '.$row[5];
		
		if($row[14] > $rowCf[0]){//Normal 1
			$row[8] = "<div align='center'><button class='btn btn-success btn-sm' onClick='membresia($id_pa, $nombreP, 1, $mi_fecha_i, $mi_fecha_f)'>NORMAL</button></div>";
		}else if($row[14] > 0 and $row[14]<= $rowCf[0]){//Renovación 2
			$row[8] = "<div align='center'><button class='btn btn-warning btn-sm' onClick='membresia($id_pa, $nombreP, 2, $costo_m, $periodo_m, $mi_fecha_r_i, $mi_fecha_r_f, $mi_fecha_r_i1, $mi_fecha_r_f1)'>RENOVACIÓN</button></div>";
		}else{//Vencida 3
			$row[8] = "<div align='center'><button class='btn btn-danger btn-sm' onClick='membresia($id_pa, $nombreP, 3, $costo_m, $periodo_m, $mi_fecha_f)'>VENCIDA</button></div>";
		}
		
		$output['aaData'][] = $row;
    }
    echo json_encode( $output );
?>