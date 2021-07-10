<?php //guard(); para cerrar la sisión por inactividad
	if((isset($_SESSION['MM_Username']) || isCookieValid($db))){ //echo 'bienvenido';
	}else{ echo "<script> window.location.href = 'login.php'; </script>"; }
?>
<body class="fixed-sidebar full-height-layout pace-done mini-navbar" style="overflow:hidden;"> <!-- class="mini-navbar" -->
<input name="id_user" id="id_user" type="hidden" value="<?php echo $_SESSION['id']; ?>">
<input name="acc_user" id="acc_user" type="hidden" value="<?php echo $_SESSION['MM_UserGroup']; ?>">
<input name="sucu_user" id="sucu_user" type="hidden" value="<?php echo $_SESSION['MM_Usersucu']; ?>">

<?php
	mysqli_select_db($horizonte, $database_horizonte);
	$resultS=mysqli_query($horizonte, "SELECT sexo_u from usuarios where id_u = '$_SESSION[id]' limit 1") or die (mysql_error($horizonte));
	$rowS = mysqli_fetch_row($resultS);
?>

<div id="referencia" style="display:none; position:fixed; width:100%; height:100%; z-index:1000000000000000000000;"></div>

<nav id="mi_barra_menu" class="navbar-inverse navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">

            <li class="nav-header" id="nav-header">
                <div class="dropdown profile-element" align="center">
                    <span>
                    	<?php if($rowS[0]==2){?>
                    		<img alt="image" class="img-circle" src="imagenes/user_profile_male.png" width="70px" height="70px"/>
                        <?php }else{ ?>
                        	<img alt="image" class="img-circle" src="imagenes/user_profile_female.png" width="70px" height="70px"/>
                        <?php } ?>
                    </span>
                    <span class="clear text-center" style="color:#2f3686;">
                    	<span class="block m-t-xs"> <strong class="font-bold"><?php echo $nombre_usuario; ?></strong> </span>
                     	<span class="text-muted text-xs block" style="color:rgba(47,54,134,0.8)"><?php echo $puesto_usuario; ?></span>
                    </span>
                </div>
                <div id="my_home" class="logo-element" style="color:#ff6633; text-shadow:0px 0px 0px #000000;">
                	<img id="go_home" style="cursor:pointer;" src="imagenes/empresa/brand.png" width="68px" />
                </div>
            </li>

            <li class="active">
                <a href="index.php" id="m_home"> <i class="fa fa-home"></i> <span class="nav-label">HOME</span> </a>
            </li>
            <li class=""> <!--class="active" -->
                <a href="" id="m_recepcion">
                    <i class="fa fa-address-book"></i> <span class="nav-label">RECEPCIÓN</span><span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li class=""><a href="pacientes.php" id="m_r_pacientes"><i class="fa fa-users"></i> PACIENTES</a></li>
					<li>
                        <a href="#"><i class="fa fa-dollar"></i> CORTE DE CAJA <span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level collapse">
                            <li style="white-space:nowrap;"><a href="ordenes_venta_r.php"><i class="fa fa-shopping-cart"></i> ÓRDENES DE VENTA</a></li>
                            <li style="white-space:nowrap;"><a href="pagos_usuario_r.php"><i class="fa fa-dollar"></i> PAGOS</a></li>
							<li style="white-space:nowrap;"><a href="resumen_cc_r.php"><i class="fa fa-dollar"></i> RESUMEN</a></li>
                        </ul>
                    </li>
                    <li><a href="agenda.php"><i class="fa fa-calendar"></i> AGENDA</a></li>
                    <!-- <li style="white-space:nowrap;"><a href="membresias.php"><i class="fa fa-address-card"></i> MEMBRESÍAS</a></li>
                    <li style="white-space:nowrap;"><a href="productividad_rec.php"><i class="fa fa-line-chart"></i> PRODUCTIVIDAD</a></li> -->
                </ul>
            </li>
            <?php if($_SESSION['MM_UserGroup']!=14){ ?>
            <!-- <li>
                <a href="#">
                    <i class="fa fa-stethoscope"></i> <span class="nav-label">CONSULTAS</span><span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li style="white-space:nowrap;"><a href="consultas.php"><i class="fa fa-user-md"></i> CONSULTAS MÉDICAS</a></li>
                    
                    <li><a href="catalogo_consultas.php"><i class="fa fa-list-ol"></i> CATÁLOGO</a></li>
					<li><a href="productividad_cst.php"><i class="fa fa-list-alt"></i> PRODUCTIVIDAD</a></li>
                </ul>
            </li> -->
           <!-- <li>
                <a href="#"><i class="fa fa-thermometer-half"></i><span class="nav-label">ENFERMERÍA</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li style="white-space:nowrap;"><a href="ficha_enfermeria.php"><i class="fa fa-heartbeat"></i> FICHA ENFERMERÍA</a></li>
                    <li><a href="camas.php"><i class="fa fa-bed"></i> HOJA HOSPITALIZACIÓN</a></li>
										<li><a href="enfermeria.php"><i class="fa fa-thermometer-half"></i> ENFERMERÍA</a></li>
										<li><a href="catalogo_antecedentes.php"><i class="fa fa-list-ol"></i> CATÁLOGO ANTECEDENTES</a></li>
										<li><a href="catalogo_vacunas.php"><i class="fa fa-list-ol"></i> CATÁLOGO VACUNAS</a></li>
										<li style="white-space:nowrap;"><a href="reporte_diario.php"><i class="fa fa-list-ol"></i> REPORTE DIARIO</a></li>
                </ul>
            </li>
            <!--<li>
                <a href="#"><i class="fa fa-hospital-o"></i> <span class="nav-label">HOSPITAL</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li style="white-space:nowrap;"><a href="hospitalizacion.php"><i class="fa fa-heartbeat"></i> HOSPITALIZACIÓN</a></li>
                    
                    <li><a href="camas.php"><i class="fa fa-bed"></i> CAMAS</a></li>
                </ul>
            </li> -->
            <li>
                <a href="#"><i class="fa fa-file-image-o"></i> <span class="nav-label">IMAGEN</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li style="white-space:nowrap;"><a href="imagen.php"><i class="fa fa-id-badge"></i> IMAGENOLOGÍA</a></li>
                    <!--<li><a href="endoscopia.php"><i class="fa fa-user-md"></i> ENDOSCOPÍA</a></li>
                    <li><a href="ultrasonido.php"><i class="fa fa-user-md"></i> ULTRASONIDO</a></li>
                    <li><a href="colposcopia.php"><i class="fa fa-user-md"></i> COLPOSCOPÍA</a></li>-->
                    <li><a href="catalogo_imagen.php"><i class="fa fa-list-ol"></i> CATÁLOGO</a></li>
					<li><a href="productividad_img.php"><i class="fa fa-list-alt"></i> PRODUCTIVIDAD</a></li>
                </ul>
            </li>
            <?php } ?>
	    <!--
            <li>
                <a href="#">
                    <i class="fa fa-flask"></i> <span class="nav-label">LABORATORIO</span><span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="laboratorio.php"><i class="fa fa-address-book"></i> ESTUDIOS</a></li>
                    <?php if($_SESSION['MM_UserGroup']!=14){ ?>
                    <li style="white-space:nowrap;"><a href="bases_lab.php"><i class="fa fa-sitemap"></i> BASES</a></li>
                    <li><a href="bitacora_lab.php"><i class="fa fa-list"></i> BITÁCORAS</a></li>
                    <li><a href="catalogo_laboratorio.php"><i class="fa fa-list-ol"></i> CATÁLOGO</a></li>
					<li><a href="productividad_lab.php"><i class="fa fa-list-alt"></i> PRODUCTIVIDAD</a></li>
                    <?php } ?>
                </ul>
            </li>
            <?php if($_SESSION['MM_UserGroup']!=14){ ?>
            <li>
                <a href="#"><i class="fa fa-plus-square"></i><span class="nav-label"> SERVICIOS</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li style="white-space:nowrap;"><a href="servicios.php"><i class="fa fa-user-md"></i> SERVICIOS MÉDICOS</a></li>
                    <li><a href="catalogo_servicios.php"><i class="fa fa-list-ol"></i> CATÁLOGO</a></li>
					<li><a href="productividad_ser.php"><i class="fa fa-list-alt"></i> PRODUCTIVIDAD</a></li>
                </ul>
            </li>

            <li>
                <a href="#"> <i class="fa fa-medkit"></i> <span class="nav-label">FARMACIA</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level collapse">
                    <li style="white-space:nowrap;"><a href="#"><i class="fa fa-credit-card"></i> PUNTO DE VENTA</a></li>
                    <li style="white-space:nowrap;"><a href="catalogo_medicamentos.php"><i class="fa fa-medkit"></i> MEDICAMENTOS</a></li>
                    <li><a href="catalogo_productos.php"><i class="fa fa-product-hunt"></i> PRODUCTOS</a></li>
                    <li style="white-space:nowrap;"><a href="#"><i class="fa fa-dollar"></i> CORTE DE CAJA</a></li>
                    <li><a href="#"><i class="fa fa-stack-exchange"></i> STOCK</a></li>
					<li><a href="productividad_far.php"><i class="fa fa-list-alt"></i> PRODUCTIVIDAD</a></li>
                </ul>
            </li>
			<li>
                <a href="pacientes_ece.php" id="m_ece"> <i class="fa fa-folder"></i> <span class="nav-label">EXPEDIENTE CLÍNICO</span> </a>
            </li> -->
			<li>
                <a href="#"> <i class="fa fa-usd"></i> <span class="nav-label">GASTOS VARIOS</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level collapse">
                    <li style="white-space:nowrap;"><a href="gastos.php"><i class="fa fa-money"></i> GASTOS</a></li>
                    <li><a href="catalogo_gastos.php"><i class="fa fa-list-ol"></i> CATÁLOGO</a></li>
					<li><a href="productividad_gastos.php"><i class="fa fa-list-alt"></i> REPORTE</a></li>
                </ul>
            </li>
            <li>
                <a href="#"> <i class="fa fa-lock"></i> <span class="nav-label">ADMINISTRACIÓN</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level collapse">
					<li style="white-space:nowrap;"><a href="usuarios.php"><i class="fa fa-users"></i> USUARIOS</a></li>
                    <?php if($_SESSION['MM_UserGroup']==1){ ?>
                    <li><a href="sucursales.php"><i class="fa fa-building"></i> SUCURSALES</a></li>
					<!--<li>
                        <a href="#"><i class="fa fa-address-card"></i> MEMBRESÍAS <span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level collapse">
                            <li style="white-space:nowrap;"><a href="catalogo_membresias.php"><i class="fa fa-list-ol"></i> CATÁLOGO</a></li>
                            <li style=""><a href="#"><i class="fa fa-list-alt"></i> PRODUCTIVIDAD POR USUARIO</a></li>
							<li style=""><a href="#"><i class="fa fa-list-alt"></i> PRODUCTIVIDAD POR MEMBRESÍA</a></li>
                        </ul>
                    </li>
					<li>
                        <a href="#"><i class="fa fa-gift"></i> PAQUETES <span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level collapse">
                            <li style="white-space:nowrap;"><a href="catalogo_paquetes.php"><i class="fa fa-list-ol"></i> CATÁLOGO</a></li>
                            <li style=""><a href="#"><i class="fa fa-list-alt"></i> PRODUCTIVIDAD POR USUARIO</a></li>
							<li style=""><a href="#"><i class="fa fa-list-alt"></i> PRODUCTIVIDAD POR PAQUETE</a></li>
                        </ul>
                    </li> -->
                    <!--li style="white-space:nowrap;"><a href="escuelas.php"><i class="fa fa-university"></i> ESCUELAS</a></li-->
					<li>
                        <a href="#"><i class="fa fa-dollar"></i> CORTE DE CAJA <span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level collapse">
                            <li style="white-space:nowrap;"><a href="ordenes_venta_a.php"><i class="fa fa-shopping-cart"></i> ÓRDENES DE VENTA</a></li>
                            <li style="white-space:nowrap;"><a href="pagos_usuario_a.php"><i class="fa fa-dollar"></i> PAGOS</a></li>
							<li style="white-space:nowrap;"><a href="resumen_cc.php"><i class="fa fa-dollar"></i> RESUMEN</a></li>
                        </ul>
                    </li>
                    <!--<li><a href="formatos.php"><i class="fa fa-book"></i> FORMATOS</a></li>
                    <li>
                        <a href="#"><i class="fa fa-list-alt"></i> CATÁLOGOS <span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level collapse">
                            <li><a href="unidades_medida.php"><i class="fa fa-thermometer-half"></i> UNIDADES DE MEDIDA</a></li>
                        </ul>
                    </li>-->
                    <li><a href="configuracion.php"><i class="fa fa-cog"></i> CONFIGURACIÓN</a></li>
                    <?php } ?>
                </ul>
            </li>
            <?php } ?>
        </ul>

    </div>
