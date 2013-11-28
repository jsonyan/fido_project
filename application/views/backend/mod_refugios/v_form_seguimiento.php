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
    <div class="row">
		<div class="span10">
			<!--INICIO//  
			##############################################################
			PANEL PRINCIPAL---COPIA TODO TU CODIGO DENTRO DEL DIV SPAN 10
			##############################################################
			-->
			<h4 class="well well-small span9">
                            Formulario <small>de seguimiento</small>
			</h4>
                            <div id="aviso"></div>
		<?php 
		$atrib = array('name'=>'guarda_seguimiento','id'=>'guarda_seguimiento','method'=>'post');
		echo form_open('backend/mod_seguimiento/guardar_seguimiento',$atrib);?>
			<div class=""><!--Begin row-->
				<div class="input-prepend span8">
				<span class="btn btn-warning disabled input-medium" type="button">Caso</span>
				<input name="caso" class="text-left span7" type="text" placeholder="Descripcion del caso" value="<?php echo isset($caso)? $caso: "";?>">
				</div>
				<div class="input-prepend span4">
				<span class="btn btn-warning disabled input-medium" type="button">Monto asignado (Bs)</span>
				<input name="monto" class="text-left span7" type="text" placeholder="Dinero asignado" value="<?php echo isset($monto)? $monto: "";?>">
				</div>
				<div class="input-prepend span8">
				<span class="btn btn-warning disabled input-medium" type="button">Tareas</span>
				<textarea name="tareas" class="text-left span7" rows="5" type="text" placeholder="Lista de tareas" value="<?php echo isset($tareas)? $tareas: "";?>"></textarea>
				</div>
				<div class="input-prepend span4">
				<span class="btn btn-warning disabled input-medium" type="button">Fecha de inicio</span>
				<input name="fecha_inicio" class="fecha span2" type="text" placeholder="Fecha inicio" value="<?php echo isset($fecha_inicio) ? $fecha_inicio : "" ?>">
				</div>
				<div class="input-prepend span4">
				<span class="btn btn-warning disabled input-medium" type="button">Fecha de fin</span>
				<input name="fecha_fin" class="fecha span2" type="text" placeholder="Fecha fin" value="<?php echo isset($fecha_fin) ? $fecha_fin : "" ?>">
				</div>
                                <input name="id_animal" type="hidden" value="<?php echo $id_animal?>">
                                <input name="id_voluntario" type="hidden" value="<?php echo $id_voluntario?>">
                        </div>
                            <button type="submit" class="span2 btn btn-primary">Guardar datos</button>
                            <button type="button" class="span2 btn">Cancel</button>
                </form>
                        

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
		$('.fecha').datepicker({format:'yyyy-mm-dd'});
                $('#guarda_seguimiento').ajaxForm({
                                target: '#aviso'
                        });
        });
        </script>

        <!--FIN// CARGA SCRIPTS-->
