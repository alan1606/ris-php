<!DOCTYPE html>
<html lang="en">

<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
?>

<head>
	<meta charset="utf-8" />

	<meta name="description" content="RZ Viewer" />
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<meta name="theme-color" content="#000000" />
	<meta http-equiv="cleartype" content="on" />
	<meta name="MobileOptimized" content="320" />
	<meta name="HandheldFriendly" content="True" />
	<meta name="apple-mobile-web-app-capable" content="yes" />

	<!-- WEB FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Sanchez" rel="stylesheet" />

	<title>DIAGNOCONS Viewer</title>
</head>

<body>
	<noscript> You need to enable JavaScript to run this app. </noscript>

	<div id="root"></div>

  <script src="https://unpkg.com/@ohif/viewer@1.0.3/dist/index.umd.js" crossorigin></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script>
		var url = window.location.href; var sodb = url.split('://');

		if(sodb[0]=='https' || sodb[0]=='HTTPS'){
			var myL = url.split('https://'), myL1 = myL[1].split('/'), koby = myL1[0].split(':443');
			var link_1 = koby[0]; alert(link_1);
		}else{
			var myL = url.split('http://'), myL1 = myL[1].split('/'), koby = myL1[0].split(':80');
			var link_1 = koby[0]+koby[1]; //alert(myL1[0]); alert(koby[0]);
		}

    var containerId = "root";
    var componentRenderedOrUpdatedCallback = function(){
      console.log('RZ Viewer rendered/updated');
    }
    window.OHIFViewer.installViewer(
      {
      routerBasename: '/sistema/viewer.php',
      servers: {
        dicomWeb: [
          {
            name: 'DCM4CHEE',
			wadoUriRoot: 'https://localhost:8443/dcm4chee-arc/aets/DCM4CHEE/wado',
			qidoRoot: 'https://localhost:8443/dcm4chee-arc/aets/DCM4CHEE/rs',
			wadoRoot: 'https://localhost:8443/dcm4chee-arc/aets/DCM4CHEE/rs',
			qidoSupportsIncludeField: true,
			imageRendering: 'wadors',
			thumbnailRendering: 'wadors',
			requestOptions: {
				auth: 'admin:admin',
			},
          },
        ],
      },
			studyListFunctionsEnabled: true,
    // }, containerId, componentRenderedOrUpdatedCallback);
	});
	</script>
	<script>
	$(document).ready(function(){
		window.setTimeout(function(){
		$('.entry-header, .notification-bar').remove();
		},50);
		window.setTimeout(function(){
			$('.entry-header, .notification-bar').remove();
		},1500);
	});
	</script>
</body>

</html>
