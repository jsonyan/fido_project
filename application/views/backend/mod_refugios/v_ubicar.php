<div class="span10 boxBorder spacer"><!-- PANEL -->
	
	<div class="navbar">
		<div class="navbar-inner">
		<div class="container">
			<a class="brand">Gestor de refugios</a>

			<!--INICIO//  BARRA DE HERRAMIENTAS -->
			<?php 
			$atrib_buscar = array('name'=>'busqueda','id'=>'busqueda','method'=>'post','class'=>'navbar-form pull-right form-search');
			echo form_open('backend/mod_historial_medico/ver_todos',$atrib_buscar);
                        ?>
					<div class="btn-group">										
						<a href="<?php echo base_url()."index.php/backend/mod_refugios/inicio"?>" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Nueva Donaci�n">
							<i class="icon-th icon-white"></i> Ver mapa de refugios</a> 
						<a href="<?php echo base_url()."index.php/backend/mod_refugios/ubicar"?>" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Nueva Donaci�n">
							<i class="icon-map-marker icon-white"></i> Ubicar refugio</a> 
					</div>
				<div class="input-append pull-right" style="margin-left:5px;">
<!--				<input name="clave" type="text" class="input-small search-query" placeholder="Palabra clave">
				<button type="submit" class="btn btn-primary"><i class="icon-filter icon-white"></i>&nbsp;Filtrar</button>
-->				</div>
			</form>	
			<!--END//  BARRA DE HERRAMIENTAS -->

		</div>	<!--Container-->
		</div><!--Navbar inner-->
	</div><!--Navbar-->
	
	<!--Inner Container	-->
	<div class="spacer" id="box-contenido">
    <div class="row">
		<div class="span10">
			<!--INICIO//  
			##############################################################
			PANEL PRINCIPAL---COPIA TODO TU CODIGO DENTRO DEL DIV SPAN 10
			##############################################################
			-->
			<h4 class="well well-small span9" style="display:block; clear:both;">
                           Posiciona los refugios <small> temporales</small>
			</h4>
				
<form name="form_mapa" action="#" onSubmit=" showAddress(this.address.value, this.zoom.value=parseFloat(this.zoom.value)); return false">
		
		<p align="center" style="font-size: 10px;font-family: verdana;font-weight: bold;">
                    Direcci&oacute;n a buscar: 
			<input type="text" name="address" value="" style="width: 400px;font-size: 10px;font-family: verdana;font-weight: bold;" />

			<input type="hidden" size="1" name="zoom" value=15 />

			<input class="btn btn-primary" type="submit" value="Ver" />	
		</p>
        <p align="center" style="font-size: 10px;font-family: verdana;font-weight: bold;">
			Coordenadas: 
			<input type="text" name="coordenadas" value="" style="width: 400px;font-size: 10px;font-family: verdana;font-weight: bold;" />
        </p>

</form>
<div id="map" style="width:95%; height: 625px; margin: 0px auto">      

</div>  

                        <!--FIN//  
			##############################################################
			PANEL PRINCIPAL---COPIA TODO TU CODIGO DENTRO DEL DIV SPAN 10
			##############################################################
			-->
		</div>



		
    </div>	

	</div><!--Cerrarndo box-perfiles-->			
</div><!--Cerrarndo CELDA PANEL-->

	<!--INICIO// CARGA SCRIPTS -->
<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false&amp;key=ABQIAAAAHhzikxCQyRAS8ryQoB75mRT2yXp_ZAY8_ufC3CFXhHIE1NvwkxQiqBRnE1Iky5sZfKGxzYbUanZ0HA" type="text/javascript"></script>  
<script type="text/javascript">  
    
	// Inicialización de variables.
    var map      = null;
    var geocoder = null;

    function load() 
	{                                      	// Abre LLAVE 1.
		if( GBrowserIsCompatible() ) 		// Abre LLAVE 2.
		{		
			var zoom = 14;
			map = new GMap2(document.getElementById("map"));
			
			map.setCenter(new GLatLng(-16.4918442500000, -68.1357059500000), zoom ); 
			//	map.addControl(new GSmallMapControl());
			map.addControl(new GMapTypeControl());
			map.addControl(new GLargeMapControl());
			map.addControl(new GOverviewMapControl());

			geocoder = new GClientGeocoder();

			//---------------------------------//
			//   MARCADOR AL HACER CLICK
			//---------------------------------//
			GEvent.addListener( map, "click",
				function(marker, point) 
				{
					if( marker ) 
					{	null;
					} 
					else 
					{
						map.clearOverlays();
						var marcador = new GMarker(point);
						map.addOverlay(marcador);
						document.form_mapa.coordenadas.value = point.y+","+point.x;
					}
				}
			);
			//---------------------------------//

		} 		// Cierra LLAVE 1.
	}   		// Cierra LLAVE 2.

		//---------------------------------//
		//           GEOCODER
		//---------------------------------//
		function showAddress(address, zoom) 
		{
			if (geocoder) 
			{
				geocoder.getLatLng(address,
					function(point) 
					{
						if (!point) 
						{
							alert(address + " Introduzca una direccion...");
						} 
						else 
						{
							map.setCenter(point, zoom);
							var marker = new GMarker(point);
							map.addOverlay(marker);
							document.form_mapa.coordenadas.value = point.y+","+point.x;
						}
					}
				);
			}  
		}
		//---------------------------------//
		//     FIN DE GEOCODER
		//---------------------------------//
</script>  

        <!--FIN// CARGA SCRIPTS-->

