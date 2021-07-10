<?php
require("../Connections/horizonte.php"); 
require_once("../funciones/php/values.php");

	$obligatorio = 0;
	$aColumns = array('p.id_p', 'p.curp_p', 'nombre_completo_p', 'p.fNac_p', 'SUBSTRING(sx.cat_sexo, 1, 1)', 'p.tCelular_p', 's.clave_su', 'p.id_p', 'p.id_p', 'p.id_p', 's.nombre_su', 'p.id_p', 'p.id_p', 'p.id_p', 'p.id_p');
     
    // DB tables to use 
    $aTables = array( 'pacientes p');
     
    // Indexed column (used for fast and accurate table cardinality) 
    $sIndexColumn = "p.id_p";
     
	 // Joins   hasta aqui
	$sJoin = 'left join sucursales s on s.id_su = p.idSucursal_p left join catalogo_sexos sx on sx.id_sexo = p.sexo_p';
	 
    // CONDITIONS
	if(isset($_GET['nombre'])){
		if(isset($_GET['convenio']) and $_GET['convenio']!=''){
			$lista = '0';
			mysqli_select_db($horizonte, $database_horizonte);
			$consulta = "SELECT distinct(id_paciente_cvp) from convenios_paciente where id_convenio_cvp = $_GET[convenio] ";
			$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
			while ($fila = mysqli_fetch_array($query)) {
				$lista = $lista.','.$fila['id_paciente_cvp'];
			};
			$sWhere = "where p.nombre_p like '$_GET[nombre]' and p.id_p in ($lista)" ;
		}else{
			$sWhere = "where p.nombre_completo_p like '%$_GET[nombre]%' " ;	
		}
	}
	//$sWhere = "where 1=1 " ;	
	
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
    $sOrder = "ORDER BY p.id_p desc";
    if ( isset( $_GET['iSortCol_0'] ) )
    {
        $sOrder = "ORDER BY p.id_p desc ";
        for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ )
        {
            if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" )
            {
                $sOrder .= $aColumns[ intval( $_GET['iSortCol_'.$i] ) ]."
                    ".mysqli_real_escape_string( $gaSql['link'], $_GET['sSortDir_'.$i] ) .", ";
            }
        }
         
        $sOrder = substr_replace( $sOrder, "", -2 );
        if ( $sOrder == "ORDER BY" ) { $sOrder = "ORDER BY p.id_p desc"; }
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
     
    while ( $aRow = mysqli_fetch_array( $rResult ) )
    {
        $row = array();
        for ( $i=0 ; $i<count($aColumns) ; $i++ )
        {
            if ( $aColumns[$i] == "version" ) { $row[] = ($aRow[ $aColumns[$i] ]=="0") ? '-' : $aRow[ $aColumns[$i] ]; }
            else if ( $aColumns[$i] != ' ' ) { $row[] = $aRow[$i]; }			
			//para la edad
			if ($i==3){
				$fecha1 = new DateTime($row[3]); $fecha2 = new DateTime(date("Y-m-d H:i:s")); $fecha = $fecha1->diff($fecha2);
				//printf('%d AÑOS %d MESES %d DÍAS %d HORAS %d MINUTOS', $fecha->y, $fecha->m, $fecha->d, $fecha->h, $fecha->i);
				$anos=$fecha->y; $meses=$fecha->m; $dias=$fecha->d; $horas=$fecha->h; $minutos=$fecha->i; $segundos=$fecha->s;
				if($anos>0){$row[3]=$anos." AÑOS";}
				if($anos<1){
					if($meses<=2 and $meses>=1){$row[3]=$meses." MES(ES) ".$dias." DÍA(S)";}
					if($meses>=3){$row[3]=$meses." MES(ES) ";}
					if($meses==0){$row[3]=$dias." DÍA(S)";}
					if($meses==0 and $dias<=1){$row[3]=$dias." DÍA(S) ".$horas." HORA(S)";}
					if($meses==0 and $dias<1){$row[3]=$horas." HORA(S) ".$minutos." MINUTO(S)";}
				} 
				if($anos>150 or $anos<0){$row[3]="DESCONOCIDA";$obligatorio=1;}else{$obligatorio=$obligatorio;}
			}

        }
		$row1 = array();
        for ( $j=0 ; $j<count($aColumns) ; $j++ )
        {
            if ( $aColumns[$j] == "version" ) { $row1[] = ($aRow[ $aColumns[$j] ]=="0") ? '-' : $aRow[ $aColumns[$j] ]; }
            else if ( $aColumns[$j] != ' ' ) { $row1[] = $aRow[$j]; }
        }
				
		mysqli_select_db($horizonte, $database_horizonte);
		$resultRu = mysqli_query($horizonte, "SELECT count(id_ov) from orden_venta where id_paciente_ov = $row[8]") or die(mysqli_error($horizonte));
		$rowRu = mysqli_fetch_row($resultRu);
		
		//Para las membresías
		mysqli_select_db($horizonte, $database_horizonte);
		$resultMe = mysqli_query($horizonte, "SELECT m.fecha_i_me, m.fecha_f_me, DATE_FORMAT(m.fecha_i_me, '%d/%m/%Y'), DATE_FORMAT(m.fecha_f_me, '%d/%m/%Y'), DATE_FORMAT(DATE_ADD(m.fecha_f_me, INTERVAL 1 DAY), '%d/%m/%Y'), DATE_FORMAT(DATE_ADD(DATE_ADD(m.fecha_f_me, INTERVAL 1 DAY), INTERVAL 1 YEAR), '%d/%m/%Y'), DATE_ADD(m.fecha_f_me, INTERVAL 1 DAY), DATE_ADD(DATE_ADD(m.fecha_f_me, INTERVAL 1 DAY), INTERVAL 1 YEAR), c.precio_to, c.concepto_to, m.folio_me from membresias m left join conceptos c on c.id_to = m.id_membresia_me where m.id_paciente_me = $row[8] order by m.id_me desc limit 1") or die(mysqli_error($horizonte));
		$rowMe = mysqli_fetch_row($resultMe);
		
		//Costo membresía y periodo
		mysqli_select_db($horizonte, $database_horizonte);
		$resultCf = mysqli_query($horizonte, "SELECT id_cf, periodo_membresia_cf, dias_avisar_membresia_cf from configuracion order by id_cf desc limit 1") or die(mysqli_error($horizonte));
		$rowCf = mysqli_fetch_row($resultCf); $costo_m = sqlValue($rowCf[0], "int", $horizonte); $periodo_m = '"'.$rowCf[1].'"';
		
		//para contar el número de convenios
		mysqli_select_db($horizonte, $database_horizonte);
		$resultC = mysqli_query($horizonte, "SELECT count(id_cvp) from convenios_paciente where id_paciente_cvp = $row[8]") or die(mysqli_error($horizonte));
		$rowC = mysqli_fetch_row($resultC);
		
		$vars1 = $row[8].";]{".$row[2]." (".$rowRu[0].")";
 		
		$id_pa = $row[0];
		
		$row[0] = "<div style='text-align:center; text-decoration:underline;'><span lang='$vars1' onClick='historialPaciente(this.lang);' style='cursor:pointer;' >$rowRu[0]</span></div>";
		
		if($rowC[0]<1){
			$row[7] = "<div style='text-align:center;'><span id='$row[8]' lang='$row[2]' onClick='verConvenios(this.id, this.lang);' style='cursor:pointer; text-decoration:underline;' title='El paciente no cuenta con beneficios'>$rowC[0]</span></div>";
		}else{
			$lista = ''; $cont = 0;
			mysqli_select_db($horizonte, $database_horizonte);
			$consulta = "SELECT c.id_convenio_cvp, c1.convenio_cv from convenios_paciente c left join convenios c1 on c1.id_cv = c.id_convenio_cvp where c.id_paciente_cvp = $row[9] ";
			$query = mysqli_query($horizonte, $consulta) or die (mysqli_error($horizonte));
			while ($fila = mysqli_fetch_array($query)) {
				if($cont==0){$lista = $fila['convenio_cv'];}
				else{$lista = $lista.','.$fila['convenio_cv'];}
				$cont++;
			};//echo $lista;
			$row[7] = "<div style='text-align:center;'><span id='$row[8]' lang='$row[2]' onClick='verConvenios(this.id, this.lang);' style='cursor:pointer; text-decoration:underline;' title='$lista'>$rowC[0]</span></div>";
		}
		
		if($row[2]=='M'){$se = 'HOMBRE';}else{$se = 'MUJER';}
		
		$nombreP = '"'.$row[2].'"'; $mi_fecha_i = '"'.$rowMe[2].'"'; $mi_fecha_f = '"'.$rowMe[3].'"'; 
		
		$mi_fecha_r_i = $rowMe[4];
		$mi_fecha_r_f = $rowMe[5];
		$mi_fecha_r_i1 = $rowMe[6];
		$mi_fecha_r_f1 = $rowMe[7];
		$mi_fecha_r_i = '"'.$mi_fecha_r_i.'"'; $mi_fecha_r_f = '"'.$mi_fecha_r_f.'"';
		$mi_fecha_r_i1 = '"'.$mi_fecha_r_i1.'"'; $mi_fecha_r_f1 = '"'.$mi_fecha_r_f1.'"';
		
		$visitaP = '"'.$row[2].' - '.$row[3].' '.$se.'"';
		
		$nombreMe = '"'.$rowMe[9].'"'; $folioMe = '"'.$rowMe[10].'"';
		
		$row[2] = "<span id='$row[11]' onClick='verPaciente(this.id);' style='cursor:pointer; text-decoration:underline;' >$row[2]</span>";
		
		$row[4] = "<div style='text-align:center;'>$row[4]</div>";
		
		$tituloSu = $row[10];
		$row[6] = "<span title='$tituloSu'>$row[6]</span>";
		
		$row[8] = "<div align='center'><button onClick='nuevaVisita(this.id, $visitaP);' id='$row[9]' class='btn btn-info btn-sm' title=''><i class='fa fa-cart-plus' aria-hidden='true'></i> </button></div>";
		
		$row[9] = "<div align='center'><button onClick='formatos(this.id, $nombreP)' id='$row[11]' class='btn btn-primary btn-sm' title=''><i class='fa fa-file-text-o' aria-hidden='true'></i> </button></div>";
		
		$row[10] = "<button onClick='documentos(this.id, $nombreP)' id='$row[11]' class='btn btn-default btn-sm' title=''><i class='fa fa-files-o' aria-hidden='true'></i> </button>";
		
		$row[11] = "<button onClick='eventos(this.id, $nombreP)' id='$row[11]' class='btn btn-default btn-sm' title=''><i class='fa fa-calendar-o' aria-hidden='true'></i> </button>";
		
		$row[12] = "<div align='center'><button class='btn btn-default btn-sm' onClick='ubicacion(this.name, $nombreP)' name='$row[12]' lang='$row[3]' title=''><i class='fa fa-street-view' aria-hidden='true'></i> </button></div>";
		
		$row[13] = "<div align='center'><button class='btn btn-default btn-sm' onClick='expediente(this.name, $nombreP)' name='' lang='' title=''><i class='fa fa-address-book' aria-hidden='true'></i> </button></div>";
		
		if($rowMe){
			//Tiene membresía, checar si está normal, si está en periodo de renovación o si ya está vencida: verde, naranja y rojo
			mysqli_select_db($horizonte, $database_horizonte);
			$resultMe1 = mysqli_query($horizonte, "SELECT DATEDIFF(fecha_f_me, CURRENT_DATE), DATEDIFF(CURRENT_DATE, fecha_f_me) from membresias where id_paciente_me = $id_pa order by id_me desc limit 1") or die(mysqli_error($horizonte)); $rowMe1 = mysqli_fetch_row($resultMe1);
			
			if($rowMe1[0] > $rowCf[2]){//Normal 1
				$row[14] = "<div align='center'><button class='btn btn-success btn-sm' onClick='membresia($id_pa, $nombreP, 1, $mi_fecha_i, $mi_fecha_f,0,0,0,0,0,$folioMe)'><i class='fa fa-address-card' aria-hidden='true'></i> </button></div>";
			}else if($rowMe1[0] >= 0 and $rowMe1[0]<= $rowCf[2]){//Renovación 2
				$row[14] = "<div align='center'><button class='btn btn-warning btn-sm' onClick='membresia($id_pa, $nombreP, 2, $rowMe[8], $periodo_m, $mi_fecha_r_i, $mi_fecha_r_f, $mi_fecha_r_i1, $mi_fecha_r_f1, $nombreMe, $folioMe, $rowMe1[1], $mi_fecha_f)'><i class='fa fa-address-card' aria-hidden='true'></i> $rowMe1[0] Días</button></div>";
			}else{//Vencida 3
				$row[14] = "<div align='center'><button class='btn btn-danger btn-sm' onClick='membresia($id_pa, $nombreP, 3, $rowMe[8], $periodo_m, $mi_fecha_r_i, $mi_fecha_r_f, $mi_fecha_r_i1, $mi_fecha_r_f1, $nombreMe, $folioMe, $rowMe1[1], $mi_fecha_f)'><i class='fa fa-address-card' aria-hidden='true'></i> </button></div>";
			}
		}else{//Nunca ha tenido membresía 0
			$row[14] = "<div align='center'><button class='btn btn-default btn-sm' onClick='membresia($id_pa, $nombreP, 0, 0, $periodo_m)'><i class='fa fa-address-card' aria-hidden='true'></i> </button></div>";
		}
		
		$output['aaData'][] = $row;
		
    }
    echo json_encode( $output );
?>
<?php
echo "<mm:dwdrfml documentRoot=" . __FILE__ .">";$included_files = get_included_files();foreach ($included_files as $filename) { echo "<mm:IncludeFile path=" . $filename . " />"; } echo "</mm:dwdrfml>";
?>