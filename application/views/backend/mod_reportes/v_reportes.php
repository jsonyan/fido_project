<div class="span10 boxBorder"><!-- PANEL -->
	
	<div class="navbar">
		<div class="navbar-inner">
		<div class="container">
			<a class="brand">Reportes</a>
			<!--INICIO//  BARRA DE HERRAMIENTAS -->
<!--					<div class="btn-group pull-right">										
						<a href="<?php echo base_url()."index.php/"?>" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Nueva Donaci�n">
							<i class="icon-plus icon-white"></i> </a> 
                        
                        <a href="<?php echo base_url()."index.php/"?>" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Ver donaciones monetarias">
							<i class="icon-th icon-white"></i> </a>	 
                        
                        <a href="<?php echo base_url()."index.php/"?>" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Ver donaciones en especie">
							<i class="icon-th icon-white"></i> </a>	 				
							
						<a href="#" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Borrar donaci�n">
							<i class="icon-trash icon-white"></i> </a> 
					</div>
					-->
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
        <?php
        $labels_mes = "";
        $data_mes = "";
        $total_mes = 0;
        $labels_anio = "";
        $data_anio="";
        $total_anio = 0;
        if(isset($registrados_mes)){
            if($registrados_mes != null){
                foreach($registrados_mes as $fila){
                    $labels_mes = $labels_mes."\"".$fila['dia']."\",";
                    $data_mes = $data_mes.$fila['cantidad_por_dia'].",";
                    $total_mes = $total_mes + (int)($fila['cantidad_por_dia']);
                }
            }
        }
        if(isset($registrados_anio)){
            if($registrados_anio != null){
                foreach($registrados_anio as $fila){
                    $labels_anio = $labels_anio."\"".$fila['mes']."\",";
                    $data_anio = $data_anio.$fila['registrados_por_mes'].",";
                    $total_anio = $total_anio + (int)($fila['registrados_por_mes']);
                }
            }
        }
        ?>    


                        <div class="span9">
                            <div class="span9">
                                    <p class="badge badge-info pull-right">
                                        Reporte realizado a las: <?php ini_set('date.timezone', 'America/La_Paz'); echo date("H:i:s A");?> del dia <?php echo date("j - m - o")?>
                                    </p>
                            </div>
				<div class="tabbable spacer"> <!-- Only required for left/right tabs -->
					<ul class="nav nav-tabs" id="tab-config">
					<li class="active"><a href="#tab1" data-toggle="tab">Gestor de animales</a></li>
					<li><a href="#tab2" data-toggle="tab">Gestor de adopciones</a></li>
					<li><a href="#tab3" data-toggle="tab">Asistencia medica</a></li>
					<li><a href="#tab4" data-toggle="tab">Gestor de refugios</a></li>
					</ul>
					<div class="tab-content box-tab">
						<div class="tab-pane active" id="tab1">
                                                    <h4 class="span8 well well-small text-center">Animales registrados este mes.</h4>
                                                    <canvas id="por_mes" height="450" width="800" class="span7"></canvas>
                                                    <h4 class="span8 well well-small alert-info">
                                                        Total registrados este mes: <span class="badge badge-notif badge-info"><?php echo $total_mes;?></span> animales.
                                                    </h4>
                                                    <h4 class="span8 well well-small">Animales registrados este a&ntilde;o</h4>
                                                    <canvas id="por_anio" height="450" width="800"></canvas>
                                                    <h4 class="span8 well well-small alert-info">
                                                        Total registrados este a&ntilde;o: <span class="badge badge-notif badge-info"><?php echo $total_anio;?></span> animales.
                                                    </h4>
                                                    
                                                        <?php
                                                        if(isset($sexo)){
                                                            echo "<h4 class=\"span8 well well-small alert-info\">";
                                                            foreach($sexo as $fila){
                                                                echo "<span class=\"span3\" style=\"text-transform:capitalize;\">";
                                                                if($fila['sexo'] === '0')
                                                                    echo "No definido : ";
                                                                else
                                                                    echo $fila['sexo']." : ";
                                                                echo "<span class=\"badge badge-notif badge-info\">";
                                                                echo $fila['cantidad'];
                                                                echo "</span></span>";    
                                                            }
                                                            echo "</h4>";
                                                        }
                                                        if(isset($especie)){
                                                            echo "<h4 class=\"span8 well well-small alert-info\">";
                                                            foreach($especie as $fila){
                                                                echo "<span class=\"span3\" style=\"text-transform:capitalize;\">";
                                                                if($fila['especie'] === '0')
                                                                    echo "No definido : ";
                                                                else
                                                                    echo $fila['especie']." : ";
                                                                echo "<span class=\"badge badge-notif badge-info\">";
                                                                echo $fila['cantidad'];
                                                                echo "</span></span>";    
                                                            }
                                                            echo "</h4>";
                                                        }
                                                        if(isset($raza)){
                                                            echo "<h4 class=\"span8 well well-small alert-info\">";
                                                            foreach($raza as $fila){
                                                                echo "<span class=\"span3\" style=\"text-transform:capitalize;\">";
                                                                if($fila['raza'] === '0')
                                                                    echo "No definido : ";
                                                                else
                                                                    echo $fila['raza']." : ";
                                                                echo "<span class=\"badge badge-notif badge-info\">";
                                                                echo $fila['cantidad'];
                                                                echo "</span></span>";    
                                                            }
                                                            echo "</h4>";
                                                        }
                                                        if(isset($entrada)){
                                                            echo "<h4 class=\"span8 well well-small alert-info\">";
                                                            foreach($entrada as $fila){
                                                                echo "<span class=\"span3\" style=\"text-transform:capitalize;\">";
                                                                if($fila['entrada'] === '0')
                                                                    echo "No definido : ";
                                                                else
                                                                    echo $fila['entrada']." : ";
                                                                echo "<span class=\"badge badge-notif badge-info\">";
                                                                echo $fila['cantidad'];
                                                                echo "</span></span>";    
                                                            }
                                                            echo "</h4>";
                                                        }

                                                        if(isset($esterilizado)){
                                                            echo "<h4 class=\"span8 well well-small alert-info\">";
                                                            foreach($esterilizado as $fila){
                                                                echo "<span class=\"span3\" style=\"text-transform:capitalize;\">";
                                                                if($fila['esterilizado'] === '0')
                                                                    echo "Esterilizado : ";
                                                                else
                                                                    echo "No esterilizado : ";
                                                                echo "<span class=\"badge badge-notif badge-info\">";
                                                                echo $fila['cantidad'];
                                                                echo "</span></span>";    
                                                            }
                                                            echo "</h4>";
                                                        }
                                                        if(isset($entrada)){
                                                            echo "<h4 class=\"span8 well well-small alert-info\">";
                                                            foreach($entrada as $fila){
                                                                echo "<span class=\"span3\" style=\"text-transform:capitalize;\">";
                                                                if($fila['entrada'] === '0')
                                                                    echo "No definido : ";
                                                                else
                                                                    echo $fila['entrada']." : ";
                                                                echo "<span class=\"badge badge-notif badge-info\">";
                                                                echo $fila['cantidad'];
                                                                echo "</span></span>";    
                                                            }
                                                            echo "</h4>";
                                                        }
                                                        
                                                        ?>
                                                    
						</div>
						<div class="tab-pane" id="tab2">
                                                    <h4 class="span8 well well-small">Animales registrados este a&ntilde;o</h4>
                                                    <canvas id="por_anio" height="450" width="600"></canvas>
						</div>
						<div class="tab-pane" id="tab3">
							<h4 class="span8 well well-small">Agregar o borrar razas</h4>
						</div>
						<div class="tab-pane" id="tab4">
							<h4 class="span8 well well-small">Agregar o borrar razas</h4>
						</div>
					</div>
				</div>
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
        
	<script src="<?php echo base_url(); ?>js/chart/Chart.min.js"></script>

	<script type="text/javascript">
	var datos_por_mes = {
			labels : [<?php echo $labels_mes?>],
			datasets : [
				{
					fillColor : "rgba(151,187,205,0.5)",
					strokeColor : "rgba(220,220,220,1)",
					data : [<?php echo $data_mes?>]
				}
			]
			
	};
	var datos_por_anio = {
			labels : [<?php echo $labels_anio?>],
			datasets : [
				{
					fillColor : "rgba(151,187,205,0.5)",
					strokeColor : "rgba(151,187,205,1)",
					data : [<?php echo $data_anio?>]
				}
			]
			
	};

	var mes = new Chart(document.getElementById("por_mes").getContext("2d")).Bar(datos_por_mes);
	var anio = new Chart(document.getElementById("por_anio").getContext("2d")).Bar(datos_por_anio);
	
        </script>
	
	<!--FIN// CARGA SCRIPTS-->
