<div class="span10 boxBorder spacer"><!-- PANEL -->
	
	<div class="navbar">
		<div class="navbar-inner">
		<div class="container">
			<a class="brand">Gestor de animales</a>

			<!--INICIO//  BARRA DE HERRAMIENTAS -->
			<?php 
			$atrib_buscar = array('name'=>'busqueda','id'=>'busqueda','method'=>'post','class'=>'navbar-form pull-right form-search');
			echo form_open('backend/mod_animales/ver_todos',$atrib_buscar);
                        ?>
					<div class="btn-group">										
						<a href="<?php echo base_url()."index.php/backend/mod_animales/ver_todos"?>" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Ver todos los animales">
							<i class="icon-th icon-white"></i> Ver todos</a>
						<a href="<?php echo base_url()."index.php/backend/mod_animales/nuevo_animal"?>" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Nuevo animal">
							<i class="icon-plus icon-white"></i> Nuevo</a>
					</div>
				<div class="input-append pull-right" style="margin-left:5px;">
				<input name="clave" type="text" class="input-small search-query" placeholder="Palabra clave">
				<button type="submit" class="btn btn-primary"><i class="icon-filter icon-white"></i>&nbsp;Filtrar</button>
				</div>
			</form>	
			<!--END//  BARRA DE HERRAMIENTAS -->

		</div>	<!--Container-->
		</div><!--Navbar inner-->
	</div><!--Navbar-->
	
	<!--Inner Container	-->
	<div class="spacer" id="box-contenido">
		<div class="span10">
			<!--INICIO
			##############################################################
			PANEL PRINCIPAL---COPIA TODO TU CODIGO DENTRO DEL DIV SPAN 10
			##############################################################
			-->
		<?php 
		if(isset($fichas)){
			$stp = "";
                        $nro_fichas = count($fichas);
                        if($nro_fichas == ''){
                            echo "<div class=\"boxBorder box-no-results spacer\">Opps! No hay resultados para esa busqueda</div>";
                        }else{
                            echo "<ul class=\"thumbnails\">";
                            foreach($fichas as $fila){
                                    $foto = strlen($fila['foto_animal']) <= 4 ? "" : 'src="'.base_url().'uploads/fotos-animal/'.$fila['id_animal'].'_0.jpg"';
                                    $stp = '<li>
                                            <div class="thumbnail">
                                            <img '.$foto.' data-src="holder.js/140x140" style="width:140px; height:140px;" alt="">
                                            <p>
                                            <small>
                                                    <strong>Nombre: </strong>'.$fila['nombre_animal'].'<br/>
                                                    <strong>Entrada: </strong>'.$fila['motivo_entrada'].'<br/>
                                            </small>
                                            </p>
                                                    <a href="'.base_url().'index.php/backend/mod_animales/mostrar_ficha/'.$fila['id_animal'].'" class="box-ver">Ver ficha</a>
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



		

	</div><!--Cerrarndo box-perfiles-->			
</div><!--Cerrarndo CELDA PANEL-->


	<!--INICIO// CARGA SCRIPTS -->
	
	<!--FIN// CARGA SCRIPTS-->
