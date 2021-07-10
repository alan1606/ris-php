<?php
require("../../Connections/horizonte.php"); 
	
	$aColumns = array('e.id_e', 'e.nombre_e', 't.nombre_te', 'e.control_e', 'e.entidad_e', 'e.id_e', 'e.id_e');
	    
    // DB tables to use 
    $aTables = array( 'catalogo_escuelas e');
     
    // Indexed column (used for fast and accurate table cardinality) 
    $sIndexColumn = "e.id_e";
     
	 // Joins hasta aqui
	$sJoin = 'left join tipo_escuelas t on t.id_te = e.nivel_e ';
	 
    // CONDITIONS
    $sWhere = "where 1=1" ;
	
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
		
		$row[0]="<span>$hh</span>";
		$nombre_u = '"'.$row[1].'"';
		
		$row[1] = "<button type='button' id='$row[5]' onClick='verEscuela(this.id, $nombre_u);' class='btn btn-link btn-xs'>$row[1]</button>";
		
		mysqli_select_db($horizonte, $database_horizonte); 
		$resultC = mysqli_query($horizonte, "SELECT count(id_do) from documentos where nombre_do = 'LOGOTIPO' and tipo_quien_do = 5 and id_quien_do = $row[6]") or die (mysqli_error($horizonte));
		$rowC = mysqli_fetch_row($resultC);
		
		mysqli_select_db($horizonte, $database_horizonte); 
		$resultC1 = mysqli_query($horizonte, "SELECT ext_do, nombre_do, id_do from documentos where nombre_do = 'LOGOTIPO' and tipo_quien_do = 5 and id_quien_do = $row[6]") or die (mysqli_error($horizonte));
		$rowC1 = mysqli_fetch_row($resultC1);
		
		$typeA = '"'.$rowC1[0].'"';
		$x = md5(time()); $x = '"'.$x.'"';
		$titulo = '"'.$rowC1[1].'"';
		$carpeta = '"escuelas/logotipos"';
		$que_es = '"LOGOTIPO"';
		
		if($rowC[0]<1){//no hay logo
			$row[5] = "<div align='center'><button type='button' class='btn btn-xs btn-default' onClick='subir_logo(this.name, $nombre_u)' name='$row[6]'><i class='fa fa-image'></i></div>";
		}else{//ya hay logo
			$row[5] = "<div align='center'><button onClick='ver_logo(this.name, $nombre_u, $typeA, $x, $titulo, $carpeta,$rowC1[2], $que_es)' name='$row[6]' type='button' class='btn btn-xs btn-default'><i class='fa fa-eye'></i></button></div>";
		}
								
		$output['aaData'][] = $row;
    }
    echo json_encode( $output );
?>