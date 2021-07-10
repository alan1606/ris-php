<?php
require("../../../Connections/horizonte.php");

include_once '../../../recursos/session.php';
include_once '../../../Connections/database.php';
include_once '../../../recursos/utilities.php';

	$id_user = $_SESSION['id']; $acceso_user = $_SESSION['MM_UserGroup'];
	
	$aColumns = array('c.id_to', 'c.concepto_to', 'a.nombre_a', 'c.dias_entrega_to', 'c.precio_to','c.precio_urgencia_to', 'c.precio_m','c.precio_mu', 'u.usuario_u','c.id_to', 'c.aleatorio_c', 'DATE_FORMAT(c.fecha_to,"%d/%m/%Y %H:%i")');
	    
    // DB tables to use 
    $aTables = array( 'conceptos c');
     
    // Indexed column (used for fast and accurate table cardinality) 
    $sIndexColumn = "c.id_to";
     
	 // Joins hasta aqui
	$sJoin = 'left join areas a on a.id_a = c.id_area_to left join usuarios u on u.id_u = c.usuario_to';
	 
    // CONDITIONS
    $sWhere = "where c.id_tipo_concepto_to = 3 and c.concepto_to not like '%BIOMETRIA HEMATICA EN%' " ;
	
    /* Database connection information */
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
        if ( $sOrder == "ORDER BY" ){ $sOrder = ""; }
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
            if ( $sWhere == "" ) { $sWhere = "WHERE "; }else { $sWhere .= " AND "; }
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
		
		$row[0]="<span>$hh</span>";
		
		if($_GET['accesoU']==1){
			$row[1]= "<span class='text-info' style='cursor:pointer; text-decoration:underline;' lang='$row[10]' id='$row[9]' onClick='fichaEstudio(this.id, this.lang);'>$row[1]</span>";
			
			$row[3]="<input type='text' class='form-control input-sm dias_i' value='$row[3]' style='width:40px; text-align:right;' lang='$row[9]'>";
			$row[4]="<input type='text' class='form-control input-sm precio_p_i' value='$row[4]' style='width:75px; text-align:right;' lang='$row[9]'>";
			$row[5]="<input type='text' class='form-control input-sm precio_p_u_i' value='$row[5]' style='width:75px; text-align:right;' lang='$row[9]'>";
			$row[6]="<input type='text' class='form-control input-sm tabu_m_i' value='$row[6]' style='width:75px; text-align:right;' lang='$row[9]'>";
			$row[7]="<input type='text' class='form-control input-sm tabu_m_u_i' value='$row[7]' style='width:75px; text-align:right;' lang='$row[9]'>";
			
		}else{ $row[1]="<span id='$row[6]'>$row[1]</span>"; }
		
		$row[8]="<div align='center'>$row[8]<br>$row[11]</div>";
										
		$output['aaData'][] = $row;
    }
    echo json_encode( $output );
?>