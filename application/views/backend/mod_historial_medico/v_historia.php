<div class="span10 boxBorder"><!-- PANEL -->
	
	<div class="navbar">
		<div class="navbar-inner">
		<div class="container">
			<a class="brand">Gestor de asistencia medica</a>

			<!--INICIO//  BARRA DE HERRAMIENTAS -->
			<?php 
			$atrib_buscar = array('name'=>'busqueda','id'=>'busqueda','method'=>'post','class'=>'navbar-form pull-right form-search');
			echo form_open('backend/mod_historial_medico/ver_todos',$atrib_buscar);
                        ?>
					<div class="btn-group">										
						<a href="<?php echo base_url()."index.php/backend/mod_historial_medico/ver_todos"?>" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Ver todos los animales">
							<i class="icon-th icon-white"></i> Ver todos</a>
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
                            Datos <small> del animal</small>
			</h4>
				
				<?php
				if(isset($datos_animal)){ 
					echo "<div class=\"box-table span9\">";
					foreach($datos_animal as $item){
						$foto = strlen($item['foto_animal']) <= 4 ? "" : 'src="'.base_url().'uploads/fotos-animal/'.$item['id_animal'].'_0.jpg"';
						echo "<div class=\"row\"><div class=\"span2 text-center\">"."<img class=\"img-rounded\" ".$foto." style=\"width:125px; height:125px; margin:15px auto;\" data-src=\"holder.js/125x125\">"."</div>";
						echo "<div class=\"span2\">";
						echo "<strong class=\"descripcion\"><span class=\"label label-info label-notif\">Nombre:</span> ".$item['nombre_animal']."</strong>";
						echo "<strong class=\"descripcion\"><span class=\"label label-info label-notif\">Sexo:</span> ".$item['sexo_animal']."</strong>";
						echo "<strong class=\"descripcion\"><span class=\"label label-info label-notif\">Especie:</span> ".$item['especie']."</strong>";
						echo "<strong class=\"descripcion\"><span class=\"label label-info label-notif\">Raza:</span> ".$item['raza']."</strong>";
						echo "</div><div class=\"span5\"><strong class=\"descripcion\"><span class=\"label label-info label-notif\">Tama&ntilde;o:</span> ".$item['tamano']."</strong>";
						echo "<strong class=\"descripcion\"><span class=\"label label-info label-notif\">Fecha-nacimiento:</span> ".$item['fecha_nacimiento']."</strong>";
						echo "<strong class=\"descripcion\"><span class=\"label label-info label-notif\">Descripcion:</span> ".$item['caracteristicas']."</strong>";
						echo "</div></div>";
					}
					echo "</div>";
				}else{
					show_404();
				}
				
				?>


				<h4 class="well well-small span9">
				Historial medico
				<a href="#modal-ficha" role="button" class="btn btn-primary btn-mini pull-right" data-toggle="modal"><i class="icon-plus icon-white"></i> Nueva ficha de consulta</a>
				</h4>
			<div class="span9"><!-- Panel de historial (INICIO)-->
                            <div id="aviso_ok"></div>

				<div class="accordion" id="accordion3"><!-- Acordion (INICIO) -->
                                <?php 
                                        if(isset($historia)){
                                            $i = 1;
                                            foreach ($historia as $ficha){
                                                $head = '<div class="accordion-group"><div class="accordion-heading">';
                                                echo $head;
                                                $link = '<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#collapse'.$i.'">'.$ficha['fecha_inicio'].' -*- '.$ficha['motivo_consulta'];
                                                echo $link;
                                                echo "</a>";

                                                $h_cuerpo = '</div><div id="collapse'.$i.'" class="accordion-body collapse"><div class="accordion-inner">';
                                                echo $h_cuerpo;

                                                $atrib_borrar = array('name'=>'borrar_ficha'.$i,'id'=>'borrar_ficha'.$i,'method'=>'post','class'=>'pull-right');
                                                echo form_open('backend/mod_historial_medico/borrar_ficha',$atrib_borrar);
                                                echo "<input name=\"id_ficha\" type=\"hidden\" value=\"".$ficha['id_ficha']."\">";
                                                echo "<input name=\"id_animal\" type=\"hidden\" value=\"".$ficha['animal_id']."\">";
                                                $boton = '<button type="submit" class="btn btn-danger btn-mini pull-right spacer"><i class="icon-trash icon-white"></i> Borrar ficha</button>';
                                                echo $boton;
                                                echo "</form>";


                                                $atrib_buscar = array('name'=>'edita_ficha'.$i,'id'=>'edita_ficha'.$i,'method'=>'post','class'=>'guarda_fichaX');
                                                echo form_open('backend/mod_historial_medico/edita_ficha',$atrib_buscar);
                                                $boton = '<button type="submit" class="btn btn-primary btn-mini pull-right spacer" data-loading-text="Guardando..."><i class="icon-edit icon-white"></i> Actualizar ficha </button>';
                                                echo $boton;

                                                echo "<div class=\"input-prepend\"><span class=\"btn-aplab span2\">Motivo de la consulta:</span> <input name=\"motivo\" class=\"span5\" type=\"text\" value=\"".$ficha['motivo_consulta']."\"></div>";
                                                echo "<div class=\"input-prepend\"><span class=\"btn-aplab span1\">Diagnostico:</span> <textarea name=\"diagnostico\" class=\"span6\">".$ficha['diagnostico']."</textarea></div>";
                                                echo "<div class=\"input-prepend\"><span class=\"btn-aplab span1\">Tratamiento:</span> <textarea name=\"tratamiento\" rows=\"3\" class=\"span3\">".$ficha['tratamiento']."</textarea></div>";
                                                echo "<div class=\"input-prepend\"><span class=\"btn-aplab span1\">Vacunas:</span> <textarea name=\"vacunas\" rows=\"3\" class=\"span3\">".$ficha['vacunas']."</textarea></div>";
                                                echo "<input name=\"id_ficha\" type=\"hidden\" value=\"".$ficha['id_ficha']."\">";
                                                echo "<input name=\"id_animal\" type=\"hidden\" value=\"".$ficha['animal_id']."\">";
                                                echo "</form>";

                                                echo "</div></div></div>";
                                            $i++;
                                            }
                                        }else{
                                            echo "ERROR";                                
                                        }
                                ?>
    				</div><!-- Acordion (FIN) -->

			</div><!-- Panel de historial (FIN)-->

			<!--FIN//  
			##############################################################
			PANEL PRINCIPAL---COPIA TODO TU CODIGO DENTRO DEL DIV SPAN 10
			##############################################################
			-->
		</div>



		
    </div>	

	</div><!--Cerrarndo box-perfiles-->			
