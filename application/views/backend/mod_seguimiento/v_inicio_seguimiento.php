<div class="span10 boxBorder"><!-- PANEL -->
	
	<div class="navbar">
		<div class="navbar-inner">
		<div class="container">
			<a class="brand">Gestor de seguimientos</a>

			<!--INICIO//  BARRA DE HERRAMIENTAS -->
					<div class="btn-group pull-right">										
						<a href="<?php echo base_url()."index.php/backend/mod_seguimiento/inicio_seguimiento"?>" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Nueva Donaci�n">
							<i class="icon-th icon-white"></i> Todos los voluntarios</a> 
					</div>
			<!--END//  BARRA DE HERRAMIENTAS -->

		</div>	<!--Container-->
		</div><!--Navbar inner-->
	</div><!--Navbar-->
	
	<!--Inner Container	-->
	<div class="spacer" id="box-contenido">
    <div class="">
		<div class="span10">
			<!--INICIO//  
			##############################################################
			PANEL PRINCIPAL---COPIA TODO TU CODIGO DENTRO DEL DIV SPAN 10
			##############################################################
			-->
		<?php 
		if(isset($fichas)){
			$stp = "";
                        $nro_fichas = count($fichas);
                        if($nro_fichas == ''){
                            echo "<div class=\"boxBorder box-no-results spacer\">Opps! No hay resultados</div>";
                        }else{
                            echo "<ul class=\"thumbnails\">";
                            foreach($fichas as $fila){
                                    $foto = strlen($fila['foto']) == null ? "" : 'src="'.base_url().'files/imagenes/thumbs/'.$fila['nombre'].$fila['apellidos'].'.jpg"';
                                    $stp = '<li>
                                            <div class="thumbnail">
                                            <img '.$foto.' data-src="holder.js/140x140" style="width:140px; height:140px;" alt="">
                                            <p>
                                            <small>
                                                    <strong>Nombre: </strong>'.$fila['nombre'].'<br/>
                                                    <strong>Entrada: </strong>'.$fila['apellidos'].'<br/>
                                            </small>
                                            </p>
                                                    <a href="'.base_url().'index.php/backend/mod_seguimiento/asignar/'.$fila['id_voluntario'].'" class="box-ver">Asignar tareas</a>
                                            </div>
                                            </li>';
                                    echo $stp;
                                    $stp = "";
                            }
                            echo "</ul>";
			    echo isset($paginacion) ? $paginacion : "" ;
                        }    
		}
		?>

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
