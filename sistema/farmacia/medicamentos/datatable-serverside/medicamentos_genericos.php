<?php
require("../../../Connections/horizonte.php");
require("../../../funciones/php/values.php");
    /* Array of database columns which should be read and sent back to DataTables. Use a space where  * you want to insert a non-database field (for example a counter or static image) */
	
	$aColumns = array('m.nombre_generico_med', 'm.descripcion_med', 'm.cantidad_med', 'm.grupo_med', 'm.nivel_med', 'm.riesgo_embarazo_med', 'm.presentaciones_med', 'm.via_administracion_med', 'm.via_administracion_dosis_med', 'm.generalidades_med', 'CONVERT(m.interacciones_med USING utf8)', 'm.efectos_adversos_med', 'CONVERT(m.contraindicaciones_precauciones_med USING utf8)', 'r.texto_cre', 'm.id_med');
     
    // DB tables to use 
    $aTables = array( 'medicamentos m');
     
    // Indexed column (used for fast and accurate table cardinality) 
    $sIndexColumn = "m.id_med";
     
	 // Joins   
	$sJoin = 'left join cat_riesgo_embarazo r on r.cat_cre = m.riesgo_embarazo_med ';
	
	$sWhere = "WHERE 1 = 1 ";
	
    /* Database connection information */
    $gaSql['user']       = $username_horizonte;
    $gaSql['password']   = $password_horizonte;
    $gaSql['db']         = $database_horizonte;
    $gaSql['server']     = $hostname_horizonte;
 
    $gaSql['link'] =  mysqli_connect( $gaSql['server'], $gaSql['user'], $gaSql['password'], $gaSql['db'] );
     mysqli_query($horizonte,"SET NAMES 'utf8'");
    mysqli_select_db( $gaSql['link'], $gaSql['db'] ); //
     
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

	////
	mysqli_select_db($horizonte, $database_horizonte);
	$consulta = "SELECT efectos_adversos_med, contraindicaciones_precauciones_med, interacciones_med, indicaciones_med, via_administracion_dosis_med, via_administracion_med, contenido_med, presentaciones_med, id_med, generalidades_med, grupo_med from medicamentos";
	$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
	
	while ($fila = mysqli_fetch_array($query)){

		$grupo_med = sqlValue(preg_replace('/[^(\x20-\x7F)]*/','', $fila['grupo_med']),"text", $horizonte);
		$generalidades_med = sqlValue(preg_replace('/[^(\x20-\x7F)]*/','', $fila['generalidades_med']),"text", $horizonte);
		$efectos_adversos_med = sqlValue(preg_replace('/[^(\x20-\x7F)]*/','', $fila['efectos_adversos_med']),"text", $horizonte);
		$contraindicaciones_precauciones_med = sqlValue(preg_replace('/[^(\x20-\x7F)]*/','', $fila['contraindicaciones_precauciones_med']),"text", $horizonte);
		$interacciones_med = sqlValue(preg_replace('/[^(\x20-\x7F)]*/','', $fila['interacciones_med']),"text", $horizonte);
		$indicaciones_med = sqlValue(preg_replace('/[^(\x20-\x7F)]*/','', $fila['indicaciones_med']),"text", $horizonte);
		$via_administracion_dosis_med = sqlValue(preg_replace('/[^(\x20-\x7F)]*/','', $fila['via_administracion_dosis_med']),"text", $horizonte);
		$via_administracion_med = sqlValue(preg_replace('/[^(\x20-\x7F)]*/','', $fila['via_administracion_med']),"text", $horizonte);
		$contenido_med = sqlValue(preg_replace('/[^(\x20-\x7F)]*/','', $fila['contenido_med']),"text", $horizonte);
		$presentaciones_med = sqlValue(preg_replace('/[^(\x20-\x7F)]*/','', $fila['presentaciones_med']),"text", $horizonte);
		$id_med = sqlValue($fila['id_med'],"int", $horizonte);
		
		 mysqli_select_db($horizonte, $database_horizonte);
		 $sql = "UPDATE medicamentos set efectos_adversos_med = $efectos_adversos_med, contraindicaciones_precauciones_med = $contraindicaciones_precauciones_med, interacciones_med = $interacciones_med, indicaciones_med = $indicaciones_med, via_administracion_dosis_med = $via_administracion_dosis_med, via_administracion_med = $via_administracion_med, contenido_med = $contenido_med, presentaciones_med = $presentaciones_med, generalidades_med = $generalidades_med, grupo_med = $grupo_med where id_med = $id_med";

		 $update = mysqli_query($horizonte, $sql) or die (mysqli_error($horizonte));
		
	};
	////
     
    while ( $aRow = mysqli_fetch_array( $rResult ) )
    {
        $row = array();
        for ( $i=0 ; $i<count($aColumns) ; $i++ )
        { 
			if ( $aColumns[$i] == "version" ) { $row[] = ($aRow[ $aColumns[$i] ]=="0") ? '-' : $aRow[ $aColumns[$i] ]; } 
			else if ( $aColumns[$i] != ' ' ) { /* General output */ $row[] = $aRow[$i]; } }
		$row1 = array();
        for ( $j=0 ; $j<count($aColumns) ; $j++ ) { 
			if ( $aColumns[$j] == "version" ) { $row1[] = ($aRow[ $aColumns[$j] ]=="0") ? '-' : $aRow[ $aColumns[$j] ]; } 
			else if ( $aColumns[$j] != ' ' ) { $row1[] = $aRow[$j]; } }
				
		$output['aaData'][] = $row;
    }
    echo json_encode( $output );
?>