</nav>

<div id="page-wrapper" class="gray-bg">
<div class="row border-bottom" id="my_nav">
    <nav id="navcit" class="navbar navbar-inverse" role="navigation" style="margin-bottom:0;">
        <div class="navbar-header navbar-inverse" style="padding-top:2px; margin-left:15px;">
            <button id="menu_button_primary" class="navbar-minimalize minimalize-styl-2 btn btn-primary btn-sm" href="#" >MENÚ<!--<img style=" margin-top:-3px;" src="imagenes/empresa/logo_h.png" width="50px" />--> <i class="fa fa-bars fa-lg"></i> </button>
            <form role="search" class="navbar-form-custom" method="post" action="#" id="my_search">
                <div class="form-group">
                    <input type="text" placeholder="Buscar..." class="form-control" style="color:white;" name="top-search" id="top-search">
                </div>
            </form>
        </div>
        <ul class="nav navbar-top-links navbar-right navbar-inverse" style="float:right;">
            <span class="dropdown">
                <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="border:none; font-weight:bold;">
                <i class="fa fa-user-md"></i> <span><?php echo $usuario_usuario; ?></span>
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <!-- <li><a href="usuarios.php?id_user=<?php echo base64_encode("encodeuserid$_SESSION[id]"); ?>"><i class="fa fa-user-circle"></i> Profile</a></li> -->
                <li><a href="#" id="mi_chat"><i class="fa fa-commenting-o" aria-hidden="true"></i> Chat</a></li>
				<li class="hidden">
					<!-- BEGIN PHP Live! HTML Code [V3] -->
					<span style="color: #0000FF; text-decoration: underline; cursor: pointer;" id="phplive_btn_1570684084"></span>
					<!-- END PHP Live! HTML Code [V3] -->
				</li>
                <li role="separator" class="divider"></li>
                <li><a href="logout.php" ><i class="fa fa-sign-out"></i> Logout</a></li>
              </ul>
            </span>
            <li> <a href="#" style="cursor:default" class="" data-toggle=""> &nbsp;</a> </li>
        </ul>

    </nav>
