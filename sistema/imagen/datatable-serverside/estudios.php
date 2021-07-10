<?php
require("../../Connections/horizonte.php");
require("../../Connections/ipacs_postgres.php");
require("../../funciones/php/values.php");

include_once '../../recursos/session.php';
include_once '../../Connections/database.php';
include_once '../../recursos/utilities.php';
include_once '../../recursos/datauser.php';

	$id_user = $_SESSION['id']; $acceso_user = $_SESSION['MM_UserGroup'];

        $consulta1 = "SELECT pk, patient_fk from study where pat_name IS NULL";
	$query1 = pg_query($ipacsp, $consulta1) or die('La consulta fallo: ' . pg_last_error());
	while ($fila = pg_fetch_array($query1, NULL, PGSQL_ASSOC)) {
		// if ( !is_numeric($fila[pat_name_fk]) or !is_numeric($fila[patient_id_fk]) ) { continue; } else{ }
		$queryPc1 = "SELECT n.given_name, n.middle_name, n.family_name, n.name_prefix, p.pat_birthdate, p.pat_sex from patient p left join person_name n on n.pk = p.pat_name_fk WHERE p.pk = $fila[patient_fk]";
		$resultPc1 = pg_query($ipacsp, $queryPc1) or die('La consulta fallo: ' . pg_last_error());
		$rowP = pg_fetch_array($resultPc1, 0, PGSQL_NUM);

		$nombre = $rowP[0];
		if( $rowP[1] != null and $rowP[1]!= '' and $rowP[1]!= '*' ){
			$nombre = $nombre.' '.$rowP[1];
			$re = "/^\\s+/m";
			$nombre = preg_replace($re, '', $nombre);
		}

		$apellido = $rowP[2];
		if( $rowP[3] != null and $rowP[3]!= '' and $rowP[3]!= '*'){
			$apellido = $apellido.' '.$rowP[3];
			$re = "/^\\s+/m";
			$apellido = preg_replace($re, '', $apellido);
		}

		if( $rowP[4] != null and $rowP[4]!= '' and $rowP[4]!= '*' ){
			$dia = substr($rowP[4], -2);
			$mes = substr($rowP[4], -4, 2);
			$anio = substr($rowP[4], 0, -4);

			// $f_nac = $dia.'/'.$mes.'/'.$anio;
			$f_nac = $rowP[4];
		}else {
			$f_nac = date('d/m/Y');
		}

		if( $rowP[5] == 'F' ){
			$sexo = 1;
		} else if( $rowP[5] == 'M' ){
			$sexo = 2;
		} else { $sexo = ''; }

		if( $nombre == null or $nombre == '' or $nombre == '*' ){
			$porciones = explode(" ", $apellido);
			$porciones1 = explode($porciones[0]." ", $apellido);
			$re = "/^\\s+/m";
			$nombre = preg_replace($re, '', $porciones1[1]);
			$apellido = preg_replace($re, '', $porciones[0]);
		} else { }

		//$apellido = '"'.$nombre.'"';
		//$nombre = '"'.$apellido.'"';

		$nombre = $apellido.' '.$nombre;

		$sqlx1 = "UPDATE patient SET pat_custom1 = '$nombre' where pat_name_fk = $fila[patient_fk]";
		$update1 = pg_query($ipacsp, $sqlx1) or die('La consulta fallo: ' . pg_last_error());

		if(!$update1) { }else { }

		$sqlx5 = "UPDATE study SET pat_name = '$nombre', pat_sex = '$sexo', pat_birthdate = '$f_nac' where pk = $fila[pk]";
		$update5 = pg_query($ipacsp, $sqlx5) or die('La consulta fallo: ' . pg_last_error());

		if(!$update5) { }else { }
	};

	$aColumns = array('v.id_vc', 'p.nombre_completo_p', 'v.referencia_vc', 'e.concepto_to', 'es.estatus_est', 'v.id_vc', 'v.id_vc', 'p.amaterno_p','a.nombre_a', 'su.clave_su', 'v.id_vc', 'x.procedencia_pr', 'v.referencia_vc', 'v.contador_vc', 'e.id_area_to', 'a.nombre_a', 'DATE_FORMAT(v.fecha_venta_vc,"%Y%m%d")', 'DATE_FORMAT(v.fecha_venta_vc,"%Y%n%d")', 'v.id_radiologo_externo', 'DATE_FORMAT(v.fecha_venta_vc,"%Y-%m-%d")', 'v.id_pacs', 'v.id_vc', 'p.id_p', 'su.nombre_su', 'v.id_concepto_es', 'v.usuario_transfiere_vc', 'DATE_FORMAT(v.fecha_transfiere_vc,"%Y-%m-%d %H:%i:%s")', 'su.id_su', 'DATE_FORMAT(v.fecha_venta_vc,"%d/%m/%Y %H:%i")', 'au.usuario_u', 'DATE_FORMAT(v.fechaEdo4_e,"%d/%m/%Y %H:%i")', 'auc.usuario_u', 'DATE_FORMAT(v.fechaEdo5_e,"%d/%m/%Y %H:%i")', 'v.estatus_vc', 'p.email_p', 'u2.email_u' );

    // DB tables to use
    $aTables = array( 'venta_conceptos v');

    // Indexed column (used for fast and accurate table cardinality)
    $sIndexColumn = "v.id_vc";

	 // Joins
	$sJoin = 'left join orden_venta o on o.referencia_ov = v.referencia_vc left JOIN pacientes p on p.id_p = v.id_paciente_vc left join conceptos e on e.id_to = v.id_concepto_es left join estatus es on es.id_est = v.estatus_vc left join areas a on a.id_a = e.id_area_to left join sucursales su on su.id_su = o.sucursal_ov left join procedencia x on x.id_pr = o.procedencia_ov left join usuarios au on au.id_u = v.usuarioEdo4_e left join usuarios auc on auc.id_u = v.usuarioEdo5_e left join usuarios u2 on u2.id_u = v.id_personal_medico_vc';

	//Si es administrador ve todo
	if($acceso_user == 1){
		if(isset($_GET['min']) && isset($_GET['max']) && $_GET['min'] != '' && $_GET['max'] != ''){
		  $sWhere="WHERE v.fecha_venta_vc BETWEEN '$_GET[min]' AND '$_GET[max]' and e.id_tipo_concepto_to = 4 and o.sucursal_ov != '' and e.dicom = 1 ";
		}else{
		  $sWhere = "WHERE e.id_tipo_concepto_to = 4 and v.temporal_vc = 0 and o.sucursal_ov != '' and e.dicom = 1 ";
		}
	}else{
		//si es multisucursal o sucursal ve todo
		if($multisucu_u != 0){
			if(isset($_GET['min']) && isset($_GET['max']) && $_GET['min'] != '' && $_GET['max'] != ''){
			  $sWhere="WHERE v.fecha_venta_vc BETWEEN '$_GET[min]' AND '$_GET[max]' and e.id_tipo_concepto_to = 4 and o.sucursal_ov != '' and e.dicom = 1 ";
			}else{
			  $sWhere = "WHERE e.id_tipo_concepto_to = 4 and v.temporal_vc = 0 and o.sucursal_ov != '' and e.dicom = 1 ";
			}
		}else{//Si es simple solo ve lo que tiene asignado $sWhere = "WHERE 1=2";
			if(isset($_GET['min']) && isset($_GET['max']) && $_GET['min'] != '' && $_GET['max'] != ''){
			  $sWhere="WHERE v.fecha_venta_vc BETWEEN '$_GET[min]' AND '$_GET[max]' and e.id_tipo_concepto_to = 4 and e.dicom = 1 and o.sucursal_ov != '' and v.id_vc in(select id_vc_as from acceso_simple where id_u_as = $id_user) ";
			}else{
			  $sWhere = "WHERE e.id_tipo_concepto_to = 4 and e.dicom = 1 and v.temporal_vc = 0 and o.sucursal_ov != '' and v.id_vc in(select id_vc_as from acceso_simple where id_u_as = $id_user) ";
			}
		}
	}
	//Vemos si el usuario es multisucursal
	mysqli_select_db($horizonte, $database_horizonte);
	$resultSu = mysqli_query($horizonte, "SELECT multisucursal_u, idSucursal_u from usuarios where id_u = '$_GET[idU]'") or die (mysqli_error($horizonte));
	$rowAU = mysqli_fetch_row($resultSu); $id_suc = sqlValue($rowAU[1], "int", $horizonte);

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
    $sOrder = "ORDER BY v.id_vc asc";
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
     //echo $sQuery;
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

		$nombreEstud = '"'.$row[3].'"';
		$referenciaE = '"'.$row[2].'"';
		$nombreP = '"'.$row[1].'"';
		$fechaEst = '"'.$row[19].'"';

		//checamos si el estudio es una masto
		mysqli_select_db($horizonte, $database_horizonte);
		$resultMa = mysqli_query($horizonte, "SELECT count(id_to) from conceptos where concepto_to like '%MASTOGRAFIA%' and id_to = '$row[24]' ") or die (mysqli_error($horizonte));
		$rowMa = mysqli_fetch_row($resultMa);

		$row[5] = "<div align='center'><button type='button' class='btn btn-xs btn-primary disabled' name='$row[22]' id='$row[10]' lang='$row[10]' value='$row[10]'><i class='fa fa-lock' aria-hidden='true'></i></button></div>";

		$row[6] = "<div align='center'><button type='button' class='btn btn-xs btn-primary disabled' name='$row[22]' id='$row[10]' lang='$row[10]' value='$row[10]'><i class='fa fa-pencil' aria-hidden='true'></i></button></div>";

		if($row[33] > 2 and $multisucu_u > 0){
			if($acceso_user==1 or $acceso_user==2 or $acceso_user==3 or $acceso_user==11){
				$row[5] = "<div align='center'><button type='button' class='btn btn-xs btn-primary' name='$row[22]' id='$row[22]' lang='$row[10]' value='$row[10]' onClick='acceso(this.lang, $nombreEstud, $referenciaE, $nombreP)'><i class='fa fa-unlock' aria-hidden='true'></i></button></div>";
			}else{ $row[5] = "-"; }
		}

		if ($row[4] == "PENDIENTE"){
			$row[4] = "<button type='button' class='btn btn-xs btn-link' name='$row[22]' id='$row[22]' lang='$row[10]' value='$row[10]' onClick='procesar(this.id, this.lang)'>PENDIENTE</button>";
		}
		if ($row[4] == "PROCESO"){
			$row[4] = "<button type='button' class='btn btn-xs btn-link' name='$row[22]' id='$row[22]' lang='$row[10]' value='$row[10]' onClick='realizar(this.id, this.lang,$row[18], $rowMa[0])'>PROCESO</button>";
		}
		if ($row[4] == "REALIZADO"){
			$row[4] = "<button type='button' class='btn btn-xs btn-link' name='$row[22]' id='$row[22]' lang='$row[10]' value='$row[10]' onClick='capturar(this.id, this.lang, $row[18], $rowMa[0],1,$row[27])'>REALIZADO</button>";
		}
		if ($row[4] == "CAPTURADO"){
			$row[4] = "<button type='button' class='btn btn-xs btn-link' name='$row[22]' id='$row[22]' lang='$row[10]' value='$row[18]' onClick='capturar(this.id, this.lang, $row[18], $rowMa[0],2,$row[27])'>CAPTURADO</button>";
		}
		if ($row[4] == "INTERPRETADO"){
			$row[4] = "<button type='button' class='btn btn-xs btn-link' name='$row[22]' id='$row[22]' lang='$row[10]' value='$row[18]' onClick='capturar(this.id, this.lang, $row[18], $rowMa[0],3,$row[27])'>INTERPRETADO</button><br>$row[29] $row[30]";

			$row[6] = "<div align='center'><button type='button' class='btn btn-xs btn-primary' name='$row[22]' id='$row[22]' lang='$row[10]' value='' onClick='editar(this.lang, $nombreEstud, $referenciaE, $nombreP)'><i class='fa fa-pencil' aria-hidden='true'></i></button></div>";
		}
		if ($row[4] == "CARGADO"){
			$row[4] = "<button type='button' class='btn btn-xs btn-link' lang='$row[10]' onClick='visualizar(this.lang, this.lang)'>CARGADO</button><br>$row[31] $row[32]";
		}

		$now1 = $row[16];

		if($row[20]=='' or $row[20]=='0k' or $row[20]=='0'){//Si no hay id de pacs
			$miRef = substr($row[12], 2); $miRef = str_replace("-","",$miRef);
			if($row[14]==55){//Si es rx
				$miRef = dechex($miRef).'k';
			}else{//Si no es rx
				$miRef = dechex($miRef.$row[13]);
			}
		}else{//Si hay id de pacs
			$miRef = $row[20];
		}

		if($miRef=='0k' or $miRef=='0'){
			$miRef = substr($row[12], 2); $miRef = str_replace("-","",$miRef);
			if($row[14]==55){//Si es rx
				$miRef = dechex($miRef).'k';
			}else{//Si no es rx
				$miRef = dechex($miRef.$row[13]);
			}
		}
		$miRef = strtoupper($miRef);
		$su_id_pacs = '"'.strtoupper($miRef).'"';

		if($row[14]==55){//Si es un RX
			//Checamos que $miRef exista en la lista de pacientes de la db del pacs
			// Realizando una consulta SQL
			$queryPc2 = "SELECT count(pk) from study where id_pacs = '$miRef' ";
			$resultPc2 = pg_query($ipacsp, $queryPc2) or die('La consulta fallo: ' . pg_last_error());
			$rowPc2 = pg_fetch_array($resultPc2, 0, PGSQL_NUM);

			$queryPc6 = "SELECT study_iuid from study where id_pacs = '$miRef' ";
			$resultPc6 = pg_query($ipacsp, $queryPc6) or die('La consulta fallo: ' . pg_last_error());
			$rowPc6 = pg_fetch_array($resultPc6, 0, PGSQL_NUM);

			$link = 'weasis://%24dicom%3Aget%20-w%20%22http%3A%2F%2F192.168.1.60:8080%2Fweasis-pacs-connector%2Fmanifest%3FstudyUID%3D'.$rowPc6[0].'%22';

			if($rowPc2[0]>0){//Hay por lo menos un estudio de la db del pacs ligado a uno de sigma
				$row[7] = "<div align='center' style='display: inline-flex;'><span name='$row[22]' id='$row[22]' lang='$row[10]' onClick='est(this.lang, this.lang, $su_id_pacs)' style='cursor:pointer;' class='text-success'><h3><u>$miRef</u></h3></span>&nbsp<button style='height: 22px;' type='button' name='$row[22]' id='$row[22]' lang='$row[10]' onClick='noest(this.lang, $nombreEstud, $nombreP, $referenciaE, $fechaEst, $su_id_pacs)' class='btn btn-xs btn-warning'><i class='fa fa-refresh' aria-hidden='true'></i></button></div>";
			}else{//No hay estudios ligados
				$row[7] = "<span name='$row[22]' id='$row[22]' lang='$row[10]' onClick='noest(this.lang, $nombreEstud, $nombreP, $referenciaE, $fechaEst, $su_id_pacs)' style='cursor:pointer;' title='Estudio no ligado al pacs!' class='text-danger'><h3><u>$miRef</u></h3></span>";
			}
			if($row[20]=='' or $row[20]=='0k' or $row[20]=='0'){//Si no tiene id de pacs venta_conceptos entonces se le guarda
				mysqli_select_db($horizonte, $database_horizonte);
				$sqlX = "UPDATE venta_conceptos SET id_pacs = $su_id_pacs where id_vc = $row[21] limit 1";
				$updateX = mysqli_query($horizonte, $sqlX) or die (mysqli_error($horizonte));//if (!$updateX) { echo $sqlX; }else{ echo 1;}
			}
		}else{ //Preguntar si los rayos se van a agrupar en el pacs
			//Checamos que $miRef exista en la lista de pacientes de la db del pacs
			$queryPc1 = "SELECT count(pk) from study where id_pacs = '$miRef' ";
			$resultPc1 = pg_query($ipacsp, $queryPc1) or die('La consulta fallo: ' . pg_last_error());
			$rowPc1 = pg_fetch_array($resultPc1, 0, PGSQL_NUM);

			if($rowPc1[0]>0){//Hay por lo menos un estudio de la db del pacs ligado a uno de sistema
				$row[7] = "<div align='center' style='display: inline-flex;'><span name='$row[22]' id='$row[22]' lang='$row[10]' onClick='est(this.lang, this.lang, $su_id_pacs)' style='cursor:pointer;' class='text-success'><h3><u>$miRef</u></h3></span>&nbsp<button style='height: 22px;' type='button' name='$row[22]' id='$row[22]' lang='$row[10]' onClick='noest(this.lang, $nombreEstud, $nombreP, $referenciaE, $fechaEst, $su_id_pacs)' class='btn btn-xs btn-warning'><i class='fa fa-refresh' aria-hidden='true'></i></button></div>";
			}else{//No hay estudios ligados
				$row[7] = "<span name='$row[22]' id='$row[22]' lang='$row[10]' onClick='noest(this.lang, $nombreEstud, $nombreP, $referenciaE, $fechaEst, $su_id_pacs)' style='cursor:pointer;' title='Estudio no ligado al pacs!' class='text-danger'><h3><u>$miRef</u></h3></span>";
			}
			if($row[20]=='' or $row[20]=='0k' or $row[20]=='0'){//Si no tiene id de pacs venta_conceptos entonces se le guarda
				mysqli_select_db($horizonte, $database_horizonte);
				$sqlX = "UPDATE venta_conceptos SET id_pacs = $su_id_pacs where id_vc = $row[21] limit 1";
				$updateX = mysqli_query($horizonte, $sqlX) or die (mysqli_error($horizonte));//if (!$updateX) { echo $sqlX; }else{ echo 1;}
			}
		}

		$row[8] = "<div style=' text-align:;'>$row[15]</div>";

		$row[9] = "<div title='$row[23]'>$row[9]</div>";

		$clave_s = '"'.$row[3].' DEL PACIENTE '.$row[1].'"';

		$queryPc5 = "SELECT count(pk) from study where id_pacs = '$miRef' ";
		$resultPc5 = pg_query($ipacsp, $queryPc5) or die('La consulta fallo: ' . pg_last_error());
		$rowPc5 = pg_fetch_array($resultPc5, 0, PGSQL_NUM);

		$referenciaPacs = $row[20];

		$idPP = sqlValue($referenciaPacs, "text", $horizonte);
		//Seleccionamos el id del paciente en la tabla patient de la DB del ipacs
	  $queryPc1v = "SELECT pk from study where id_pacs = $idPP ";
	  $resultPc1v = pg_query($ipacsp, $queryPc1v) or die('La consulta fallo1: ' . pg_last_error());
	  $rowP1v = pg_fetch_array($resultPc1v, 0, PGSQL_NUM);

	  $idPP1v = sqlValue($rowP1v[0], "int", $horizonte);

		$consultaIUID = "SELECT study_iuid from study where pk = $idPP1v";
	  $consultaIUID = pg_query($ipacsp, $consultaIUID) or die('La consulta fallo3: ' . pg_last_error());
	  $rowIUID = pg_fetch_array($consultaIUID, 0, PGSQL_NUM);

		$datoUID = '"'.strtoupper($rowIUID[0]).'"';

		if($rowPc5[0]>0){
			$row[10]="<div align='center'><button type='button' class='btn btn-xs btn-primary' name='$row[35]' lang='$row[34]' value='$row[10]' onClick='sendEmail(this.lang, this.name, $nombreEstud, $nombreP, $su_id_pacs, $datoUID)'><i class='fa fa-envelope-o' aria-hidden='true'></i></button></div>";
		} else {
			$row[10]="<div align='center'><button type='button' class='btn btn-xs btn-primary' disabled><i class='fa fa-envelope-o' aria-hidden='true'></i></button></div>";
		}

		$row[2] = "$row[2]<br>$row[28]";

		$output['aaData'][] = $row;
    }

    echo json_encode( $output );

		// Liberando el conjunto de resultados
		pg_free_result($resultPc2);
		pg_free_result($resultPc1);

		// Cerrando la conexión
		pg_close($ipacsp);
?>