</div><!--Cerrarndo CELDA PANEL-->


	<!--INICIO CARGA SCRIPTS -->
<script type="text/javascript">
$(function(){
        $('.guarda_fichaX').ajaxForm({
			target: '#aviso_ok'
	});

});
</script>

        
	<!--FIN// CARGA SCRIPTS-->

        
        

				<?php 
				$atrib = array('name'=>'guarda_ficha','id'=>'guarda_ficha','method'=>'post');
				echo form_open('backend/mod_historial_medico/guarda_ficha',$atrib);?>
<div id="modal-ficha" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
<h3 id="myModalLabel">Nueva ficha medica</h3>
</div>
<div class="modal-body">

			<div class="row"><!--Begin row-->
				<div class="input-prepend span5">
				<span class="btn-aplab span2" type="button">Motivo de la consulta</span>
				<input name="motivo" class="text-left span3" type="text" placeholder="Ej.: Politraumatismo" value="<?php echo isset($nombre)? $nombre: "";?>">
				</div>
				
				<div class="input-prepend span5">
				<span class="btn-aplab span2" type="button">Diagnostico</span>
				<textarea name="diagnostico" rows="3" class="text-left span3" type="text" placeholder="Ej.: Fractura de radio y cubito..." value="<?php echo isset($nombre)? $nombre: "";?>"></textarea>	
				</div>

				<div class="input-prepend span5">
				<span class="btn-aplab span2" type="button">Tratamiento a seguir</span>
				<textarea name="tratamiento" rows="3" class="text-left span3" type="text" placeholder="Ej.: Reduccion de fractura con yeso durante 15 dias" value="<?php echo isset($nombre)? $nombre: "";?>"></textarea>	
				</div>

				<div class="input-prepend span5">
				<span class="btn-aplab span2" type="button">Vacunas aplicadas</span>
				<textarea name="vacunas" rows="3" class="text-left span3" type="text" placeholder="Ej.: Octuple anual, Antirrabica anual" value="<?php echo isset($nombre)? $nombre: "";?>"></textarea>	
				</div>
                                <?php 
                                    if(isset($datos_animal)){ 
                                            foreach($datos_animal as $item){
                                                    echo "<input name=\"id_animal\" value=\"".$item['id_animal']."\" type=\"hidden\">";
                                            }
                                    }else{
                                            show_404();
                                    }
                                ?>

			</div>

                            <div id="guardado_ok"></div>

</div>
<div class="modal-footer">
	<button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
	<button id="registrar" type="submit" class="spacer btn btn-primary"><i class="icon-file icon-white"></i> Guardar ficha</button>
</div>
</div>
				</form>					
