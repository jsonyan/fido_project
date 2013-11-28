<!DOCTYPE html>
<html>
<head>
<title>APLAB - Gestor de <?php echo isset($mod_activo) ? $mod_activo : "prueba"?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet" media="screen">
<link href="<?php echo base_url(); ?>css/bootstrap-responsive.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>css/aplab.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>css/datepicker.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>css/lightbox.css" rel="stylesheet">

    <script src="<?php echo base_url(); ?>js/jquery-1.7.2.min.js"></script>
	<script src="<?php echo base_url(); ?>js/lightbox.js"></script>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="<?php echo base_url(); ?>js/html5shiv.js"></script>
    <![endif]-->
    <style>
        #map img {
          max-width: none;
        }
        #id_mapa img {
          max-width: none;
        }
    </style>    
 <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=API_KEY&sensor=true"
            type="text/javascript"></script><script type="text/javascript">  
    var V1 = [ -16.501059617723048 ,  	-16.511939 ,-16.506440996278066];
	var V2 = [ -68.1210708618164 , 	-68.1217422 ,  	-68.1337308883667 ];  
	var D  = ['Hans Creton Mendez' , 'Freds Berg Stone' , 'Gustavo Merida Alazan' ]; 
	var N = 3; 
	//
	function inicializar() 
	{  
		if( GBrowserIsCompatible() ) 
		{   
			var zoom = 14;
			var mapa = new GMap2(document.getElementById("id_mapa"));  
			mapa.setCenter( new GLatLng(-16.4918442500000, -68.1357059500000 ), zoom );  
			//mapa.addControl(new GSmallMapControl());
				mapa.addControl(new GMapTypeControl());  
			mapa.addControl(new GLargeMapControl());  
			//	mapa.addControl(new GScaleControl());  
			mapa.addControl(new GOverviewMapControl());  
				//
				//	function...
				//
			for( var i=0 ; i< N ; i++ ) 
			{
				var ubicacion 	= new GLatLng( V1[ i ] , V2[ i ] );  
				var descripcion = '<b>Voluntario: => ' + D[ i ] + '</b>';
				var marca		= informacion(ubicacion, descripcion);  
				mapa.addOverlay(marca);  
			}
			//
		}  
		else
		{	alert("Error su navegador no es compatible.");
		}
    }  
	//
	function informacion(ubicacion, descripcion) 
	{			
		var marca = new GMarker(ubicacion);  
		GEvent.addListener(	marca, "click", 
		function() 
		{  
			marca.openInfoWindowHtml( descripcion ); 
		} );  	
		return marca;  
	}  
</script>  
</head>
<body data-spy="scroll" data-target="#user_menu"> 
<div class="container">		
