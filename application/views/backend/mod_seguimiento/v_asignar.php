<div class="span10 boxBorder spacer"><!-- PANEL -->
	
	<div class="navbar">
		<div class="navbar-inner">
		<div class="container">
			<a class="brand">Gestor de seguimientos</a>

			<!--INICIO//  BARRA DE HERRAMIENTAS -->
			<?php 
			$atrib_buscar = array('name'=>'busqueda','id'=>'busqueda','method'=>'post','class'=>'navbar-form pull-right form-search');
			echo form_open('backend/mod_historial_medico/ver_todos',$atrib_buscar);
                        ?>
					<div class="btn-group">										
						<a href="<?php echo base_url()."index.php/backend/mod_seguimiento/inicio_seguimiento"?>" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Nueva Donaci�n">
							<i class="icon-th icon-white"></i> Todos los voluntarios</a> 
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
			<h4 class="well well-small span9">
                            Datos <small> del voluntario</small>
			</h4>
				
				<?php
				if(isset($voluntario)){ 
					echo "<div class=\"box-table span9\">";
					foreach($voluntario as $item){
						$foto = strlen($item['foto']) <= 4 ? "" : 'src="'.base_url().'files/imagenes/thumbs/'.$item['nombre'].$item['apellidos'].'.jpg"';
						echo "<div class=\"row\"><div class=\"span2 text-center\">"."<img ".$foto." class=\"img-rounded\" style=\"width:125px; height:125px; margin:15px auto;\" data-src=\"holder.js/125x125\">"."</div>";
						echo "<div class=\"span3\">";
						echo "<strong class=\"descripcion\"><span class=\"label label-info label-notif\">Nombre:</span> ".$item['nombre']."</strong>";
						echo "<strong class=\"descripcion\"><span class=\"label label-info label-notif\">Ap. Paterno:</span> ".$item['apellidos']."</strong>";
						echo "<strong class=\"descripcion\"><span class=\"label label-info label-notif\">Correo:</span> ".$item['email']."</strong>";
						echo "<strong class=\"descripcion\"><span class=\"label label-info label-notif\">Telefono:</span> ".$item['telefono']."</strong>";
						echo "</div><div class=\"span4\"><strong class=\"descripcion\"><span class=\"label label-info label-notif\">Celular:</span> ".$item['celular']."</strong>";
						echo "<strong class=\"descripcion\"><span class=\"label label-info label-notif\">Ciudad:</span> ".$item['ciudad']."</strong>";
						echo "<strong class=\"descripcion\"><span class=\"label label-info label-notif\">Direccion:</span> ".$item['direccion']."</strong>";
						echo "</div></div>";
					}
					echo "</div>";
                                }else{
                                    echo "Error";
                                }
				
				?>

                        <h4 class="well well-small span9">
                            Casos sin asignar <small> al voluntario</small>
			</h4>

                        <div class="span10">
                        <?php 
			$atrib_buscar = array('name'=>'asignacion','id'=>'asignacion','method'=>'post','class'=>'');
			echo form_open('backend/mod_seguimiento/llenar_asignacion',$atrib_buscar);
                            if(isset($animales)){
                                    $stp = "";
                                    $nro_fichas = count($animales);
                                    if($nro_fichas == ''){
                                        echo "<div class=\"boxBorder box-no-results spacer\">Opps! No hay resultados para esa busqueda</div>";
                                    }else{
                                        echo "<ul class=\"thumbnails\">";
                                        foreach($animales as $fila){
                                                $foto = strlen($fila['foto_animal']) <= 4 ? "" : 'src="'.base_url().'uploads/fotos-animal/'.$fila['id_animal'].'_0.jpg"';
                                                $stp = '<li>
                                                        <div class="thumbnail">
                                                        <img '.$foto.' data-src="holder.js/140x140" style="width:140px; height:140px;" alt="">
                                                        <p>
                                                        <small>
                                                                <strong>Nombre: </strong>'.$fila['nombre_animal'].'<br/>
                                                                <strong>Raza: </strong>'.$fila['raza'].'<br/>
                                                        </small>
                                                        </p>
                                                        <input name="id_voluntario" type="hidden" value="'.$id_voluntario.'">
                                                        <button name="id_animal" value="'.$fila['id_animal'].'" type="submit" class="btn btn-primary btn-small btn-block" style="padding:5px;">Asignar caso</button>
                                                        </div>
                                                        </li>';
                                                echo $stp;
                                                $stp = "";
                                        }
                                        echo "</ul>";
                                        echo isset($paginacion) ? $paginacion : "" ;
                                    }    
                            }else{
                                echo "Error";
                            }
                        echo "</form>";    
                        ?>
                        </div>
                        <h4 class="well well-small span9">
                            Casos asignados <small> al voluntario</small>
			</h4>
                        <div class="span10">
                        <?php 
                            if(isset($casos)){
                                    $stp = "";
                                    $nro_fichas = count($animales);
                                    if($nro_fichas == ''){
                                        echo "<div class=\"boxBorder box-no-results spacer\">Opps! No hay resultados para esa busqueda</div>";
                                    }else{
                                        echo "<ul class=\"thumbnails\">";
                                        foreach($casos as $fila){
                                                $foto = strlen($fila['foto_animal']) <= 4 ? "" : 'src="'.base_url().'uploads/fotos-animal/'.$fila['id_animal'].'_0.jpg"';
                                                $stp = '<li>
                                                        <div class="thumbnail">
                                                        <img '.$foto.' data-src="holder.js/140x140" style="width:140px; height:140px;" alt="">
                                                        <p>
                                                        <small>
                                                                <strong>Nombre: </strong>'.$fila['nombre_animal'].'<br/>
                                                                <strong>Raza: </strong>'.$fila['raza'].'<br/>
                                                        </small>
                                                        </p>
                                                        <!--
                                                        <input name="id_voluntario" type="hidden" value="'.$id_voluntario.'">    
                                                        <button name="id_animal" value="'.$fila['id_animal'].'" type="submit" class="btn btn-primary btn-small btn-block" style="padding:5px;">Ver estado</button>
                                                        --></div>
                                                        </li>';
                                                echo $stp;
                                                $stp = "";
                                        }
                                        echo "</ul>";
                                    }    
                            }else{
                                echo "Error";
                            }
                        ?>
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
<script type="text/javascript">
$(function(){
    $('#myTab a:last').tab('show');
});
</script>

        
	<!--FIN// CARGA SCRIPTS-->

