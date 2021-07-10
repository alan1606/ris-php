<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

	if(isset($_GET["id_p"])){$idP = sqlValue($_GET["id_p"], "int", $horizonte);}else{$idP = 0;}

	$aColumns = array('m.id_mah', 'mc.concepto_to', 'm.id_mah', 'm.id_mah', 'concat(t.abreviacion_ti," ",u.nombre_u," ",apaterno_u)', 'DATE_FORMAT(m.fecha_mah,"%d/%m/%Y")', 'm.id_mah', 'DATE_FORMAT(m.fecha_mah,"%H:%i:%s")');
     
    // DB tables to use 
    $aTables = array( 'medicamentos_aplicados_hospi m');
     
    // Indexed column (used for fast and accurate table cardinality) 
    $sIndexColumn = "m.id_mah";
     
	// Joins   hasta aqui
	$sJoin = 'left join medicamentos_hospital m1 on m1.id_mh = m.id_medicamento_hospital_mah left join conceptos mc on mc.id_to = m1.id_medicamento_mh left join usuarios u on u.id_u = m.id_usuario_mah left join titulos t on t.id_ti = u.id_titulo_u';
	 
    // CONDITIONS
	$sWhere = "where m1.id_hospitalizacion_mh = '$_GET[id_h]'";	
	
    /* Database connection information */
    $gaSql['user']       = $username_horizonte; $gaSql['password']   = $password_horizonte;
    $gaSql['db']         = $database_horizonte; $gaSql['server']     = $hostname_horizonte;
     
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
    $sOrder = "ORDER BY m.fecha_mah desc";
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
        { $sWhere .= $aColumns[$i]." LIKE '%".mysqli_real_escape_string( $gaSql['link'], $_GET['sSearch'] )."%' OR "; }
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
		$row[0] = "<div align='center'>$hh</div>";
		
		$row[5] = "<div align='center'>$row[5]<br>$row[7]</div>";
		
		//$nombre_p = '"'.$row[7].'"';
										
		//$row[5] = "<div align='center'><button onClick='poner_medi(this.lang)' lang='$row[9]' class='btn btn-primary btn-xs ver_nota'><i class='fa fa-check' aria-hidden='true'></i> </button></div>";
		
		$output['aaData'][] = $row;
		
    }
    echo json_encode( $output );
?>