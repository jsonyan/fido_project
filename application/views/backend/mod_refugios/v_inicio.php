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
                           Mapa de todos los refugios <small> temporales</small>
			</h4>
				
                        <div id="id_mapa" style="width:95%; height: 625px; margin: 80px auto 10px auto">   
                                <script type="text/javascript"> 
                                        inicializar();
                                </script>  
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
	<!--FIN// CARGA SCRIPTS-->

