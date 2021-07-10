<?php
	require("../../Connections/ipacs_postgres.php");
	// $aColumns = array('p.created_time', 'p.pat_name', 's.modality', 'p.pat_id', 'p.pk' );
	//$aColumns = array('created_time', 'pat_name', 'pat_sex', 'pat_id', 'pk' );
	$aColumns = array('pk', 'pat_name', 'created_time', 'pat_id', 'pk', 'pk', 'pk', 'pk', 'pk');

    // DB tables to use
    // $aTables = '"patient"';
		$sTable = "patient";

    // Indexed column (used for fast and accurate table cardinality)
    // $sIndexColumn = "pk";
		$sIndexColumn = "pk";

	 // Joins
	// $sJoin = 'left join series on series.study_fk = patient.pk ';
	// $sJoin = ' ';

    // CONDITIONS
	//if(isset($_GET['min']) && $_GET['min'] != ''){} idPacs
    // $sWhere = "1 = 1 ";
	$sWhere="WHERE created_time BETWEEN '$_GET[min]' AND '$_GET[max]'";

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
        $sLimit = "LIMIT ".intval( $_GET['iDisplayStart'] )." OFFSET ".
            intval( $_GET['iDisplayLength'] );
    }

		/*
     * Ordering
     */
    if ( isset( $_GET['iSortCol_0'] ) )
    {
        $sOrder = "ORDER BY  ";
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
		$sWhere = "WHERE created_time BETWEEN '$_GET[min]' AND '$_GET[max]'";
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
        ORDER BY created_time desc
    "; // $sOrder
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
		$hh++;
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
			$row[0]="<span>$hh</span>";

			$queryPc1 = "SELECT REPLACE(pat_name,'^',' ') from patient WHERE pk = $row[4] ";
			$resultPc1 = pg_query($ipacsp, $queryPc1) or die('La consulta fallo: ' . pg_last_error());
			$rowTC = pg_fetch_array($resultPc1, 0, PGSQL_NUM);

			$row[1] = $rowTC[0];

			$consultaIUID = "SELECT study_iuid from study where patient_fk = $row[5]";
			$queryIUID = pg_query($ipacsp, $consultaIUID) or die('La consulta fallo: ' . pg_last_error());
			$rowIUID = pg_fetch_array($queryIUID, 0, PGSQL_NUM);

			// $link = 'weasis://%24dicom%3Aget%20-w%20%22http%3A%2F%2F192.168.1.60:8080%2Fweasis-pacs-connector%2Fmanifest%3FstudyUID%3D'.$rowIUID[0].'%22';
			// $link1 = '"'.'http://192.168.1.60:8080/oviyam2/viewer.html?studyUID='.$rowIUID[0].'"';
			// $link2 = 'osirix://?methodName=downloadURL&URL=http://192.168.1.60:8080/wado?requestType=WADO&studyUID='.$rowIUID[0];

			$link = 'weasis://%24dicom%3Aget%20-w%20%22http%3A%2F%2Fcuautlaenvivo.ddns.net:8080%2Fweasis-pacs-connector%2Fmanifest%3FstudyUID%3D'.$rowIUID[0].'%22';
			$link1 = '"'.'http://cuautlaenvivo.ddns.net:8080/oviyam2/viewer.html?studyUID='.$rowIUID[0].'"';
			$link2 = 'osirix://?methodName=downloadURL&URL=http://cuautlaenvivo.ddns.net:8080/wado?requestType=WADO&studyUID='.$rowIUID[0];

			$row[5]="<div align='center'><a type='button' class='btn btn-sm btn-success' name='$row[5]' lang='$row[5]' value='$row[5]' href='$link'><i class='fa fa-eye' aria-hidden='true'></i></a></div>";
			$row[6]="<div align='center'><button type='button' class='btn btn-sm btn-success' name='$row[6]' lang='$row[6]' value='$row[6]' onClick='culo($link1)'><i class='fa fa-eye' aria-hidden='true'></i></button></div>";
			$row[7]="<div align='center'><a type='button' class='btn btn-sm btn-success' name='$row[7]' lang='$row[7]' value='$row[7]' href='$link2'><i class='fa fa-eye' aria-hidden='true'></i></a></div>";

			$consulta1 = "SELECT modality from series where study_fk = $row[8]";
			$query1 = pg_query($ipacsp, $consulta1) or die('La consulta fallo: ' . pg_last_error());
			$rowx11k = pg_fetch_array($query1, 0, PGSQL_NUM);

			$row[4] = $rowx11k[0];

			$output['aaData'][] = $row;
	}

    echo json_encode( $output );

		// Free resultset
    pg_free_result( $rResult );

    // Closing connection
    pg_close( $gaSql['link'] );
?>
