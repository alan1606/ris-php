<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");
	$aColumns = array('s.id_sv', 'DATE_FORMAT(s.fecha_sv,"%d/%c/%Y")', 's.peso_sv', 's.talla_sv', 's.imc_sv', 's.cintura_sv', 'concat(s.t_sv,"/", s.a_sv)', 's.fr_sv', 's.fc_sv', 's.temperatura_sv', 's.oximetria_sv', 's.id_usuario_sv', 's.id_sv');
     
    // DB tables to use 
    $aTables = array( 'signos_vitales s');
     
    // Indexed column (used for fast and accurate table cardinality) 
    $sIndexColumn = "s.id_sv";
     
	 // Joins   
	$sJoin = '';
	   
    // CONDITIONS 
		$sWhere = "WHERE s.id_paciente_sv = $_GET[idP] order by s.id_sv desc ";

    /* Database connection information */
    $gaSql['user'] = $username_horizonte; $gaSql['password'] = $password_horizonte; $gaSql['db'] = $database_horizonte; $gaSql['server'] = $hostname_horizonte;
     
    $gaSql['link'] =  mysqli_connect( $gaSql['server'], $gaSql['user'], $gaSql['password'], $gaSql['db'] );
     
    mysqli_select_db( $gaSql['link'], $gaSql['db'] );
     
     
    /* * Paging */
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
        $sOrder = "ORDER BY  ";
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
     
    /*  * Filtering * NOTE this does not match the built-in DataTables filtering which does it * word by word on any field. It's possible to do here, but concerned about efficiency * on very large tables, and MySQL's regex functionality is very limited */
 
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
            if ( $aColumns[$i] == "version" ) { /* Special output formatting for 'version' column */ $row[] = ($aRow[ $aColumns[$i] ]=="0") ? '-' : $aRow[ $aColumns[$i] ]; }
            else if ( $aColumns[$i] != ' ' ) { /* General output */ $row[] = $aRow[$i]; }
        }
		
		$row[0]=$hh;
		
		$output['aaData'][] = $row;
    }
    echo json_encode( $output );
?>