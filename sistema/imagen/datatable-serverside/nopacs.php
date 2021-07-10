<?php
	require("../../Connections/ipacs_postgres.php");
	$aColumns = array("created_time", "pat_name", "pk", "id_pacs", "pk", "pk", "pk", "pk", "study_id", "study_iuid");

		$sTable = "study";

		$sIndexColumn = "pk";

    $sWhere = "1 = 1";

    /* Database connection information */
    $gaSql['user']       = $username_ipacs;
    $gaSql['password']   = $password_ipacs;
    $gaSql['db']         = $database_ipacs;
    $gaSql['server']     = $hostname_ipacs;

		$gaSql['link'] =  pg_connect("host=".$gaSql['server']." dbname=".$gaSql['db']." user=".$gaSql['user']." password=".$gaSql['password'])
		    or die('No se ha podido conectar: ' . pg_last_error());

		/*
     * Paging
     */
		 $sLimit = "";
 	    if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
 	    {
 	        $sLimit = "LIMIT ".intval( $_GET['iDisplayLength'] )." OFFSET ".
 	            intval( $_GET['iDisplayStart'] );
 	    }

		/*
     * Ordering
     */
		 $sOrder = "ORDER BY pk desc ";
 		if ( isset( $_GET['iSortCol_0'] ) )
 		{
 			$sOrder = "ORDER BY pk desc ";
 			for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ )
 			{
 				if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" )
 				{
 					$sOrder .= $aColumns[ intval( $_GET['iSortCol_'.$i] ) ]."
 						".($_GET['sSortDir_'.$i]==='asc' ? 'asc' : 'desc').", ";
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
		$sWhere = "";
		if ( $_GET['sSearch'] != "" )
		{
			$sWhere = "WHERE (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				if ( $_GET['bSearchable_'.$i] == "true" )
				{
					$sWhere .= $aColumns[$i]." ILIKE '%".pg_escape_string( $_GET['sSearch'] )."%' OR ";
				}
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ")";
		}

    /* Individual column filtering */
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
	{
		if ( $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' )
		{
			if ( $sWhere == "" )
			{
				$sWhere = "WHERE ";
			}
			else
			{
				$sWhere .= " AND ";
			}
			$sWhere .= $aColumns[$i]." ILIKE '%".pg_escape_string($_GET['sSearch_'.$i])."%' ";
		}
	}

    /* * SQL queries * Get data to display */
		$sQuery = "
			SELECT ".str_replace(" , ", " ", implode(", ", $aColumns))."
			FROM   $sTable
			$sWhere
			$sOrder
			$sLimit
		";
		$rResult = pg_query( $gaSql['link'], $sQuery ) or die(pg_last_error());

		$sQuery = "
			SELECT $sIndexColumn
			FROM   $sTable
		";
		$rResultTotal = pg_query( $gaSql['link'], $sQuery ) or die(pg_last_error());
		$iTotal = pg_num_rows($rResultTotal);
		pg_free_result( $rResultTotal );

		if ( $sWhere != "" )
		{
			$sQuery = "
				SELECT $sIndexColumn
				FROM   $sTable
				$sWhere
			";
			$rResultFilterTotal = pg_query( $gaSql['link'], $sQuery ) or die(pg_last_error());
			$iFilteredTotal = pg_num_rows($rResultFilterTotal);
			pg_free_result( $rResultFilterTotal );
		}
		else
		{
			$iFilteredTotal = $iTotal;
		}

    /* * Output */
		$output = array(
			"sEcho" => intval($_GET['sEcho']),
			"iTotalRecords" => $iTotal,
			"iTotalDisplayRecords" => $iFilteredTotal,
			"aaData" => array()
		);

	$hh=0;

	while ( $aRow = pg_fetch_array($rResult, null, PGSQL_ASSOC) )
	{
		$row = array();

		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
			if ( $aColumns[$i] == 'pk' )
			{
				/* Special output formatting for 'ID' column */
				$row[] = ($aRow[ $aColumns[$i] ]=="0") ? '-' : $aRow[ $aColumns[$i] ];
			}
			else if ( $aColumns[$i] != ' ' )
			{
				/* General output */
				$row[] = $aRow[ $aColumns[$i] ];

			}
		}

			$queryPc1 = "SELECT REPLACE(pat_name,'^',' ') from study WHERE pk = $row[4] ";
			$resultPc1 = pg_query($ipacsp, $queryPc1) or die('La consulta fallo: ' . pg_last_error());
			$rowTC = pg_fetch_array($resultPc1, 0, PGSQL_NUM);

			$queryPc2 = "SELECT se.modality, se.body_part from study s left join series se on se.study_fk = s.pk WHERE s.pk = $row[5] ";
			$resultPc2 = pg_query($ipacsp, $queryPc2) or die('La consulta fallo: ' . pg_last_error());
			$rowTC1 = pg_fetch_array($resultPc2, 0, PGSQL_NUM);

			// $row[1] = $rowTC[0];
			// $row[0] = "<div lang='$row[4]'>$row[0]</div>";

			$row[2] = $rowTC1[0].'/'.$rowTC1[1];

			$row[4] = "<div align='center'><button type='button' class='btn btn-xs btn-info' name='$row[6]' id='$row[8]' lang='$row[9]' onClick='previsualiza(this.lang)'><i class='fa fa-eye' aria-hidden='true'></i></button></div>";

			$output['aaData'][] = $row;
	}

    echo json_encode( $output );

		// Free resultset
    pg_free_result( $rResult );

    // Closing connection
    pg_close( $gaSql['link'] );
?>
