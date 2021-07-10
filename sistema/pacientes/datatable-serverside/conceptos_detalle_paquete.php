<?php
require("../../Connections/horizonte.php");
require("../../funciones/php/values.php");

	$id_pq = sqlValue($_GET["id_pq"], "int", $horizonte);

	$aColumns = array('cp.id_cb', 'c.concepto_to', 'cp.id_cb', 'cp.usado_cb', 'DATE_FORMAT(cp.fecha_usado_cb, "%Y-%m-%d")', 'ac.precio_ac', 'cp.id_cb', 'cp.id_cb');
     
    // DB tables to use 
    $aTables = array( 'conceptos_paquetes cp');
     
    // Indexed column (used for fast and accurate table cardinality) 
    $sIndexColumn = "cp.id_cb";
     
	 // Joins   hasta aqui
	$sJoin = 'left join asigna_conceptos_paquetes ac on ac.id_ac = cp.id_concepto_convenio_cb left join conceptos c on c.id_to = ac.id_concepto_ac left join paquetes pq on pq.id_pq = cp.id_convenio_paciente_cb';
	 
    // CONDITIONS
	$sWhere = "where cp.id_convenio_paciente_cb = $id_pq";	
	
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
		
		if($row[3]==0){//Concepto no usado
			$disponible = 'SI';
			$check='<input class="checkis" type="checkbox" name="usar_'.$row[0].'" onClick="usar_c(this.value,this.lang,this.id)" id="usar_'.$row[0].'" lang="'.$row[5].'" value="'.$row[0].'">';
		}else{//Concepto ha sido usado
			$disponible = 'NO'; $check = '-'; $row[1] = '<div class="text-danger" style="text-decoration: line-through">'.$row[1].'</div>';
		}
		
		$row[0] = "<div align='center'>$hh</div>"; $row[2] = "<div align='center'>$row[2]</div>";
		$row[3] = '<div align="center">'.$disponible.'</div>';
		if($row[4]==null){$row[4]='No usado';} $row[4] = "<div align='center'>$row[4]</div>";
		$row[5] = "<div align='right'>$$row[5]</div>";
		$row[6] = '<div align="center">'.$check.'</div>';
		
		mysqli_select_db($horizonte, $database_horizonte);
 		$consulta1 = "SELECT distinct(id_concepto_convenio_cb) as tipo_id from conceptos_paquetes where id_convenio_paciente_cb = $id_pq";
 		$query1 = mysqli_query($horizonte, $consulta1) or die (mysqli_error($horizonte)); 
 		$row1 = mysqli_fetch_row($query1);
												
		$output['aaData'][] = $row;
		
    }
    echo json_encode( $output );
?>