</div>

<!-- BEGIN PHP Live! HTML Code [V3] -->
<script data-cfasync="false" type="text/javascript">

(function() {

var phplive_href = encodeURIComponent( location.href ) ;
var phplive_e_1570684084 = document.createElement("script") ;
phplive_e_1570684084.type = "text/javascript" ;
phplive_e_1570684084.async = true ;
phplive_e_1570684084.src = "//horizonte-medica.com.mx/phplive/js/phplive_v2.js.php?v=0|1570684084|0|&r="+phplive_href ;
document.getElementById("phplive_btn_1570684084").appendChild( phplive_e_1570684084 ) ;
if ( [].filter ) { document.getElementById("phplive_btn_1570684084").addEventListener( "click", function(){ phplive_launch_chat_0(); } ) ; } else { document.getElementById("phplive_btn_1570684084").attachEvent( "onclick", function(){ phplive_launch_chat_0(); } ) ; }
})() ;

$('#mi_chat').click(function(){ $('#phplive_btn_1570684084').click(); });

</script>
<!-- END PHP Live! HTML Code [V3] -->

    <!--Contenido -->
    <div id="container" class="container-fluid row wrapper wrapper-content animated fadeInLeft" style="border:1px none red; padding:2px 2px 2px 2px; margin-left:0px; margin-right:0px; margin-top:0px; overflow:hidden;">
    <div style="border:1px none red; padding-bottom: 5px" class="text-danger"><ol class="breadcrumb" style="background-color:transparent; font-weight:;" id="breadc"></ol></div>
    <!--Contenido -->
